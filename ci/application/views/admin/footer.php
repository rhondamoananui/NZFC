<!-- This is the footer for the admin pages -->
<!-- this footer includes the modals for the admin edit and delete buttons,  the footer & the script tags -->
<!--  -->


</div>  <!-- OPENING DIV NEEDS TO BE AT THE TOP OF THE MAIN CONTENT PAGE -->
</div>	<!-- OPENING DIV TAG ON SIDE-NAV.PHP --> 
</div>  <!-- OPENING DIV TAG ON SIDE-NAV.PHP -->
    
<hr>


<!-- MODAL - SLIDER UPDATE FORM -->
<!-- This modal is for updating the Slider image details -->
<div class="modal fade bs-example-modal-lg" id="modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- THIS IS THE MODAL HEADING -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Update the Slider Image Details</h4>
            </div>

            <!-- MODAL - UPDATE SLIDER FORM -->
            <div class="modal-body">
                <?php echo form_open_multipart('admin/update_slider', 'id="update-slider"');  ?>

                    <input type="text" id="hideID" class="hide" name="id" value="">
                    <div class="form-group">
                        <label for="img-title" class="control-label">Caption:</label>
                        <input type="text" class="form-control" id="img-title" name="img-title" value="">
                    </div>
                  
                    <div class="form-group">
                        <label for="alt-text" class="control-label">Alt Text:</label>
                        <input type="text" class="form-control" id="alt-text" name="alt-text" value="">
                    </div>
                  
<!--                     <div class="form-group">
                        <label for="caption" class="control-label">Caption:</label>
                        <input type="text" class="form-control" id="caption" name="caption" value="">
                    </div> -->
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" name="submit" class="btn btn-success" id="update-button">Update</button>
                </form>
            </div>

            <!-- THE BUTTONS FOR THE MODAL -->
            <div class="modal-footer">
                
            </div>
        </div>
    </div>
</div>



<!-- MODAL DELETE SLIDER -->
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        
        <div class="modal-content">

            <!-- MODAL HEADING -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Are you sure you want to Delete?</h4>
            </div>

            <!-- MODAL BUTTONS -->
            <div class="modal-footer">
                <?php echo form_open_multipart('admin/delete_slider', 'id="delete-slider"');  ?>

                    <input type="text" id="addID" class="hide" name="id" value="">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button> 
                    <button type="submit" class="btn btn-danger" id="update-button">Delete</button>
                </form>
            </div>
          
        </div>
    </div>
</div>

<!-- This Modal is the form for editing the gallery photo's -->
<div class="modal fade edit-photo" id="modal" tabindex="-1" role="dialog" aria-labelledby="edit-photo-modal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- THIS IS THE MODAL HEADING -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Update the Photo Details</h4>
            </div>

            <!-- MODAL - UPDATE photo FORM -->
            <div class="modal-body">
                <?php echo form_open_multipart('admin/edit_photo', 'id="update-gallery"');  ?>

                    <input type="text" id="hideID" class="hide" name="id" value="">
                    <div class="form-group">
                        <label for="img-title" class="control-label">Image Title:</label>
                        <input type="text" class="form-control" id="img-title" name="img-title" value="">
                    </div>
                  
                    <div class="form-group">
                        <label for="alt-text" class="control-label">Alt Text:</label>
                        <input type="text" class="form-control" id="alt-text" name="alt-text" value="">
                    </div>
                  
                    <div class="form-group">
                        <label for="caption" class="control-label">Caption:</label>
                        <input type="text" class="form-control" id="caption" name="caption" value="">
                    </div>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" name="submit" class="btn btn-success" id="update-button">Update</button>
                </form>
            </div>

            <!-- THE BUTTONS FOR THE MODAL -->
            <div class="modal-footer">
                
            </div>
        </div>
    </div>
</div>


<!-- MODAL DELETE PHOTO FROM GALLERY -->
<div class="modal fade delete-gallery-image" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        
        <div class="modal-content">

            <!-- MODAL HEADING -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Are you sure you want to Delete?</h4>
            </div>

            <!-- MODAL BUTTONS -->
            <div class="modal-footer">
                <?php echo form_open_multipart('admin/delete_photo', 'id="delete-photo"');  ?>

                    <input type="text" id="addID" class="hide" name="id" value="">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button> 
                    <button type="submit" class="btn btn-danger" id="update-button">Delete</button>
                </form>
            </div>
          
        </div>
    </div>
</div>


<!-- This Modal is the form for editing the forum category -->
<div class="modal fade forum-categ" id="modal" tabindex="-1" role="dialog" aria-labelledby="edit-forum-modal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- THIS IS THE MODAL HEADING -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Update the Forum Category Details</h4>
            </div>

            <!-- MODAL - UPDATE SLIDER FORM -->
            <div class="modal-body">
                <?php echo form_open_multipart('admin/edit_forum_category', 'id="update-forum-categ"');  ?>

                    <!-- this is the input for the id -->
                    <input type="text" id="hideID" class="hide" name="id" value="">
                    
                    <div class="form-group">
                        <label for="img-title" class="control-label">Category:</label>
                        <input type="text" class="form-control" id="img-title" name="category" value="">
                    </div>
                  
                    <div class="form-group">
                        <label for="alt-text" class="control-label">Description:</label>
                        <input type="text" class="form-control" id="alt-text" name="description" value="">
                    </div>
                  
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" name="submit" class="btn btn-success" id="update-button">Update</button>
                </form>
            </div>

            <!-- THE BUTTONS FOR THE MODAL -->
            <div class="modal-footer">
                
            </div>
        </div>
    </div>
</div>


<!-- MODAL DELETE FORUM CATEGORY -->
<div class="modal fade delete-forum-category" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        
        <div class="modal-content">

            <!-- MODAL HEADING -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Are you sure you want to Delete?</h4>
            </div>

            <!-- MODAL BUTTONS -->
            <div class="modal-footer">
                <?php echo form_open_multipart('admin/delete_forum_category', 'id="delete-forum-category"');  ?>

                    <input type="text" id="addID" class="hide" name="id" value="">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button> 
                    <button type="submit" class="btn btn-danger" id="update-button">Delete</button>
                </form>
            </div>
          
        </div>
    </div>
</div>





<!-- This Modal is the form for editing the blog -->
<div class="modal fade edit-blog" id="modal" tabindex="-1" role="dialog" aria-labelledby="edit-blog-modal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- THIS IS THE MODAL HEADING -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Update the Blog</h4>
            </div>

            <!-- MODAL - UPDATE SLIDER FORM -->
            <div class="modal-body">
                <?php echo form_open_multipart('admin/edit_blog', 'id="update-blog"');  ?>

                    <!-- this is the input for the id -->
                    <input type="text" id="hideID" class="hide" name="id" value="">
                    
                    <div class="form-group ">
                                        <label class="" id="basic-addon1">Page Title:</label>
                                        <input type="text" class="form-control" placeholder="NZ Fishing club" name="page_title">
                                    </div>

                                    <div class="form-group">
                                        <label class="" id="basic-addon1">Meta Description:</label>
                                        <input type="text" class="form-control" placeholder="add a description that clearly descibes the page keep it to 140 characters" name="meta_desc">
                                    </div>

                                    <div class="form-group">
                                        <label class="" id="basic-addon1">Headline:</label>
                                        <input type="text" class="form-control" placeholder="New Zealand Fishing Club - Join Us Today!" name="headline">
                                    </div>

                                    <div class="control-group ">
                                        <label class="control-label" id="basic-addon1">Article Content:</label>
                                        <textarea class="form-control" name="content" id="message-text"></textarea>      
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label" id="basic-addon1">Blog Image:</label>
                                        <input id="filebutton" name="userfile" class="input-file form-control" type="file">
                                    </div>
                  
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" name="submit" class="btn btn-success" id="update-button">Update</button>
                </form>
            </div>

            <!-- THE BUTTONS FOR THE MODAL -->
            <div class="modal-footer">
                
            </div>
        </div>
    </div>
</div>



<!-- MODAL DELETE BLOG -->
<div class="modal fade delete-blog" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        
        <div class="modal-content">

            <!-- MODAL HEADING -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Are you sure you want to Delete?</h4>
            </div>

            <!-- MODAL BUTTONS -->
            <div class="modal-footer">
                <?php echo form_open_multipart('admin/delete_blog', 'id="delete-blog"');  ?>

                    <input type="text" id="addID" class="hide" name="id" value="">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button> 
                    <button type="submit" class="btn btn-danger" id="update-button">Delete</button>
                </form>
            </div>
          
        </div>
    </div>
</div>




    <!-- ADMIN FOOTER -->
    <footer class="row">
        <p class="col-md-9 col-sm-9 col-xs-12 copyright">&copy; <a href="http://webcoder.co.nz" target="_blank">WebCoder</a> 2012 - 2014</p>

        <p class="col-md-3 col-sm-3 col-xs-12 powered-by">Powered by: <a href="http://webcoder.co.nz">WebCoder</a></p>
    </footer>


    <!-- ADMIN SCRIPTS -->
    <script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>

    <script src="<?php echo base_url('assets/js/bootstrap-datepicker.js'); ?>"></script>

    <script type="text/javascript">
        $( document ).ready(function() {
            $('.datepicker').datepicker()
        });
    </script>

<!-- external javascript -->



<!-- library for cookie management -->
<script src="<?php echo base_url('assets/js/jquery.cookie.js'); ?>"></script>
<!-- calender plugin -->
<script src="<?php echo base_url('assets/bower_components/moment/min/moment.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/bower_components/fullcalendar/dist/fullcalendar.min.js'); ?>"></script>
<!-- data table plugin -->
<script src="<?php echo base_url('assets/js/jquery.dataTables.min.js'); ?>"></script>

<!-- select or dropdown enhancer -->
<script src="<?php echo base_url('assets/bower_components/chosen/chosen.jquery.min.js'); ?>"></script>
<!-- plugin for gallery image view -->
<script src="<?php echo base_url('assets/bower_components/colorbox/jquery.colorbox-min.js'); ?>"></script>
<!-- notification plugin -->
<script src="<?php echo base_url('assets/js/jquery.noty.js'); ?>"></script>
<!-- library for making tables responsive -->
<script src="<?php echo base_url('assets/bower_components/responsive-tables/responsive-tables.js'); ?>"></script>
<!-- tour plugin -->
<script src="<?php echo base_url('assets/bower_components/bootstrap-tour/build/js/bootstrap-tour.min.js'); ?>"></script>
<!-- star rating plugin -->
<script src="<?php echo base_url('assets/js/jquery.raty.min.js'); ?>"></script>
<!-- for iOS style toggle switch -->
<script src="<?php echo base_url('assets/js/jquery.iphone.toggle.js'); ?>"></script>
<!-- autogrowing textarea plugin -->
<script src="<?php echo base_url('assets/js/jquery.autogrow-textarea.js'); ?>"></script>
<!-- multiple file upload plugin -->
<script src="<?php echo base_url('assets/js/jquery.uploadify-3.1.min.js'); ?>"></script>
    

<!-- history.js for cross-browser state change on ajax -->
<script src="<?php echo base_url('assets/js/jquery.history.js'); ?>"></script>
<!-- application script for Charisma demo -->
<script src="<?php echo base_url('assets/js/charisma.js'); ?>"></script>

<script type="text/javascript">

$(document).ready(function() {
    $("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {
        e.preventDefault();
        $(this).siblings('a.active').removeClass("active");
        $(this).addClass("active");
        var index = $(this).index();
        $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
        $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
    });

    $('#myModal').on('shown.bs.modal', function () {
      $('#myInput').focus()
    })

    // get the modal submit buttton to post form
    // $('#update-button').click(function(e){
    //   e.preventDefault();

    //   // alert(
    //   //   $('#img-title').val()
    //   //   );
      
    //   $.post('http://www.nzfishingclub.com/admin/update_slider', 
    //      $('#update-slider').serialize(), 
    //      function(data, status, xhr){
    //        // do something here with response;
    //      });
      
    // });


    // GETS POST DATA FROM THE MODAL USING AJAX
    // VIA DELETE BUTTON
    // this function gets the post data from the modal using ajax
    // http://stackoverflow.com/questions/17508444/how-to-post-the-data-from-a-modal-form-of-bootstrap

    // $('#update-button').on('submit', function(e){
    //     e.preventDefault();
    //     $.ajax({
    //         url: 'http://www.nzfishingclub.com/admin/update_slider', //this is the submit URL
    //         type: 'POST', //or POST
    //         data: $('form').serialize(),
    //         success: function(data){
                
    //             alert('successfully submitted')
    //         }
    //     });
    // });





    // PASSING THE ID TO THE MODAL via the edit button
    $(document).on("click", ".edit-button", function () {
     var ID = $(this).data('id');
     $(".modal-body form #hideID").val( ID );
     // As pointed out in comments, 
     // it is superfluous to have to manually call the modal.
     // $('#addBookDialog').modal('show');
    });


    // PASSING THE ID TO THE MODAL via the delete button
    $(document).on("click", ".delete-button", function () {
     var ID = $(this).data('id');
     $(".modal-footer form #addID").val( ID );
     // As pointed out in comments, 
     // it is superfluous to have to manually call the modal.
     // $('#addBookDialog').modal('show');
    });


});



</script>



</body>
</html>