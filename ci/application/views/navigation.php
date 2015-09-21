<nav class="navbar navbar-default scrolling-nav">
  	<div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	       	 	<span class="sr-only">Toggle navigation</span>
	        	<span class="icon-bar"></span>
	        	<span class="icon-bar"></span>
	        	<span class="icon-bar"></span>
	      	</button>

	      	<?php
	                            $image_properties = array(
	                            'src'   => 'assets/img/white-logo.png',
	                            'alt'   => 'NZ Fishing Club Logo',
	                            'class' => 'logo-icon',
	                            'width' => '110',
	                            // 'height'=> '150',
	                            'title' => 'NZ Fishing Club Logo'
	                        );

	                        
	                    echo anchor('/', img($image_properties) , 'class="navbar-brand"'); 

	                    
	                    $userID = $this->session->userdata( 'user_id' );
						
	                    //print_r($userID);
	                    //print_r(base_url('register'));

	                    // if the browser url is example/register
	                    // then make $userID equal to a empty string
	                    // because the userdata id is not set
	                      
	                    if(base_url('register') ){
	                    	
						$userID = '';

	                  		
						}else{
							$userID = $this->session->userdata( 'user_id' );
						}
	        ?>  

	      
	    </div>
	    <div class="container">
		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      	<ul class="nav navbar-nav">
			        <li class="home-icon"><?php echo anchor('/', '<i class="fa fa-home"></i>', 'title="Home"'); ?></li>
					<li><?php echo anchor('ossn', 'My Page', 'title="My Page"'); ?></li><li class="divider"></li>
					<!-- <li><?php //echo anchor('anglers', 'Anglers', 'title="Anglers"'); ?></li><li class="divider"></li> -->
					<li><?php echo anchor('photos', 'Photos', 'title="Photo\'s"'); ?></li><li class="divider"></li>
					<li><?php echo anchor('forum', 'Forum', 'title="Forum"'); ?></li><li class="divider"></li>
					<li><?php echo anchor('blog', 'Blog', 'title="Blog"'); ?></li>

			        <li class="dropdown">
			          	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Resources <span class="caret"></span></a>
			          	<ul class="dropdown-menu" role="menu">
			            	<li><?php echo anchor('resources/bite_times', 'Bite Times', 'title="Bite Times"'); ?></li>	
							<li><?php echo anchor('resources/tide_charts', 'Tide Charts', 'title="Tide Charts"'); ?></li>
							<li><?php echo anchor('resources/moon_calendar', 'Moon Calendar', 'title="Moon Calendar"'); ?></li>
							<li><?php echo anchor('resources/fishing_knots', 'Fishing Knots', 'title="Fishing Knots"'); ?></li>
							<li><?php echo anchor('resources/fishing_charters', 'Fishing Charters', 'title="Fishing Charters"'); ?></li>
							<li><?php echo anchor('resources/fishing_tournaments', 'Fishing Tournaments', 'class="tournaments"'); ?></li>
							<li><?php echo anchor('resources/campgrounds', 'Campgrounds', 'title="Campgrounds"'); ?></li>
			          	</ul>
			        </li>
		      	</ul>

		      	<form class="navbar-form navbar-right">
		        	<div class="form-group">
		          		<input type="text" class="form-control" placeholder="Search">
		        	</div>
		        	
		        	<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
		      	</form>

		    </div><!-- /.navbar-collapse -->
		</div> <!-- .container -->
  	</div><!-- /.container-fluid -->
</nav>
<p class="content-padding"></p>
