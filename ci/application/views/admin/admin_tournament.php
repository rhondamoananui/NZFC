<!-- Tournament Section -->
<!-- This Form approves each tournament -->
<!-- Once a listing has been approved, the listing will show on the website -->
                <div class="bhoechie-tab-content">
                    <center>
                      <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 style="margin-top: 0;color:rgb(0,122,191);">Approve Tournaments</h3>
                                <!-- <h3 class="panel-title">Edit Or Delete A Forum Category</h3> -->
                            </div>
                            <div class="panel-body">
                            <!-- Panel Content Starts Here -->

                                <?php if(isset($tournament_app[0]->id)) { ?>
                                    <?php echo form_open_multipart('admin/approve_tournament?id='.$tournament_app[0]->id); ?>
                                        <ul class="list-group">

                                            <!-- Approve each tournament form -->
                                            <?php foreach ($tournament_app as $key => $value) { ?>
                                               
                                            
                                                <li class="list-group-item">
                                                    <div class="input-group ">
                                                        <h5><?php echo $value->tournament_name; ?></h5>
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
                

