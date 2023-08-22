<?php
include "./connection.php";
session_start();

// cek
if (!isset($_SESSION['logged-in'])) {
  header("Location: ./login.php");
  exit();
}

if (isset($_SESSION['logged-in']) && $_SESSION['logged-in'] == "user") {
  $data = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM tbl_user WHERE uid=".$_SESSION['uid'].""));
} else if (isset($_SESSION['logged-in']) && $_SESSION['logged-in'] == "admin") {
  header("Location: ./admin/");
  exit();
}

if (isset($_POST['send'])) {
  $statusText = $_POST['statusText'];
  $media = $_POST['media'];

  if (!empty($statusText) || !empty($media)) {
    mysqli_query($conn, "INSERT INTO tbl_post (uid,text,media) VALUES (".$_SESSION['uid'].",'$statusText','$media')");
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="icon" href="./favicon.png" type="image/png" sizes="16x16"/>
  <title>Homepage</title>
  <!-- Styles  -->
  <link rel="stylesheet" href="./css/default.css"/>
  <link rel="stylesheet" href="./css/fontawesome.min.css"/>
  <link rel="stylesheet" href="./css/style.css"/>
  <link rel="stylesheet" href="./css/responsive.css"/>
  <!-- Styles End  -->
</head>
<body>

  <?php
  include "./component/top-nav.php";
  include "./component/left-nav.php";
  include "./component/right-nav.php";
  ?>

  <!-- Main Content Section -->
  <section class="main" id="main">

    <div class="container">
      <!-- /.post -->
      <div class="post">
        <form method="post" action="">
          <div class="content">
            <img src="./images/<?php echo $data['profile_picture'] ?>" alt="profile-pic" class="avatar"/>
            <input type="text" class="textBox" placeholder="what's on your mind?" name="statusText" />
            <button type="submit" class="btnSend" name="send">send</button>
          </div>

          <!-- /.content  -->
          <div class="features">
            <div class="feature">
              <i class="fas fa-photo-video icon" title="Photo/Video"></i>
              <!-- <span class="name hidden">photo/ video</span> -->
              <input class="" type="file" name="media">
            </div>
            <div class="feature">
              <span class="name hidden">feeling/activity</span>
              <i class="fas fa-grin icon" title="Feeling/Activity"></i>
            </div>
          </form>
        </div>
      </div>
      <!-- /.post -->

      <?php
      $query = mysqli_query($conn, "SELECT * FROM tbl_post AS p INNER JOIN tbl_user AS u ON p.uid = u.uid WHERE u.uid = ".$_SESSION['uid']." ORDER BY p.id DESC LIMIT 10");
      while ($dataLoop = mysqli_fetch_array($query)) {

        ?>
        <!-- /.postPublished -->
        <div class="postPublished">
          <header class="top">
            <div class="user">
              <img
              src="./images/<?php echo $dataLoop['profile_picture'] ?>"
              alt="profile-pic"
              class="avatar"
              />
              <div class="info">
                <a href="./profile.php" class="name"><?php echo $dataLoop['name'] ?></a>
                <p class="time">05 july 2021, 08:30PM</p>
              </div>
            </div>
            <!-- /.user -->
            <div class="actions">
              <i class="fas fa-ellipsis-v icon"></i>
            </div>
          </header>
          <!-- /.header -->
          <div class="content">
            <p class="text"><?php echo $dataLoop['text'] ?></p>
            <img src="./data/user/<?php $_SESSION['uid'] ?>/img/<?php $dataLoop['media'] ?>" alt="news" class="img"/>
          </div>
          <!-- /.content -->
          <div class="bottom">
            <div class="after">
              <article class="likes">
                <i class="fas fa-thumbs-up icon"></i>
                <i class="fas fa-angry icon"></i>
                <i class="fas fa-sad-cry icon"></i>
                rubel & 2K others
              </article>

              <div class="others">
                <article class="box">10 comments</article>
                <article class="box">5 share</article>
              </div>
            </div>
            <!-- /.after -->
            <div class="before">
              <div class="box">
                <i class="fas fa-thumbs-up icon"></i>
                like
              </div>
              <!-- /.box -->
              <div class="box">
                <i class="fas fa-comment-alt icon"></i>
                comment
              </div>
              <!-- /.box -->
              <div class="box">
                <i class="fas fa-share-square icon"></i>
                share
              </div>
              <!-- /.box -->
              <div class="box">
                <img
                src="./images/profile-pic.png"
                alt="profile-pic"
                class="avatar"
                />
                <i class="fas fa-caret-down icon"></i>
              </div>
              <!-- /.box -->
            </div>
            <!-- /.after  -->
          </div>
          <!-- /.bottom -->
        </div>
        <!-- /.postPublished -->
      <?php } ?>

      <div class="loadMore">
        <i class="fas fa-spinner icon" title="Loading More..."></i>
      </div>
    </div>
    <!-- /.container -->
  </section>
  <!-- Main Content Section End -->

  <!-- Scripts -->
  <script src="./js/main.js"></script>
  <!-- Scripts End -->
</body>
</html>
