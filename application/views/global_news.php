<div id="news">
	<center>
		<table>
			<th align="left">Title</th>
			<th align="left">News</th>
			<th align="left">Date Posted</th>
			<th></th>
		
		<?php foreach ($globalNews as $key => $news) { ?>
		    <tr>
		    	<?php echo form_open('manage_news/deleteNews'.$news['newsID']) ?>

					<td  width="200"><a href="#"><?php echo $news['title'] ?></a></td>
					<td width="400"><?php echo $news['content'] ?></td>
					<td><?php echo $news['postDate'] ?></td>
					<td padding="10">
						<input type="button" name="deleteGlobaleNewsButton" value="Delete"/>
						<!--<input type="hidden" name="newsID" value="<?php echo $news['newsID']?>"/>-->
					</td>
				</form>
		    </tr>
	    <?php } ?>
		</table>
	</center>
</div>