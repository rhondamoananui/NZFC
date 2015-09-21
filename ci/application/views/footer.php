<!-- This is the Footer for the Admin Pages -->
<!-- This page includes the Bottom CTA, The Actual Footer, and the scripts -->

        <!-- THIS DIV IS A CLEAR FIX, TO CLEAR ANY FLOATS -->
        <div class="cf"></div>
    
<!-- BOTTOM-CTA -->
<div class="footer1">
    

    <!-- This is the "Bottom Call to Action" Register Button -->
    <div class="register-cta">
        <div>
            <p class="foot-p"><strong>New Zealand's Online Fishing Club </strong>- <em>Love Fishing? Join the Club!</em></p>
        </div>
        <div class="button">
            <?php echo anchor('ossn/', 'CLICK HERE TO CREATE PROFILE', 'title="Register" class="btn btn-success" '); ?>
        </div>
    </div>



    <!-- This is the "Bottom Call to Action" Login Button -->
   <!--  <div class="login-cta">
        <div>
            <h1>Already a Member?</h1>
            <h3>Please Log in Here</h3>
        </div>
        <?php //echo anchor('login', 'LOGIN', 'title="Login" class="btn btn-success"  style="background:#0c8442;color:#fff"'); ?>
    </div> -->


</div>

<!-- FOOTER 2 -->
<footer class="footer2">
    <ul class="container">
        <li><?php echo anchor('resources/bite_times', 'Bite Times', 'title="Bite Times"'); ?></li>  
        <li><?php echo anchor('resources/tide_charts', 'Tide Charts', 'title="Tide Charts"'); ?></li>
        <li><?php echo anchor('resources/moon_calendar', 'Moon Calendar', 'title="Moon Calendar"'); ?></li>
        <li><?php echo anchor('resources/fishing_knots', 'Fishing Knots', 'title="Fishing Knots"'); ?></li>
        <li><?php echo anchor('resources/fishing_charters', 'Fishing Charters', 'title="Fishing Charters"'); ?></li>
        <li><?php echo anchor('resources/fishing_tournaments', 'Fishing Tournaments', 'class="tournaments"'); ?></li>
        <li><?php echo anchor('resources/campgrounds', 'Campgrounds', 'title="Campgrounds"'); ?></li>
    </ul>
</footer>




<!-- FOOTER 3-->
<footer class="footer3"> 

    <div class="container background">

        <!-- Footer Logo & Paragraph -->
        <div class="left-footer">           
            <ul>
                <li><?php echo anchor('/', 'HOME', 'title="Home"'); ?></li>
                <li><?php echo anchor('ossn/home', 'MY PAGE', 'title="My Page"'); ?></li>
                <!-- <li><?php //echo anchor('anglers', 'ANGLERS', 'title="Anglers"'); ?></li> -->
                <li><?php echo anchor('photos', 'PHOTOS', 'title="Photo Gallery"'); ?></li>
            </ul>
            <ul>    
                <li><?php echo anchor('forum', 'FORUM', 'title="Forum"'); ?></li>
                <li><?php echo anchor('blog', 'BLOG', 'title="Blog"'); ?></li>
                <li><?php echo anchor('#', 'ABOUT US', 'title="About Us"'); ?></li>
                <li><?php echo anchor('contact', 'CONTACT US', 'title="Contact Us"'); ?></li>
                
            </ul>
        </div>

        <!-- Footer Navigation Links -->


        <!-- Footer Resource Links -->
        <div class="mid-footer">
            
            <div class="social-icons">
                <h3>Follow Us:</h3>

            </div>
            <div class="social-icons">
                <i class="fa fa-facebook fa-2x"></i>
                <i class="fa fa-twitter fa-2x"></i>
                <i class="fa fa-google-plus fa-2x"></i>
                <i class="fa fa-youtube fa-2x"></i>
                
            </div>
        </div>


        <!-- Footer Search Bar & Social Links -->
        <div class="right-footer"> <!-- col-lg-4 col-md-4 col-sm-12 col-xs-12 --> 
            <?php echo anchor('/', ' ' );?>
        </div>

    </div>
</footer>
<footer class="footer4">
    <p> &copy; NZ Fishing Club 2015 | By &nbsp; <a href="http://webcoder.co.nz">WebCoder</a></p>
</footer>


<!-- CDN -->
<!-- <script src="//cdn.ckeditor.com/4.4.7/standard/ckeditor.js"></script><script src="http://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js" > </script> -->

<script src="<?php echo base_url('assets/js/js.js'); ?>" type="text/javascript" defer="defer"></script>


</body>

</html>
    