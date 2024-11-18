const button = document.getElementsById('toggleButton');
const inputs = document.getElementsByClassName('input');

button.addEventListener('click', () => {
    for (let input of inputs) {
        input.disabled = !input.disabled;
    }
});