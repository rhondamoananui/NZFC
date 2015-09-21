
<!-- Bite Times Section -->
                <div id="bitetimes" class="bhoechie-tab-content">
                    <center>
                      <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 style="margin-top: 0;color:rgb(0,122,191);">Add A New Bite Time</h3>
                                <!-- <h3 class="panel-title">Edit Or Delete A Forum Category</h3> -->
                            </div>
                            <div class="panel-body">
                            <!-- Panel Content Starts Here -->


                                <?php echo form_open_multipart('admin/bitetimes'); ?>

                                    <div class="row">
                                        <div class="input-group ">
                                            <label class="" id="basic-addon1">Region:</label>
                                            
                                            <select type="select" class="form-control areas" name="region">
                                                <optgroup label="North Island">
                                                                    <option value="1">Northland</option>
                                                                    <option value="2">Auckland</option>
                                                                    <option value="3">Coromandel</option>
                                                                    <option value="4">Waikato</option>
                                                                    <option value="5">Bay Of Plenty</option>
                                                                    <option value="6">Gisborne</option>
                                                                    <option value="7">Hawkes Bay</option>
                                                                    <option value="8">Taranaki</option>
                                                                    <option value="9">Manawatu</option>
                                                                    <option value="10">Wellington</option>
                                                </optgroup>

                                                <optgroup label="South Island">
                                                                    <option class="11">Tasman</option>
                                                                    <option class="12">Nelson</option>
                                                                    <option class="13">Marlborough</option>
                                                                    <option class="14">West Coast</option>
                                                                    <option class="15">Canterbury</option>
                                                                    <option class="16">Otago</option>
                                                                    <option class="17">Southland</option>
                                                                    <option class="18">Invercargill</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                    

                                        <div class="input-append date" id="dp3" data-date="12-02-2012" data-date-format="dd-mm-yyyy">
                                            
                                            <label class="" id="basic-addon1">Date:</label>
                                            <input class="span2 datepicker" size="16" type="text" value="12-05-2015" name="date" >
                                            <!-- <span class="add-on">
                                                <i class="glyphicon glyphicon-th"></i>
                                            </span> -->

                                        </div>
                                    </div>


                                    <div class="input-group">
                                        <label class="" id="basic-addon1">Best time:</label>
                                        <input type="text" name="best_time" class="form-control" placeholder="7am - 9am" >
                                    </div>

                                    <div class="radio">
                                      <label><input type="radio" name="banner" value="0">
                                        <!-- Image here -->

                                        <?php
                                        $image_properties = array(
                                        'src'   => 'assets/img/red-fish.png',
                                        'alt'   => 'Fishing in NZ',
                                        'class' => 'resource-icon',
                                        'title' => 'Fishing in New Zealand',
                                        'rel'   => 'lightbox'
                                        );

                                        
                                            echo img($image_properties);
                                        ?> 

                                      </label>
                                    </div>

                                    <div class="radio">
                                      <label><input type="radio" name="banner" value="1">
                                        <!-- Image Here -->

                                        <?php
                                        $image_properties = array(
                                        'src'   => 'assets/img/blue-fish.png',
                                        'alt'   => 'Fishing in NZ',
                                        'class' => 'resource-icon',
                                        'title' => 'Fishing in New Zealand',
                                        'rel'   => 'lightbox'
                                        );

                                        
                                            echo img($image_properties);
                                        ?> 
                                      </label>
                                    </div>

                                    <div class="radio">
                                      <label><input type="radio" name="banner" value="2">
                                        <!-- Image Here -->

                                        <?php
                                        $image_properties = array(
                                        'src'   => 'assets/img/green-fish.png',
                                        'alt'   => 'Fishing in NZ',
                                        'class' => 'resource-icon',
                                        'title' => 'Fishing in New Zealand',
                                        'rel'   => 'lightbox'
                                        );

                                        
                                            echo img($image_properties);
                                        ?> 
                                      </label>
                                    </div>
                                 

                                    <div class="controls">
                                        <button type="submit" id="singlebutton" name="singlebutton" class="btn btn-primary">Add Bite Time</button>

                                    </div>
                                </form>

                            <!-- Panel Content Ends Here -->
                            </div>
                        </div>
                    </center>
                </div>


    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h3>Settings</h3>
                </div>
                <div class="modal-body">
                    <p>Here settings can be configured...</p>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                    <a href="#" class="btn btn-primary" data-dismiss="modal">Save changes</a>
                </div>
            </div>
        </div>
    </div>





