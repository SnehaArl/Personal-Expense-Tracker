const container= document.querySelector('.container');
const registerBtn= document.querySelector('.register-btn');
const loginBtn= document.querySelector('.login-btn');



function validateRegisterForm(event) {
        const password = document.getElementById('password').value;
        const confirmPassword = document.getElementById('confirmPassword').value;
        const errorBox = document.getElementById('error-message');

       errorBox.textContent = '';
       errorBox.classList.remove('visible');

        if (password.length < 8) {
          errorBox.textContent = "Password must be at least 8 characters long.";
          errorBox.classList.add('visible');
          event.preventDefault();
          return false;
        }

        if (password !== confirmPassword) {
          errorBox.textContent = "Passwords do not match.";
          errorBox.classList.add('visible');
          event.preventDefault();
          return false;
        }

        return true; 
      }
document.querySelector('.form-box.register form').addEventListener('submit', validateRegisterForm);

