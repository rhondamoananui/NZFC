<div class="resource-main col-lg-10 col-xl-10">  

	<h1 class="resource-headline">ABOUT THE CAMPGROUND</h1>
	<p class="resource-p">Part 2 of 5  With over 15,000 KM’s of stunning coastline ( the 10th longest in the world) and the 4th largest fishing zone worldwide it’s no wonder over a million kiwis love to get out for a fish every year.</p>
	
	<!-- action rates upload -->
	<?php echo form_open_multipart(); ?>
	<fieldset>

		<!-- Rates description input group -->
		<div class="form-group">
			<label for="rates-description">Amenities Description:</label><br>
			<textarea type="text" name="description1"></textarea>
			<div style="color:red;"><?php echo form_error('description1'); ?></div>
		</div>

		<!-- Other description input group -->
		<div class="form-group">
			<label for="other-description">Other Description:</label><br>
			<textarea type="text" name="description2"></textarea>
			<div style="color:red;"><?php echo form_error('description2'); ?></div>
		</div>

		<button type="submit" class="btn btn-primary">SUBMIT</button>
	</fieldset>



</form>


</div>

</section>