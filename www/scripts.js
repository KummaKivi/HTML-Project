const lightbox = document.querySelector('.lightbox');
const lightboxImage = lightbox.querySelector('img');
const closeLightbox = lightbox.querySelector('.close-lightbox');
const imageGrid = document.querySelector('.image-grid');

imageGrid.addEventListener('click', (event) => {
  if (event.target.tagName === 'IMG') {
    const imageSrc = event.target.dataset.lightbox;
    lightboxImage.src = `images/${imageSrc}.jpg`; // Assuming enlarged images are in the images folder
    lightbox.style.display = 'flex';
  }
});

closeLightbox.addEventListener('click', () => {
  lightbox.style.display = 'none';
});

lightbox.addEventListener('click', (event) => {
  if (event.target === lightbox) {
    lightbox.style.display = 'none';
  }
});