<div class="wrap">
	<div id="main">
		<div class="l">
			<h2>Conference</h2>
			<ul style="list-style-type: circle">
				<?php foreach($conferences as $conference) {?>
					<li><a href="<?php echo site_url('home/home/'.$conference['confID']); ?>"><?php echo $conference['title']; ?></a></li>
				<?php } ?>
			</ul>
		</div>
		<div class="r">
			<?php if (isset($conference_news)) {
				foreach($conference_news as $news) { ?>
					<h2><?php $news['title']; ?></h2>
					<p><?php $news['description']; ?></p>
				<?php }
			}
			else{

			}?>
			
			<h2>Nemo enim ipsam voluptatem</h2>
			<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			<h2>Sed ut perspiciatis unde omnis</h2>
			<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		</div>
	
		<div class="line"></div>
	
		<div class="l">
			<h2>Upcoming Events:</h2>
			<p>list stuff here 1</p>
		</div>
		<div class="r">
			<h2>My Events</h2>
			<p>list stuff here 2</p>
		</div>
	</div>
	
	<div id="side">
		<ul>
			<?php foreach($global_news as $news) {?>
				<li><a href="#"><?php $news['title']; ?></a><br /><?php $news['description']; ?></li>
			<?php } ?>
		</ul>
	</div>
</div>