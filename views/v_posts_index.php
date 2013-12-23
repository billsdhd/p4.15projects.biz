<?php if(isset($user)): ?>
	<div id="wrapper3">
		<div id="wrapper-blog" class="container">
			<div id="post">
				<h2>
					Resent Diaries
				</h2>
				<br><br>
				<div class="post"> 
					<span class="date">
						<?php foreach($posts as $post): ?>
							<?=Time::display($post['created'])?>
							<a href='/posts/view/<?=$post['post_id']?>'>View</a> 
							<br>
						<?php endforeach; ?>
					</span> 
				</div>
			</div>
		</div>
	</div>
<?php else: ?>
	<h3>No user has been specified</h3>
<?php endif; ?>
