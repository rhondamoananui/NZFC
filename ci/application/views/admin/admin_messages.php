<!-- Message Section -->
<!-- This page displays all the messages for the admin to read -->
<!-- The admin will either mark the message as read (hide the message) -->
<!-- OR reply to the message using the mailto: button -->
                <div class="bhoechie-tab-content">
                    <center>
                      <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 style="margin-top: 0;color:rgb(0,122,191);">Messages</h3>
                            </div>
                            <div class="panel-body">
                            <!-- Panel Content Starts Here -->

                            <!-- this if statement stops errors from showing, when there are no messages to display -->
                            <!-- Only do the following if there is a message to read -->
                            <?php if(isset($message[0]->id)) { ?>

                                <!-- Open a form  - the forms action is to go to the read_message function in the admin controller -->
                                <!-- The read message function will update the database, changing column read from 0 (not read yet) to 1 (has been read) -->
                                <?php echo form_open_multipart('admin/read_message?id='.$message[0]->id); ?>
                                    
                                    <ul class="list-group">

                                        <!-- Loop through each message and display them -->
                                        <?php foreach ($message as $key => $value) { ?>
                                        

                                            <li class="list-group-item">
                                                <div class="input-group ">
                                                    
                                                    <!-- Display Each Message -->
                                                    <!-- nl2br = display the message with breaks and new lines -->
                                                    <p><?php echo nl2br($value->message); ?></p>

                                                    <!-- Mark As Read Button -->
                                                    <button id="singlebutton" name="singlebutton" class="btn btn-primary">Mark As Read</button>

                                                    <!-- Mailto: Button -->
                                                    <?php echo mailto($value->sender_email, 'Send A Message', 'class="btn btn-primary"'); ?>
                                      
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

            </div>
        </div>
  </div>
</div>
            
