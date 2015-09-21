
<!-- Show each blog article -->
<section class="container">
	<article class="article-page col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
		<justify>
			

		<a href="#"><h1 style="color:#59b4dc;"><?php echo $blog[0]->headline ?></h1></a>
				<?php
				                                        $image_properties = array(

				                                        'src'   => '../assets/img/blogs/'.$blog[0]->filename,
				                                        'alt'   => 'NZ Fishing Club',
				                                        'class' => 'article-img center',
				                                        'width' => '100%',
				                                        'height'=> '350'
				                                        // 'title' => 'profile photos'
				                                    );

				                                    echo img($image_properties);
				                                    ?>
			<div class="article-content">
				<p class="blog-content">

					<?php echo nl2br($blog[0]->content); ?>
				</p>
			</div>
		</justify>
	</article>

<!-- 

	"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt 
	ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco 
	laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
	 velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, 
	 sunt in culpa qui officia deserunt mollit anim id est laborum."
 -->
