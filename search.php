<?php
    include_once 'path.php';
    include 'app/controllers/posts.php';
    if ($_GET['id_topic']){
        $total_pages = ceil(count_Rows('posts',['id_topic'=>$_GET['id_topic']]) / $limit);
    }else{
        $total_pages = ceil(count_Rows1('posts',$_GET['search-term']) / $limit);
    }

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
        <div class="main_content  col-12">
            <h2>Результаты поиска по тегу: <?= isset($_GET['topic'])?$_GET['topic']:$_POST['search-term'] ?></h2>
            <div class="sort row">
                <p class="col-2.5">Сортировать по:</p>
                <?php if($_SESSION['press']!==1){ ?>
                    <a href="search.php?<?=$_GET['id_topic']?'id_topic='.$_GET['id_topic'].'&topic='.$_GET['topic']:"search-term=" .$_GET['search-term']?>&sort=date_created&param=DESC&press=1" class="col-2">По дате &darr;</a>
                <?php }else{ ?>
                    <a href="search.php?<?=$_GET['id_topic']?'id_topic='.$_GET['id_topic'].'&topic='.$_GET['topic']:"search-term=".$_GET['search-term']?>&no_sort=1&sort=date_created&param=DESC" class="col-2 i">По дате &darr;</a>
                <?php } ?>
                <?php if($_SESSION['press']!==2){ ?>
                    <a href="search.php?<?=$_GET['id_topic']?'id_topic='.$_GET['id_topic'].'&topic='.$_GET['topic']:"search-term=".$_GET['search-term']?>&sort=date_created&param=ASC&press=2" class="col-2">По дате &uarr;</a>
                <?php }else{ ?>
                    <a href="search.php?<?=$_GET['id_topic']?'id_topic='.$_GET['id_topic'].'&topic='.$_GET['topic']:"search-term=".$_GET['search-term']?>&no_sort=1&sort=date_created&param=DESC" class="col-2 i">По дате &uarr;</a>
                <?php } ?>
                <?php if($_SESSION['press']!==3){ ?>
                    <a href="search.php?<?=$_GET['id_topic']?'id_topic='.$_GET['id_topic'].'&topic='.$_GET['topic']:"search-term=".$_GET['search-term']?>&sort=views&param=DESC&press=3" class="col-2.5">По просмотрам &darr;</a>
                <?php }else{ ?>
                    <a href="search.php?<?=$_GET['id_topic']?'id_topic='.$_GET['id_topic'].'&topic='.$_GET['topic']:"search-term=".$_GET['search-term']?>&no_sort=1&sort=date_created&param=DESC" class="col-2.5 i">По просмотрам &darr;</a>
                <?php } ?>
                <?php if($_SESSION['press']!==4){ ?>
                    <a href="search.php?<?=$_GET['id_topic']?'id_topic='.$_GET['id_topic'].'&topic='.$_GET['topic']:"search-term=".$_GET['search-term']?>&sort=views&param=ASC&press=4" class="col-2.5">По просмотрам &uarr;</a>
                <?php }else{ ?>
                    <a href="search.php?<?=$_GET['id_topic']?'id_topic='.$_GET['id_topic'].'&topic='.$_GET['topic']:"search-term=".$_GET['search-term']?>&no_sort=1&sort=date_created&param=DESC" class="col-2.5 i">По просмотрам &uarr;</a>
                <?php } ?>
            </div>
            <?php if(!$search){ ?>
                <h2 class="no_search">Ничего не найдено</h2>
            <?php }?>
            <?php foreach ($search as $key => $value) {?>
                <div class="post row">
                    <div class="post_img col-12 col-md-4">
                        <img src="<?= INDEX_URL .'/'. $value['img']?>" alt="post" class="img-thumbnail">
                    </div>
                    <div class="post_text col-12 col-md-8">
                        <h3>
                            <a href="<?= INDEX_URL.'/single_post.php?id='.$value['id']?>"><?=mb_substr($value['title'], 0,120,'UTF-8') . '...'?></a>
                        </h3>
                        <div class="author_date row">
                            <i class="fa-regular fa-user col-1"></i>
                            <p class="col-2"><?=$value['user_login']?></p>
                            <i class="fa-regular fa-calendar-days col-1"></i>
                            <p class="col-3"><?=$value['date_created']?></p>
                            <i class="fa-regular fa-eye col-1"></i>
                            <p class="col-3"><?=$value['views']?></p>
                        </div>
                        <div class="preview-text">
                            <?= mb_substr($value['content'], 0,200,'UTF-8') . '...'   ?>
                        </div>
                    </div>
                </div>
            <?php }?>
        </div>
    </div>
    <?php include 'app/include/pagination.php'?>
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