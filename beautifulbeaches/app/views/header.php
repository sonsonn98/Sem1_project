<!DOCTYPE html>
<html lang="en">
<body>

      <header id="scrollHeader">
        <nav class="header">
          <ul class="menu">
            <li class="menu-item dropdown">
              <a href="" class="menu-link">THE LISTS</a>
              <div class="submenu">
                <a href="#" class="menu-link"></a>
                <ul class="submenu-list">
                  <li><a href="/beautifulbeaches/toplist/index" class="menu-link">WEST</a></li>
                  <li><a href="" class="menu-link">EAST</a></li>
                  <li><a href="" class="menu-link">SOUTH</a></li>
                  <li><a href="" class="menu-link">NORTH</a></li>
                </ul>
              </div>
            </li>
            <li class="menu-item">
              <a href="/beautifulbeaches/toplist/index" class="menu-link">BEST OF THE BEST</a>
            </li>
            <li class="menu-item">
              <a href="" class="menu-link">GALERRY</a>
            </li>
            <li style="display: <?php echo ($_SERVER['REQUEST_URI']=="/beautifulbeaches/home/index") ? "none" : "inline"?>;" 
            class="menu-item logo" >
            <a href="/beautifulbeaches/home/index">
              <img id="logo1" width="100" src="/beautifulbeaches/app/asset/image/transparentlogo.png" alt="" />
              <img id="logo2" width="250" src="/beautifulbeaches/app/asset/image/sublogo.png" alt="" />
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