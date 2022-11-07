<?php
    include_once 'path.php';
    include_once 'app/database/database.php'
?>
<header class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-4">
                <h1>
                    <a href="<?= INDEX_URL ?>">My blog</a>
                </h1>
            </div>
            <nav class="col-8">
                <ul class="">
                    <li><a href="#"fa-solid fa-house-chimney"></i> Главная</a></li>
                    <li><a href="#"><i class="fa-solid fa-address-card"></i> О нас</a></li>
                    <li><a href="#"><i class="fa-brands fa-servicestack"></i> Услуги</a></li>
                    <li>
                        <?php
                            if($_SESSION['id_user']){?>
                                <a href="/">
                                    <i class="fa fa-user"></i>
                                    <?= $_SESSION['user_login'] ?>
                                </a>
                                <ul>
                                    <?php
                                        if($_SESSION['admin'] === '1'){?>
                                            <li><a href="#">Админ панель</a></li>
                                        <?php  }
                                    ?>
                                    <li><a href="app/controllers/exit.php">Выход</a></li>
                                </ul>
                            <?php } else { ?>
                                <a href="<?= INPUT_URL ?>">
                                    <i class="fa fa-user"></i>
                                    Войти
                                </a>
                            <?php  }
                        ?>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>
