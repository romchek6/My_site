<?php
    include_once 'path.php';
    $limit = 5;
    include 'app/controllers/posts.php';
    $total_pages = ceil(count_Rows('posts',null) / $limit);

    if($_SESSION['press']==='1'||$_SESSION['press']===1){
        $sort1 = ' дате &darr;';
    }
    if($_SESSION['press']==='2'||$_SESSION['press']===2){
        $sort1 = ' дате &uarr;';
    }
    if($_SESSION['press']==='3'||$_SESSION['press']===3){
        $sort1 = ' количеству просмотров &darr;';
    }
    if($_SESSION['press']==='4'||$_SESSION['press']===4){
        $sort1 = ' количеству просмотров &uarr;';
    }
    if($_SESSION['press']==='5'||$_SESSION['press']===5){
        $sort1 = ' количеству лайков &darr;';
    }
    if($_SESSION['press']==='6'||$_SESSION['press']===6){
        $sort1 = ' количеству лайков &uarr;';
    }

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My blog</title>
    <script
            src="https://code.jquery.com/jquery-3.6.1.min.js"
            integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
            crossorigin="anonymous"></script>
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
<?php ?>
<!-- carousel -->
<div class="container">
    <div class="row">
        <h2 class="carousel_title">Лучшие статьи</h2>
    </div>
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="<?= INDEX_URL .'/' .$top_posts[0]['img'] ?>" class="d-block w-100" height="400" alt="...">
                <div class="carousel-caption-hack carousel-caption d-none d-md-block">
                    <h5><a href="single_post.php?id=<?= $top_posts[0]['id'] ?>"><?= $top_posts[0]['title'] ?></a></h5>
                </div>
            </div>
            <div class="carousel-item">
                <img src="<?= INDEX_URL .'/'. $top_posts[1]['img'] ?>" class="d-block w-100" height="400" alt="...">
                <div class="carousel-caption-hack  carousel-caption d-none d-md-block">
                    <h5><a href="single_post.php?id=<?= $top_posts[1]['id'] ?>"><?= $top_posts[1]['title'] ?></a></h5>
                </div>
            </div>
            <div class="carousel-item">
                <img src="<?= INDEX_URL .'/'. $top_posts[2]['img'] ?>" class="d-block w-100" height="400" alt="...">
                <div class="carousel-caption-hack  carousel-caption d-none d-md-block">
                    <h5><a href="single_post.php?id=<?= $top_posts[2]['id'] ?>"><?= $top_posts[2]['title'] ?></a></h5>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"  data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" id="baton" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </button>
    </div>
</div>
<!-- carousel end -->

<!-- main -->
<div class="container">
    <div class="content row">
        <h2 class="">Последние публикации</h2>
        <!-- main  -->
        <div class="main_content col-md-9 col-12">
<!--   сортировка по дате,количеству просмотров,количеству лайков,(дате последнего комментария?)         -->
                <div class="sort row">
                <ul class="nav nav-tabs col-3">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Сортировать по: <?= $sort1 ?></a>
                        <ul class="dropdown-menu">
                            <li>
                                <?php if($_SESSION['press']!=='1'){?>
                                    <a class="dropdown-item" id="a1" href="index.php?sort=date_created&param=DESC&press=1"> дате</a>
                                <?php }else{ ?>
                                    <a class="dropdown-item i" id="a1" href="index.php?press=1&sort=date_created&param=DESC"> дате</a>
                                <?php } ?>
                            </li>
                            <li>
                                <?php if($_SESSION['press']!=='3'){ ?>
                                    <a class="dropdown-item" id="a2" href="index.php?sort=views&param=DESC&press=3"> количеству просмотров</a>
                                <?php }else{ ?>
                                    <a class="dropdown-item i" id="a2" href="index.php?press=1&sort=date_created&param=DESC"> количеству просмотров</a>
                                <?php } ?>
                            </li>
                            <li>
                                <?php if($_SESSION['press']!=='5'){ ?>
                                    <a class="dropdown-item" id="a3" href="index.php?sort=score&param=DESC&press=5"> количеству лайков</a>
                                <?php }else{ ?>
                                    <a class="dropdown-item i" id="a3" href="index.php?press=1&sort=date_created&param=DESC"> количеству лайков</a>
                                <?php } ?>
                            </li>

                            <li>
                                <div class="radio">
                                    <input name="r1" type="radio" id="r1" onclick="sort(this,a1,a2,a3)" value="DESC" <?php if ($_SESSION['param']==='DESC') { ?>checked<?php } ?>> По убыванию
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input name="r1" type="radio" id="r2" onclick="sort(this,a1,a2,a3)" value="ASC" <?php if ($_SESSION['param']==='ASC') { ?>checked<?php } ?>> По возрастанию
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
<!--     Статьи       -->
            <?php foreach ($posts as $key => $value) {?>
                <div class="post row">
                    <div class="post_img col-12 col-md-4">
                        <a href="<?= INDEX_URL.'/single_post.php?id='.$value['id']?>"><img src="<?= INDEX_URL .'/'. $value['img']?>" alt="post" class="img-thumbnail"></a>
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
                            <p class="col-1"><?=$value['views']?></p>
                            <?php
                                $param=[
                                    'id_user'=>$_SESSION['id'],
                                    'id_post'=>$value['id']
                                ];
                                $rows = count_Rows_likes('post_likes',$param);
                                $likes = count_Rows_likes('post_likes',['id_post'=>$value['id']]);
                            if($rows>0){?>
                                <i class="fa-solid fa-heart col-1 like"></i>
                            <?php }else { ?>
                                <i class="fa-regular fa-heart col-1 like"></i>
                            <?php } ?>
                            <div class="col-1"><p id="result"><?= $likes ?></p></div>
                        </div>
                        <div class="preview-text">
                            <?= mb_substr($value['content'], 0,200,'UTF-8') . '...'   ?>
                        </div>
                    </div>
                </div>
            <?php }?>
            <?php include 'app/include/pagination.php'?>
        </div>
        <!-- sidebar -->
        <div class="sidebar col-md-3 col-12">
            <div class="section search">
                <h3>Поиск</h3>
                <form action="search.php" method="get">
                    <input type="hidden" name="sort" value="date_created">
                    <input type="hidden" name="param" value="DESC">
                    <input type="hidden" name="press" value="1">
                    <input type="text" name="search-term" class="text-input" placeholder="                     Поиск...">
                </form>
            </div>

            <div class="section topics">
                <h3>Категории</h3>
                <ul>
                    <?php foreach ($topics as $key => $value){ ?>
                        <li><a href="search.php?id_topic=<?= $value['id'] ?>&topic=<?= $value['topic_name']?>"><?= $value['topic_name']?></a></li>
                    <?php }?>
                </ul>
            </div>
        </div>
        <!-- sidebar end -->
    </div>
</div>
<!-- main end -->

<!-- footer -->
<?php include_once 'app/include/footer.php' ?>
<!-- footer end -->
<script src="assets/js/sort.js"></script>
<script src="assets/js/carousel.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<!--    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>-->
<!--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>-->
</body>
</html>