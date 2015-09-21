<h3>Enter date and position</h3>

<form action="bitetime_calculator" method = "post">
<p>Year (yyyy) : <input type="int" name="pyear" value = <?php echo $year;?> /></p>
<p>Month (mm) : <input type="text" name="pmonth" value = <?php echo $month;?> /></p>
<p>Day (dd) : <input type="text" name="pday" value = <?php echo $day;?> /></p>
<p>Longitude ( - is west ) : <input type="text" name="long" value = <?php echo $underlong;?> /></p>
<p>Latitude ( - is south ) : <input type="text" name="lat" value = <?php echo $lat;?> /></p>
<p>Time zone offset : <input type="text" name="tz" value = "-5" /></p>
<p><input type="submit" /></p>

</form>

<hr>


<?php
/*********************************************************************/	
/* Here is an example results header
 */
echo"<h3>Results</h3>";
echo "Solunar Data for $year / $month / $day, position: ";
if ($lat < 0){
$lat1 = 0 - $lat;
echo round($lat1,2);
echo "S/";
}else{
echo round($lat,2);
echo "N/";
}
if ($underlong < 0){
$long1 = 0 - $underlong;
echo round($long1,2);
echo "W";
}else{
echo round($long,2);
echo "E";
}
?>

	
<?php




/*********************************************************************/
/*
 * RAW DATA DUMP
 */
	echo"<hr>";
	echo"<h3>Raw data</h3>";
	echo "julian date = $JD";
	echo "<br>moonrise = $moonrise";
	echo "<br>moontransit = $moontransit";
	echo "<br>moonunder = $moonunder";
	echo "<br>moonset = $moonset";
	echo "<br>sunrise = $sunrise";
	echo "<br>suntransit = $suntransit";
	echo "<br>sunset = $sunset";
	echo "<br>minor 1 start = $minorstart1";
	echo "<br>minor 1 stop = $minorstop1";
	echo "<br>minor 2 start = $minorstart2";
	echo "<br>minor 2 stop = $minorstop2";
	echo "<br>major 1 start = $majorstart1";
	echo "<br>major 1 stop = $majorstop1";
	echo "<br>major 2 start = $majorstart2";
	echo "<br>major 2 stop = $majorstop2";
	echo "<br>soldayscale = $soldayscale";
	echo "<br>phasedayscale = $phasedayscale";
	//daily action is the sum of $soldayscale and $phasedayscale
	echo "<br>daily action is a sum = $soldayscale + $phasedayscale";
	echo "<br>moonage in days = $moonage";
	echo "<br>moon illumination = $illumin";
	echo "<br>moonphase name = $PhaseName";

//thats it were done
?>
</body>
<script type="text/javascript">
   
$(document).ready(function(){


       
});
</script>
</html>


