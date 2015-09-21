<!-- <div class="moon-calendar">
	<script language="JavaScript" type="text/javascript">var _imc_w="2000"; var _imc_bgp="#ffffff"; var _imc_hs="s";</script><script language="JavaScript" type="text/javascript" src="http://www.imooncal.com/cs/mc.js?ln=14187270246032201"></script>
</div> -->

<div class="resource-main col-lg-10 col-xl-10">
   
<?php


$data = array(
      'show_next_prev'  => TRUE,
      'next_prev_url'   => 'http://www.nzfishingclub.com/resources/calendar',
      'ajax_req'        => TRUE,
        3  => 'http://example.com/news/article/2006/03/',
        7  => 'http://example.com/news/article/2006/07/',
        13 => 'http://example.com/news/article/2006/13/',
        26 => 'http://example.com/news/article/2006/26/'
);


echo '<h1 class="resource-headline">MOON PHASE CALENDAR</h1>';
echo '<p class="resource-p">With over 15,000 KM’s of stunning coastline ( the 10th longest in the world) and the 4th largest fishing zone worldwide it’s no wonder over a million kiwis love to get out for a fish every year.</p>';

echo $this->calendar->generate($this->uri->segment(3), $this->uri->segment(4));
?>

</div>

</section>