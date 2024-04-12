// menu collapse start
function toggleSmallMenu() {
    const smallMenu = document.getElementById('div1');
    smallMenu.classList.toggle('visually-hidden');

    const isSmallMenuCollapsed = smallMenu.classList.contains('visually-hidden');
    // localStorage.setItem('smallMenuCollapsed', JSON.stringify(isSmallMenuCollapsed));

    if (isSmallMenuCollapsed) {
        const normalMenu = document.getElementById('div2');
        normalMenu.classList.remove('visually-hidden');
    }
}
function toggleNormalMenu() {
    const normalMenu = document.getElementById('div2');
    normalMenu.classList.toggle('visually-hidden');

    const isNormalMenuCollapsed = normalMenu.classList.contains('visually-hidden');
    // localStorage.setItem('normalMenuCollapsed', JSON.stringify(isNormalMenuCollapsed));

    if (isNormalMenuCollapsed) {
        const smallMenu = document.getElementById('div1');
        smallMenu.classList.remove('visually-hidden');
    }
}
document.getElementById('div2-close').addEventListener('click', toggleNormalMenu);
document.getElementById('menu-button').addEventListener('click', toggleSmallMenu);
// menu collapse ends


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
    // var containsOnlyText = /^[A-Za-z ]+$/.test(inputElement.value);
    var containsOnlyNumbers = /^[0-9]+$/.test(inputElement.value);
    if (!containsOnlyNumbers) {
        alert("Please enter numbers only, no letter,spaces and special characters allowed!");
        inputElement.value = inputElement.value.replace(/[^0-9]/g, '');
    }
}
// validation for number ends