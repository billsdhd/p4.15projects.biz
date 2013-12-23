<?php if(isset($user)): ?>
	<div id="wrapper3">
		<div id="wrapper-blog" class="container">
			<div id="post">
				<h2>
					View All
				</h2>
				<br><br>
				<?php foreach($posts as $post): ?>
					<div class="post"> 
						<span class="date">
							<?=Time::display($post['created'])?>
						</span> 
						<p>
							<pre><?=$post['content']?></pre>
						</p>
						Last modified : <?=Time::display($post['modified'])?> 
						<a href='/posts/edit/<?=$post['post_id']?>'>Edit</a> 
						<a href='/posts/p_delete/<?=$post['post_id']?>'>Delete</a>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
<?php else: ?>
	<h3>No user has been specified</h3>
<?php endif; ?>
