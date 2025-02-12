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
// Reusable Dropdown
document.querySelectorAll('.dropBtn').forEach(button => {
    button.addEventListener('click', function (event) {
        event.stopPropagation();
        let dropdown = this.closest('.dropContainer');
        document.querySelectorAll('.dropContainer').forEach(d => {
            if (d !== dropdown) {
                d.classList.remove('active');
            }
        });
        dropdown.classList.toggle('active');
    });
});
document.addEventListener('click', function (event) {
    if (!event.target.closest('.dropContainer')) {
        document.querySelectorAll('.dropContainer').forEach(dropdown => {
            dropdown.classList.remove('active');
        });
    }
});
// Reusable Dropdown End
// Multi Image Upload
const imageUpload = document.getElementById('imageUpload');
const imagePreview = document.querySelector('.image-preview');

imageUpload.addEventListener('change', (event) => {
  const files = event.target.files;
  for (let i = 0; i < files.length; i++) {
    const file = files[i];
    if (file.type.startsWith('image/')) {
      const reader = new FileReader();
      reader.onload = (e) => {
        const img = document.createElement('img');
        img.src = e.target.result;
        imagePreview.appendChild(img);
      };
      reader.readAsDataURL(file);
    }
  }
});
// Multi Image Upload End
