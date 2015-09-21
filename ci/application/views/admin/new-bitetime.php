<div id="content" class="col-lg-10 col-sm-10">

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-star-empty"></i>Add Bite Times</h2>

                <div class="box-icon">
                    
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    
                </div>
            </div>
            <div class="box-content">
                <!-- put your content here -->

                <form role="form">

                                    <!-- Date Picker -->
                                    <div class="form-group">
                                        <label for="date">Choose Date</label>
                                        <input type="date" class="form-control" id="date" >
                                    </div>



                                    <div class="form-group">
                                        <label for="major1">Best Bite Time</label>
                                        <input type="text" class="form-control" id="major1" placeholder="8:00am - 10:00am">
                                    </div>
                                    <div class="form-group">
                                        <label for="major2">Next Best Bite Time</label>
                                        <input type="text" class="form-control" id="major2" placeholder="6:00am - 8:00am">
                                    </div>
                                    
                                    <!-- Radio Buttons to choose image -->
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="fish" id="red-fish" value="Poor" checked>
                                            <!-- <img src="img/red-fish.png" alt="poor fishing" > -->
                                               <?php
                                                $image_properties = array(
                                                    'src'   => 'ci/assets/img/red-fish.png',
                                                    'alt'   => 'Poor Fishing',
                                                    //'class' => 'post_images',
                                                    'width' => '75',
                                                    'height'=> '30'
                                                    // 'title' => 'That was quite a night',
                                                    // 'rel'   => 'lightbox'
                                                );

                                                echo img($image_properties);
                                                ?>
                                        </label>
                                        <label>
                                            <input type="radio" name="fish" id="blue-fish" value="Average">
                                            <!-- <img src="img/blue-fish.png" alt="average fishing" > -->
                                                <?php
                                                $image_properties = array(
                                                    'src'   => 'ci/assets/img/blue-fish.png',
                                                    'alt'   => 'Poor Fishing',
                                                    //'class' => 'post_images',
                                                    'width' => '75',
                                                    'height'=> '30'
                                                    // 'title' => 'That was quite a night',
                                                    // 'rel'   => 'lightbox'
                                                );

                                                echo img($image_properties);
                                                ?>
                                        </label>
                                        <label>
                                            <input type="radio" name="fish" id="green-fish" value="Excellent">
                                            <!-- <img src="img/green-fish.png" alt="excellent fishing" > -->
                                                <?php
                                                $image_properties = array(
                                                    'src'   => 'ci/assets/img/green-fish.png',
                                                    'alt'   => 'Poor Fishing',
                                                    //'class' => 'post_images',
                                                    'width' => '75',
                                                    'height'=> '30'
                                                    // 'title' => 'That was quite a night',
                                                    // 'rel'   => 'lightbox'
                                                );

                                                echo img($image_properties);
                                                ?>
                                        </label>
                                    </div>
                                    

                                    <div class="control-group">
                                    <label class="control-label" for="selectError">Publish / Save</label>

                                    <div class="controls">
                                        <select id="selectError" data-rel="chosen">
                                            <option>Publish</option>
                                            <option>Save Draft</option>
                                        </select>
                                    </div>
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-default">Submit</button>
                                </form>





            </div>
        </div>
    </div>
</div><!--/row-->