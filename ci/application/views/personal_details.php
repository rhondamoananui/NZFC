
<div class="container register-form">
	
	<h1 class="center">Register</h1>
	<h4 class="center">step 1 of 2</h4>
		<form class="form-width" role="form" method="post">

			<div class="form-content container">
				<fieldset>
					<legend>Personal Details</legend>
					<label>Username</label>
				    <input type="text" class="form-control" placeholder="Username" name="username" value="<?php echo set_value('username'); ?>">
				   <div style="color:red;"><?php echo form_error('username'); ?></div>

					<label>Email</label>
				    <input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo set_value('email'); ?>">
					<div style="color:red;"><?php echo form_error('email'); ?></div>


					<label>Password</label>
				    <input type="password" class="form-control" placeholder="Password" name="password" value="<?php echo set_value('password'); ?>">
				    <div style="color:red;"><?php echo form_error('password'); ?></div>

					<label>Confirm Password</label>
				    <input type="password" class="form-control" placeholder="Confirm Password" name="confirm_password" value="<?php echo set_value('confirm_password'); ?>">
				    <div style="color:red;"><?php echo form_error('confirm_password'); ?></div>
<!-- 					
				  
				</fieldset>
			  
			  	<fieldset>
			  		<legend>Location</legend> -->
			  		<label>Region</label>
				    <!-- <div class="form-content"> -->
					    
					    <select class="form-control areas" id="sel1" name="location_region_id">
					    	<!-- <option checked placeholder="Choose a Region"> </option> -->
							<optgroup label="North Island">
                                                                    <option value="0">Select Region</option>
                                                                    <option value="1">Northland</option>
                                                                    <option value="2">Auckland</option>
                                                                    <option value="3">Coromandel</option>
                                                                    <option value="4">Waikato</option>
                                                                    <option value="5">Bay Of Plenty</option>
                                                                    <option value="6">Gisborne - Hawkes Bay</option>
                                                                    <option value="7">Taranaki</option>
                                                                    <option value="8">Manawatu - Whanganui</option>
                                                                    <option value="9">Wellington</option>
                                                                    
                                                </optgroup>

                                                <optgroup label="South Island">
                                                                    <option value="10">Nelson - Marlborough</option>
                                                                    <option class="11">West Coast</option>
                                                                    <option class="12">Canterbury</option>
                                                                    <option class="13">Otago</option>
                                                                    <option class="14">Southland</option>

                                                </optgroup>
						</select>
					<!-- </div> -->
					<div style="color:red;"><?php echo form_error('location_region_id'); ?></div>



				    <div class="btn-group form-button">
				  		<button type="submit" class="btn btn-primary" name="submit">NEXT</button>
					</div>

	  			</fieldset>

	  			<!-- Single button -->
				
			</div>
		  	
		</form>
</div>
