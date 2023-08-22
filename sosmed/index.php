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

?>


<!-- <?php
//post status
if (isset($_POST['send'])) {
  $statusText = $_POST['statusText'];
  $media = $_POST['media'];
  
  if (!empty($statusText) || !empty($media)) {
    mysqli_query($conn, "INSERT INTO tbl_post (uid,text,media) VALUES (".$_SESSION['uid'].",'$statusText','$media')");
  }
}

//upload file
$target_dir = "./data/user/".$_SESSION['uid']."/img";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 50000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
$uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
?> -->

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
      <div class="stories">
        <article class="story">
          <a href="./#stories" class="linkStory">
            <img src="./images/status-1.png" alt="status-1" class="img"/>
          </a>
          <a href="./#create-story" class="createStoryBtn">
            <i class="fas fa-plus"></i>
          </a>
          <a class="name">create story</a>
        </article>
        
        <article class="story">
          <img src="./images/status-2.png" alt="status-2" class="avatar" />
          <a href="./#stories" class="linkStory">
            <img src="./images/status-2.png" alt="status-1" class="img"/>
          </a>
          <a href="./#profile" class="name">kiron</a>
        </article>
        
        <article class="story">
          <img src="./images/status-3.png" alt="status-3" class="avatar"/>
          <a href="./#stories" class="linkStory">
            <img src="./images/status-3.png" alt="status-1" class="img"/>
          </a>
          <a href="./#profile" class="name">rubel</a>
        </article>
        
        <article class="story">
          <img src="./images/status-4.png" alt="status-4" class="avatar"/>
          <a href="./#stories" class="linkStory">
            <img src="./images/status-4.png" alt="status-1" class="img"/>
          </a>
          <a href="./#profile" class="name">hasan</a>
        </article>
      </div>
      <!-- /.stories -->
      
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
              <input type="file" name="media">
            </div>
            <div class="feature">
              <i class="fas fa-grin icon" title="Feeling/Activity"></i>
              <span class="name hidden">feeling/activity</span>
            </div>
          </form>
        </div>
      </div>
      <!-- /.post -->
      
      <?php
      $query = mysqli_query($conn, "SELECT * FROM tbl_post AS p INNER JOIN tbl_user AS u ON p.uid = u.uid ORDER BY p.id DESC LIMIT 10");
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
