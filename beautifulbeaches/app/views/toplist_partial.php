<!-- app/views/toplist_partial.php -->
<?php foreach ($beaches as $beach): ?>
<div class="l-5-6 m-12 c-12 gallery-item">
    <div class="slider">
        <div class="slideshow-container" id="slideshow<?= $beach['id'] ?>">
            <?php foreach ($beach['images'] as $image): ?>
            <div class="mySlides fade">
                <img src="<?= $image['picture_link'] ?>" style="width:100%">
            </div>
            <?php endforeach; ?>
            <a class="prev" onclick="plusSlides(-1, 'slideshow<?= $beach['id'] ?>')">&#10094;</a>
            <a class="next" onclick="plusSlides(1, 'slideshow<?= $beach['id'] ?>')">&#10095;</a>
        </div>
        <div class="dot-btn" id="dots<?= $beach['id'] ?>">
            <span class="dot" onclick="currentSlide(1, 'slideshow<?= $beach['id'] ?>')"></span>
            <span class="dot" onclick="currentSlide(2, 'slideshow<?= $beach['id'] ?>')"></span>
            <span class="dot" onclick="currentSlide(3, 'slideshow<?= $beach['id'] ?>')"></span>
        </div>
    </div>
    <div class="slider-info">
        <div class="slider-titles">
            <div class="slider-title"><?= $beach['name'] ?></div>
            <div class="slider-text"><?= $beach['country_name'] ?></div>
        </div>
        <a href="/beautifulbeaches/details/index?id=<?= $beach['id'] ?>" class="slider-link">Details</a>
    </div>
</div>
<?php endforeach; ?>
