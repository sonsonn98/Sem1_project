<!DOCTYPE html>
<html lang="en">
<body>
<?php
    $zones = $data['zones'];
?>
<header id="scrollHeader">
    <nav class="header">
        <ul class="menu">
            <li class="menu-item dropdown">
                <a href="#" class="menu-link">THE LISTS</a>
                <div class="submenu">
                    <ul class="submenu-list">
                            <?php foreach ($zones as $zone): ?>
                                <li><a href="/beautifulbeaches/toplist/index?id=<?= $zone['zone_id']; ?>" class="menu-link"><?= $zone['zone_name']; ?></a></li>
                            <?php endforeach; ?>
                    </ul>
                </div>
            </li>
            <li class="menu-item">
                <a href="#" class="menu-link">BEST OF THE BEST</a>
            </li>
            <li class="menu-item">
                <a href="#" class="menu-link">GALLERY</a>
            </li>
            <li class="menu-item logo" style="display: <?php echo ($_SERVER['REQUEST_URI'] == "/beautifulbeaches/home/index") ? "none" : "inline"; ?>;">
                <a href="/beautifulbeaches/home/index">
                    <img id="logo1" width="100" src="/beautifulbeaches/app/asset/image/transparentlogo.png" alt="Main Logo" />
                    <img id="logo2" width="250" src="/beautifulbeaches/app/asset/image/sublogo.png" alt="Sub Logo" />
                </a>
            </li>
            <li class="menu-item">
                <a href="/beautifulbeaches/contactus/index" class="menu-link">CONTACT US</a>
            </li>
            <li class="menu-item">
                <a href="/beautifulbeaches/faq/index" class="menu-link">FAQ</a>
            </li>
            <li class="menu-item">
                <a href="/beautifulbeaches/aboutus/index" class="menu-link">ABOUT US</a>
            </li>
        </ul>
    </nav>
</header>
</body>
</html>
