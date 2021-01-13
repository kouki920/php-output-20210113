<header>
    <h1 class="header_name h2 text-dark mt-4 mb-4">一覧</h1>
    </header>

    <a href="new.php" class=" btn btn-primary mb-4">ラーメンの登録</a>

    <?php if(count($reviews)) :?>
        <?php foreach($reviews as $review) :?>
            <section class="card shadow-sm mb-4">
            <div class="card-body">
                <h2>
                <?php echo $review['name']?>
                </h2>
                <img width="200px" height="200px" src="./images/<?php echo $review['image'];?>">
                <div>

                <?php echo '評価点' . xss($review['score']); ?>&nbsp;/&nbsp;
                <?php echo '感想' . xss($review['comment']); ?>
                </div>




            </div>


            </section>
            <?php endforeach;?>



<?php else:?>
<p>ラーメンが登録されていません。</p>
        <?php endif;?>
