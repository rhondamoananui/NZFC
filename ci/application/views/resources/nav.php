<!-- 

 -->
<nav> <!-- class="nav nav-default" -->
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="nav-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <!-- <a class="navbar-brand" href="#">Brand</a> -->
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-home fa-1x"></i> <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                        <li><a href="">ABOUT US</a></li>
                        <li class="divider"></li>
                        <li><a href="">CONTACT US</a></li>
                        <li class="divider"></li>
                        <li><a href="">TERMS AND CONDITIONS</a></li>
                        <li class="divider"></li>
                    
                </ul>
            </li>
                <li role="presentation"><a href="<?php base_url('ci/resources/mypage'); ?>">MY PAGE</a></li>
                
                <li role="presentation"><a href="<?php base_url('ci/resources/anglers'); ?>">ANGLERS</a></li>
            
                <li role="presentation"><a href="<?php base_url('ci/resources/groups'); ?>">GROUPS</a></li>
            
                <li role="presentation"><a href="<?php base_url('ci/resources/photos'); ?>">PHOTOS</a></li>
            
                <li role="presentation"><a href="<?php base_url('ci/resources/forum'); ?>">FORUM</a></li>
            
                <li role="presentation"><a href="<?php base_url('ci/resources/blog'); ?>">BLOG</a></li>
            
<!--         </ul>

        <ul class="nav navbar-nav"> -->
            <li class="dropdown">
                <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Resources <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li>
                        <?php echo anchor('ci/resources/bite_times', 'Bite Times', 'title="Bite Times"'); ?>
                        
                   </li>
                    <li class="divider"></li>
                    <li>
                        <?php echo anchor('ci/resources/tide_charts', 'Tide Charts', 'title="Tide Charts"'); ?>
                        
                    <li class="divider"></li>
                    <li>
                        <?php echo anchor('ci/resources/moon_calendar', 'Moon Calendar', 'title="Moon Calendar"'); ?>
                        
                    </li>
                    <li class="divider"></li>
                    <li>
                        <?php echo anchor('ci/resources/fishing_knots', 'Fishing Knots', 'title="Fishing Knots"'); ?>
                        
                    </li>
                    <li class="divider"></li>
                    <li>
                        <?php echo anchor('ci/resources/fishing_charters', 'Fishing Charters', 'title="Fishing Charters"'); ?>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <?php echo anchor('ci/resources/fishing_tournaments', 'Fishing Tournaments', 'title="Fishing Tournaments"'); ?>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <?php echo anchor('ci/resources/campgrounds', 'Campgrounds', 'title="Campgrounds"'); ?>
                    </li>
                    <li class="divider"></li>
                    
                </ul>
            </li>
        </ul>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>






            