<?php
    include '../../path.php';
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
                <a href="<?= INDEX_URL . '/admin/users/create.php' ?>" class="col-2 btn btn-success">Добавить</a>
                <div class="col-1"></div>
                <a href="<?= INDEX_URL . '/admin/users/index.php' ?>" class="col-2 btn btn-warning">Управление</a>
            </div>
            <div class="row title_table">
                <h2 class="col-12">Добавить пользователя</h2>
            </div>
            <div class="row add_post">
                <form action="">
                    <div class="col-12">
                        <input type="text" name="login" class="form-control" id="formGroupExampleInput" value="<?= $login ?>" placeholder="Логин">
                    </div>
                    <div class="w-100"></div>
                    <div class="mt-4 col-12 ">
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" value="<?= $email ?>" aria-describedby="emailHelp" placeholder="Email">
                    </div>
                    <div class="w-100"></div>
                    <div class="mt-4 col-12 ">
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Пароль">
                    </div>
                    <div class="w-100"></div>
                    <div class="mt-4 col-12 ">
                        <input type="password" name="password_confirm" class="form-control" id="exampleInputPassword2" placeholder="Подтвердите пароль">
                    </div>
                    <div class="w-100"></div>
                    <select class="form-select col mt-4" aria-label="Default select example">
                        <option selected value="1">User</option>
                        <option value="2">Admin</option>
                    </select>
                    <div class="w-100"></div>
                    <div class="mt-4 col-12 ">
                        <button type="submit" class=" btn btn-primary" name="button-reg">Зарегистрировать</button>
                    </div>
                    <div class="w-100"></div>
                    <div class="mt-4 col-12  error">
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<!--    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>-->
<!--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>-->
</body>
</html>
