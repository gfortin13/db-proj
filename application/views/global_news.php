<div id="news">
	<center>
		<table>
			<th align="left">Title</th>
			<th align="left">News</th>
			<th align="left">Date Posted</th>
			<th></th>
		
		<?php foreach ($globalNews as $key => $news) { ?>
		    <tr>
					<td  width="200"><a href="<?php echo "index.php?/manage_news/display_news_to_update/" . $news['newsID'] ?>"><?php echo $news['title'] ?></a></td>
					<td width="400"><?php echo $news['content'] ?></td>
					<td><?php echo $news['postDate'] ?></td>
					<td><a href="<?php echo "index.php?/manage_news/delete_news/".$news['newsID']?>">Delete</a></td>
		    </tr>
	    <?php } ?>
		</table>
		<a href="<?php echo "index.php?/manage_news/display_add_global_news/"?>">Add Global News</a>
	</center>
</div>