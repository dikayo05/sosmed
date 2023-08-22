<!-- Header Section -->

<header class="header" id="header">
  <div class="row">
    <aside class="col left">
      <a href="./" class="logo">
        <img src="./favicon.png" alt="Logo" class="img"/>
        Pesbuk
    </a>
</aside>
<aside class="col center">
  <nav class="nav">
    <a href="./" class="link">
      <i class="icon fas fa-home"></i>
  </a>
  <a href="./#" class="link">
      <i class="icon fas fa-user-friends"></i>
      <span class="counter">5</span>
  </a>
  <a href="./#" class="link">
      <i class="icon fas fa-envelope"></i>
      <span class="counter">8</span>
  </a>
  <a href="./#" class="link">
      <i class="icon fas fa-bell"></i>
      <span class="counter">10</span>
  </a>
</nav>
</aside>
<aside class="col right">
  <form class="searchForm">
    <label for="searchBox">
      <i class="fas fa-search"></i>
  </label>
  <input type="search" placeholder="Search here..." id="searchBox" />
</form>
<div class="profile">
    <img src="./images/profile-pic.png" alt="profile-pic" class="img" />
    <i class="fas fa-ellipsis-h icon" title="Profile Settings" id="settingsMenuIcon"></i>
</div>
</aside>
<!-- /.col.right -->

<nav class="navSetting">
  <a href="./profile.php" class="block">
    <img src="./images/profile-pic.png" alt="profile-pic" class="icon"/>
    <div class="right">
      <aside>
        <h4 class="title"><?php echo $data['name'] ?></h4>
        <span class="help">see your profile</span>
    </aside>
</div>
</a>

<!-- /.block  user -->

<a href="./#" class="block">
    <i class="fas fa-star icon"></i>
    <div class="right">
      <aside>
        <h4 class="title">kritik & saran</h4>
        <span class="help">ada bug? atau saran? silahkan laporkan</span>
    </aside>
</div>
</a>
<!-- /.block  feedback-->

<div class="options">
    <a href="./#" class="option">
      <div class="left">
        <i class="fas fa-cog icon"></i>
        <h4 class="title">settings & privacy</h4>
    </div>
    <div class="right">
        <i class="fas fa-chevron-right icon"></i>
    </div>
</a>
<!-- /.option  -->
<a href="./#" class="option">
  <div class="left">
    <i class="fas fa-question icon"></i>
    <h4 class="title">help & support</h4>
</div>
<div class="right">
    <i class="fas fa-chevron-right icon"></i>
</div>
</a>
<!-- /.option  -->

<a href="./#" class="option">
  <div class="left">
    <i class="fas fa-tv icon"></i>
    <h4 class="title">display & accessibility</h4>
</div>
<div class="right">
    <i class="fas fa-chevron-right icon"></i>
</div>
</a>
<!-- /.option  -->

<a href="./#" class="option">
  <div class="left">
    <i class="fas fa-moon icon"></i>
    <h4 class="title">dark mode</h4>
</div>
<div class="right">
    <aside class="themeBtn">
      <span class="circle dark"></span>
  </aside>
</div>
</a>
<!-- /.option  -->

<a href="./php/logout.php" class="option">
  <div class="left">
    <i class="fas fa-sign-out-alt icon"></i>
    <h4 class="title">logout</h4>
</div>
</a>
<!-- /.option  -->
</div>
<!-- /.options -->
<nav class="footerLinks">
    <a href="./#" class="link">about</a>
    <a href="./#" class="link">privacy</a>
    <a href="./#" class="link">terms</a>
    <a href="./#" class="link">cookies</a>
    <a href="./#" class="link">advertisement</a>
    <a href="./#" class="link">more</a>
    <span>copyright &copy; 2023. dikayo</span>
</nav>
</nav>
<!-- /.navSetting -->
</div>
</header>
<!-- Header Section End -->
<!-- IconNav Section -->
<section class="iconNav" id="iconNav">
  <nav class="navContainer left">
    <a href="./" class="link"><i class="icon fas fa-home"></i></a>
    <a href="./#" class="link"><i class="icon fas fa-user-friends"></i></a>
    <a href="./#" class="link"><i class="icon fab fa-facebook-messenger"></i></a>
    <a href="./#" class="link"><i class="icon fas fa-bell"></i></a>
</nav>
</section>
    <!-- IconNav Section End -->