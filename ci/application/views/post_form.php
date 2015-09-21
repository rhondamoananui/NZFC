
<?php 
      $userID = $this->session->userdata('user_id'); 
      $user = $this->session->userdata('user_data'); 

      $id = $_GET['id'];


?>

<section>
<div class="container">


<!--     <aside class="col-xs-0 col-sm-0 col-md-3 col-lg-3 col-xl-3 height100"></aside> -->
    
    <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 form">
  		
        <?php echo form_open_multipart('mypage/make_comment?id='.$userID);?>
      		<textarea class="form-control" rows="5" id="comment" placeholder="Post a Comment" name="comment"></textarea>
            <button type="submit" class="btn btn-primary submit-btn button-end">Submit</button>
        </form>
    </div>

<!--     <aside class="col-xs-0 col-sm-0 col-md-3 col-lg-3 col-xl-3 height100"></aside> -->

</div>