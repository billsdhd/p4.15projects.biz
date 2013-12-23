<?php if(isset($user)): ?>
	<div id="wrapper2">
		<div id="newsletter" class="container">
			<div class="content">
				<?php foreach($posts as $post): ?>
					<form method='post' action="/posts/p_edit/<?=$post['post_id']?>">
						<div class="row half">
							<div class="12u">
								<textarea name='content' onkeyup="countChar(this)"><?=$post['content']?></textarea>
								Maximum characters: 500<br>
								<div id="charNum"></div>
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

