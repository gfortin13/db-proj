<div id="update_news">
	<div class="error">
	        <?php echo validation_errors(); ?>
	</div>
	<?php echo form_open('update_news'.$data['news']['newsID']) ?>
		<h2>Update News</h2><br/>
		<h3>Title</h3><input type="text" value="<?php echo $news['title']?> : <?php echo $data['news']['title']?>"/>
		<h3>Description</h3><textarea><?php echo $news['content']?> : <?php echo $data['news']['content']?>"<textarea/>
		<h3>Post Date</h3><input type="text" value="<?php echo $news['postDate']?> : <?php echo $data['news']['postDate']?>"/>
		<input type="submit" value="Submit Changes"/>
	</form>
</div>