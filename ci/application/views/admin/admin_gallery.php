<!-- Photo Gallery section -->
<!-- Upload an Image adding its info to the database table -->
<!-- This is working -->
                <div class="bhoechie-tab-content">
                    <center>
                    
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 style="margin-top: 0;color:rgb(0,122,191);">Add An Image To The Gallery</h3>
                                <!-- <h3 class="panel-title">Edit Or Delete A Forum Category</h3> -->
                            </div>
                            <div class="panel-body">
                            <!-- Panel Content Starts Here -->

                                <?php //echo $error; ?>
                                <?php echo form_open_multipart('admin/gallery_upload'); ?>
                                    <div class="controls">
                                       <input type="file" name="userfile" size="20" />
                                    </div>

                                    <div class="input-group ">
                                        <label class="" id="basic-addon1">Image Title:</label>
                                        <input type="text" name="image-title" class="form-control" placeholder="NZ Fishing club" > <!-- aria-describedby="basic-addon1" -->
                                    </div>

                                    <div class="input-group">
                                        <label class="" id="basic-addon1">Alt Text:</label>
                                        <input type="text" name="alt-text" class="form-control" placeholder="add a description that clearly descibes the page keep it to 140 characters" > <!-- aria-describedby="basic-addon1" -->
                                    </div>

                                    <div class="input-group">
                                        <label class="" id="basic-addon1">Caption:</label>
                                        <input type="text" name="caption" class="form-control" placeholder="New Zealand Fishing Club - Join Us Today!" > <!-- aria-describedby="basic-addon1" -->
                                    </div>

                                    <div class="controls">
                                        <button type="submit" value="upload" class="btn btn-primary">Add Image</button>
                                    </div>
                                </form>

                            <!-- Panel Content Ends Here -->
                            </div>
                        </div>



<!-- Edit or Delete a Photo -->
<!-- Click on Edit button to activate the modal -->
<!-- The modal is located on the admin/footer view -->
<!-- The update form is on the modal -->
<!-- The modal uses js to post the form data -->

<!-- this form is working -->

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 style="margin-top: 0;color:rgb(0,122,191);">Edit Or Delete An Image</h3>
                            </div>
                            <div class="panel-body">
                            <!-- Panel Content Starts Here -->


                            <ul class="gallery-thumbs"> 

                                <?php foreach ($gallery as $key => $value) { ?>
                                    
                              
                                <li class=" thumb-list col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                        
                                <?php
                                    $image_properties = array(
                                    'src'   => 'assets/img/gallery/'.$value->filename,
                                    'alt'   => 'Fishing in NZ',
                                    'class' => 'resource-icon',
                                    //'width' => '150',
                                    'height'=> '150',
                                    'title' => 'Fishing in New Zealand',
                                    'rel'   => 'lightbox'
                                    );

                                
                                            
                                    echo img($image_properties);
                                    ?> 

                                    <div class="controls">
                                        <button type="button" class="btn btn-success edit-button" data-id=<?php echo '"'.$value->id.'"'; ?> data-toggle="modal" data-target=".edit-photo">Edit</button>
                                            
                                        <button type="button" class="btn btn-danger delete-button" data-id=<?php echo '"'.$value->id.'"'; ?> data-toggle="modal" data-target=".delete-gallery-image">Delete</button>
                                    </div>  
                                </li>
                                <?php } ?>  
                                
                               
                                
                            </ul>
                        </div>
                    </div>
                        
            
                    </center>
                </div>
    

