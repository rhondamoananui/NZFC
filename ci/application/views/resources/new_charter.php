	<div class="resource-main col-lg-10 col-xl-10">  

		<h1 class="resource-headline">ADD YOUR FISHING CHARTER</h1>
		<p class="resource-p">Complete the form below to add your Fishing Charter to our Fishing Charter Directory.</p>


		<?php echo form_open_multipart(); ?>
		<div class="charter-form">
			<fieldset >
				
				<h3>CONTACT DETAILS</h3>
				<div class="form-group">
					<label for="charter">Charter Name:</label>
					<input type="text" name="charter" class="form-control " id="charter" placeholder="Charter Name" value="<?php echo set_value('charter'); ?>">
					<div style="color:red;"><?php echo form_error('charter'); ?></div>
				</div>

				<div class="form-group">
					<label for="phone">Phone:</label>
					<input type="text" name="phone" class="form-control " id="phone" placeholder="09 620 3456" value="<?php echo set_value('phone'); ?>">
					<div style="color:red;"><?php echo form_error('phone'); ?></div>
				</div>

				<div class="form-group">
					<label for="email">Email:</label>
					<input type="text" name="email" class="form-control " id="email" placeholder="Charter@isp.com" value="<?php echo set_value('email'); ?>">
					<div style="color:red;"><?php echo form_error('email'); ?></div>
				</div>

				<div class="form-group">
					<label for="website">Website:</label>
					<input type="text" name="website" class="form-control " id="website" placeholder="www.Charter.com" value="<?php echo set_value('website'); ?>">
					<div style="color:red;"><?php echo form_error('website'); ?></div>
				</div>

				<div class="form-group">
					<label for="textareaChars">Description:</label>
					<textarea type="text" id="textareaChars" maxlength="300" name="description" class="new-charter-form1" placeholder="A Short Description about your Charter" value="<?php echo set_value('description'); ?>"></textarea>
					
					 <div style="color:red;"><?php echo form_error('description'); ?></div>
					 <!-- http://geoffmuskett.com/really-simple-jquery-character-countdown-in-textarea/ -->
					 <p style="color:green;"><span id="chars">300</span> characters remaining</p>
				</div>


				<div class="form-group ">
					<label class="" id="basic-addon1">Region:</label>

					<select type="select" class="form-control areas" name="region" >
						<optgroup label="North Island">
							<option value="<?php echo set_value(); ?>">Select Region</option>
							<option <?php echo set_select('region', '1'); ?> value="1" >Northland</option>
							<option <?php echo set_select('region', '2'); ?> value="2" >Auckland</option>
							<option <?php echo set_select('region', '3'); ?> value="3" >Coromandel</option>
							<option <?php echo set_select('region', '4'); ?> value="4" >Waikato</option>
							<option <?php echo set_select('region', '5'); ?> value="5" >Bay Of Plenty</option>
							<option <?php echo set_select('region', '6'); ?>  value="6" >Gisborne - Hawkes Bay</option>
							<option <?php echo set_select('region', '7'); ?> value="7" >Taranaki</option>
							<option <?php echo set_select('region', '8'); ?>  value="8" >Manawatu - Whanganui</option>
							<option <?php echo set_select('region', '9'); ?> value="9" >Wellington</option>
							
						</optgroup>

						<optgroup label="South Island">
							<option <?php echo set_select('region', '10'); ?>  value="10" >Nelson - Marlborough</option>
							<option <?php echo set_select('region', '11'); ?> value="11"  >West Coast</option>
							<option <?php echo set_select('region', '12'); ?> value="12"  >Canterbury</option>
							<option <?php echo set_select('region', '13'); ?> value="13"  >Otago</option>
							<option <?php echo set_select('region', '14'); ?> value="14"  >Southland</option>
						</optgroup>
					</select>

					<div style="color:red;"><?php echo form_error('region'); ?></div>
				</div>

				<div class="form-group">
					<label for="featured">Featured Listing:</label>
					<input type="checkbox" name="featured" value="1" checked="checked "/> <!-- <span>$5 per month</span> -->
					<div style="color:red;"><?php echo form_error('featured'); ?></div>

				</div>

				<div class="form-group">
					<label for="main-img">Upload An Image:</label>
					<input type="file" name="userfile" id="file_upload" class="uploader" value="<?php echo set_value('userfile'); ?>">
					<div style="color:red;"><?php echo form_error('userfile'); ?></div>

				</div>

				<button type="submit" class="btn btn-primary" name="submit">Next</button>
			</fieldset>
			</div>
		</form>


</div>

</section>



