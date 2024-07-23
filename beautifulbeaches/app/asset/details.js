// To access the stars and form
const stars = document.getElementsByClassName("star");
const reviewForm = document.getElementById("reviewForm");

// Function to update rating
function updateRating(n) {
    for (let i = 0; i < stars.length; i++) {
        stars[i].classList.toggle("filled", i < n);
    }
}

// Add event listeners to stars
for (let star of stars) {
    star.addEventListener("click", function() {
        const value = parseInt(this.getAttribute("data-value"));
        updateRating(value);
    });
}

// Function to open the review form
function openReviewForm() {
    reviewForm.style.display = "block";
}

// Function to close the review form
function closeReviewForm() {
    reviewForm.style.display = "none";
}

// overlay 
function on() {
    document.getElementById("details-overlay").style.display = "block";
  }
  
  function off() {
    document.getElementById("details-overlay").style.display = "none";
  }