<!-- Add A Forum -->
<!-- This section adds a new category to the forum -->
<!-- To Edit the category, scroll down -->
                <div class="bhoechie-tab-content">
                    <center>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 style="margin-top: 0;color:rgb(0,122,191);">Add A Forum Category</h3>
                            </div>
                            <div class="panel-body">
                            <!-- Panel Content Starts Here -->


                                <!-- This Form Adds A New Category and Description to the Forum -->
                                <!-- Only an Administrator can add Forum Categories -->
                                <?php echo form_open_multipart('admin/forum'); ?>
                                    <div class="input-group">
                                        <label class="" id="basic-addon1">New Category:</label>
                                        <input type="text" class="form-control" placeholder="Long Line Fishing" name="category">
                                    </div>

                                    <div class="input-group">
                                        <label class="" id="basic-addon1">Description:</label>
                                        <input type="text" class="form-control" placeholder="Long Line Fishing" name="description">
                                    </div>

                                    <div class="controls">
                                        <button type="submit" id="singlebutton" name="singlebutton" class="btn btn-primary">Add Category</button>
                                    </div>
                                </form>

                                


                            <!-- Panel Content Ends Here -->
                            </div>
                        </div>

                        
<!-- Edit Or Delete a Forum Category -->
<!-- When the edit button is clicked the edit form shows on a modal -->
<!-- The id for the object that is being edited, will be passed via the data attribute on the edit button -->
<!-- Jquery takes this data attribute and converts it to an input value, that gets passed back to the controller as post data -->
<!-- This is Working -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 style="margin-top: 0;color:rgb(0,122,191);">Edit Or Delete A Forum Category</h3>
                            </div>
                            <div class="panel-body">
                            <!-- Panel Content Starts Here -->

                                        <ul class="list-group">

                                            <?php foreach ($category as $key => $value) { ?>

                                       
                                            <li class="list-group-item">

                                                    <h5><?php echo $value->category; ?></h5>
                                                    <div class="controls">
                                                        <button type="button" class="btn btn-success edit-button" data-id=<?php echo '"'.$value->id.'"'; ?> data-toggle="modal" data-target=".forum-categ">Edit</button>
                                            
                                                        <button type="button" class="btn btn-danger delete-button" data-id=<?php echo '"'.$value->id.'"'; ?> data-toggle="modal" data-target=".delete-forum-category">Delete</button>
                                                    </div> 
                                            </li>

                                            <?php } ?>


                                        </ul>
                                        
                        
                            <!-- Panel Content Ends Here -->
                            </div>
                        </div>
                        


                    </center>
                </div>




