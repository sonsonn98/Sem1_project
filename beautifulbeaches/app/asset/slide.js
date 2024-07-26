function initSlideshows() {
  let slideshows = document.getElementsByClassName("slideshow-container");
  for (let i = 0; i < slideshows.length; i++) {
      slideshows[i].slideIndex = 1;
      showSlides(1, slideshows[i].id);
  }
}

function plusSlides(n, slideshowId) {
  let slideshow = document.getElementById(slideshowId);
  showSlides(slideshow.slideIndex += n, slideshowId);
}

function currentSlide(n, slideshowId) {
  showSlides(n, slideshowId);
}

function showSlides(n, slideshowId) {
  let i;
  let slideshow = document.getElementById(slideshowId);
  let slides = slideshow.getElementsByClassName("mySlides");
  let dots = document.querySelectorAll(`#${slideshowId} ~ .dot-btn .dot`);
  if (n > slides.length) { slideshow.slideIndex = 1 }
  if (n < 1) { slideshow.slideIndex = slides.length }
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideshow.slideIndex - 1].style.display = "block";
  dots[slideshow.slideIndex - 1].className += " active";
}

document.addEventListener("DOMContentLoaded", initSlideshows);
