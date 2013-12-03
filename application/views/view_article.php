<div id="content">


    <?php echo $article['title']; ?>
    <br />
    <?php echo $article['abstract']; ?>

    <br />

     <a href="<?php echo "index.php?/filedownload/file/" . $article['fileID'] ?>" target="_blank">Download this Article</a>

</div>