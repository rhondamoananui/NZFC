<!-- Add A New Blog -->
<!-- this section has the form for adding a new blog -->
<!-- scroll down for the edit & delete form -->
                <div class="bhoechie-tab-content">
                    <center>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 style="margin-top: 0;color:rgb(0,122,191);">Add A New Blog</h3>
                                <!-- <h3 class="panel-title">Edit Or Delete A Forum Category</h3> -->
                            </div>
                            <div class="panel-body">
                            <!-- Panel Content Starts Here -->


                            <?php echo form_open_multipart('admin/blog_upload'); ?>
                                    <div class="input-group ">
                                        <label class="" id="basic-addon1">Page Title:</label>
                                        <input type="text" class="form-control" placeholder="NZ Fishing club" name="page_title">
                                    </div>

                                    <div class="input-group">
                                        <label class="" id="basic-addon1">Meta Description:</label>
                                        <input type="text" class="form-control" placeholder="add a description that clearly descibes the page keep it to 140 characters" name="meta_desc">
                                    </div>

                                    <div class="input-group">
                                        <label class="" id="basic-addon1">Headline:</label>
                                        <input type="text" class="form-control" placeholder="New Zealand Fishing Club - Join Us Today!" name="headline">
                                    </div>

                                    <div class="control-group ">
                                        <label class="control-label" id="basic-addon1">Article Content:</label>
                                        <textarea class="form-control" name="content" id="message-text"></textarea>      
                                    </div>

                                    <div class="input-group">
                                        <label class="control-label" id="basic-addon1">Blog Image:</label>
                                        <input id="filebutton" name="userfile" class="input-file form-control" type="file">
                                    </div>

                                    <div class="controls">
                                        <button type="submit" id="singlebutton" name="singlebutton" class="btn btn-primary">Add Blog</button>
                                    </div>
                                </form>

                            <!-- Panel Content Ends Here -->
                            </div>
                        </div>


<!-- Edit or Delete A Blog -->
<!-- the edit button triggers the modal to pop up -->
<!-- The id is passed to js via the buttons data attribute -->
<!-- jquery converts the id and passes it to the modal as an input value -->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 style="margin-top: 0;color:rgb(0,122,191);">Edit Or Delete A Blog</h3>
                                    </div>
                                    <div class="panel-body">
                                    <!-- Panel Content Starts Here -->

                                
                                        <ul class="list-group">
                                            <?php foreach ($blog as $key => $value) { ?>
                                             
                                          
                                            <li class="list-group-item">
                                                    <h5><?php echo $value->headline; ?></h5>
                                                    <div class="controls">
                                                        <button type="button" class="btn btn-success edit-button" data-id=<?php echo '"'.$value->id.'"'; ?> data-toggle="modal" data-target=".edit-blog">Edit</button>
                                                        <button type="button" class="btn btn-danger delete-button" data-id=<?php echo '"'.$value->id.'"'; ?> data-toggle="modal" data-target=".delete-blog">Delete</button>
                                                    </div> 
                                            </li>
                                            <?php  } ?>


                                        </ul>
                                        

                            <!-- Panel Content Ends Here -->
                            </div>
                        </div>

                            

                      
                    </center>
                </div>



