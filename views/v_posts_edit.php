<?php if(isset($user)): ?>
	<div id="wrapper2">
		<div id="newsletter" class="container">
			<div class="title">
				<h2>Edit your post</h2>
				<span class="byline">
					Please type your message in the box blow.
				</span> 
			</div>
			<div class="content">
				<?php foreach($posts as $post): ?>
					<form method='post' action="/posts/p_edit/<?=$post['post_id']?>">
						<div class="row half">
							<div class="12u">
								<textarea name='content' ><?=$post['content']?></textarea>
								Maximum characters: 500<br>
							</div>
						</div>
						<div class="row">
							<input type='Submit' class="button submit" value='Save Post'>
						</div>
					</form>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
<?php else: ?>
	<h3>No user has been specified</h3>
<?php endif; ?>

