


let buttonCancel = document.querySelectorAll('#cancel-create');



buttonCancel.forEach(button => {
    button.onclick = () => {
        window.location.href = './admin.php';
    };
})



document.getElementById('cancel-create2').onclick = () => {
    window.location.href = './admin.php';
}