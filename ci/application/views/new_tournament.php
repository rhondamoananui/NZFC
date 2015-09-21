<div class="resource-main col-lg-10 col-xl-10">  

	<h1 class="resource-headline">FISHING TOURNAMENT</h1>
	<p class="resource-p">With over 15,000 KM’s of stunning coastline ( the 10th longest in the world) and the 4th largest fishing zone worldwide it’s no wonder over a million kiwis love to get out for a fish every year.</p>


	<?php echo form_open_multipart(); ?>
		<fieldset>
			<h4>CONTACT DETAILS</h4>
			<div class="form-group">
				<label for="charter">Tournament Name:</label>
				<input type="text" name="tournament_name" class="form-control " id="charter" placeholder="Tournament Name" value="<?php echo set_value('tournament_name'); ?>">
				<div style="color:red;"><?php echo form_error('tournament_name'); ?></div>
			</div>

			<div class="form-group">
				<label for="phone">Phone:</label>
				<input type="text" name="phone" class="form-control " id="phone" placeholder="09 620 3456" value="<?php echo set_value('phone'); ?>">
				<div style="color:red;"><?php echo form_error('phone'); ?></div>
			</div>

			<div class="form-group">
				<label for="email">Email:</label>
				<input type="text" name="email" class="form-control " id="email" placeholder="Tournament@isp.com" value="<?php echo set_value('email'); ?>">
				<div style="color:red;"><?php echo form_error('email'); ?></div>
			</div>

			<div class="form-group">
				<label for="website">Website:</label>
				<input type="text" name="website" class="form-control " id="website" placeholder="www.Tournament.com" value="<?php echo set_value('website'); ?>">
				<div style="color:red;"><?php echo form_error('website'); ?></div>
			</div>

			<div class="form-group">
				<label for="description">Description:</label>
				<input type="text" name="description" class="form-control " id="description" placeholder="Insert a Description of your Tournament" value="<?php echo set_value('description'); ?>">
				<div style="color:red;"><?php echo form_error('description'); ?></div>
			</div>
			<div class="form-group">
				<label for="description">Ticket Price:</label>
				<input type="text" name="rates" class="form-control " id="description" placeholder="Enter the Ticket Price" value="<?php echo set_value('rates'); ?>">
				<div style="color:red;"><?php echo form_error('rates'); ?></div>
			</div>

			<div class="form-group">
				<label for="description">Date:</label>
				<input type="text" name="date" class="form-control " id="description" placeholder="15th 16th 17th August 2015" value="<?php echo set_value('date'); ?>">
				<div style="color:red;"><?php echo form_error('date'); ?></div>
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
				<label for="main-img">Upload An Image:</label>
				<input type="file" name="userfile" id="file_upload">

			</div>

			<button type="submit" class="btn btn-primary">NEXT</button>
		</fieldset>
		<br>
	
	

	</form>

</div>

</section>

