    <div class="resource-main col-lg-10 col-xl-10">  

        <h1 class="resource-headline">FISHING CHARTERS</h1>
        <p class="resource-p">With over 15,000 KM’s of stunning coastline ( the 10th longest in the world) and the 4th largest fishing zone worldwide it’s no wonder over a million kiwis love to get out for a fish every year.</p>
<form method="post" id="formID">
        <div class="select-area">
        <h2><?php 
        if(!isset($region[0]->name)){
        echo '';}else{
            echo $region[0]->name;
        }
        ?></h2>
                                        <!-- <div class="input-group areas"> -->
                                            <!-- <label class="" id="basic-addon1">Region:</label> -->
                                       
                                            <select type="select" class="form-control areas" name="region" id="sel1" onchange="checkAndSubmit()">
                                                <optgroup label="North Island">
                                                                    <option value="0">Select Region</option>
                                                                    <option value="1">Northland</option>
                                                                    <option value="2">Auckland</option>
                                                                    <option value="3">Coromandel</option>
                                                                    <option value="4">Waikato</option>
                                                                    <option value="5">Bay Of Plenty</option>
                                                                    <option value="6">Gisborne - Hawkes Bay</option>
                                                                    <option value="7">Taranaki</option>
                                                                    <option value="8">Manawatu - Whanganui</option>
                                                                    <option value="9">Wellington</option>
                                                                    
                                                </optgroup>

                                                <optgroup label="South Island">
                                                                    <option value="10">Nelson - Marlborough</option>
                                                                    <option value="11">West Coast</option>
                                                                    <option value="12">Canterbury</option>
                                                                    <option value="13">Otago</option>
                                                                    <option value="14">Southland</option>

                                                </optgroup>
                                            </select>
                                        
    </div>
</form>

<?php 
if(!isset($charter)){
    echo '';
}else{
foreach ($charter as $key => $value) { ?>

        <div class="list-group col-lg-4 col-md-4 col-sm-6 grey-border">
          <a href="#" class="list-group-item  charter-groups">
            <?php echo $value->charter_name ?>
          </a>

                   
		  	           <?php
                            $image_properties = array(
                            'src'   => 'assets/img/charter/'.$value->filename,
                            'alt'   => 'NZ Fishing Club',
                            'class' => 'list-group-item charter-img',
                            // 'width' => '290',
                            'height'=> '250',
                            'title' => 'profile photos'
                        );

                        echo img($image_properties);
                        ?>
                  
           

            <div class="list-group-item charter-contact">
                <?php  if($value->region_id == 1){
                    echo '<h3 class="remove-top-margin">Northland</h3>'; 
                }elseif ($value->region_id == 2) {
                    echo '<h3 class="remove-top-margin">Auckland</h3>';
                }elseif ($value->region_id == 3) {
                    echo '<h3 class="remove-top-margin">Coromandel</h3>';
                }elseif ($value->region_id == 4) {
                    echo '<h3 class="remove-top-margin">Waikato</h3>';
                }elseif ($value->region_id == 5) {
                    echo '<h3 class="remove-top-margin">Bay Of Plenty</h3>';
                }elseif ($value->region_id == 6) {
                    echo '<h3 class="remove-top-margin">Gisborne - Hawkes Bay</h3>';
                }elseif ($value->region_id == 7) {
                    echo '<h3 class="remove-top-margin">Taranaki</h3>';
                }elseif ($value->region_id == 8) {
                    echo '<h3 class="remove-top-margin">Manawatu - Whanganui</h3>';
                }elseif ($value->region_id == 9) {
                    echo '<h3 class="remove-top-margin">Wellington</h3>';
                }elseif ($value->region_id == 10) {
                    echo '<h3 class="remove-top-margin">Nelson - Marlborough</h3>';
                }elseif ($value->region_id == 11) {
                    echo '<h3 class="remove-top-margin">West Coast</h3>';
                }elseif ($value->region_id == 12) {
                    echo '<h3 class="remove-top-margin">Canterbury</h3>';
                }elseif ($value->region_id == 13) {
                    echo '<h3 class="remove-top-margin">Otago</h3>';
                }elseif ($value->region_id == 14) {
                    echo '<h3 class="remove-top-margin">Southland</h3>';
                }

                ?>
                <p class="resource-p"><?php echo substr($value->description, 0, 140).'...' ?></p>
        
                


                <div class="charter-button">
                    <?php echo anchor('resources/fishing_charter?id='.$value->id, 'More', 'class="btn btn-primary more-button btn-1"'); ?>

                </div>
            </div>
		    
        </div>

<?php } 
}
?>

 

        <div class="col-lg-9">
            <p>Add Your <?php echo anchor(base_url('resources/new_charter'),'Charter Listing'); ?></p>
        </div>
        
    </div> 

</section>
