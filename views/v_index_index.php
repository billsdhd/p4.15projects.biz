<div id="wrapper1">
	<div id="welcome" class="container">
		<div class="title">

			<?php if($user): ?>
				<h2>
					Welcome <?=$user->first_name;?> <?=$user->last_name;?>
				</h2>
			<?php else: ?>
				<h2>
					Simple Diary!
				</h2>
			<?php endif; ?>
		
			<span class="byline">project 4</span> 
		</div>
	
		<div class="content">
			<p>
				This is <strong>Simple Diary</strong>, based on the frameworks. <br>
			</p>
			<p>
				Due to the catastrophic failure of the Project 2; I got a pretty bad grade on that; <br>
				I focussed on the frameworks. Added javascript letter count and adjust functions.
				Error page for bad form and email address. <br>
				<strong>Features :</strong>
				Sign up, Log in, Log out, Add Diary, View list, View all diaries, View account<br>
				Error pages, address format check, empty form check, letter count, letter adjust<br>
			</p>
			<p>
				<strong>Preinstalled users :</strong> 
				sam@whitehouse.gov, donna@whitehouse.gov, toby@whitehouse.gov, cj@whitehouse.gov<br>
			</p>
		</div>
	</div>
</div>