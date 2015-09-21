<section class="container">

	<h1>NZ Fishing Club Forum</h1>
	<div class=" col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 ">
		<div class="panel panel-default">
	  		<!-- Default panel contents -->
	  		<!-- <div class="panel-heading">Category</div> -->
	<?php //print_r($category); ?>
	  		<!-- Table -->
	  		<table class="table">
	  			<tbody>
	  				<tr>
			 			<th class="bold">Category</th>
			 			<!-- <th class="bold">Topics</th> -->
			 			<!-- <th class="bold">Posts</th> -->
	 				</tr>
	 		
	 				<?php foreach ($category as $key => $value) {
	 					# code...
	 				?>
		 			<tr>
		 				<td><h3><?php echo anchor('forum/topic?id='.$value->id, $value->category, 'title="Landbased Fishing"'); ?></h3><p><?php echo $value->description ?></p> </td>
		 				<!-- <td>493</td> -->
		 			<!-- 	<td>4577</td> -->
		 			</tr>
					<?php } ?>
		 			<!--  -->
				</tbody>
	  		</table>
		</div>
	</div>
</section>