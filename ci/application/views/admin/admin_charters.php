<!-- Charters Section  -->
<!-- Admin - Charters -->
<!-- In the form below, the administrator can approve a charter listing -->

                <div class="bhoechie-tab-content" id="charters">
                    <center>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 style="margin-top: 0;color:rgb(0,122,191);">Approve Charters</h3>
                                <!-- <h3 class="panel-title">Edit Or Delete A Forum Category</h3> -->
                            </div>
                            <div class="panel-body">
                            <!-- Panel Content Starts Here -->
                            <?php if(isset($charter_app[0]->id)) { ?>
                                <?php echo form_open_multipart('admin/approve_charter?id='.$charter_app[0]->id); ?>
                                    <ul class="list-group">

                                        <?php foreach ($charter_app as $key => $value) {?>
                                          
                                       
                                        <li class="list-group-item">
                                            <div class="input-group ">
                                                <h5><?php echo $value->charter_name; ?></h5>
                                                <!-- <select class="form-control areas" name="approval">
                                                    <option value="0">Awaiting Approval</option>
                                                    <option value="1">Approved</option>
                                                </select> -->

                                                <button type="submit" id="singlebutton" name="singlebutton" class="btn btn-primary">Approve</button>
                                            </div>
                                        </li>

                                        <div class="controls">
                                            
                                        </div>
                                        <?php } ?>


                                      
                                    </ul>

                                    

                                </form>
                                
                                <?php } ?>

                            <!-- Panel Content Ends Here -->
                            </div>
                        </div>


                    </center>
                </div>

