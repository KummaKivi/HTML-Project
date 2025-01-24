const images = document.querySelectorAll('.image-grid img');
const lightbox = document.querySelector('.lightbox');
const lightboxImg = document.querySelector('.lightbox-content img');
const closeLightbox = document.querySelector('.close-lightbox');

images.forEach(image => {
  image.addEventListener('click', () => {
    lightboxImg.src = image.src;
    lightbox.style.display = 'flex';
  });
});

closeLightbox.addEventListener('click', () => {
  lightbox.style.display = 'none';
});

lightbox.addEventListener('click', (event) => {
  if (event.target === lightbox) {
    lightbox.style.display = 'none';
  }
});