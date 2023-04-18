export function loadSpinner(btn) {
  btn.innerHTML = '';
  btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin mt-1 mb-1"></i>';
  btn.setAttribute('disabled', '');
}

export function removeSpinner(btn, text) {
  btn.innerHTML = '';
  btn.innerHTML = text;
  btn.removeAttribute('disabled');
}
