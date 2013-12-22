<?php if(isset($user)): ?>
	<div id="wrapper2">
		<div id="newsletter" class="container">
			<div class="content">
				<form method='post' action='/posts/p_add'>
					<div class="row half">
						<div class="12u">
							<textarea name='content' placeholder="Message" onkeyup="countChar(this)"></textarea>
							Maximum characters: 500<br>
							<div id="charNum"> </div>
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

