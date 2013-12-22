<?php if(isset($user)): ?>
	<div id="wrapper2">
		<div id="newsletter" class="container">
			<div class="title">
				<h2>Add a new post</h2>
				<span class="byline">
					Please type your message in the box blow.
				</span> 
			</div>
			<div class="content">
				<form method='post' action='/posts/p_add'>
					<div class="row half">
						<div class="12u">
							<textarea name='content' placeholder="Message"></textarea>
							Maximum characters: 500<br>
						</div>
					</div>
					<div class="row">
						<input type='Submit' class="button submit" value='Add new post'>
					</div>
				</form>
			</div>
		</div>
	</div>
<?php else: ?>
	<h3>No user has been specified</h3>
<?php endif; ?>

