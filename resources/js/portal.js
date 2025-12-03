// Small helpers for portal UI: copy voucher and countdown timer
function copyVoucher() {
  const el = document.getElementById('voucherCode');
  if (!el) return;
  const text = el.textContent.trim();
  navigator.clipboard?.writeText(text).then(() => {
    const old = el.textContent;
    el.textContent = 'Copied!';
    setTimeout(() => el.textContent = text, 1000);
  }).catch(() => {
    // fallback
    const range = document.createRange();
    range.selectNodeContents(el);
    const sel = window.getSelection();
    sel.removeAllRanges();
    sel.addRange(range);
  });
}

function startCountdown(seconds) {
  const el = document.getElementById('countdown');
  if (!el) return;

  let remaining = seconds;
  const tick = () => {
    if (remaining < 0) {
      el.textContent = 'Expired';
      return;
    }
    const m = Math.floor(remaining / 60).toString().padStart(2, '0');
    const s = Math.floor(remaining % 60).toString().padStart(2, '0');
    el.textContent = `${m}:${s}`;
    remaining -= 1;
    setTimeout(tick, 1000);
  };
  tick();
}

// Expose to global for inline usage from Blade
window.copyVoucher = copyVoucher;
window.startCountdown = startCountdown;
