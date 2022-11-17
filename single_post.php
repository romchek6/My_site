<?php
    include_once 'path.php';
    $limit = 10;
    include 'app/controllers/posts.php';
    $total_pages = ceil(count_Rows('comments',['id_post'=>$_GET['id']]) / $limit);
//    Лайки поста
    $param=[
        'id_user'=>$_SESSION['id'],
        'id_post'=>$_GET['id']
    ];
    $rows = count_Rows_likes('post_likes',$param);
    $likes = count_Rows_likes('post_likes',['id_post'=>$_GET['id']]);
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.min.css">
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
                  <p class="col-1"><?=$value['views']?></p>
                  <?php if($_SESSION['id']) {?>
                  <input type="hidden" id="nums"  value="<?= $_SESSION['id'] ?>">
                  <input type="hidden" id="nums1"  value="<?= $_GET['id'] ?>">
                  <?php if($rows>0){?>
                      <i class="fa-solid fa-heart col-1 like" onclick="getData(this,result)" id="get"></i>
                  <?php }else { ?>
                      <i class="fa-regular fa-heart col-1 like" onclick="getData(this,result)" id="get"></i>
                  <?php } ?>
                  <div class="col-1"><p id="result"><?= $likes ?></p></div>
                  <?php }else{?>
                      <i class="fa-regular fa-heart col-1 "></i>
                      <div class="col-1"><p><?= $likes ?></p></div>
                  <?php }?>
              </div>
            <div class="single_post_text col-12 ">
                <?=$value['content']?>
            </div>
          </div>
            <div class="col-md-12 col-12 mb-3 comments">
                <h3>Оставить комментарий</h3>
                <form action="single_post.php" method="post" class="row">
                    <input type="hidden" value="<?=$_GET['id']?>" name="id">
                    <textarea name="text" id="description" placeholder="Комментарий..."></textarea>
                    <span></span>
                    <button type="submit" name="comment">Оставить комментарий</button>
                </form>
                <h3>Комментарии</h3>
                <div class="sort row">
                    <p class="col-2.5">Сортировать по:</p>
                    <?php if($_SESSION['press']!==1){ ?>
                        <a href="single_post.php?id=<?= $_GET['id'] ?>&sort=date_created&param=DESC&press=1" class="col-2">Дате &darr;</a>
                    <?php }else{ ?>
                        <a href="single_post.php?id=<?= $_GET['id'] ?>&no_sort=1&sort=date_created&param=DESC" class="col-2 i">Дате &darr;</a>
                    <?php } ?>
                    <?php if($_SESSION['press']!==2){ ?>
                        <a href="single_post.php?id=<?= $_GET['id'] ?>&sort=date_created&param=ASC&press=2" class="col-2">Дате &uarr;</a>
                    <?php }else{ ?>
                        <a href="single_post.php?id=<?= $_GET['id'] ?>&no_sort=1&sort=date_created&param=DESC" class="col-2 i">Дате &uarr;</a>
                    <?php } ?>
                    <?php if($_SESSION['press']!==3){ ?>
                        <a href="single_post.php?id=<?= $_GET['id'] ?>&sort=score&param=DESC&press=3" class="col-2.5">Количеству лайков &darr;</a>
                    <?php }else{ ?>
                        <a href="single_post.php?id=<?= $_GET['id'] ?>&no_sort=1&sort=date_created&param=DESC" class="col-2.5 i">Количеству лайков &darr;</a>
                    <?php } ?>
                    <?php if($_SESSION['press']!==4){ ?>
                        <a href="single_post.php?id=<?= $_GET['id'] ?>&sort=score&param=ASC&press=4" class="col-2.5">Количеству лайков &uarr;</a>
                    <?php }else{ ?>
                        <a href="single_post.php?id=<?= $_GET['id'] ?>&no_sort=1&sort=date_created&param=DESC" class="col-2.5 i">Количеству лайков &uarr;</a>
                    <?php } ?>
                </div>
                <?php foreach ($comments as $key=>$value1) {
                    $param1 = [
                        'id_comment' => $value1['id'],
                        'id_user' => $_SESSION['id'],
                        'id_post' => $_GET['id']
                    ];
                    $rows1 = count_Rows_likes('comments_likes', $param1);
                    $likes1 = count_Rows_likes('comments_likes', ['id_comment'=>$value1['id']]);
                    ?>
                    <div class="row comment">
                        <div class="author col-2">
                            <p><?=$value1['user_login']==='User'?$value1['user_name']:$value1['user_login'] ?></p>
                            <p><?=$value1['date_created']?></p>
                        </div>
                        <div class="col-10 text_comment row">
                            <p class="col-11"><?=$value1['comment']?></p>
                            <?php if($_SESSION['id']) {?>
                            <div class="like col-1">
                                <?php if($rows1>0){?>
                                    <i class="fa-solid fa-heart lik" onclick="getData2(this,<?= 'result'.$value1['id'] ?>,<?= $value1['id'] ?>)" id="<?= 'get'.$value1['id'] ?>"></i>
                                <?php }else { ?>
                                    <i class="fa-regular fa-heart lik" onclick="getData2(this,<?= 'result'.$value1['id'] ?>,<?= $value1['id'] ?>)" id="<?= 'get'.$value1['id'] ?>"></i>
                                <?php } ?>
                                <div><p id="<?= 'result'.$value1['id'] ?>"><?= $likes1 ?></p></div>
                            </div>
                            <?php } else{ ?>
                                <div class="like col-1">
                                    <i class="fa-regular fa-heart"></i>
                                    <div><p><?= $likes1 ?></p></div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
                <?php include 'app/include/pagination.php'?>
            </div>
        <?php } ?>
    </div>
  </div>
</div>
<!-- main end -->
<!-- footer -->
<?php include_once 'app/include/footer.php' ?>
<!-- footer end -->

<script src="assets/js/likes_on_comment.js" ></script>
<script src="assets/js/likes_on_post.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<!--    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>-->
<!--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>-->
</body>
</html>