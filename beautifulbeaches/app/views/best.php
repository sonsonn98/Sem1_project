<!DOCTYPE html>
<html lang="en">
  <?php $bests = $data['bests'];
        ?>
  <body>
  <main class="main-content">
  <section class="section-destination">
    <div class="container">
      <h2>THE BEST BEACHES IN THE WORLD, 2024</h2>
      <h3>
        Welcome to the 2024 list of The WORLD's 50 Best Beaches. This is the list of all the beaches around the world with highest rating on our website from viewers.
      </h3>
      <section class="section-gallery">
        <div class="search-container">
          <input type="text" id="search-input" placeholder="Search...">
          <button id="clear-btn"><i class="fa-solid fa-xmark"></i></button>
          <button id="search-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
          
        </div>
        <div class="gallery-container">
          <div class="gallery row">
          <?php foreach ($bests as $best): ?>
            <div class="l-5-6 m-12 c-12 gallery-item">
              
              <div class="slider">
                <div class="slideshow-container" id="slideshow<?= $best['id'] ?>">
                  <?php foreach ($best['images'] as $image): ?>
                  <div class="mySlides fade">
                      <img src="<?= $image['picture_link'] ?>" style="width:100%">
                  </div>
                  <?php endforeach; ?>
                  <a class="prev" onclick="plusSlides(-1, 'slideshow<?= $best['id'] ?>')">&#10094;</a>
                  <a class="next" onclick="plusSlides(1, 'slideshow<?= $best['id'] ?>')">&#10095;</a>
                </div>
                <div class="dot-btn" id="dots<?= $best['id'] ?>">
                  <span class="dot" onclick="currentSlide(1, 'slideshow<?= $best['id'] ?>')"></span>
                  <span class="dot" onclick="currentSlide(2, 'slideshow<?= $best['id'] ?>')"></span>
                  <span class="dot" onclick="currentSlide(3, 'slideshow<?= $best['id'] ?>')"></span>
                </div>
              </div>
              <div class="slider-info">
                
                <div class="slider-titles">
                  <div class="slider-title"><?= $best['name'] ?>  <?= number_format($best['average_rating'],1) ?>/5</div>
                  <div class="slider-text"><?= $best['country_name'] ?></div>
                </div>
                <a href="/beautifulbeaches/details/index" class="slider-link">Details</a>
              </div>
            </div>
            <?php endforeach; ?>
            
          </div>
        </div>
      </section>
    </div>
  </section>
</main>

    <script src="/beautifulbeaches/app/asset/slide.js
    "></script>
    <script src="/beautifulbeaches/app/asset/search.js"></script>
  </body>
</html>
