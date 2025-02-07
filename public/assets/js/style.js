document.addEventListener('DOMContentLoaded', function() {
    const header = document.querySelector('.main-header');
    if (header) {
        window.addEventListener('scroll', function() {
            if (window.scrollY > 50) {
                header.classList.add('fixed-header');
            } else {
                header.classList.remove('fixed-header');
            }
        });
    }
});
function togglePassword(element) {
    const input = element.previousElementSibling; // Get the input field before the toggle
    input.type = input.type === 'password' ? 'text' : 'password';
    element.innerHTML = input.type === 'password' ? "<i class='fa-solid fa-eye'></i>" : "<i class='fa-solid fa-eye-slash'></i>";
}
