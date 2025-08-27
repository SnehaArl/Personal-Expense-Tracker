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


document.addEventListener('DOMContentLoaded', () => {
  const eyeIcons = document.querySelectorAll('.eye-icon');

  eyeIcons.forEach(icon => {
    const targetId = icon.getAttribute('data-target');
    const input = document.getElementById(targetId);

    if (!input) return;

    const showPassword = () => {
      input.type = 'text';
      icon.classList.replace('bx-show', 'bx-hide');
    };

    const hidePassword = () => {
      input.type = 'password';
      icon.classList.replace('bx-hide', 'bx-show');
    };

    // For mouse
    icon.addEventListener('mousedown', showPassword);
    icon.addEventListener('mouseup', hidePassword);
    icon.addEventListener('mouseleave', hidePassword);

    // For touch devices
    icon.addEventListener('touchstart', showPassword);
    icon.addEventListener('touchend', hidePassword);
  });
});
