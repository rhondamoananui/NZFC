
	<aside class="recent-blogs col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">

		<div class="recent-blog-color">
			<h2>Join our Mailing List</h2>
			<form>
				<input type="text" class="form-control" placeholder="Name">
				<input type="text" class="form-control" placeholder="Email Address">
				<button class="btn btn-success">SUBSCRIBE TODAY <i class="fa fa-chevron-circle-right"></i></button>
			</form>
		</div>

		<div class="recent-blog-list">
			<h4 class="center">Recent Blogs</h4>
			<ul>

				<?php foreach ($list as $key => $value) { ?>
		
				<li class="">
					<?php
				                                        $image_properties = array(

				                                        'src'   => '../assets/img/blogs/'.$value->filename,
				                                        'alt'   => 'NZ Fishing Club'
				                                        // 'class' => 'article-img center',
				                                        // 'width' => '50',
				                                        // 'height'=> '50'
				                                        // 'title' => 'profile photos'
				                                    );

				                                    echo img($image_properties);
				                                    ?>

			        	<?php echo anchor('blog/article?id='.$value->id, $value->headline, ''); ?>
			        
			    </li>

			    <?php } ?>
				
			</ul>
		</div>
	</aside>

	</section>
