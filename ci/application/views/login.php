<div class="container login-form">
	
	<h1 class="center">Login</h1>
	<?php echo validation_errors(); ?>
   		<?php echo form_open('login'); ?>
		
			<div class="form-content">
				<fieldset>
					<legend>Sign in Below</legend>
					   	

					<label>Email</label>
				    <input type="email" class="form-control" placeholder="Email" name="email">

					<label>Password</label>
				    <input type="password" class="form-control" placeholder="Password" name="password">

				</fieldset>
			  

			</div>
		  	<!-- Single button -->
			<div class="btn-group form-button">
			  <button type="submit" class="btn btn-primary">LOGIN</button>
			</div>
		</form>
</div>