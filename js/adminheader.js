let navigationTab = document.getElementById('navigation-tab');
let navigationContent = document.getElementById('navigation-content');
let burger = document.getElementById('tab-design');

burger.addEventListener('click', () => {
    if(navigationTab.className == 'navigation-tab active'){
        burger.classList.remove('active');
    } else {
        burger.classList.add('active');
    }



    if(navigationContent.className == 'navigation active'){
        burger.classList.remove('active');
        navigationContent.classList.remove('active');
    } else {
        navigationContent.classList.add('active');
    }
});


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


let btnHome = document.getElementById('btn-home');
let createUser = document.getElementById('btn-create-user');
let dashboard = document.getElementById('btn-dashboard');


btnHome.addEventListener('click', () => {
    window.location.href = './admin.php';
});

createUser.addEventListener('click', () => {
    window.location.href = './createuser.php';
});

dashboard.addEventListener('click', () => {
    window.location.href = './dashboard.php';
});