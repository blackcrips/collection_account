//setting event listener to open modal when logout is clicked
let btnLogout = document.getElementById('btn-logout');
let overlay = document.getElementById('container-overlay');
let btnLogoutCancel = document.getElementById('modal-cancel');
let body = document.getElementById('body');

btnLogout.addEventListener('click', () =>{
    overlay.classList.add('active')
    body.classList.add('active-body');
});


btnLogoutCancel.addEventListener('click', () => {
    overlay.classList.remove('active');
    body.classList.remove('active-body');
});



let cancelChangePwdButton = document.getElementById('change-cancel');

cancelChangePwdButton.addEventListener('click', (e) => {
    document.getElementById('overlay').classList.remove('active');
    e.preventDefault();
});

let changePwdButton = document.getElementById('change-password');

changePwdButton.addEventListener('click', (e) => {
    document.getElementById('overlay').classList.add('active');
    e.preventDefault();
});



  