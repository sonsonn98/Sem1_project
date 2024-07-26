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
    star.addEventListener("click", function () {
        const value = parseInt(this.getAttribute("data-value"));
        updateRating(value);
    });
}

// show all reviews
function openReviewComment() {
    openreviewcomment.style.display = "block";
}
function closeReviewComment() {
    openreviewcomment.style.display = "none";
}

// Function review form
function openReviewForm() {
    reviewForm.style.display = "block";
}
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

// pick stars
const starsPick = document.querySelectorAll('.star');
const input = document.getElementById('starValue');
starsPick.forEach(starsPick => {
    starsPick.addEventListener('click', function() {
        const value = this.getAttribute('data-value');
        input.value = value;
    });
});