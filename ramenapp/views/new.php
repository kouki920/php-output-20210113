
        <form action="create.php" method="post" enctype="multipart/form-data">

        <?php if(count($errors)) :?>
            <ul>
            <?php foreach($errors as $error) :?>
                <li><?php echo $error; ?></li>
                <?php endforeach;?>
            </ul>
        <?php endif;?>

        <div class="form-group">
        <label for="name">店名</label>
        <input type="text" id="name" name="name" value="<?php echo xss($review['name']);?>">

        <div class="form-group">
        <label for="image">写真</label>
        <input type="file" name="image" id="image">
        </div>

        <div class="form-group">
        <label for="score">評価点(Max:100)</label>
        <input type="number" name="score" id="score" value="<?php echo xss($review['score']);?>">
        </div>

        <div class="form-group">
        <label for="comment">感想</label>
        <textarea name="comment" id="comment" cols="40" rows="5" ><?php echo xss($review['comment']);?></textarea>
        </div>

        <input type="submit" value="登録する">

        </form>
