<?php
    include_once '../../app/database/database.php'
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
                <ul>
                    <li>
                        <a href="/">
                            <i class="fa fa-user"></i>
                            <?= $_SESSION['user_login'] ?>
                        </a>
                        <ul>
                            <li><a href="<?= LOGOUT_URL ?>">Выход</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>
