<?php
$y = $year;
$m = $month;
echo date('Y M d h:i:s', strtotime('now'));     // to show a constant time during AJAX calls
echo '<div id="calBox">';
echo $this->calendar->generate($year,$month);
?>
</div>
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="http://webconsultant.co.nz/jslibs/jquery-1.11.1.min.js"><\/script>')</script>
<script src="<?php echo base_url(); ?>assets/js/js.js"></script>