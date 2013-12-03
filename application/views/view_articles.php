<div id="content">

	<div class="error">
        <?php echo validation_errors(); ?>
	</div>

    <?php foreach ($articles as $article)
    {?>
        <table>
            <tr>
                <td>Title:</td>
                <td><a href="<?php echo "index.php?/view_articles/view/" . $article['articleID']; ?>"><?php echo $article['title']; ?></a></td>
                <td>Status:</td>
                <td><?php echo $article['finalDecision']; ?></td>
            </tr>
        </table>
    <?php } ?>

</div>