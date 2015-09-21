<!-- <section>
<div class="container">
  <aside class="col-xs-0 col-sm-0 col-md-3 col-lg-3 col-xl-3 height100"></aside>


  <form class="form-horizontal col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6" role="form">



    
    <div class="form-group">
 
		<?php 

		//echo form_open_multipart('upload/do_upload');

		?>

		<input type="file" name="userfile" size="20" />

  		
	</div>

    
    <div class="form-group">        
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <button type="submit" class="btn btn-primary submit-btn">Upload</button>
      </div>
    </div>

    <hr>

    <div class="albums"></div>


  </form>

  <aside class="col-xs-0 col-sm-0 col-md-3 col-lg-3 col-xl-3 height100"></aside>


</div>
</section> -->


<html>
<head>
<title>Upload Form</title>
</head>
<body>

<?php echo $error;?>

<?php echo form_open_multipart('upload/do_upload');?>

<input type="file" name="userfile" size="20" />

<br /><br />

<input type="submit" value="upload" />

</form>

</body>
</html>