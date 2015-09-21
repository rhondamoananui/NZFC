<div class="admin-nav"> 

            <?php 
              $image_properties = array(
              'src'   => 'assets/img/logo.png',
              'alt'   => 'NZ Fishing Club logo',
              'class' => 'logo',
              'width' => '150',
              'height'=> '50'
              );

              echo anchor('/', img($image_properties), 'title="NZ Fishing Club Logo"' );
            
            ?>             

    <?php echo anchor('/', 'VIEW WEBSITE', 'title="home" class="btn btn-default" style="width:150px;"');  ?>
    <h1 admin-heading>Admin Panel</h1>




</div>