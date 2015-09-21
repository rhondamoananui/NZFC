<?php
/**
 *    OpenSource-SocialNetwork
 *
 * @package   (Informatikon.com).ossn
 * @author    OSSN Core Team <info@opensource-socialnetwork.com>
 * @copyright 2014 iNFORMATIKON TECHNOLOGIES
 * @license   General Public Licence http://opensource-socialnetwork.com/licence
 * @link      http://www.opensource-socialnetwork.com/licence
 */
$sitename = ossn_site_settings('site_name');
if (isset($params['title'])) {
    $title = $params['title'] . ' : ' . $sitename;
} else {
    $title = $sitename;
}
if (isset($params['contents'])) {
    $contents = $params['contents'];
} else {
    $contents = '';
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title><?php echo $title; ?></title>
    
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
 
<link href="http://fonts.googleapis.com/css?family=Bitter:700" rel="stylesheet" type="text/css">
    <!-- Open Source Social Network (Ossn) http://opensource-socialnetwork.org/ by Informatikon Technologies http://informatikon.com -->

    <?php echo ossn_fetch_extend_views('ossn/site/head'); ?>

    <script>
        <?php echo ossn_fetch_extend_views('ossn/js/head'); ?>
    </script>

    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
    <script src="<?php echo ossn_site_url(); ?>vendors/jquery/jquery.tokeninput.js"></script>


    <style type="text/css">
        .navbar {
            margin-bottom: 0;
            border-radius: 0;
        }
        .navbar-default {
            border: none;
            background-image: linear-gradient(to bottom,#103C68 0,#103C68 100%);
            z-index: 100;

        }
        .navbar-default .navbar-nav>li>a:hover {
            color: #d3d3d3;
            background-color: transparent;
        }
        .navbar-default .navbar-nav>li>a {
            color: #fff;
        }

        #ossn-header-login {
            float: right;
            margin-top: -70px;
            padding: 6px;
        }

        .ossn-system-messages {
            position: relative;
        }

        .ossn-layout-newsfeed .ossn-inner {
            width: 970px;
            margin-top: 10em;
        }
        .ossn-layout-contents {
            margin-top: 10em;
        }

        .ossn-topbar {
            position: fixed;
            top: 50px;
            z-index: 9;
        }

        .navbar-nav {
            font-size: initial;
        }

        .ossn-search input {
            height: 3em;
        }
        
    </style>
</head>

<body>
<div class="ossn-halt ossn-light"></div>
<div class="ossn-message-box"></div>
<div class="ossn-viewer" style="display:none"></div>
<div class="ossn-system-messages">
    <?php
    echo ossn_display_system_messages(); ?>
</div>
<?php if (!ossn_isLoggedin()) { ?>
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

           

          
        </div>
        <div class="container">
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="home-icon">
                        <a href="http://www.nzfishingclub.co.nz/">Home</a>
                    </li>

                    <li>
                        <a href="http://www.nzfishingclub.co.nz/ossn">My Page</a>
                    </li>

                    <li class="divider"></li>
                   
                    <li>
                        <a href="http://www.nzfishingclub.co.nz/photos">Photos</a>
                    </li>

                    <li class="divider"></li>
                    
                    <li>
                        <a href="http://www.nzfishingclub.co.nz/forum">Forum</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="http://www.nzfishingclub.co.nz/blog">Blog</a>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Resources <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="http://www.nzfishingclub.co.nz/resources/bite_times">Bite Times</a>
                            </li>  
                            <li>
                                <a href="http://www.nzfishingclub.co.nz/resources/tide_charts">Tide Charts</a>
                            </li>
                            <li>
                                <a href="http://www.nzfishingclub.co.nz/resources/moon_calendar">Moon Calendar</a>
                            </li>
                            <li>
                                <a href="http://www.nzfishingclub.co.nz/resources/fishing_knots">Fishing Knots</a>
                            </li>
                            <li>
                                <a href="http://www.nzfishingclub.co.nz/resources/fishing_charters">Fishing Charters</a>
                            </li>
                            <li>
                                <a href="http://www.nzfishingclub.co.nz/resources/fishing_tournaments">Fishing Tournaments</a>
                            </li>
                            <li>
                                <a href="http://www.nzfishingclub.co.nz/resources/campgrounds">Campgrounds</a>
                            </li>
                        </ul>
                    </li>
                </ul>

            </div><!-- /.navbar-collapse -->
        </div> <!-- .container -->
    </div><!-- /.container-fluid -->
</nav>


    <div class="ossn-header">
        <div class="inner">
            <a href="<?php echo ossn_site_url(); ?>">
                <div class="ossn-logo"></div>
            </a>
            <?php echo ossn_view_form('login', array(
                'id' => 'ossn-header-login',
                'action' => ossn_site_url('action/user/login'),
                'method' => 'post'
            )); ?>

        </div>
    </div>
<?php } else { ?>

<nav class="navbar navbar-default scrolling-nav" style="position: fixed; top: 0; width: 100%;">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

           

          
        </div>
        <div class="container">
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="home-icon">
                        <a href="http://www.nzfishingclub.co.nz/">Home</a>
                    </li>

                    <li>
                        <a href="http://www.nzfishingclub.co.nz/ossn">My Page</a>
                    </li>

                    <li class="divider"></li>
                   
                    <li>
                        <a href="http://www.nzfishingclub.co.nz/photos">Photos</a>
                    </li>

                    <li class="divider"></li>
                    
                    <li>
                        <a href="http://www.nzfishingclub.co.nz/forum">Forum</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="http://www.nzfishingclub.co.nz/blog">Blog</a>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Resources <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="http://www.nzfishingclub.co.nz/resources/bite_times">Bite Times</a>
                            </li>  
                            <li>
                                <a href="http://www.nzfishingclub.co.nz/resources/tide_charts">Tide Charts</a>
                            </li>
                            <li>
                                <a href="http://www.nzfishingclub.co.nz/resources/moon_calendar">Moon Calendar</a>
                            </li>
                            <li>
                                <a href="http://www.nzfishingclub.co.nz/resources/fishing_knots">Fishing Knots</a>
                            </li>
                            <li>
                                <a href="http://www.nzfishingclub.co.nz/resources/fishing_charters">Fishing Charters</a>
                            </li>
                            <li>
                                <a href="http://www.nzfishingclub.co.nz/resources/fishing_tournaments">Fishing Tournaments</a>
                            </li>
                            <li>
                                <a href="http://www.nzfishingclub.co.nz/resources/campgrounds">Campgrounds</a>
                            </li>
                        </ul>
                    </li>
                </ul>

            </div><!-- /.navbar-collapse -->
        </div> <!-- .container -->
    </div><!-- /.container-fluid -->
</nav>
    <div class="ossn-topbar">
        <div class="inner">
            

            <div class="ossn-search">
                <form action="<?php echo ossn_site_url("search"); ?>" method="get">
                    <input type="text" name="q" placeholder="<?php echo ossn_print('ossn:search:topbar:search');?>"
                           onblur="if (this.value=='') { this.value=Ossn.Print('ossn:search'); }"
                           onFocus="if (this.value==Ossn.Print('ossn:search');) { this.value='' };"/>
                </form>
            </div>
            <div class="ossn-topbar-menu">
                <li>
                    <a href="<?php echo ossn_site_url(); ?>u/<?php echo ossn_loggedin_user()->username; ?>?ref=ossntb">
                        <img
                            src="<?php echo ossn_site_url(); ?>avatar/<?php echo ossn_loggedin_user()->username; ?>/smaller"
                            height="19" width="19"/>
                        <span><?php echo ossn_loggedin_user()->first_name; ?></span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo ossn_site_url(); ?>"><span><?php echo ossn_print('home'); ?></span></a>
                </li>

                <?php echo ossn_view('components/OssnNotifications/page/topbar'); ?>

                <div class="ossn-topbar-dropdown-menu">
                    <label class="ossn-topbar-dropdown-menu-button"><span class="arrow"></span></label>
                    <ul class="ossn-topbar-dropdown-menu-content">
                        <li>
                            <a href="<?php echo ossn_site_url("u/" . ossn_loggedin_user()->username . "/edit"); ?>"><?php echo ossn_print('acount:settings'); ?></a>
                        </li>
                        <?php if (ossn_isAdminLoggedin()) { ?>
			<li>
				 <a href="<?php echo ossn_site_url('administrator'); ?>"><?php echo ossn_print('admin'); ?></a>
			</li>
			<?php } ?>
                        <li>
                          <?php
						  	echo ossn_view_template('output/url', array(
									'href' => ossn_site_url('action/user/logout'), 
									'text' => ossn_print('logout'), 
									'action' => true 
									));
						  ?>
                        </li>
                    </ul>

                </div>
            </div>
<!-- notification box -->
        <div class="ossn-notifications-box" style="height: 140px;">
            <div class="selected"></div>
            <div class="type-name"> <?php echo ossn_print('notifications'); ?> </div>
            <div class="metadata">
                <div style="height: 66px;">
                    <div class="ossn-loading ossn-notification-box-loading"></div>
                </div>
                <div class="bottom-all">
                    <a href="#"><?php echo ossn_print('see:all'); ?></a>
                </div>
            </div>
        </div>
<!-- notification box end -->
        </div>
    </div>
    <div class="ossn-content-spacing"></div>
<?php } ?>

<div class="ossn-contents">
    <?php echo $contents; ?>
</div>
<div class="ossn-footer">
    <div class="ossn-footer-inner">
        <div class="ossn-footer-copyrights">
        &copy;  <a href="<?php echo ossn_site_url(); ?>"><?php echo $sitename; ?></a> 
		          <?php echo date('Y'); ?> -
                  <a target="_blank" href="http://www.opensource-socialnetwork.org/"><?php echo ossn_print('powered');?></a>        
        </div>
        <div class="ossn-footer-menu">
            <?php echo ossn_view_menu('footer'); ?>
        </div>
    </div>
</div>
<?php echo ossn_fetch_extend_views('ossn/page/footer'); ?>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

<script type="text/javascript">
    $( document ).ready(function() {
        // Navigation Bar Dropdown toggle
            $('.dropdown-toggle').dropdown();
    });
</script>
</body>
</html>
