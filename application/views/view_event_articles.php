<div id="content">

    <?php foreach ($articles as $article)
    {?>
        <table>
            <tr>
                <td>Title:</td>
                <td><a href="<?php echo "index.php?/view_articles/view/" . $article['articleID']; ?>"><?php echo $article['title']; ?></a></td>
                <td>Status:</td>
                <td><?php echo $article['finalDecision']; ?></td>
                <td><a href="<?php echo "index.php?/review_article/" . $article['urlMethod'] . "/" . $article['articleID']; ?>"><?php echo ucfirst($article['urlMethod']); ?> Article</a></td>
            </tr>
        </table>
    <?php } ?>

    <br />
     <br />

     <a href="javascript:history.back()">Back</a>


</div>