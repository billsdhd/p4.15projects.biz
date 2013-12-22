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
							<a href='/posts/edit/<?=$post['post_id']?>'>Edit</a> 
							<a href='/posts/p_delete/<?=$post['post_id']?>'>Delete</a>
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
