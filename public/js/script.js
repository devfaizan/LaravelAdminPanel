// menu collapse start
function toggleSmallMenu() {
    const smallMenu = document.getElementById('div1');
    smallMenu.classList.toggle('visually-hidden');

    const isSmallMenuCollapsed = smallMenu.classList.contains('visually-hidden');
    localStorage.setItem('isSmallMenuCollapsed', isSmallMenuCollapsed);

    if (isSmallMenuCollapsed) {
        const normalMenu = document.getElementById('div2');
        normalMenu.classList.remove('visually-hidden');
        localStorage.setItem('isNormalMenuCollapsed', false);
    }
}
function toggleNormalMenu() {
    const normalMenu = document.getElementById('div2');
    normalMenu.classList.toggle('visually-hidden');

    const isNormalMenuCollapsed = normalMenu.classList.contains('visually-hidden');
    localStorage.setItem('isNormalMenuCollapsed', isNormalMenuCollapsed);

    if (isNormalMenuCollapsed) {
        const smallMenu = document.getElementById('div1');
        smallMenu.classList.remove('visually-hidden');
        localStorage.setItem('isSmallMenuCollapsed', false);
    }
}
document.getElementById('div2-close').addEventListener('click', toggleNormalMenu);
document.getElementById('menu-button').addEventListener('click', toggleSmallMenu);

window.addEventListener('load', () => {
    const isSmallMenuCollapsed = localStorage.getItem('isSmallMenuCollapsed') === 'true';
    const isNormalMenuCollapsed = localStorage.getItem('isNormalMenuCollapsed') === 'true';
    const smallMenu = document.getElementById('div1');
    const normalMenu = document.getElementById('div2');
    if (isSmallMenuCollapsed) {
        smallMenu.classList.add('visually-hidden');
    } else {
        smallMenu.classList.remove('visually-hidden');
    }
    if (isNormalMenuCollapsed) {
        normalMenu.classList.add('visually-hidden');
    } else {
        normalMenu.classList.remove('visually-hidden');
    }
});

// validation for text starts
function validateInputText(inputElement) {
    var containsOnlyText = /^[A-Za-z ]+$/.test(inputElement.value);
    if (!containsOnlyText) {
        alert("Please enter text only, no numbers and special characters allowed!");
        inputElement.value = inputElement.value.replace(/[^A-Za-z ]/g, '');
    }
}
// validation for text ends

// validation for number starts
function validateInputNumber(inputElement) {
    var containsOnlyNumbers = /^[0-9]+$/.test(inputElement.value);
    if (!containsOnlyNumbers) {
        alert("Please enter numbers only, no letter,spaces and special characters allowed!");
        inputElement.value = inputElement.value.replace(/[^0-9]/g, '');
    }
}
// validation for number ends