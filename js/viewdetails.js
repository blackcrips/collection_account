
// let dateAppliedValue = document.getElementById('date-applied');
let dateApplied = document.getElementById('date_applied').innerHTML;
let contactNo1Value = document.getElementById('contact-no1');
let contactNo2Value = document.getElementById('contact-no2');
let contactNo3Value = document.getElementById('contact-no3');


let saveButton = document.getElementById('save-button');
saveButton.addEventListener('click', (e) => {
    document.getElementById('container-recheck').classList.add('active');
    e.preventDefault();
});

let cancelButton = document.getElementById('recheck-cancel');
cancelButton.addEventListener('click', (e) => {
    document.getElementById('container-recheck').classList.remove('active');
    document.getElementById('recheck-exit').style.display="none";
    document.getElementById('recheck-save').style.display="inline-block";
    e.preventDefault();
});


let exitButton = document.getElementById('exit-button');

exitButton.addEventListener('click', (e) => {
    document.getElementById('container-recheck').classList.add('active');
    document.getElementById('recheck-save').style.display="none";
    document.getElementById('recheck-exit').style.display="inline-block";
    document.getElementById('recheck-txt').innerHTML = "Are you sure you want to exit without saving information?";
    e.preventDefault();
});

let confirmExit = document.getElementById('recheck-exit');

confirmExit.onclick = (e) => {
    window.location.href = './admin.php';
    e.preventDefault();
}




// setting maxlength for input 
contactNo1Value.addEventListener('keyup', () => {
     
    settingMaxLength(contactNo1Value);

});
contactNo2Value.addEventListener('keyup', () => {
    
    settingMaxLength(contactNo2Value);

});
contactNo3Value.addEventListener('keyup', () => {
    
    settingMaxLength(contactNo3Value);

});


function settingMaxLength(inputName){
    if(inputName.value.length > 10){
        inputName.value = inputName.value.slice(0, 10);
    }
}



