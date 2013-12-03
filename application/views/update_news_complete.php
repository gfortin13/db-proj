<div id="update_news_complete">

<?php $news = $data['news']?>
	<h2>News Updated Successfully</h2>
	<h3>Title</h3><?php echo $news['title']?> : <?php echo $data['news']['title']?>
	<h3>Description</h3><?php echo $news['content']?> : <?php echo $data['news']['content']?>
	<h3>Post Date</h3><?php echo $news['postDate']?> : <?php echo $data['news']['postDate']?>

</div>