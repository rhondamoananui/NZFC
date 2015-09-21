<div class="resource-main col-lg-10 col-xl-10">  

	<h1 class="resource-headline">CHARTER INFORMATION</h1>
    <p class="resource-p">Part 2 of 5  With over 15,000 KM’s of stunning coastline ( the 10th longest in the world) and the 4th largest fishing zone worldwide it’s no wonder over a million kiwis love to get out for a fish every year.</p>
      
<!-- action rates upload -->
<?php echo form_open_multipart(); ?>
	<fieldset class="fieldset-fullscreen">

        	<!-- Rates description input group -->
		    <div class="form-group">
		        <label for="textareaChars1"><h3>Charter Information:</h3></label><br>
		        <textarea type="text" id="textareaChars1" maximumlength="10000"  name="description1" class="new-charter-form" placeholder="Tell us about your Charter, Rates, Amenities, Food, Services etc. "></textarea>
		        <div style="color:red;"><?php echo form_error('description1'); ?></div>
		        <p style="color:green;"><span id="chars1">10000</span> characters remaining</p>
		    </div>



		<button type="submit" class="btn btn-primary">SUBMIT</button>
	</fieldset>



</form>


</div>