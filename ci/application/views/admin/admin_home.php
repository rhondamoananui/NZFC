
<!-- Home section -->
                <div class="bhoechie-tab-content active">
                    <center>
                    
<!-- UPDATE THE HOME PAGE -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 style="margin-top: 0;color:rgb(0,122,191);">Update Home Page</h3>
                              
                            </div>
                            <div class="panel-body">
                            <!-- Panel Content Starts Here -->

                                

                                <form method="post">
                                    <div class="input-group ">
                                        <label class="control-label" id="basic-addon1">Page Title:</label>
                                        <input type="text" name="pagetitle" class="form-control" placeholder="NZ Fishing club" ><!-- aria-describedby="basic-addon1" -->
                                    </div>

                                    <div class="input-group">
                                        <label class="control-label" id="basic-addon1">Meta Description:</label>
                                        <input type="text" name="metadescription" class="form-control" placeholder="add a description that clearly descibes the page keep it to 140 characters" ><!-- aria-describedby="basic-addon1" -->
                                    </div>

                                    <div class="input-group">
                                        <label class="control-label" id="basic-addon1">Headline:</label>
                                        <input type="text" name="headline" class="form-control" placeholder="New Zealand Fishing Club - Join Us Today!" ><!-- aria-describedby="basic-addon1" -->
                                    </div>

                                    <div class="control-group ">
                                        <label class="control-label" id="basic-addon1">Article Content:</label>
                                        <textarea class="form-control" name="content" id="message-text"></textarea>      
                                    </div>
                                    <div class="controls">
                                        <button type="submit" id="singlebutton" name="singlebutton" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                               
                            </div>
                        </div>

<!-- ADD A SLIDER IMAGE -->
<!-- this is working -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 style="margin-top: 0;color:rgb(0,122,191);">Add A Slider Image</h3>
                                
                              
                            </div>
                            <div class="panel-body">
                            <!-- Panel Content Starts Here -->
                                <p class="red">* Slider Images must be 1000px x 384px</p>



                              <?php echo form_open_multipart('admin/slider_upload'); ?>


                                    <div class="input-group">
                                        <input id="filebutton" name="userfile" class="input-file form-control" type="file">
                                    </div>

                                    <div class="input-group ">
                                        <label class="" id="basic-addon1">Caption:</label>
                                        <input type="text" class="form-control" placeholder="NZ Fishing club" name="img_title">
                                    </div>

                                    <div class="input-group">
                                        <label class="" id="basic-addon1">Alt Text:</label>
                                        <input type="text" class="form-control" placeholder="add a description that clearly descibes the page keep it to 140 characters" name="alt_text">
                                    </div>

                                    <div class="input-group">
                                        <button type="submit"  id="singlebutton" name="singlebutton" class="btn btn-primary">Add Image</button>
                                    </div>
                                </form>


                                </div>
                            </div>




<!-- UPDATE OR DELETE A SLIDER IMAGE -->
<!-- the modal for the edit and delete buttons are located on the footer view -->

                    <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 style="margin-top: 0;color:rgb(0,122,191);">Update Or Delete A Slider Image</h3>
                            </div>
                            <div class="panel-body">
                            <!-- Panel Content Starts Here -->
                        

                            <ul class="bxslider">

                                <!-- Loop and display all slider images -->
                                <?php foreach ($slider as $key => $value) { ?>
                                    
                                    <!-- this code relates to the image that will be edited or deleted -->
                                    <li class="slider-list">
                                        <?php
                                            $image_properties = array(
                                            'src'   => 'assets/img/slider/'.$value->filename,
                                            'alt'   => 'Fishing Tournaments',
                                            'class' => 'post_images',
                                            'width' => '50%',
                                            'title' => 'Fishing in New Zealand',
                                            'rel'   => 'lightbox'
                                            );

                                            echo img($image_properties);
                                            
                                        ?>

                                        <div class="controls">
                                            
                                            <!-- Edit Button -->
                                            <!-- PASS THE ID OF THE IMAGE ABOVE TO THE MODAL -->
                                            <!-- the data id is added to the modal via jquery -->
                                            <!-- jquery passes the id to the modal as an input value -->
                                            <!-- the input value then becomes post data on submit -->
                                            <!-- Large modal is located on the footer view-->
                                            <button type="button" class="btn btn-success edit-button" data-id=<?php echo '"'.$value->id.'"'; ?> data-toggle="modal" data-target=".bs-example-modal-lg">Edit</button>
                                            
                                            <!-- Delete Button -->
                                            <!-- Small modal is located on the footer view -->
                                            <button type="button" class="btn btn-danger delete-button" data-id=<?php echo '"'.$value->id.'"'; ?> data-toggle="modal" data-target=".bs-example-modal-sm">Delete</button>
                                        </div>

                                    </li>


                                <?php } ?>


                               
                            </ul>
                        <!-- Panel Content Ends Here -->
                        </div>
                    </div>

                    </center>
                    
                </div>



