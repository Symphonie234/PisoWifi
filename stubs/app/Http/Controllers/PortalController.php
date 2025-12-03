<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Voucher;
use Carbon\Carbon;

class PortalController extends Controller
{
    public function landing()
    {
        return view('portal.landing');
    }

    // Simulate coin insertion -> generate voucher
    public function insertCoin(Request $request)
    {
        $code = strtoupper(Str::random(8));
        $duration = 30; // default minutes
        $expiresAt = Carbon::now()->addHours(24); // voucher valid to be redeemed for 24 hours

        $voucher = Voucher::create([
            'code' => $code,
            'duration_minutes' => $duration,
            'expires_at' => $expiresAt,
        ]);

        return redirect()->route('portal.show_voucher', ['code' => $voucher->code]);
    }

    public function showVoucher($code)
    {
        $voucher = Voucher::where('code', $code)->firstOrFail();
        return view('portal.voucher', ['voucher' => $voucher]);
    }

    // User redeems voucher on site
    public function redeem(Request $request)
    {
        $request->validate(['code' => 'required|string']);

        $voucher = Voucher::where('code', $request->input('code'))->first();

        if (! $voucher) {
            return back()->withErrors(['code' => 'Invalid voucher code.']);
        }

        if ($voucher->used_at) {
            return back()->withErrors(['code' => 'Voucher already used.']);
        }

        if ($voucher->isExpired()) {
            return back()->withErrors(['code' => 'Voucher has expired.']);
        }

        // Mark as used / activated for the sake of the portal.
        $voucher->used_at = Carbon::now();
        $voucher->save();

        // In a real setup, you would notify the hotspot controller here to grant network access for the duration.

        return view('portal.success', ['voucher' => $voucher]);
    }

    // API endpoint for hotspot devices to validate voucher codes
    public function apiValidate(Request $request)
    {
        $code = $request->input('code');

        if (! $code) {
            return response()->json(['success' => false, 'message' => 'Code required'], 400);
        }

        $voucher = Voucher::where('code', $code)->first();

        if (! $voucher) {
            return response()->json(['success' => false, 'message' => 'Invalid code'], 404);
        }

        if ($voucher->isExpired()) {
            return response()->json(['success' => false, 'message' => 'Expired'], 403);
        }

        if ($voucher->used_at && $voucher->used_at->gt(now()->subMinutes($voucher->duration_minutes))) {
            // If already used and still within active duration, deny reactivation or return remaining time
            $remaining = $voucher->used_at->addMinutes($voucher->duration_minutes)->diffInSeconds(now());
            return response()->json(['success' => true, 'active' => true, 'remaining_seconds' => $remaining]);
        }

        // Activate voucher for the hotspot: mark used_at
        $voucher->used_at = Carbon::now();
        $voucher->save();

        return response()->json([
            'success' => true,
            'active' => true,
            'duration_minutes' => $voucher->duration_minutes,
            'expires_at' => $voucher->used_at->addMinutes($voucher->duration_minutes)->toIso8601String(),
        ]);
    }
}
