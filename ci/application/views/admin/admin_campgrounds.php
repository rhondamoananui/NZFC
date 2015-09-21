<!-- Campgrounds Section -->
<!-- This Form Approves each of the Campground listing -->
<!-- It first gets all the listings that havent been approved, and displays them -->
<!-- Once the listing has been approved, it will show on the website -->
                <div class="bhoechie-tab-content">
                    <center>
                      <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 style="margin-top: 0;color:rgb(0,122,191);">Approve Campgrounds</h3>
                            </div>
                            <div class="panel-body">
                                
                            <!-- Panel Content Starts Here -->
                                <?php if(isset($campground_app[0]->id)) { ?>
                                    
                                    <?php echo form_open_multipart('admin/approve_campground?id='.$campground_app[0]->id); ?>
                                        
                                        <ul class="list-group">

                                            <?php foreach ($campground_app as $key => $value) { ?>
                                               
                                            
                                                <li class="list-group-item">
                                                    <div class="input-group ">
                                                        <h5><?php echo $value->campground_name; ?></h5>
                                                        <button id="singlebutton" name="singlebutton" class="btn btn-primary">Approve</button>                                                    
                                                    </div>
                                                </li>

                                            <?php } ?>


                                        </ul>

                                    </form>

                                <?php } ?>

                            <!-- Panel Content Ends Here -->
                            </div>
                        </div>

                    </center>
                </div>

