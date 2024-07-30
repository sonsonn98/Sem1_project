<!DOCTYPE html>
<html lang="en">
    <?php $imgs = $data['imgs']; ?>
<body>
    <div class="gallery-1">
        <p>GALLERY</p>
    <div class="image-grid">
        <?php foreach($imgs as $img): ?>
        <div class="image-container">
            <figure class="image-figure"> 
                    <img src="<?= $img['picture_link'] ?>" class="image" alt="Image 1">
            </figure>
        </div>
        <?php endforeach; ?>
    </div>

    <div class="pagination">
        <?php foreach ($data['pagination'] as $page): ?>
            <?php if ($page === '...'): ?>
                <span class="dots">...</span>
            <?php else: ?>
                <a href="/beautifulbeaches/gallery/index?page=<?= $page ?>" class="<?= $page == $data['currentPage'] ? 'active' : '' ?>"><?= $page ?></a>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>

    <script>
        window.addEventListener('load', function() {
            var images = document.querySelectorAll('.image');
            images.forEach(function(img) {
                img.setAttribute('data-width', img.clientWidth);
                img.setAttribute('data-height', img.clientHeight);
            });
        });

        window.addEventListener('pageshow', function(event) {
            if (event.persisted) {
                var images = document.querySelectorAll('.image');
                images.forEach(function(img) {
                    var width = img.getAttribute('data-width');
                    var height = img.getAttribute('data-height');
                    img.style.width = width + 'px';
                    img.style.height = height + 'px';
                });
            }
        });
    </script>

    <script>
        window.onload = function() {
            var images = document.querySelectorAll('.image');
            images.forEach(function(img) {
                img.style.transform = 'scale(1)'; 
                img.offsetHeight; 
                img.style.transform = ''; 
            });
        };
    </script>
</body>
</html>
