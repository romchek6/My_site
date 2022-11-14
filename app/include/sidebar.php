<div class="sidebar col-md-3 col-12">
    <div class="section search">
        <h3>Поиск</h3>
        <form action="index.html" method="post">
            <input type="text" name="search-term" class="text-input" placeholder="поиск...">
        </form>
    </div>

    <div class="section topics">
        <h3>Категории</h3>
        <ul>
            <?php foreach ($topics as $key => $value){ ?>
                <li><a href="#"><?= $value['topic_name']?></a></li>
            <?php }?>
        </ul>
    </div>
</div>
