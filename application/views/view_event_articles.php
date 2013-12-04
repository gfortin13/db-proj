<div id="content">

    <?php foreach ($articles as $article)
    {?>
        <table>
            <tr>
                <td>Title:</td>
                <td><a href="<?php echo "index.php?/view_articles/view/" . $article['articleID']; ?>"><?php echo $article['title']; ?></a></td>
                <td>Status:</td>
                <td><?php echo $article['finalDecision']; ?></td>
                <td><a href="<?php echo "index.php?/review_article/review/" . $article['articleID']; ?>">Review Article</a></td>
            </tr>
        </table>
    <?php } ?>

</div>