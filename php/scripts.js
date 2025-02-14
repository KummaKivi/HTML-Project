const lightbox = document.querySelector('.lightbox');
const lightboxImage = lightbox.querySelector('.lightbox-content img');
const imageContainers = document.querySelectorAll('.image-container');

imageContainers.forEach(container => {
  container.addEventListener('click', (event) => {
    if (event.target.tagName === 'IMG') {
      const imageSrc = event.target.src; // Get the image source
      const lightboxGroup = event.target.dataset.lightbox; // Get the lightbox group
      lightboxImage.src = imageSrc; // Set the lightbox image source
      lightbox.dataset.lightboxGroup = lightboxGroup; // Store the lightbox group
      lightbox.style.display = 'flex'; // Show the lightbox
    }
  });
});

// Close lightbox when clicking outside the image
lightbox.addEventListener('click', (event) => {
  if (event.target === lightbox) {
    lightbox.style.display = 'none';
  }
});