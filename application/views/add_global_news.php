<div id="update_news">
	<div class="error">
	        <?php echo validation_errors(); ?>
	</div>
	<?php echo form_open('manage_news/add_global_news') ?>
		<h2>Add Global News</h2><br/>
		Title : <input type="text" name="title" /><br/>
		Description : <textarea name="content"></textarea><br/>
		Post Date : <input type="text" name="postDate" value="<?php echo date("Y-m-d H:i:s");?>" /><br/>
		<input type="submit" value="Submit"/>

	</form>
	<br/>
	<a href="<?php echo "index.php?/list_news"?>">Back to Global News</a>
</div>