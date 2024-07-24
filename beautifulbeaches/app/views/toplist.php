<!DOCTYPE html>
<html lang="en">
  <?php $beaches = $data['beaches']; ?>
  <body>
  <main class="main-content">
  <section class="section-destination">
    <div class="container">
      <h2>THE BEST BEACHES IN THE <?php echo $data['zone']['zone_name']; ?>, 2024</h2>
      <h3>
        Welcome to the 2024 list of The <?php echo $data['zone']['zone_name']; ?>'s 50 Best Beaches. Our 2024 list is a culmination of countless days spent by our judges, Beach Ambassadors and <?php echo $data['zone']['zone_name']; ?>'s 50 Beaches team exploring beaches all over the world. We hope this list provides the inspiration you need to plan your next beach vacation.
      </h3>
      <section class="section-gallery">
        <div class="search-container">
          <input type="text" id="search-input" placeholder="Search...">
          <button id="clear-btn"><i class="fa-solid fa-xmark"></i></button>
          <button id="search-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
        <div class="gallery-container">
          <div class="gallery row">
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
          </div>
        </div>
      </section>
    </div>
  </section>
</main>

    <script src="/beautifulbeaches/app/asset/slide.js"></script>
    <script src="/beautifulbeaches/app/asset/search.js"></script>
  </body>
</html>
