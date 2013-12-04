<div id="update_news">
	<div class="error">
	        <?php echo validation_errors(); ?>
	</div>
	<?php echo form_open('manage_news/update_news') ?>
		<h2>Update News</h2><br/>
		Title : <input type="text" name="title" value="<?php echo $news['title']?>"/><br/>
		Description : <textarea name="content"><?php echo $news['content']?></textarea><br/>
		Post Date : <input type="text" name="postDate" value="<?php echo $news['postDate']?>"/><br/>
		<input type="hidden" name="newsID" value="<?php echo $news['newsID']?>"/>
		<input type="submit" value="Submit Changes"/>
	</form><br/>
		<a href="<?php echo "index.php?/list_news"?>">Back to Global News</a>
</div>