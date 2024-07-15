<!DOCTYPE html>
<html lang="en">
<script>
        document.addEventListener("DOMContentLoaded", function () {
            var questions = document.querySelectorAll('.question');

            questions.forEach(function (question) {
                question.addEventListener('click', function () {
                    var answer = this.nextElementSibling;
                    if (answer.classList.contains('show')) {
                        answer.classList.remove('show');
                        setTimeout(function () {
                            answer.style.display = 'none';
                        }, 300); // Match this duration with CSS transition time
                        this.classList.remove('active');
                    } else {
                        answer.style.display = 'block';
                        setTimeout(function () {
                            answer.classList.add('show');
                        }, 10); // Add a slight delay to trigger the transition
                        this.classList.add('active');
                    }
                });
            });
        });
    </script>
    <body>

<div class="faq-header">
    <div class="title">FAQ</div>
    <div class="breadcrumbs">
        Home / FAQ
    </div>
</div>

<div class="container">
    <div class="categories">
        <h2>All Categories</h2>
        <ul>
            <li>All</li>
            <li>Featured</li>
            <li>Sliders</li>
            <li>Manage Listings</li>
            <li>Address and Map</li>
            <li>Reservation Requests</li>
            <li>Your Reservation</li>
            <li>Search Results</li>
        </ul>
    </div>
    <div class="faq">
        <h2>Visit and explore the beaches of the world</h2>
        <div class="question">
            <h3>The most famous beautiful beaches in the world?</h3>
        </div>
        <div class="answer">
            <p>Some of the most famous beautiful beaches include Maldives, Bora Bora, Seychelles, and Bali.
            </p>
        </div>
        <div class="question">
            <h3>The beaches have reasonable travel prices?</h3>
        </div>
        <div class="answer">
            <p>Beaches with reasonable travel prices often include destinations in Southeast Asia and Central
                America.
            </p>
        </div>
        <div class="question">
            <h3>Luxurious and expensive beaches?</h3>
        </div>
        <div class="answer">
            <p>Luxurious and expensive beaches can be found in places like the French Riviera, the Hamptons, and
                Hawaii's private resorts.</p>
        </div>
        <div class="question">
            <h3>How to learn about the beach you're about to travel to?</h3>
        </div>
        <div class="answer">
            <p>You can learn about a beach through travel guides, online reviews, local tourism websites, and social
                media.</p>
        </div>
        <div class="question">
            <h3>Beaches to avoid?</h3>
        </div>
        <div class="answer">
            <p>Beaches to avoid often have unsafe conditions, pollution issues, or high crime rates in the
                surrounding areas.</p>
        </div>
        <div class="question">
            <h3>Things to prepare when going to the beach?</h3>
        </div>
        <div class="answer">
            <p>Things to prepare include sunscreen, beachwear, towels, sunglasses, and beach toys if traveling with
                children.</p>
        </div>
    </div>
</div>

</body>





</html>