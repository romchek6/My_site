<?php
    include '../../path.php';
    include '../../app/controllers/posts.php'
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
    <link rel="stylesheet" href="../../assets/css/css-admin.css">
</head>
<body>

<!-- header -->
<?php include_once '../../app/include/header-admin.php' ?>
<!-- header end -->

<!-- admin -->
<div class="container">
    <div class="row">
        <?php include_once '../../app/include/sidebar-admin.php'?>
        <div class="posts col-9">
            <div class="button row">
                <a href="<?= INDEX_URL . '/admin/posts/create.php' ?>" class="col-2 btn btn-success">Добавить</a>
                <div class="col-1"></div>
                <a href="<?= INDEX_URL . '/admin/posts/index.php' ?>" class="col-2 btn btn-warning">Управление</a>
            </div>
            <div class="row title_table">
                <h2 class="col-12">Добавить пост</h2>
            </div>
                <div class="row add_post">
                    <form action="create.php" method="post" enctype="multipart/form-data">
                        <div class="col">
                            <input type="text" class="form-control" name="title" value="<?=$title ?>" placeholder="Название статьи" aria-label="Заголовок вашей статьи">
                        </div>
                        <div class="col mt-4">
                            <textarea class="form-control" id="editor" rows="10" value="<?=$content ?>" name="content" placeholder="Содержимое статьи..."></textarea>
                        </div>
                        <div class="input-group col mt-4">
                            <input type="file" name="img" class="form-control" id="uploadImage">
                            <label class="input-group-text" for="inputGroupFile02">Загрузка</label>
                        </div>
                        <div class="col mt-4">
                            <img id="result" alt="Катинка для статьи">
                        </div>
                        <select class="form-select col mt-4" name="topic" aria-label="Default select example">
                            <option selected>Выберите категорию</option>
                            <?php foreach ($topics as $key=> $value){?>
                            <option value="<?= $value['id']?>"><?= $value['topic_name']?></option>
                            <?php }?>
                        </select>
                        <div class=" mt-4 form-check">
                            <input class="form-check-input" type="checkbox" name="status" checked>
                            <label class="form-check-label" for="flexCheckChecked">
                                 Опубликовать
                            </label>
                        </div>
                        <div class="col-6 mt-4">
                            <button type="submit" name="button-create-post" class="btn btn-primary">Добавить</button>
                        </div>
                        <div class="mt-3 col-12 col-md-4 error">
                            <?= $error_Message ?>
                        </div>
                    </form>
                </div>
        </div>
    </div>
</div>
<!-- admin end -->

<!-- footer -->
<?php include_once '../../app/include/footer-admin.php' ?>
<!-- footer end -->
<script src="../../assets/js/img.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<!--визуальный редактор к текстовому полю-->
<script src="https://cdn.ckeditor.com/ckeditor5/35.2.0/classic/ckeditor.js"></script>
<!--    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>-->
<!--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>-->
<script src="../../assets/js/js.js"></script>
</body>
</html>