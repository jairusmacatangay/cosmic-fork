import flatpickr from "flatpickr";
import { removeSpinner, loadSpinner } from '../modules/spinner';
import { 
  createAlertMessage, 
  insertValidationMessage, 
  removeErrorMessages 
} from '../modules/error-messages';

const birthdayInput = document.getElementById('birthday');
const agreeCheckbox = document.getElementById('agreeCheckbox');
const submitBtn = document.getElementById('submitBtn');

const fp = flatpickr(birthdayInput);

agreeCheckbox.addEventListener('click', () => {
  if (agreeCheckbox.checked) {
    submitBtn.disabled = false;
  } else {
    submitBtn.disabled = true;
  }
});

submitBtn.addEventListener('click', (e) => {
  e.preventDefault();
          
  loadSpinner(submitBtn);

  axios.post('/register', {
      firstName: document.getElementById('firstName').value,
      lastName: document.getElementById('lastName').value,
      email: document.getElementById('email').value,
      mobileNumber: document.getElementById('mobileNumber').value,
      birthday: document.getElementById('birthday').value,
      password: document.getElementById('password').value,
      confirmPassword: document.getElementById('confirmPassword').value
  })
  .then((response) => {
      if (response.status === 200) {
          window.location.href = '/home';
      }
  })
  .catch((error) => {
      console.log('error', error);
      removeErrorMessages();
              
      const errorArr = Object.entries(error.response.data.errors);
      for (const [key, value] of errorArr) {
          if (key === 'general') {
              createAlertMessage('alertError', value);
          } else {
              insertValidationMessage(key, value[0]);
          }
      }
              
      removeSpinner(submitBtn, 'Sign Up');
  });
});
