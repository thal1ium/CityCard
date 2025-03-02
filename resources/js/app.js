document.addEventListener('DOMContentLoaded', () => {
  const toggleFormButton = document.querySelector('#toggle-form-button');
  const userForm = document.querySelector('#user-form');
  const adminForm = document.querySelector('#admin-form');
  
  toggleFormButton.addEventListener('click', () => {
    console.log(1);
    
    userForm.classList.toggle('hide-form');
    adminForm.classList.toggle('hide-form');
  });
});
