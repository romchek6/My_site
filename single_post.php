<?php
    include_once 'path.php';
    include 'app/controllers/posts.php';
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>My blog</title>
  <!--    icons-->
  <script src="https://kit.fontawesome.com/1fe27e3f18.js" crossorigin="anonymous"></script>
  <!--    Bootstrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <!--    fonts-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&family=Kaushan+Script&family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
  <!--    css-->
  <link rel="stylesheet" href="assets/css/css.css">
</head>
<body>
<!-- header -->
<?php include_once 'app/include/header.php' ?>
<!-- header end -->
<!-- main -->
<div class="container">
  <div class="content row">
    <!-- main  -->
    <div class="main_content col-12">
        <?php foreach ($posts1 as $value) { ?>
          <h2><?=$value['title'] ?></h2>
          <div class="single_post row">
            <div class="post_img col-12 ">
              <img src="<?= INDEX_URL .'/'.$value['img']?>" alt="post" class="img-thumbnail">
            </div>
              <div class="author_date row">
                  <i class="far fa-user col-1"></i>
                  <p class="col-2"><?=$value['user_login']?></p>
                  <i class="fa-regular fa-calendar-days col-1"></i>
                  <p class="col-3"><?=$value['date_created']?></p>
                  <i class="fa-regular fa-eye col-1"></i>
                  <p class="col-3"><?=$value['views']?></p>
              </div>
            <div class="single_post_text col-12 ">
                <?=$value['content']?>
            </div>
          </div>
            <?php include 'app/include/comments.php'?>
        <?php } ?>
    </div>
  </div>
</div>
<!-- main end -->
<!-- footer -->
<?php include_once 'app/include/footer.php' ?>
<!-- footer end -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<!--    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>-->
<!--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>-->
</body>
</html>