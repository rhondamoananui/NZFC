    <div class="resource-main col-lg-10 col-xl-10">  

        <h1 class="resource-headline">FISHING TOURNAMENTS</h1>
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
                                                                    <option class="11">West Coast</option>
                                                                    <option class="12">Canterbury</option>
                                                                    <option class="13">Otago</option>
                                                                    <option class="14">Southland</option>

                                                </optgroup>
                                            </select>
                                        
    </div>
</form>

<?php 
if(!isset($tournament)){
    echo '';
}else{
foreach ($tournament as $key => $value) { ?>

        <div class="list-group col-lg-4 col-md-4 col-sm-6 grey-border">
          <a href="#" class="list-group-item  charter-groups">
            <?php echo $value->tournament_name ?>
          </a>


           <!-- <a href="#" class=" "> -->
                       <?php
                            $image_properties = array(
                            'src'   => 'assets/img/tournament/'.$value->main_img,
                            'alt'   => 'NZ Fishing Club',
                            'class' => 'list-group-item charter-img',
                            //'width' => '100%',
                            'height'=> '250',
                            'title' => 'profile photos'
                        );

                        echo img($image_properties);
                        ?>
           <!--  </a> -->
            <div class="list-group-item charter-contact">
                <p class="resource-p"><?php echo substr($value->description, 0, 300).'...' ?></p>
        
                


                <div class="charter-button">
                    <?php echo anchor('resources/tournament?id='.$value->id, 'More', 'class="btn btn-primary more-button"'); ?>

                </div>
            </div>
            
        </div>

<?php } 
}
?>



       <!--  -->
            
        

        <div class="col-lg-9">
            <p>Add Your <?php echo anchor(base_url('resources/new_tournament'),'Tournament Listing'); ?></p>
        </div>
        
    </div> 

</section>
