<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <li class="page-item">
            <a class="page-link" href="?page=<?= $_SESSION['sort']? $page-1 .'&sort='.$_SESSION['sort'].'&param='.$_SESSION['param'].'&press='.$_SESSION['press']: $page-1 ?>">Предыдущая</a>
        </li>
        <?php if($page > 1){ ?>
        <li class="page-item ">
            <a class="page-link" href="?page=<?= $_SESSION['sort']? 1 .'&sort='.$_SESSION['sort'].'&param='.$_SESSION['param'].'&press='.$_SESSION['press']:1 ?>">1</a>
        </li>
        <?php } ?>
        <?php if(($page-3)>1) { ?>
            <li>
                <a class="page-link" href="">...</a>
            </li>
        <?php }  ?>
        <?php if(($page-2)>1) { ?>
            <li>
                <a class="page-link" href="?page=<?= $_SESSION['sort']? $page-2 .'&sort='.$_SESSION['sort'].'&param='.$_SESSION['param'].'&press='.$_SESSION['press']:$page-2 ?>"><?= $page-2 ?></a>
            </li>
        <?php } ?>
        <?php if(($page-1)>1) { ?>
            <li>
                <a class="page-link" href="?page=<?= $_SESSION['sort']? $page-1 .'&sort='.$_SESSION['sort'].'&param='.$_SESSION['param'].'&press='.$_SESSION['press']:$page-1 ?>"><?= $page-1 ?></a>
            </li>
        <?php } ?>
            <li>
                <a class="page-link" href="?page=<?= $_SESSION['sort']? $page .'&sort='.$_SESSION['sort'].'&param='.$_SESSION['param'].'&press='.$_SESSION['press']:$page ?>"><?= $page ?></a>
            </li>
        <?php if(($page+1)< $total_pages) { ?>
            <li>
                <a class="page-link" href="?page=<?= $_SESSION['sort']? $page+1 .'&sort='.$_SESSION['sort'].'&param='.$_SESSION['param'].'&press='.$_SESSION['press']:$page+1 ?>"><?= $page+1 ?></a>
            </li>
        <?php } ?>
        <?php if(($page+2)< $total_pages) { ?>
            <li>
                <a class="page-link" href="?page=<?= $_SESSION['sort']? $page+2 .'&sort='.$_SESSION['sort'].'&param='.$_SESSION['param'].'&press='.$_SESSION['press']:$page+2 ?>"><?= $page+2 ?></a>
            </li>
        <?php } ?>
        <?php if(($page+3)<$total_pages) { ?>
            <li>
                <a class="page-link" href="">...</a>
            </li>
        <?php } ?>
        <?php if($page < $total_pages){ ?>
            <li class="page-item">
                <a class="page-link" href="?page=<?= $_SESSION['sort']? $total_pages .'&sort='.$_SESSION['sort'].'&param='.$_SESSION['param'].'&press='.$_SESSION['press']: $total_pages ?>"><?=$total_pages?></a>
            </li>
        <?php } ?>
            <li class="page-item">
                <a class="page-link" href="?page=<?= $_SESSION['sort']? $page+1 .'&sort='.$_SESSION['sort'].'&param='.$_SESSION['param'].'&press='.$_SESSION['press']: $page+1 ?>">Следующая</a>
            </li>
    </ul>
</nav>
