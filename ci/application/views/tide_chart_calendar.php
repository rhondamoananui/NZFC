<div class="resource-main col-lg-10 col-xl-10">
   
<?php


// $data = array(
//       'show_next_prev'  => TRUE,
//       'next_prev_url'   => 'http://www.nzfishingclub.com/resources/calendar',
//       'ajax_req'        => TRUE,
//         3  => 'http://example.com/news/article/2006/03/',
//         7  => 'http://example.com/news/article/2006/07/',
//         13 => 'http://example.com/news/article/2006/13/',
//         26 => 'http://example.com/news/article/2006/26/'
// );


echo '<h1 class="resource-headline">TIDE TIMES</h1>';
echo '<p class="resource-p">With over 15,000 KM’s of stunning coastline ( the 10th longest in the world) and the 4th largest fishing zone worldwide it’s no wonder over a million kiwis love to get out for a fish every year.</p>';
?>


	<div class="select-area">
		<h2>Auckland Tidal Times</h2>
		<select class="form-control areas">
			<optgroup label="North Island">
			    <option value="northland">Northland</option>
                <option value="auckland">Auckland</option>
                <option value="coromandel">Coromandel</option>
                <option value="waikato">Waikato</option>
                <option value="bop">Bay Of Plenty</option>
                <option value="gisborne">Gisborne</option>
                <option value="hawkes-bay">Hawkes Bay</option>
                <option value="taranaki">Taranaki</option>
                <option value="manawatu">Manawatu</option>
                <option value="wellington">Wellington</option>
			</optgroup>

			<optgroup label="South Island">
			    <option class="tasman">Tasman</option>
                <option class="nelson">Nelson</option>
                <option class="marlborough">Marlborough</option>
                <option class="west-coast">West Coast</option>
                <option class="canterbury">Canterbury</option>
                <option class="otago">Otago</option>
                <option class="southland">Southland</option>
                <option class="invercargill">Invercargill</option>
			</optgroup>
		</select>
	</div>

<?php
echo $this->calendar->generate($this->uri->segment(3), $this->uri->segment(4));
?>

</div>

</section>