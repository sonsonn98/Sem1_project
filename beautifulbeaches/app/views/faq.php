<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ</title>
    <link rel="stylesheet" href="faq.css">
</head>

<body>
    <div class="faq">
        <h2>Visit and explore the beaches of the world</h2>
        <?php
        $faqs = [
            ["question" => "The most famous beautiful beaches in the world?", "answer" => "Some of the most famous beautiful beaches include Maldives, Bora Bora, Seychelles, and Bali."],
            ["question" => "The beaches have reasonable travel prices?", "answer" => "Beaches with reasonable travel prices often include destinations in Southeast Asia and Central America."],
            ["question" => "Luxurious and expensive beaches?", "answer" => "Luxurious and expensive beaches can be found in places like the French Riviera, the Hamptons, and Hawaii's private resorts."],
            ["question" => "How to learn about the beach you're about to travel to?", "answer" => "You can learn about a beach through travel guides, online reviews, local tourism websites, and social media."],
            ["question" => "Beaches to avoid?", "answer" => "Beaches to avoid often have unsafe conditions, pollution issues, or high crime rates in the surrounding areas."],
            ["question" => "Things to prepare when going to the beach?", "answer" => "Things to prepare include sunscreen, beachwear, towels, sunglasses, and beach toys if traveling with children."]
        ];

        foreach ($faqs as $faq) {
            echo '<div class="question"><h3>' . $faq["question"] . '</h3></div>';
            echo '<div class="answer"><p>' . $faq["answer"] . '</p></div>';
        }
        ?>
    </div>

    <script>
        document.querySelectorAll('.question').forEach((question) => {
            question.addEventListener('click', () => {
                question.classList.toggle('active');
                const answer = question.nextElementSibling;
                if (question.classList.contains('active')) {
                    answer.classList.add('show');
                } else {
                    answer.classList.remove('show');
                }
            });
        });
    </script>

</body>

</html>
