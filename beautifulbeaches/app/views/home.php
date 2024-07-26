<!DOCTYPE html>
<html lang="en">
  <body>  
  <?php
    $zones = $data['zones'];
?>
  <div class="c-12 home-container-img">
        <img class=" details-big-img" src="/beautifulbeaches/app/asset/image/hero_bg.jpg" alt="">

    </div>
    <main>
    <div class="header-text">
        <p>BEAUTY OF BEACHES</p>
        <img src="/beautifulbeaches/app/asset/image/transparentlogo.png" alt="" />
      </div>

      <section class="section-discover">
        <div class="discover-container">
          <h2>DISCOVER BEST BEACHES ON EARTH</h2>
          <div class="discover row">
            <?php foreach ($zones as $zone): ?>
            <div class="discover-item l-3 m-6 c-12">
              <img src="<?= ($zone['zone_img_link']) ?>" alt="<?= $zone['zone_name']; ?>" class="discover-image" />
              <p class="discover-title">
              <?= $zone['zone_name']; ?>
                <span>2024</span>
              </p>
              <a href="/beautifulbeaches/toplist/index?id=<?= $zone['zone_id']; ?>" class="discover-link">VIEW LIST</a>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
      </section>

      <section class="section-aboutus">
        <div class="aboutus-container">
          <div class="aboutus-title" style="display: none">
            FOR THE LOVE OF BEACHES
          </div>
          <div class="aboutus">
            <img
              width="808"
              class="aboutus-img"
              src="/beautifulbeaches/app/asset/image/aboutus-1.webp"
              alt=""
            />
            <div class="label">MAYA BAY, THAILAND</div>
            <div class="aboutus-item">
              <div class="aboutus-subtitle">FOR THE LOVE OF BEACHES</div>
              <p class="aboutus-text">
                Created by beach lovers, for beach lovers.
              </p>
              <p class="aboutus-text">
                We understand the amazing impact that a truly exceptional beach
                can have on one's mood and sense of well-being. It is our hope
                that through The World's 50 Best Beaches, we can inspire others
                to embark on their own beach adventures, to explore the wonders
                of nature, and to experience the joy that can be found along the
                world's most stunning shorelines.
              </p>
              <a href="/beautifulbeaches/aboutus/index" class="aboutus-link">ABOUT US</a>
            </div>
          </div>
        </div>
      </section>

      <section class="section-advertise">
        <div class="advertise-container">
          <div class="advertise row">
            <div class="l-5 m-5 c-12">
              <div class="ad-title">FEATURED VIDEO</div>
              <div class="ad-media">
                <div class="ad-thumbnail">
                  <iframe src="https://www.youtube.com/embed/BjIcqPRI87A&ab" frameborder="1" width="100%"
                  height="250"></iframe>
                </div>
                <div class="ad-content">
                  <p>Whitehaven Beach - Whitsunday Islands - Australia</p>
                </div>
              </div>
            </div>
            <div class="l-5 m-5 c-12">
              <div class="ad-title">MAYBE YOU ARE INTERESTED</div>
              <div class="ad-media">
                <div class="ad">
                  <i class="fa-solid fa-question ad-icon"></i>
                  <a class="ad-link" href="">10 Practical Beach Safety Tips</a>
                </div>
                <div class="ad">
                  <i class="fa-solid fa-question ad-icon"></i>
                  <a class="ad-link" href="">Booking Airline Ticket</a>
                </div>
                <div class="ad">
                  <i class="fa-solid fa-question ad-icon"></i>
                  <a class="ad-link" href="">Booking Train/Boat Ticket</a>
                </div>
                <div class="ad">
                  <i class="fa-solid fa-question ad-icon"></i>
                  <a class="ad-link" href="">What You Should Know About Surfing And Diving</a>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </section>
    </main>
  </body>
</html>
