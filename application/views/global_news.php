<div id="news">
	<?php foreach ($globalNews as $key => $news) { ?>
	  <br/>Title : <?php echo $news['title'] ?>
	  <br/>Description : <?php echo $news['content'] ?>
	  <br/>Post Date : <?php echo $news['postDate'] ?>
    <?php } ?>
</div>