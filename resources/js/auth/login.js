import { removeSpinner, loadSpinner } from '../modules/spinner';
import { 
    createAlertMessage, 
    insertValidationMessage, 
    removeErrorMessages 
} from '../modules/error-messages';

const btnSubmit = document.getElementById('btnSubmit');      

btnSubmit.addEventListener('click', (e) => {
    e.preventDefault();
            
    loadSpinner(btnSubmit);

    axios.post('/login', {
        email: document.getElementById('email').value,
        password: document.getElementById('password').value
    })
    .then((response) => {
        if (response.status === 200) {
            window.location.href = '/home';
        }
    })
    .catch((error) => {
        removeErrorMessages();
                
        const errorArr = Object.entries(error.response.data.errors);
        for (const [key, value] of errorArr) {
            if (key === 'general') {
                createAlertMessage('alertError', value);
            } else {
                insertValidationMessage(key, value);
            }
        }
                
        removeSpinner(btnSubmit, 'LOG IN');
    });
});
