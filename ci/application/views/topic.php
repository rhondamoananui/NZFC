<!-- <section class="container">
	<div class="landbased-header">
	<h1></h1> -->
<?php 

$amount_topic = count($topic); 


?>

<!-- if the user is logged in show the form -->
<?php if($this->session->userdata('user_data')) { ?>

	<?php echo form_open_multipart('forum/topic?id='.$_GET['id']);?>
		<label>Add a New Topic:</label>
		<!-- <input type="text" name="topic" placeholder="eg. Fishing off the Rocks"> -->
		<textarea class="form-control" type="text" rows="5" id="comment" placeholder="Fishing off the Rocks" name="topic"></textarea>
		<button type="submit" class="btn btn-primary">ADD TOPIC</button>
	</form>

<?php } ?>

	</div>
	<div class="panel panel-default">
  		<!-- Default panel contents -->


  		<!-- Table -->
  		<table class="table">
  		

 			<th class="bold col-xs-11 col-sm-11 col-md-11 col-lg-11 col-xl-11">Topics</th>

 		<?php foreach ($topic as $key => $value) { ?>
 			
 		
 			<tr>
 				<td>
 					<h5>
 						<?php echo anchor('forum/post?id='.$value->id, $value->topic, 'title="Surfcasting in Coromandel"'); ?>
					</h5>
				</td>

 			</tr>

		<?php } ?>

 			


  		</table>
	</div>
</section>