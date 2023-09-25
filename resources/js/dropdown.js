export default function init() {
    const dropdownTrigger = document.querySelector('.js-dropdown-trigger');
    if (dropdownTrigger) {
        const dropdown = document.querySelector('.js-dropdown');
        dropdownTrigger.addEventListener('click', () => {
            dropdown.classList.toggle('open');
        });
    }
}
init();
