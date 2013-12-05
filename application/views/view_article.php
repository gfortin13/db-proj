<div id="content">


    <?php echo $article['title']; ?>
    <br />
    <?php echo $article['abstract']; ?>

    <br />
    Written by: 
    <?php echo $article['authorName']; ?>
    <br />

     <a href="<?php echo "index.php?/filedownload/file/" . $article['fileID'] ?>" target="_blank">Download this Article</a>

     <br />
     <br />

     <a href="javascript:history.back()">Back</a>

</div>