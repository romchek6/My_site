<?php
   $c = '&sort='.$_SESSION['sort'].'&param='.$_SESSION['param'].'&press='.$_SESSION['press'];
   $b = ($_GET['id_topic']?'&id_topic='.$_GET['id_topic']:'&search-term='.$_GET['search-term']);
   if($_GET['id_topic']||$_GET['search-term']){
       $c = $c .$b;
   }
   if($_GET['id']){
       $c = $c . '&id='.$_GET['id'];
   }

?>
<?php if($total_pages > 1){ ?>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item">
                <a class="page-link" href="?page=<?= $page-1 .$c ?>">Предыдущая</a>
            </li>
            <?php if($page > 1){ ?>
            <li class="page-item ">
                <a class="page-link" href="?page=<?= 1 .$c ?>">1</a>
            </li>
            <?php } ?>
            <?php if(($page-3)>1) { ?>
                <li>
                    <a class="page-link" href="">...</a>
                </li>
            <?php }  ?>
            <?php if(($page-2)>1) { ?>
                <li>
                    <a class="page-link" href="?page=<?= $page-2 .$c ?>"><?= $page-2 ?></a>
                </li>
            <?php } ?>
            <?php if(($page-1)>1) { ?>
                <li>
                    <a class="page-link" href="?page=<?= $page-1 .$c ?>"><?= $page-1 ?></a>
                </li>
            <?php } ?>
                <li>
                    <a class="page-link current" href="?page=<?=  $page .$c ?>"><?= $page ?></a>
                </li>
            <?php if(($page+1)< $total_pages) { ?>
                <li>
                    <a class="page-link" href="?page=<?=  $page+1 .$c ?>"><?= $page+1 ?></a>
                </li>
            <?php } ?>
            <?php if(($page+2)< $total_pages) { ?>
                <li>
                    <a class="page-link" href="?page=<?= $page+2 .$c ?>"><?= $page+2 ?></a>
                </li>
            <?php } ?>
            <?php if(($page+3)<$total_pages) { ?>
                <li>
                    <a class="page-link" href="">...</a>
                </li>
            <?php } ?>
            <?php if($page < $total_pages){ ?>
                <li class="page-item">
                    <a class="page-link" href="?page=<?= $total_pages .$c ?>"><?=$total_pages?></a>
                </li>
            <?php } ?>
                <li class="page-item">
                    <a class="page-link" href="?page=<?= $page+1 .$c ?>">Следующая</a>
                </li>
                <li class="page-item" >
                    <form action="index.php" class="page-link" method="get">
                        <input type="number" min="1" max="<?=$total_pages?>" name="page">
                    </form>
                </li>
        </ul>
    </nav>
<?php } ?>