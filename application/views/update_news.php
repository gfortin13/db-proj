<div id="update_news">
	<div class="error">
	        <?php echo validation_errors(); ?>
	</div>
	<?php echo form_open('update_news'. $news['newsID']) ?>
		<h2>Update News</h2><br/>
		Title : <input type="text" value="<?php echo $news['title']?>"/><br/>
		Description : <textarea><?php echo $news['content']?></textarea><br/>
		Post Date : <input type="text" value="<?php echo $news['postDate']?>"/><br/>
		<input type="submit" value="Submit Changes"/>
	</form>
</div>