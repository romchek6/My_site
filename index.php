<?php
    include_once 'path.php';
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

<!-- carousel -->
<div class="container">
    <div class="row">
        <h2 class="carousel_title">Карусель</h2>
    </div>
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
        <!--        <div class="carousel-indicators">-->
        <!--            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>-->
        <!--            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>-->
        <!--            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>-->
        <!--        </div>-->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="assets/images/image1carousel.jpg" class="d-block w-100" height="400" alt="...">
                <div class="carousel-caption-hack carousel-caption d-none d-md-block">
                    <h5><a href="#">111</a></h5>
                </div>
            </div>
            <div class="carousel-item">
                <img src="assets/images/image2carousel.jpg" class="d-block w-100" height="400" alt="...">
                <div class="carousel-caption-hack  carousel-caption d-none d-md-block">
                    <h5><a href="#">111</a></h5>
                </div>
            </div>
            <div class="carousel-item">
                <img src="assets/images/image3carousel.jpeg" class="d-block w-100" height="400" alt="...">
                <div class="carousel-caption-hack  carousel-caption d-none d-md-block">
                    <h5><a href="#">111</a></h5>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<!-- carousel end -->

<!-- main -->
<div class="container">
    <div class="content row">
        <!-- main  -->
        <div class="main_content col-md-9 col-12">
            <h2>Последние публикации</h2>

            <div class="post row">
                <div class="post_img col-12 col-md-4">
                    <img src="assets/images/Screenshot_1.png" alt="post" class="img-thumbnail">
                </div>
                <div class="post_text col-12 col-md-8">
                    <h3>
                        <a href="#">Статья по эйфилеву башню</a>
                    </h3>
                    <i class="far fa-user"> Автор</i>
                    <i class="fa-regular fa-calendar-days"> Дата</i>
                    <p class="preview-text">
                        струна, приют, принц, аккомпанемент, ртуть,
                        лицо, строгий, образование, отступать, японец
                        ложить, колун, гнев, высочество, исправлять
                        компетентный, негатив, престол, изменять, консилиум
                    </p>
                </div>
            </div>

            <div class="post row">
                <div class="post_img col-12 col-md-4">
                    <img src="assets/images/image2carousel.jpg" alt="post" class="img-thumbnail">
                </div>
                <div class="post_text col-12 col-md-8">
                    <h3>
                        <a href="#">Статья по эйфилеву башню</a>
                    </h3>
                    <i class="far fa-user"> Автор</i>
                    <i class="fa-regular fa-calendar-days"> Дата</i>
                    <p class="preview-text">
                        струна, приют, принц, аккомпанемент, ртуть,
                        лицо, строгий, образование, отступать, японец
                        ложить, колун, гнев, высочество, исправлять
                        компетентный, негатив, престол, изменять, консилиум
                    </p>
                </div>
            </div>

            <div class="post row">
                <div class="post_img col-12 col-md-4">
                    <img src="assets/images/image2carousel.jpg" alt="post" class="img-thumbnail">
                </div>
                <div class="post_text col-12 col-md-8">
                    <h3>
                        <a href="#">Статья по эйфилеву башню</a>
                    </h3>
                    <i class="far fa-user"> Автор</i>
                    <i class="fa-regular fa-calendar-days"> Дата</i>
                    <p class="preview-text">
                        струна, приют, принц, аккомпанемент, ртуть,
                        лицо, строгий, образование, отступать, японец
                        ложить, колун, гнев, высочество, исправлять
                        компетентный, негатив, престол, изменять, консилиум
                    </p>
                </div>
            </div>

            <div class="post row">
                <div class="post_img col-12 col-md-4">
                    <img src="assets/images/image2carousel.jpg" alt="post" class="img-thumbnail">
                </div>
                <div class="post_text col-12 col-md-8">
                    <h3>
                        <a href="#">Статья по эйфилеву башню</a>
                    </h3>
                    <i class="far fa-user"> Автор</i>
                    <i class="fa-regular fa-calendar-days"> Дата</i>
                    <p class="preview-text">
                        струна, приют, принц, аккомпанемент, ртуть,
                        лицо, строгий, образование, отступать, японец
                        ложить, колун, гнев, высочество, исправлять
                        компетентный, негатив, престол, изменять, консилиум
                    </p>
                </div>
            </div>

            <div class="post row">
                <div class="post_img col-12 col-md-4">
                    <img src="assets/images/image2carousel.jpg" alt="post" class="img-thumbnail">
                </div>
                <div class="post_text col-12 col-md-8">
                    <h3>
                        <a href="#">Статья по эйфилеву башню</a>
                    </h3>
                    <i class="far fa-user"> Автор</i>
                    <i class="fa-regular fa-calendar-days"> Дата</i>
                    <p class="preview-text">
                        струна, приют, принц, аккомпанемент, ртуть,
                        лицо, строгий, образование, отступать, японец
                        ложить, колун, гнев, высочество, исправлять
                        компетентный, негатив, престол, изменять, консилиум
                    </p>
                </div>
            </div>

        </div>
        <!-- sidebar -->
        <div class="sidebar col-md-3 col-12">
            <div class="section search">
                <h3>Поиск</h3>
                <form action="index.html" method="post">
                    <input type="text" name="search-term" class="text-input" placeholder="поиск...">
                </form>
            </div>

            <div class="section topics">
                <h3>Темы</h3>
                <ul>
                    <li><a href="#">Мотивация</a></li>
                    <li><a href="#">Наука</a></li>
                    <li><a href="#">Биография</a></li>
                    <li><a href="#">Факты</a></li>
                    <li><a href="#">Програмирование</a></li>
                    <li><a href="#">Компьютеры</a></li>
                </ul>
            </div>
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