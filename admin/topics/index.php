<?php
    include '../../path.php';
    include '../../app/controllers/topics.php';
    $type = 'категорию';
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
<div class="index_posts container-fluid">
    <div class="row">
        <?php include_once '../../app/include/sidebar-admin.php'?>
        <div class="posts col-9">
            <div class="button row">
                <a href="<?= INDEX_URL . '/admin/topics/create.php' ?>" class="col-2 btn btn-success">Добавить</a>
                <div class="col-1"></div>
                <a href="<?= INDEX_URL . '/admin/topics/index.php' ?>" class="col-2 btn btn-warning">Управление</a>
            </div>
            <div class="row title_table">
                <h2 class="col-12">Управление категориями</h2>
                <div class=" col-1">ID</div>
                <div class=" col-7">Название</div>
                <div class=" col-4">Управление</div>
            </div>
            <div class="scroll">
                <?php  foreach ($topics as $key=> $value){?>
                <div class="row post" >
                    <div class="id col-1"><?= $key+1 ?></div>
                    <div class="title col-7"><?=$value['topic_name'] ?></div>
                    <div class="green col-2"><a href="edit.php?id=<?=$value['id']?>">Edit</a></div>
                    <div class="red col-2" onclick="deleteWindow(<?=$value['id']?>,'<?=$value['topic_name']?>','<?= $type ?>')">Delete</div>
                </div>
                <?php   }  ?>
                <div class="mt-3 col-12 col-md-4 error">
                    <?= $_SESSION['error'];
                    unset($_SESSION['error']);
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- admin end -->

<!-- footer -->
<?php include_once '../../app/include/footer-admin.php' ?>
<!-- footer end -->
<script src="../../assets/js/windowDelete.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<!--    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>-->
<!--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>-->
</body>
</html>
