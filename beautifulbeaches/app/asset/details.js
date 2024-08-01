
const stars = document.getElementsByClassName("star");
const reviewForm = document.getElementById("reviewForm");


function updateRating(n) {
    for (let i = 0; i < stars.length; i++) {
        stars[i].classList.toggle("filled", i < n);
    }
}


for (let star of stars) {
    star.addEventListener("click", function () {
        const value = parseInt(this.getAttribute("data-value"));
        updateRating(value);
    });
}


function openReviewComment() {
    openreviewcomment.style.display = "block";
}
function closeReviewComment() {
    openreviewcomment.style.display = "none";
}


function openReviewForm() {
    reviewForm.style.display = "block";
}
function closeReviewForm() {
    reviewForm.style.display = "none";
}



function on() {
    document.getElementById("details-overlay").style.display = "block";
}
function off() {
    document.getElementById("details-overlay").style.display = "none";
}


const starsPick = document.querySelectorAll('.star');
const input = document.getElementById('starValue');
starsPick.forEach(starsPick => {
    starsPick.addEventListener('click', function () {
        const value = this.getAttribute('data-value');
        input.value = value;
    });
});
