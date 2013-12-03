<div class="wrap">
	<div id="main">
		<div class="l">
			<h2>Conference</h2>
			<ul style="list-style-type: circle">
				<?php foreach($conferences as $conference) {?>
					<li><a href="<?php echo site_url('home/front/'.$conference['confID']); ?>"><?php echo $conference['title']; ?></a></li>
				<?php } ?>
			</ul>
		</div>
		<div class="r">
			<h2>Conference News</h2>
			<?php if (isset($conference_news)) {
				foreach($conference_news as $news) { ?>
					<h3><?php echo $news['title']; ?></h3>
					<p><?php echo $news['content']; ?></p>
				<?php }
			}
			else{
				echo "<p>No news</p>";
			}?>
		</div>
	
		<div class="line"></div>
	
		<div class="l">
			<h2>Upcoming Events:</h2>
			<?php if (sizeof($conference_events) == 0) {
				echo "<p>No events created</p>";
			}
			elseif (isset($conference_events)) {
				foreach($conference_events as $event) { ?>
					<?php echo $event['title']; ?> - <a href="#">Register</a><br/>
				<?php }
			}
			else{
				echo "<p>Select an events</p>";
			}?>
			<br/>
		</div>
		<div class="r">
			<h2>My Events</h2>
			<p>list stuff here 2</p>
		</div>
	</div>
	
	<div id="side">
		<h2>Global News</h2>
		<ul>
			<?php foreach($global_news as $news) { ?>
				<li><h3><?php echo $news['title']; ?></h3><?php echo $news['content']; ?></li>
			<?php } ?>
		</ul>
	</div>
</div>