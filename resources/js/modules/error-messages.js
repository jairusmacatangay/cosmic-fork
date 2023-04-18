export function createAlertMessage(id, value) {
  document.getElementById(id).innerHTML = `
    <div class="alert alert-danger alert-dismissible fade show" role="alert" id="mainAlert">
      <span>${value}</span>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>`;
}

export function insertValidationMessage(key, value) {
    const div = document.createElement('div');
    div.classList.add('text-danger');
    div.innerText = value;
    document.getElementById(key).after(div);
}

export function removeErrorMessages() {
    const mainAlert = document.getElementById('mainAlert');
    const errorMessages = document.getElementsByClassName('text-danger');
                
    if (mainAlert) {
        mainAlert.remove();
    }

    if (errorMessages.length > 0) {
        Array.from(errorMessages).forEach(element => element.remove());
    }
}
