<div class="container">
	
	<h1>Contact Us</h1>

   		<?php echo form_open('contact/insert_message'); ?>
		
			<div class="form-content">
				<fieldset>
					
					   	

					<label>Your Email Address:</label>
				    <input type="email" class="form-control" placeholder="Email" name="sender_email">

					<label>Message</label>
				    <textarea name="message" class="text-area"></textarea>

				</fieldset>
			  

			</div>
		  	<!-- Single button -->
			<div class="btn-group form-button">
			  <button type="submit" class="btn btn-primary">SEND MESSAGE</button>
			</div>
		</form>
</div>