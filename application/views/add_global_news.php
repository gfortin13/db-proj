<div id="update_news">
	<div class="error">
	        <?php echo validation_errors(); ?>
	</div>
	<?php echo form_open('manage_news/add_global_news') ?>
		<h2>Add Global News</h2><br/>
		Title : <input type="text" name="title" /><br/>
		Description : <textarea name="content"><br/>
		Post Date : <input type="text" name="postDate" /><br/>
		<input type="hidden" name="newsID" value="<?php echo $news['newsID']?>"/>
		<input type="submit" value="Submit"/>
	</form>
</div>