<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Resources extends CI_Controller {
	public function __construct()
	{
		// Call the CI_Model Constructor
		parent::__construct();
		session_start();
		$this->load->model('Resource_model');
        $this->load->helper('form');
        $this->load->library('form_validation');


        // For development only
        //---------------------------------------------------------------
        $this->output->enable_profiler(TRUE);   
        //---------------------------------------------------------------

	}
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

// -------------------------------------------------------------------------------------------

//                          Bite times Calculator

// -------------------------------------------------------------------------------------------

public function bite_calculator()
  {
    $this->load->helper('path');
    $this->load->helper('date');
    
    

    $this->load->view('resources/head_calc');
    /*********************************************************************/ 
    /* Here is an example of how to get the users inputs from a form
     * that is pre-loaded with todays date
     */

    $post = array(
                'pyear' => $this->input->post('pyear'),
                'pmonth' => $this->input->post('pmonth'),
                'pday' => $this->input->post('pday'),
                'tz' => $this->input->post('tz'),
                'lat' => $this->input->post('lat'),
                'long' => $this->input->post('long')
            );
    


    if ($post == FALSE) {
    //  no post yet so use default values
      $year = mdate("Year: %Y ");
      $month = mdate('Month: %m');
      $day = mdate('Day: %d '); 
      $tz = -5;
      $lat = 40.5;
      $underlong = -80.5;
      }
      else {
    //  use post values
      $year = (int)$post['pyear'];
      $month = (int)$post['pmonth'];
      $day = (int)$post['pday'];
      $tz = (int)$post['tz'];
      $lat = (float)$post['lat'];
      $underlong = (float)$post['long'];
      }
      $UT = 0.0;

      $this->load->view('resources/bitetime-calculator');

    /*********************************************************************/
/* HERE IS WHAT YOU WANT!!!!
 * 
 * The folowing function calls are all you need to get the RAW data
 * These function calls require the following variables to already be
 * set: $year, $month, $day, $tz, $lat, $underlong, $UT
 * 
 * $year -> year part of date we will calculate for in yyyy format. example 2008
 * &month -> month part of date we will calculate for in mm format. example 2 or 02
 * $day -> day part of date we will calculate for in dd format. example 2 or 02
 * $tz -> timezone offset to calculate results in. example -5 for EST
 * $lat -> latitude (NEGATIVE NUMBERS ARE WEST)
 * $underlong -> longitude  (NEGATIVE NUMBERS ARE SOUTH)
 * $UT = 0.0, Universal time, keep this set at zero, its for the julian
 * date calculations, for our purposes we only need the julian date at
 * the start of the day, however  I might change that in later versions.
 * 
/*********************************************************************/
//get dates 
  $JD = $this->get_Julian_Date ($year, $month, $day, $UT);
  $date = ($JD - 2400000.5 - ($tz/24.0));
/*********************************************************************/ 
//get rise, set and transit times for moon and sun
  get_rst  (1, $date, 0.0 - $underlong , $lat, $sunrise, $sunset, $suntransit);
  get_rst  (0, $date, 0.0 - $underlong, $lat, $moonrise, $moonset, $moontransit);
  $moonunder = get_underfoot($date, $underlong);
/*********************************************************************/
//get solunar minor periods
  sol_get_minor1($minorstart1, $minorstop1, $moonrise);
  sol_get_minor2($minorstart2, $minorstop2, $moonset);
/*********************************************************************/
//get solunar major periods
  sol_get_major1 ($majorstart1, $majorstop1, $moontransit);
  sol_get_major2 ($majorstart2, $majorstop2, $moonunder);
/*********************************************************************/
//get moon phase 
  $moonage = get_moon_phase ($JD, $PhaseName, $illumin);
/*********************************************************************/
//get day scale
  $phasedayscale = phase_day_scale ($moonage);
  $soldayscale = sol_get_dayscale ($moonrise, $moonset, $moontransit, $sunrise, $sunset);

  /*********************************************************************/
/* at this point we have raw data times in decimal
 * time format. 
*/
/*********************************************************************/
/*
 * Here is an example on how to convert the results to 
 * a human readable format and display using 
 * functions:  convert_time_to_string() and 
 * display_event_time()
 * 
 * scroll down further to the end of this source to see all our raw data variables
*/
  echo "<h4>Moon</h4>";
  //set the event title:
  $event = sprintf("rise =");
  //call function to display event and time
  display_event_time($moonrise, $event);
  $event = sprintf("transit =");
  display_event_time($moontransit, $event);
  $event = sprintf("set =");
  display_event_time($moonset, $event);
  echo "<br>Phase is $PhaseName, ";
  $illumin = $illumin*100;
  echo round($illumin, 1);
  echo "% illuminated, ";
  echo round($moonage, 1);
  echo " days since new.";
  echo "<h4>Sun</h4>";
  $event = sprintf("rise = ");
  display_event_time($sunrise, $event);
  $event = sprintf("transit =");
  display_event_time($suntransit, $event);
  $event = sprintf("set =");
  display_event_time($sunset, $event);
  
  echo "<h4> Minor Periods</h4>";
  //display earlier minor time first, minor 1 is based on moonset, minor2 on moonrise
  if (moonrise > moonset){
    
    $event = sprintf("");
    display_event_time($minorstart1, $event);
    $event = sprintf(" -");
    display_event_time($minorstop1, $event);
    echo "<br>";
    $event = sprintf("");
    display_event_time($minorstart2, $event);
    $event = sprintf(" -");
    display_event_time($minorstop2, $event);
    }
  else {
    
    $event = sprintf("");
    display_event_time($minorstart2, $event);
    $event = sprintf(" -");
    display_event_time($minorstop2, $event);
    echo "<br>";
    $event = sprintf("");
    display_event_time($minorstart1, $event);
    $event = sprintf(" -");
    display_event_time($minorstop1, $event);
    }
    
  echo "<h4> Major Periods</h4>";
  //display earlier major time first
  if (moontransit < 9.5){
    $event = sprintf("");
    display_event_time($majorstart1, $event);
    $event = sprintf(" -");
    display_event_time($majorstop1, $event);
    echo "<br>";
    $event = sprintf("");
    display_event_time($majorstart2, $event);
    $event = sprintf(" -");
    display_event_time($majorstop2, $event);
    }
  else {
    $event = sprintf("");
    display_event_time($majorstart2, $event);
    $event = sprintf(" -");
    display_event_time($majorstop2, $event);
    echo "<br>";
    $event = sprintf("");
    display_event_time($majorstart1, $event);
    $event = sprintf(" -");
    display_event_time($majorstop1, $event);
    }
    
    echo "<h4>Daily Action Rating</h4>";
    $dayscale = 0;
    $dayscale = ($soldayscale + $phasedayscale);
    echo "Todays action is rated a $dayscale (scale is 0 thru 5, 5 is the best)";


  }
/*
 *      solunar.php
 *
 *
 *      This program is free software; you can redistribute it and/or modify
 *      it under the terms of the GNU General Public License as published by
 *      the Free Software Foundation; either version 2 of the License, or
 *      (at your option) any later version.
 *
 *      This program is distributed in the hope that it will be useful,
 *      but WITHOUT ANY WARRANTY; without even the implied warranty of
 *      MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *      GNU General Public License for more details.
 *
 *      You should have received a copy of the GNU General Public License
 *      along with this program; if not, write to the Free Software
 *      Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.
 */

/*functions*/
/*********************************************************************/
function get_Julian_Date ($year, $month, $day, $UT)
/* calculates Julian Day */
{
  $a = floor(($month + 9)/12);
  $b = floor((7 * ($year + $a))/4);
  $c = floor((275 * $month)/9);
  $d = 367 * $year - $b + $c + $day + 1721013.5 + $UT/24;
  $e = (100 * $year + $month - 190002.5);
  $f = $e/abs($e);
  $locJD = ($d - 0.5 * $f + 0.5);
    
  return $locJD;


}
/*********************************************************************/
function ipart ($x)
//returns the true integer part, even for negative numbers
{
  if ($x!=0) {
$a = $x/abs($x) * floor(abs($x));
}
else {
  $a = 0;
}
return $a;
}
/*********************************************************************/
function fpart ($x)
//returns fractional part of a number
{
$x = $x - floor($x);
if ( $x < 0) {
  $x = $x + 1;
}
return $x;
}

/*********************************************************************/
function sinalt ($object, $mjd0, $hour, $ourlong, $cphi, $sphi )
/*
returns sine of the altitude of either the sun or the moon given the modified
julian day number at midnight UT and the hour of the UT day, the longitude of
the observer, and the sine and cosine of the latitude of the observer
*/
{
$ra = 0.0;
$dec = 0.0;
$instant = $mjd0 + $hour / 24.0;
$t = ($instant - 51544.5) / 36525;
    
    if ($object == 0) {
        moon ($t, $ra, $dec);
    }
    else {
        sun ($t, $ra, $dec);
    }
  
    $tau = 15.0 * (lmst($instant, $ourlong) - $ra);    //hour angle of object
    $value = $sphi * sin(deg2rad($dec)) + $cphi * cos(deg2rad($dec)) * cos(deg2rad($tau));
    
    return ($value);
}
/*********************************************************************/
function lmst ($mjd, $ourlong)
//returns the local siderial time for the mjd and longitude specified
{
$mjd0 = ipart($mjd);
$ut = ($mjd - $mjd0) * 24;
$t = ($mjd0 - 51544.5) / 36525;
$gmst = 6.697374558 + 1.0027379093 * $ut;
$gmst = $gmst + (8640184.812866 + (.093104 - .0000062 * $t) * $t) * $t / 3600;
$value = 24.0 * fpart(($gmst - $ourlong / 15.0) / 24.0);
return ($value);
}

/*********************************************************************/
function quad ($ym, $y0, $yp, &$xe, &$ye, &$z1, &$z2, &$nz)
/*
finds a parabola through three points and returns values of coordinates of
extreme value (xe, ye) and zeros if any (z1, z2) assumes that the x values are
-1, 0, +1
*/
{
$NZ = 0;
$XE = 0;
$YE = 0;
$Z1 = 0;
$Z2 = 0;
$a = .5 * ($ym + $yp) - $y0;
$b = .5 * ($yp - $ym);
$c = $y0;
$XE = (0.0 - $b) / ($a * 2.0); //              'x coord of symmetry line
$YE = ($a * $XE + $b) * $XE + $c; //      'extreme value for y in interval
$dis = $b * $b - 4.0 * $a * $c;   //    'discriminant

    if ( $dis > 0.000000 ) {                 //'there are zeros
        $dx = (0.5 * sqrt($dis)) / (abs($a));
        $Z1 = $XE - $dx;
        $Z2 = $XE + $dx;
            if (abs($Z1) <= 1) {
                $NZ = $NZ + 1 ;   // 'This zero is in interval
            }
            if (abs($Z2) <= 1) {
                $NZ = $NZ + 1  ;   //'This zero is in interval
            }
            if ($Z1 < -1) {
                $Z1 = $Z2;
            }
    }

$xe = $XE;
$ye = $YE;
$z1 = $Z1;
$z2 = $Z2;
$nz = $NZ;
return;
}

/*********************************************************************/
function sun ($t, &$ra, &$dec )
/*
Returns RA and DEC of Sun to roughly 1 arcmin for few hundred years either side
of J2000.0
*/
{
define("twoPI",   "6.283185306");
define("COSEPS",  "0.91748");
define("SINEPS",    "0.39778");
$m = twoPI * fpart(0.993133 + 99.997361 * $t);        //Mean anomaly
$dL = 6893 * sin($m) + 72 * sin(2 * $m);          //Eq centre
$L = twoPI * fpart(0.7859453 + $m / twoPI + (6191.2 * $t + $dL) / 1296000);
$sl = sin($L);
$x = cos($L);
$y = COSEPS * $sl;
$z = SINEPS * $sl;
$rho = sqrt(1 - $z * $z);
$DEC = (360 / twoPI) * atan2($z , $rho);
$RA = (48 / twoPI) * atan2($y , ($x + $rho));
if ($RA < 0) {
    $RA = $RA + 24;
}
$ra = $RA;
$dec = $DEC;
return;
}

/*********************************************************************/
function moon ($t, &$ra, &$dec)
/*
returns ra and dec of Moon to 5 arc min (ra) and 1 arc min (dec) for a few
centuries either side of J2000.0 Predicts rise and set times to within minutes
for about 500 years in past - TDT and UT time diference may become significant
for long times
*/
{
define ("twoPI",     "6.283185306");
define ("ARC",      "206264.8062");
define ("COSEPS", "0.91748");
define ("SINEPS",   "0.39778");

$L0 = fpart(.606433 + 1336.855225 * $t);    //'mean long Moon in revs
$L = twoPI * fpart(.374897 + 1325.55241 * $t); //'mean anomaly of Moon
$LS = twoPI * fpart(.993133 + 99.997361 * $t); //'mean anomaly of Sun
$d = twoPI * fpart(.827361 + 1236.853086 * $t); //'diff longitude sun and moon
$F = twoPI * fpart(.259086 + 1342.227825 * $t); //'mean arg latitude
//' longitude correction terms
$dL = 22640 * sin($L) - 4586 * sin($L - 2 * $d);
$dL = $dL + 2370 * sin(2 * $d) + 769 * sin(2 * $L);
$dL = $dL - 668 * sin($LS) - 412 * sin(2 * $F);
$dL = $dL - 212 * sin(2 * $L - 2 * $d) - 206 * sin($L + $LS - 2 * $d);
$dL = $dL + 192 * sin($L + 2 * $d) - 165 * sin($LS - 2 * $d);
$dL = $dL - 125 * sin($d) - 110 * sin($L + $LS);
$dL = $dL + 148 * sin($L - $LS) - 55 * sin(2 * $F - 2 * $d);
//' latitude arguments
$S = $F + ($dL + 412 * sin(2 * $F) + 541 * sin($LS)) / ARC;
$h = $F - 2 * $d;
//' latitude correction terms
$N = -526 * sin($h) + 44 * sin($L + $h) - 31 * sin($h - $L) - 23 * sin($LS + $h);
$N = $N + 11 * sin($h - $LS) - 25 * sin($F - 2 * $L) + 21 * sin($F - $L);
$lmoon = twoPI * fpart($L0 + $dL / 1296000); //  'Lat in rads
$bmoon = (18520 * sin($S) + $N) / ARC;  //     'long in rads
//' convert to equatorial coords using a fixed ecliptic
$CB = cos($bmoon);
$x = $CB * cos($lmoon);
$V = $CB * sin($lmoon);
$W = sin($bmoon);
$y = COSEPS * $V - SINEPS * $W;
$Z = SINEPS * $V + COSEPS * $W;
$rho = sqrt(1.0 - $Z * $Z);
$DEC = (360.0 / twoPI) * atan2($Z , $rho);
$RA = (48.0 / twoPI) * atan2($y , ($x + $rho));
if ($RA < 0) {
        $RA = $RA + 24.0;
}
$ra = $RA;
$dec = $DEC;
return;
}

/*********************************************************************/
function get_rst ($object, $date, $ourlong, $ourlat, &$obRise, &$obSet, &$obTransit)
//get rise, set and transit times of object sun or moon
{
$sl = sin(deg2rad($ourlat));  //sin of lat
$cl = cos(deg2rad($ourlat));  //cos of lat

$sinho[0] = 0.002327;         //moonrise sin of horizon - average diameter used
$sinho[1] = -0.014544;       //sunrise sin of horizon - classic value for refraction
$ym = sinalt($object, $date, $hour - 1, $ourlong, $cl, $sl) - $sinho[$object];
    if ($ym > 0) {
    $above = 1;
    }
    else {
    $above = 0;
    }




//start rise-set loop
  do
  {
    $y0 = sinalt($object, $date, $hour, $ourlong, $cl, $sl) - $sinho[$object];
        $yp = sinalt($object, $date, $hour + 1, $ourlong, $cl, $sl) - $sinho[$object];
        
    quad ($ym, $y0, $yp, $xe, $ye, $z1, $z2, $nz);
        
        switch ($nz)
        {
        case 0: //'nothing  - go to next time slot
      break;
        case 1:                      //' simple rise / set event
            if ($ym < 0) {       //' must be a rising event
        $utrise = $hour + $z1;
                $rise = 1;
            }
            else {  //' must be setting
        $utset = $hour + $z1;
                $sett = 1;
            }
            break;
    case 2:                      //' rises and sets within interval
      if ($ye < 0) {       //' minimum - so set then rise
        $utrise = $hour + $z2;
                $utset = $hour + $z1;
            }
            else {    //' maximum - so rise then set
        $utrise = $hour + $z1;
                $utset = $hour + $z2;
            }
            $rise = 1;
            $sett = 1;
            $zero2 = 1;
            break;
    }

        $ym = $yp;     //'reuse the ordinate in the next interval
        $hour = $hour + 2;
        $check = ($rise * $sett);
      //  echo "<br>hour = $hour";
  }
  while (($hour != 25) && ($check != 1));
  // end rise-set loop
  
//GET TRANSIT TIME
  $hour = 0; //reset hour
  $utransit = get_transit($object, $date, $hour, $ourlong);
  if ($utransit < 25.0) {
    $transitt = 1;
  }

  //logic to sort the various rise and set states
  // nested if's...sorry
  if (($rise == 1) || ($sett == 1) || ($transitt == 1)) {   //current object rises, sets or transits today
    if ($rise == 1) {
      $obRise = $utrise;
      // below code was used to display results for testing, may be removed.
      //echo "<br>rise = $utrise";
      //$event = sprintf("rise");
      //display_event_time($utrise, $event);
    }
    else {
      $obRise = 0.0;
      //printf ("does not rise");
    }
    if ($transitt == 1) {
      $obTransit = $utransit;
      // below code was used to display results for testing, may be removed.
      ///echo "<br>transit = $utransit";
      //$event = sprintf("transit");
      //display_event_time($utransit, $event);
    }
    else {
      $obTransit = 0.0;
      //printf ("does not transit");
    }
    if ($sett == 1) {
      $obSet = $utset;
      // below code was used to display results for testing, may be removed.
      //echo "<br>set = $utset";
      //$event = sprintf("set");
      //display_event_time($utset, $event);
    }
    else {
      $obSet = 0.0;
      //printf ("does not set");
    }
  
  }
  else { //current object not so simple
    if ($above == 1) {
      //printf ("always above horizon");
    }
    else {
      //printf ("always below horizon");
    }
  }

return;
}


/*********************************************************************/
function get_transit ($object, $mjd0, $hour, $ourlong)
{
//loop through all 24 hours of the day and store the sign of the angle in an array
//actually loop through 25 hours if we reach the 25th hour with out a transit then no transit condition today.

    while ($hour < 25.0)
  {
    $instant = $mjd0 + $hour / 24.0;
    $t = ($instant - 51544.5) / 36525;
    if ($object == 0) {
      moon ($t, $ra, $dec);
    }
    else {
      sun ($t, $ra, $dec);
    }
    $lha = (lmst($instant, $ourlong) - $ra);
        $LA = $lha * 15.04107;    //convert hour angle to degrees
        $sLA = $LA/abs($LA);      //sign of angle
    $hourarray[$hour] = $sLA;
    $hour++;
  }
//search array for the when the angle first goes from negative to positive
    $i = 0;
    while ($i < 25)
        {
            $loc_transit = $i;
            if ($hourarray[$i] - $hourarray[$i+1] == -2) {
                //we found our hour
                break;
            }

            $i++;
        }
//check for no transit, return zero
        if ($loc_transit > 23) {
            // no transit today
            $loc_transit = 0.0;
            return $loc_transit;
        }

//loop through all 60 minutes of the hour and store sign of the angle in an array
  $mintime = $loc_transit;
  while ($min < 60)
  {
    $instant = $mjd0 + $mintime / 24.0;
    $t = ($instant - 51544.5) / 36525;
    if ($object == 0) {
      moon ($t, $ra, $dec);
    }
    else {
      sun ($t, $ra, $dec);
    }
    $lha = (lmst($instant, $ourlong) - $ra);
    $LA = $lha * 15.04107;
        $sLA = (int)($LA/abs($LA));
        $minarray[$min] = $sLA;
    $min++;
        $mintime = $mintime + 0.016667;   //increment 1 minute
  }

    $i = 0;
  while ($i < 60)
    {
        if ($minarray[$i] - $minarray[$i+1] == -2) {
        //we found our min
        break;
        }
        $i++;
        $loc_transit = $loc_transit + 0.016667;
    }
return ($loc_transit);
}
/*********************************************************************/
function get_moon_phase ($JD, &$PhaseName, &$illumin)
{
  $IP = fpart( ( $JD - 2451550.1 ) / 29.530588853 );
  $age = $IP*29.53;
  $angle = $age * 13;
  $illumin = 0.5 * (1 - cos(deg2rad($angle)));

if( $age <  1.84566 ) {
    $PhaseName = "NEW";
    $Phase = 1;
  }
  else if( $age <  5.53699 ) {
    $PhaseName = "waxing crescent";
    $Phase = 2;
  }
  else if( $age <  9.22831 ) {
    $Phase = 3;
    $PhaseName = "first quarter";
  }
  else if( $age < 12.91963 ) {
    $Phase = 4;
    $PhaseName = "waxing gibbous";
  }
  else if( $age < 16.61096 ) {
    $Phase = 5;
    $PhaseName =  "FULL";
  }
  else if( $age < 20.30228 ) {
    $Phase = 6;
    $PhaseName = "waning gibbous";
  }
  else if( $age < 23.99361 ) {
    $Phase = 7;
    $PhaseName = "Last quarter";
  }
  else if( $age < 27.68493 ) {
    $Phase = 8;
    $PhaseName = "waning crescent";
  }
  else {
    $Phase = 9;
    $PhaseName =  "NEW";
  }

/*
echo "<br>Moon Phase = $PhaseName, ";
$illumin = $illumin*100;
echo round($illumin, 1);
echo "% illuminated, ";
echo round($age, 1);
echo " days since new.";
  //printf("\nAngle is %f", angle);
*/
return $age;
}

/*********************************************************************/
function sol_get_minor1 (&$minorstart1, &$minorstop1, $moonrise)
{
  //only calculate if the minor periods do not overlap prev or next days
  if ($moonrise >= 0.5 & $moonrise <= 23.0) {
    $minorstart1 = $moonrise - 0.5;
    $minorstop1 = $moonrise + 1.0;
  }
  else {
    $minorstart1 = 0.0;
    $minorstop1 = 0.0;
}
  

return;
}

/*********************************************************************/
function sol_get_minor2 (&$minorstart2, &$minorstop2, $moonset)
{
  if ($moonset >= 0.5 & $moonset <= 23.0) {
    $minorstart2 = $moonset - 0.5;
    $minorstop2 = $moonset + 1.0;
  }
else{
    $minorstart2 = 0.0;
    $minorstop2 = 0.0;
  }
return;
}

/*********************************************************************/
function sol_get_major1 (&$majorstart1, &$majorstop1, $moontransit)
{
  if ($moontransit >= 0.5 & $moontransit <= 22.0) {
    $majorstart1 = $moontransit - 0.5;
    $majorstop1 = $moontransit + 2.0;
  }
  else {
    $majorstart1 = 0.0;
    $majorstop1 = 0.0;
  }
return;
}
/*********************************************************************/
function sol_get_major2 (&$majorstart2, &$majorstop2, $moonunder)
{
  if ($moonunder >= 0.5 & $moonunder <= 22.0) {
    $majorstart2 = $moonunder - 0.5;
    $majorstop2 = $moonunder + 2.0;
  }
  else {
    $majorstart2 = 0.0;
    $majorstop2 = 0.0;
  }
return;
}

/*********************************************************************/
function phase_day_scale ($moonage)
{
$scale = 0;

if($moonage <  1.84566 ) {    //new
  $scale = 3;
  }
else if( $moonage <  5.53699 ) {
  $scale = 2;
  }
else if( $moonage < 12.91963 ) {
  $scale = 2;
  }
else if( $moonage < 16.61096 ) {    //full
    $scale = 3;
  }
else if( $moonage < 20.30228 ) {
  $scale = 2;
  }
else if( $moonage < 27.68493 ) {
  $scale = 2;
  }
else {  //new
  $scale = 3;
  }

return $scale;  
}

/*********************************************************************/
function sol_get_dayscale ($moonrise, $moonset, $moontransit, $sunrise, $sunset)
{
//check if a solunar period occurs within 30 minutes of sun rise/set
//ok I know the following code sucks and fixing it is first on my todo list
$locsoldayscale = 0;
$check = 1.0;
//check minorstart1
$check = abs(($moonrise - 0.5) - $sunrise);
if ($check < 0.5) {
  $locsoldayscale = $locsoldayscale + 1;
}
$check = abs(($moonrise - 0.5) - $sunset);
if ($check < 0.5) {
  $locsoldayscale = $locsoldayscale + 1;
}
//check minorstop1
$check = abs(($moonrise + 1.0) - $sunrise);
if ($check < 0.5) {
  $locsoldayscale = $locsoldayscale + 1;
}
$check = abs(($moonrise + 1.0) - $sunset);
if ($check < 0.5) {
  $locsoldayscale = $locsoldayscale + 1;
}
//check minorstart2
$check = abs(($moonset - 0.5) - $sunrise);
if ($check < 0.5) {
  $locsoldayscale = $locsoldayscale + 1;
}
$check = abs(($moonset - 0.5) - $sunset);
if ($check < 0.5) {
  $locsoldayscale = $locsoldayscale + 1;
}
//check minorstop2
$check = abs(($moonset + 1.0) - $sunrise);
if ($check < 0.5) {
  $locsoldayscale = $locsoldayscale + 1;
}
$check = abs(($moonset + 1.0) - $sunset);
if ($check < 0.5) {
  $locsoldayscale = $locsoldayscale + 1;
} 
//check majorstart1
$check = abs(($moontransit - 0.5) - $sunrise);
if ($check < 0.5) {
  $locsoldayscale = $locsoldayscale + 1;
}
$check = abs(($moontransit - 0.5) - $sunset);
if ($check < 0.5) {
  $locsoldayscale = $locsoldayscale + 1;
}
//check majorstop1
$check = abs(($moontransit + 2.0) - $sunrise);
if ($check < 0.5) {
  $locsoldayscale = $locsoldayscale + 1;
}
$check = abs(($moontransit + 2.0) - $sunset);
if ($check < 0.5) {
  $locsoldayscale = $locsoldayscale + 1;
}
//check majorstart2
$check = abs(($moonunder - 0.5) - $sunrise);
if ($check < 0.5) {
  $locsoldayscale = $locsoldayscale + 1;
}
$check = abs(($moonunder - 0.5) - $sunset);
if ($check < 0.5) {
  $locsoldayscale = $locsoldayscale + 1;
}
//check majorstop2
$check = abs(($moonunder + 2.0) - $sunrise);
if ($check < 0.5) {
  $locsoldayscale = $locsoldayscale + 1;
}
$check = abs(($moonunder + 2.0) - $sunset);
if ($check < 0.5) {
  $locsoldayscale = $locsoldayscale + 1;
}

return $locsoldayscale;
}

/*********************************************************************/
function sol_display_dayscale ($soldayscale, $phasedayscale)
{
$dayscale = 0;
$dayscale = ($soldayscale + $phasedayscale);
echo "<br><br>Todays action is rated a $dayscale (scale is 0 thru 5, 5 is the best)";
return;
}

/*********************************************************************/
function convert_time_to_string ($doubletime)
{
/*split the time into hours (i) and minutes (d)*/
$d = fpart($doubletime);
$d = $d * 60;
$i = ipart($doubletime);
if ($d >= 59.5) {
  $i = $i + 1;
  $d = 0;
}

/*convert times to a string*/
if ($d < 10) {
$stringtime = sprintf("%.0f:0%.0f",$i , $d);
}
else {
  $stringtime = sprintf("%.0f:%.0f",$i , $d);
}
return $stringtime;
}


/*********************************************************************/
function display_event_time ($time, $event)
{
  //char sTime[6];
  $stringtime = convert_time_to_string ($time);
  printf("\n %s %s",$event, $stringtime);
return;
}
/*********************************************************************/
function get_underfoot ($date, $underlong)
{
  $loc_moonunderTime = get_transit (0, $date, 0, $underlong);

return ($loc_moonunderTime);
}
/*********************************************************************/

/*********************************************************************/



//end functions





// -------------------------------------------------------------------------------------------

//                          Bite times Calendar

// -------------------------------------------------------------------------------------------


	public function bite_times()
	{
        // // get all bite time data from db
        // $data['bite_times'] = $this->Resource_model->get_bitetimes();
        // $time = $data['bite_times'][0]->best_bite;

        // // get the fishing rating and and return the filename for that rating
        // // eg 0 = red_fish.png (bad fishing)
        // // eg 1 = blue_fish.png (Average fishing)
        // // eg 2 = green_fish.png (Good fishing)
        // $rating = $data['bite_times'][0]->fishing_rating;

        // if($rating = 0){
        //     return $rating = 'red-fish.png';
        // }elseif ($rating = 1) {
        //     return $rating = 'blue-fish.png';
        // }else{
        //     return $rating = 'green-fish.png';
        // }


        // calendar preferences for bitetimes
    $prefs = array(
        'start_day'    => 'saturday',
        'month_type'   => 'long',
        'day_type'     => 'long',
        'show_next_prev'  => TRUE,
        'next_prev_url'   => 'calendar',
        'template'		=> '

   	{table_open}
   		<table>
   	{/table_open}

   	{heading_row_start}
   		<tr class="heading">
   	{/heading_row_start}

   	{heading_previous_cell}
   		<th id="previous">
   			<a  href="{previous_url}">&lt;&lt;</a>
   		</th>
   	{/heading_previous_cell}

   	{heading_title_cell}
   		<th colspan="{colspan}">{heading}</th>
   	{/heading_title_cell}

   	{heading_next_cell}
   		<th id="next"><a href="{next_url}" >&gt;&gt;</a>
   		</th>
   	{/heading_next_cell}

   	{heading_row_end}
   		</tr>
   	{/heading_row_end}





   	{week_row_start}<tr class="week">{/week_row_start}
   
   	{week_day_cell}<td class="day">{week_day}</td>{/week_day_cell}
   
   	{week_row_end}</tr>{/week_row_end}

   	{cal_row_start}<tr>{/cal_row_start}
   
   	{cal_cell_start}

   	<td class="days">

   	

   		



   	{/cal_cell_start}

   	{cal_cell_content}
   		<a href="{content}">{day}</a>
   	{/cal_cell_content}
   
   	{cal_cell_content_today}
   		<div class="highlight">
   			<a href="{content}">{day}</a>
   		</div>
   	{/cal_cell_content_today}


   	{cal_cell_no_content}{day}{/cal_cell_no_content}
   
   	{cal_cell_no_content_today}
   		<div class="highlight">{day}</div>
   	{/cal_cell_no_content_today}

   	{cal_cell_blank}&nbsp; {/cal_cell_blank}

   	{cal_cell_end}

   		
	<div class="cal-data">
		<img src="../assets/img/red-fish.png" alt="">

		<h4>7am - 9am</h4>
  </div>


   	</td>

   	

   	
   	{/cal_cell_end}
   	{cal_row_end}</tr>{/cal_row_end}

   	{table_close}</table>{/table_close}
'
);


        // Views for the bite time calendar

		$this->load->helper('path');


		$this->load->library('calendar', $prefs);


		$this->load->view('html');
		$this->load->view('header');
		$this->load->view('navigation');
		$this->load->view('cta');

		$this->load->view('resources/side-nav');

 		$this->load->view('resources/resource_header');			    // start of the calendar
		$this->load->view('resources/bite-time-calendar');	// the actual calendar
		$this->load->view('resources/after_resource_header');		// end of the calendar

		$this->load->view('footer');
	}

    // This calendar function goes with the bite time calendar above, 
    // when the next or prev buttons are chosen, show this calendar, its exactly the same
    // as bite time calendar but goes to a different address
	public function calendar()
	{

		$prefs = array(
        'start_day'    => 'saturday',
        'month_type'   => 'long',
        'day_type'     => 'long',
        'show_next_prev'  => TRUE,
        'next_prev_url'   => '../',
        'template'		=> '

   	{table_open}
   		<table>
   	{/table_open}

   	{heading_row_start}
   		<tr class="heading">
   	{/heading_row_start}

   	{heading_previous_cell}
   		<th id="previous">
   			<a  href="{previous_url}">&lt;&lt;</a>
   		</th>
   	{/heading_previous_cell}

   	{heading_title_cell}
   		<th colspan="{colspan}">{heading}</th>
   	{/heading_title_cell}

   	{heading_next_cell}
   		<th id="next">
   			<a href="{next_url}" >&gt;&gt;</a>
   		</th>
   	{/heading_next_cell}

   	{heading_row_end}
   		</tr>
   	{/heading_row_end}





   	{week_row_start}<tr class="week">{/week_row_start}
   
   	{week_day_cell}<td class="day">{week_day}</td>{/week_day_cell}
   
   	{week_row_end}</tr>{/week_row_end}

   	{cal_row_start}<tr>{/cal_row_start}
   
   	{cal_cell_start}

   	<td class="days">

   	

   		



   	{/cal_cell_start}

   	{cal_cell_content}
   		<a href="{content}">{day}</a>
   	{/cal_cell_content}
   
   	{cal_cell_content_today}
   		<div class="highlight">
   			<a href="{content}">{day}</a>
   		</div>
   	{/cal_cell_content_today}

   	{cal_cell_no_content}{day}{/cal_cell_no_content}
   
   	{cal_cell_no_content_today}
   		<div class="highlight">{day}</div>
   	{/cal_cell_no_content_today}

   	{cal_cell_blank}&nbsp; {/cal_cell_blank}

   	{cal_cell_end}

   		
	<div class="cal-data">
		<img src="../../../assets/img/red-fish.png" alt="">

		<h4>7am - 9am</h4>
   		   	</div>


   	</td>

   	

   	
   	{/cal_cell_end}
   	{cal_row_end}</tr>{/cal_row_end}

   	{table_close}</table>{/table_close}
'
);

        // view of the bite time calendar
		$this->load->helper('path');

        $this->load->library('calendar', $prefs);

		$data['year'] = $this->uri->segment(3);
    	$data['month'] = $this->uri->segment(4);

		$this->load->view('html', $data);
		$this->load->view('header');
		$this->load->view('navigation');
		$this->load->view('cta');

		$this->load->view('resources/side-nav', $data);

    	$this->load->view('resources/resource_header');
    	$this->load->view('resources/bite-time-calendar', $data);
		
		$this->load->view('resources/after_resource_header');

		$this->load->view('resources/side-ads');

		$this->load->view('resources/temp-content');
		$this->load->view('footer');
	}



// -------------------------------------------------------------------------------------------

//                          Tide Chart Calendar

// -------------------------------------------------------------------------------------------



    // tide chart calendar preferences
	public function tide_charts()
	{
		$prefs = array(
        'start_day'    => 'saturday',
        'month_type'   => 'long',
        'day_type'     => 'long',
        'show_next_prev'  => TRUE,
        'next_prev_url'   => 'tide_times',
        'template'		=> '

   	{table_open}
   		<table>
   	{/table_open}

   	{heading_row_start}
   		<tr class="heading">
   	{/heading_row_start}

   	{heading_previous_cell}
   		<th>
   			<a href="{previous_url}">&lt;&lt;</a>
   		</th>
   	{/heading_previous_cell}

   	{heading_title_cell}
   		<th colspan="{colspan}">{heading}</th>
   	{/heading_title_cell}

   	{heading_next_cell}
   		<th><a href="{next_url}">&gt;&gt;</a>
   		</th>
   	{/heading_next_cell}

   	{heading_row_end}
   		</tr>
   	{/heading_row_end}





   	{week_row_start}<tr class="week">{/week_row_start}
   
   	{week_day_cell}<td class="day">{week_day}</td>{/week_day_cell}
   
   	{week_row_end}</tr>{/week_row_end}

   	{cal_row_start}<tr>{/cal_row_start}
   
   	{cal_cell_start}

   	<td class="days">

   	

   		



   	{/cal_cell_start}

   	{cal_cell_content}
   		<a href="{content}">{day}</a>
   	{/cal_cell_content}
   
   	{cal_cell_content_today}
   		<div class="highlight">
   			<a href="{content}">{day}</a>
   		</div>
   	{/cal_cell_content_today}

   	{cal_cell_no_content}{day}{/cal_cell_no_content}
   
   	{cal_cell_no_content_today}
   		<div class="highlight">{day}</div>
   	{/cal_cell_no_content_today}

   	{cal_cell_blank}&nbsp; {/cal_cell_blank}

   	{cal_cell_end}

   	
	<div class="cal-data tide-data">
		<h4 class="low">Low</h4>
		<p class="times">7.00am</p>
		<p class="times">7.00pm</p>

		<h4 class="high">High</h4>
		<p class="times">1.00pm</p>
		<p class="times">1.00am</p>
   	</div>


   	</td>


   	{/cal_cell_end}
   	{cal_row_end}</tr>{/cal_row_end}

   	{table_close}</table>{/table_close}
'
);


        // load the view for the tide chart calendar
		$this->load->helper('path');

        $this->load->library('calendar', $prefs);

        $data['year'] = $this->uri->segment(3);
        $data['month'] = $this->uri->segment(4);

		$this->load->view('html');
		$this->load->view('header');
		$this->load->view('navigation');
		$this->load->view('cta');

		

		$this->load->view('resources/side-nav');
		$this->load->view('tide_chart_calendar', $data);

		$this->load->view('footer');
	}





// when next or prev buttons are clicked, show this calendar
public function tide_times()
    {

        $prefs = array(
        'start_day'    => 'saturday',
        'month_type'   => 'long',
        'day_type'     => 'long',
        'show_next_prev'  => TRUE,
        'next_prev_url'   => '../',
        'template'      => '

    {table_open}<table>{/table_open}

    {heading_row_start}<tr class="heading">{/heading_row_start}

    {heading_previous_cell}
        <th>
            <a href="{previous_url}">&lt;&lt;</a>
        </th>
    {/heading_previous_cell}

    {heading_title_cell}
        <th colspan="{colspan}">{heading}</th>
    {/heading_title_cell}

    {heading_next_cell}
        <th><a href="{next_url}">&gt;&gt;</a>
        </th>
    {/heading_next_cell}

    {heading_row_end}
        </tr>
    {/heading_row_end}





    {week_row_start}<tr class="week">{/week_row_start}
   
    {week_day_cell}<td class="day">{week_day}</td>{/week_day_cell}
   
    {week_row_end}</tr>{/week_row_end}

    {cal_row_start}<tr>{/cal_row_start}
   
    {cal_cell_start}

    <td class="days">

    {/cal_cell_start}

    {cal_cell_content}
        <a href="{content}">{day}</a>
    {/cal_cell_content}
   
    {cal_cell_content_today}
        <div class="highlight">
            <a href="{content}">{day}</a>
        </div>
    {/cal_cell_content_today}

    {cal_cell_no_content}{day}{/cal_cell_no_content}
   
    {cal_cell_no_content_today}
        <div class="highlight">{day}</div>
    {/cal_cell_no_content_today}

    {cal_cell_blank}&nbsp; {/cal_cell_blank}

    {cal_cell_end}

    
    <div class="cal-data tide-data">
        <h4 class="low">Low</h4>
        <p class="times">7.00am</p>
        <p class="times">7.00pm</p>

        <h4 class="high">High</h4>
        <p class="times">1.00pm</p>
        <p class="times">1.00am</p>
    </div>


    </td>

    

    



    {/cal_cell_end}
    {cal_row_end}</tr>{/cal_row_end}

    {table_close}</table>{/table_close}
'
);

        // tide time view
        $this->load->helper('path');

        $this->load->library('calendar', $prefs);

        $data['year'] = $this->uri->segment(3);
        $data['month'] = $this->uri->segment(4);

        $this->load->view('html', $data);
        $this->load->view('header');
        $this->load->view('navigation');
        $this->load->view('cta');

        $this->load->view('resources/side-nav', $data);

        $this->load->view('tide_chart_calendar', $data);

        $this->load->view('resources/side-ads');

        $this->load->view('resources/temp-content');
        $this->load->view('footer');
    }



// -------------------------------------------------------------------------------------------

//                          Moon Calendar

// -------------------------------------------------------------------------------------------

    // displays an image of the moon phase for each day on the calendar
	public function moon_calendar()
	{
		$prefs = array(
        'start_day'    => 'saturday',
        'month_type'   => 'long',
        'day_type'     => 'long',
        'show_next_prev'  => TRUE,
        'next_prev_url'   => 'moon_calendar1',
        'template'		=> '

   	{table_open}
   		<table>
   	{/table_open}

   	{heading_row_start}
   		<tr class="heading">
   	{/heading_row_start}

   	{heading_previous_cell}
   		<th>
   			<a href="{previous_url}">&lt;&lt;</a>
   		</th>
   	{/heading_previous_cell}

   	{heading_title_cell}
   		<th colspan="{colspan}">{heading}</th>
   	{/heading_title_cell}

   	{heading_next_cell}
   		<th><a href="{next_url}">&gt;&gt;</a>
   		</th>
   	{/heading_next_cell}

   	{heading_row_end}
   		</tr>
   	{/heading_row_end}





   	{week_row_start}<tr class="week">{/week_row_start}
   
   	{week_day_cell}<td class="day">{week_day}</td>{/week_day_cell}
   
   	{week_row_end}</tr>{/week_row_end}

   	{cal_row_start}<tr>{/cal_row_start}
   
   	{cal_cell_start}

   	<td class="days">

   	

   		



   	{/cal_cell_start}

   	{cal_cell_content}
   		<a href="{content}">{day}</a>
   	{/cal_cell_content}
   
   	{cal_cell_content_today}
   		<div class="highlight">
   			<a href="{content}">{day}</a>
   		</div>
   	{/cal_cell_content_today}

   	{cal_cell_no_content}{day}{/cal_cell_no_content}
   
   	{cal_cell_no_content_today}
   		<div class="highlight">{day}</div>
   	{/cal_cell_no_content_today}

   	{cal_cell_blank}&nbsp; {/cal_cell_blank}

   	{cal_cell_end}

   		
	<div class="cal-data">
		<i class="wi wi-moon-waxing-cresent-6"></i>
   	</div>


   	</td>

   	

   	



   	{/cal_cell_end}
   	{cal_row_end}</tr>{/cal_row_end}

   	{table_close}</table>{/table_close}
'
);
		$this->load->helper('path');
		$this->load->helper('html');
        $this->load->helper('url');

        $this->load->library('calendar', $prefs);

		$this->load->view('html');
		$this->load->view('header');
		$this->load->view('navigation');
		$this->load->view('cta');

		$this->load->view('resources/side-nav');
		$this->load->view('resources/moon');
		// $this->load->view('resources/side-ads');

		// $this->load->view('resources/temp-content');
		$this->load->view('footer');
	}



        public function moon_calendar1()
    {
        $prefs = array(
        'start_day'    => 'saturday',
        'month_type'   => 'long',
        'day_type'     => 'long',
        'show_next_prev'  => TRUE,
        'next_prev_url'   => '../',
        'template'      => '

    {table_open}
        <table>
    {/table_open}

    {heading_row_start}
        <tr class="heading">
    {/heading_row_start}

    {heading_previous_cell}
        <th>
            <a href="{previous_url}">&lt;&lt;</a>
        </th>
    {/heading_previous_cell}

    {heading_title_cell}
        <th colspan="{colspan}">{heading}</th>
    {/heading_title_cell}

    {heading_next_cell}
        <th><a href="{next_url}">&gt;&gt;</a>
        </th>
    {/heading_next_cell}

    {heading_row_end}
        </tr>
    {/heading_row_end}





    {week_row_start}<tr class="week">{/week_row_start}
   
    {week_day_cell}<td class="day">{week_day}</td>{/week_day_cell}
   
    {week_row_end}</tr>{/week_row_end}

    {cal_row_start}<tr>{/cal_row_start}
   
    {cal_cell_start}

    <td class="days">

    

        



    {/cal_cell_start}

    {cal_cell_content}
        <a href="{content}">{day}</a>
    {/cal_cell_content}
   
    {cal_cell_content_today}
        <div class="highlight">
            <a href="{content}">{day}</a>
        </div>
    {/cal_cell_content_today}

    {cal_cell_no_content}{day}{/cal_cell_no_content}
   
    {cal_cell_no_content_today}
        <div class="highlight">{day}</div>
    {/cal_cell_no_content_today}

    {cal_cell_blank}&nbsp; {/cal_cell_blank}

    {cal_cell_end}

        
    <div class="cal-data">
        <i class="wi wi-moon-waxing-cresent-6"></i>
    </div>


    </td>

    

    



    {/cal_cell_end}
    {cal_row_end}</tr>{/cal_row_end}

    {table_close}</table>{/table_close}
'
);
        $this->load->helper('path');
        $this->load->helper('html');
        $this->load->helper('url');

        $this->load->library('calendar', $prefs);

        $this->load->view('html');
        $this->load->view('header');
        $this->load->view('navigation');
        $this->load->view('cta');

        $this->load->view('resources/side-nav');
        $this->load->view('resources/moon');

        $this->load->view('footer');
    }


		public function fishing_knots()
	{
		$this->load->helper('path');
		$this->load->helper('html');
        $this->load->helper('url');

		$this->load->view('html');
		$this->load->view('header');
		$this->load->view('navigation');
		$this->load->view('cta');

		$this->load->view('resources/side-nav');
		$this->load->view('resources/fishing_knots');


		$this->load->view('footer');
	}


// -------------------------------------------------------------------------------------------

//                          Charters

// -------------------------------------------------------------------------------------------


    // this function displays all of the Charter listings for each region

	public function fishing_charters()
	{

            // if the region has not been posted
            // get all charters
            // get the data for all charters and pass it to charter_view

            if(!isset($_POST['region'])){

            $data['charter'] = $this->Resource_model->get_all_charters(); 

            // pass the charter details to the view,load the charters page
            $this->charters_view($data);
            


            // if the region has been selected
            // get the name of the region
            // then get all charter info by region
            // pass data to charter View

            }else{

            $region = $_POST['region'];
            $data['region'] = $this->Resource_model->get_region($region);
            $data['charter'] = $this->Resource_model->get_charters($region);
               
            $this->charters_view($data);

            }
         
	}


    // this function creates the page that displays all listings - 
    // it is a part of the function above (fishing_charters)
    // pass the Charters $data to the view to create the page
    public function charters_view($data)
    {
            $this->load->view('html');
            $this->load->view('header');
            $this->load->view('navigation');
            $this->load->view('cta');

            $this->load->view('resources/side-nav');
            $this->load->view('resources/charters', $data);

            $this->load->view('footer');
    }

    // this function shows a single Charter's Details
	public function fishing_charter()
	{

        // get all charter by its Get id
        // pass that data to the fishing charter page
        $id = $_GET['id'];
        $data['charter'] = $this->Resource_model->get_charter_info($id);

		$this->load->view('html');
		$this->load->view('header');
		$this->load->view('navigation');
		$this->load->view('cta');

		$this->load->view('resources/side-nav');
		$this->load->view('resources/fishing_charter', $data);
		
		$this->load->view('footer');
	}

    //  this function is a callback for the form validation below
    // it allows numbers 0-9 and spaces
    // function numeric_wcomma ($str)
    // {
    //     return preg_match('/^[0-9 ]+$/', $str);
    // }

    // This is the form that create a new charter listing
    public function new_charter()
    {

        $this->form_validation->set_rules('charter', 'Charter Name', 'required|max_length[100]|prep_for_form|xss_clean|encode_php_tags');
        $this->form_validation->set_rules('email', 'Email Address', 'required|valid_email|is_unique[charters.email]|prep_for_form|xss_clean|encode_php_tags');
        $this->form_validation->set_rules('website', 'Website URL', 'required|max_length[100]|prep_for_form|xss_clean|encode_php_tags');
        $this->form_validation->set_rules('phone', 'Phone Number', 'required|valid_phone_number_or_empty|prep_for_form|xss_clean|encode_php_tags');
        $this->form_validation->set_rules('region', 'Region', 'required|prep_for_form|xss_clean|encode_php_tags');
        $this->form_validation->set_rules('description', 'Description', 'required|max_length[300]|prep_for_form|xss_clean|encode_php_tags');
        $this->form_validation->set_rules('featured', 'Featured', 'prep_for_form|xss_clean|encode_php_tags');
                

        // Set the error messages
        $this->form_validation->set_message('required', 'This Field is Required');
        $this->form_validation->set_message('valid_phone_number_or_empty', 'Please enter a valid phone number');
        $this->form_validation->set_message('valid_email', 'Please enter a valid email address');
        $this->form_validation->set_message('is_unique[charters.email]', 'This email address has already been used');


        // if the form validations have not yet been run
        // load the page to to be validated
        if ($this->form_validation->run() == FALSE){

            // load the view of the form
            $this->load->helper('path');

            $this->load->view('html');
            $this->load->view('header');
            $this->load->view('navigation');
            $this->load->view('cta');

            $this->load->view('resources/side-nav');
            $this->load->view('resources/new_charter');
            $this->load->view('resources/side-ads');

            $this->load->view('footer');
        }else{

            $this->charter_upload();

            redirect('resources/new_charter_form');

        }
    }

    // phone number validation
    // http://stackoverflow.com/questions/1937376/codeigniter-form-validation-with-phone-numbers
    function valid_phone_number_or_empty($value)
    {
        $value = trim($value);
        if ($value == '') {
            return TRUE;
        }
        else
        {
            if (preg_match('/^\(?[0-9]{3}\)?[-. ]?[0-9]{3}[-. ]?[0-9]{4}$/', $value))
            {
                return preg_replace('/^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/', '($1) $2-$3', $value);
            }
            else
            {
                return FALSE;
            }
        }
    }

    // upload the main image for the charter listing
    // get the filename & the post data
    // insert the main charter details into database
    // redirect to part2 of the charter form 
    public function charter_upload()
        {   

                $config['upload_path']          = 'assets/img/charter/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 1000;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;
 
            $this->load->library('upload', $config);

                // if the files didnt upload
                // show the errors
                if ( ! $this->upload->do_upload()){

                    $error = array('error' => $this->upload->display_errors());
                    //$this->new_charter($error);
                    //echo $error;

                }else{


            #--------------------------------------------------------

            
                    // get the filename
                    $data = $this->upload->data('upload_data','file_name');

                    // this is the filename which gets stored in the database
                    $filename = $data['file_name'];


            #--------------------------------------------------------

            // ADMIN PHOTO GALLERY - POST DATA
            // get all post data as an array
            $post = array(
                'charter_name' => $this->input->post('charter'),
                'email' => $this->input->post('email'),
                'website' => $this->input->post('website'),
                'phone' => $this->input->post('phone'),
                'region_id' => $this->input->post('region'),
                'filename' => $filename,
                'description' => $this->input->post('description'),
                'featured' => $this->input->post('featured')
            );


            // remove the submit button from the post data
            //array_pop($post);

            // get the email address so the id can be found later
            $email = $this->input->post('email');

            // send post data to the db table
            $this->Resource_model->insert_charter($post);


            // get the id of this charter where email is $email
            $charterID = $this->Resource_model->charter_id($email);


            // store the charter id in a session to use in the rest of the form
            $this->session->set_userdata('charter_id', $charterID[0]->id);
           
            #--------------------------------------------------------

            // show the view for part 2 of the new charter form
            // the action of the form is charter_rates()
            // redirect('resources/charter_rates');
             
            }
        }    


        // Update the charters table in the database, 
        // adding to it the rates description & image
        public function new_charter_form()
        {
            // do the form validation 
            //$this->form_validation->set_message('max_length[1000]', 'You have reached the maximum of 1000 characters');
            $this->form_validation->set_rules('description1', 'Rates', 'max_length[10000]|prep_for_form|xss_clean|encode_php_tags');
            // $this->form_validation->set_rules('description2', 'Vessel', 'max_length[1000]|prep_for_form|xss_clean|encode_php_tags');
            // $this->form_validation->set_rules('description3', 'Other', 'max_length[1000]|prep_for_form|xss_clean|encode_php_tags');
            
            // if the form validations have not yet been run
            // load the page to to be validated
            if ($this->form_validation->run() == FALSE){

                $this->load->helper('path');

                $this->load->view('html');
                $this->load->view('header');
                $this->load->view('navigation');
                $this->load->view('cta');

                $this->load->view('resources/side-nav');
                $this->load->view('resources/new_charter_rates');
                $this->load->view('resources/side-ads');

                $this->load->view('footer');

            }else{

                // ADMIN PHOTO GALLERY - POST DATA
                // get all post data as an array
                $post = array(
                    'description1' => $this->input->post('description1')
                    // 'description2' => $this->input->post('description2'),
                    // 'description3' => $this->input->post('description3')
                );


                // update the database with the rate, vessel, and other info
                // where the id matches the session id
                $data['id'] = $this->session->userdata('charter_id');
                $id = $data['id'];

               

                $this->Resource_model->update_charter($post, $id);

                //load the view for the success message
                $this->load->helper('path');

                $this->load->view('html');
                $this->load->view('header');
                $this->load->view('navigation');
                $this->load->view('cta');

                $this->load->view('resources/side-nav');
                $this->load->view('resources/new_charter_success');
                $this->load->view('resources/side-ads');

                $this->load->view('footer');
                }
            }

      
    


       

// -------------------------------------------------------------------------------------------

//                          Tournaments

// -------------------------------------------------------------------------------------------

    // This function gets all of the tournament data to display on the Listings page 
	public function fishing_tournaments()
	{
        // if the post data for the region is not set
        // get all tournament listings from the db
        // pass the data to the tournament view page
        if(!isset($_POST['region'])){

            $data['tournament'] = $this->Resource_model->get_all_tournaments();
            $this->tournament_view($data);
            
        // if the post data for the region is set
        // query the db for the region name
        // query the db for the tournament info by region
        // pass the data to the view page
        }else{

            $region = $_POST['region'];

            $data['region'] = $this->Resource_model->get_region($region);
            $data['tournament'] = $this->Resource_model->get_tournaments($region);

            $this->tournament_view($data);

        }


	}

    // This function creates the tournament listing page
    // recieve the tournament data
    // and pass it to the file that display it
    public function tournament_view($data)
    {
        $this->load->view('html');
        $this->load->view('header');
        $this->load->view('navigation');
        $this->load->view('cta');

        $this->load->view('resources/side-nav');
        $this->load->view('resources/fishing_tournaments', $data);
    
        $this->load->view('footer');
    }

    // this is the page that shows a single tournament listing
    public function tournament()
    {
        // get the fishing charter info that matches the get id
        $id = $_GET['id'];
        $data['tournament'] = $this->Resource_model->get_tournament_info($id);

        // load the tournament page
        $this->load->view('html');
        $this->load->view('header');
        $this->load->view('navigation');
        $this->load->view('cta');

        $this->load->view('resources/side-nav');        
        $this->load->view('resources/tournament', $data);

        
        $this->load->view('footer');

    }

    // this function creates the form to add a new listing
    public function new_tournament()
    {

        $this->form_validation->set_rules('tournament_name', 'Tournament Name', 'required|max_length[500]|prep_for_form|xss_clean|encode_php_tags');
        $this->form_validation->set_rules('email', 'Email Address', 'required|valid_email|is_unique[tournaments.email]|prep_for_form|xss_clean|encode_php_tags');
        $this->form_validation->set_rules('website', 'Website URL', 'required|max_length[200]|prep_for_form|xss_clean|prep_url|encode_php_tags');
        $this->form_validation->set_rules('phone', 'Phone Number', 'required|numeric|prep_for_form|xss_clean|encode_php_tags');
        $this->form_validation->set_rules('region', 'Region', 'required|prep_for_form|xss_clean|encode_php_tags');
        $this->form_validation->set_rules('description', 'Description', 'required|max_length[300]|prep_for_form|xss_clean|encode_php_tags');
        $this->form_validation->set_rules('rates', 'Rates', 'required|max_length[100]|prep_for_form|xss_clean|encode_php_tags');
        $this->form_validation->set_rules('date', 'Date', 'required|max_length[100]|prep_for_form|xss_clean|encode_php_tags');


        // Set the error messages
        $this->form_validation->set_message('required', 'This Field is Required');
        $this->form_validation->set_message('numeric', 'Please enter a valid phone number');
        $this->form_validation->set_message('valid_email', 'Please enter a valid email address');
        $this->form_validation->set_message('is_unique[tournaments.email]', 'This email address has already been used');


        // if the form validations have not yet been run
        // load the page to to be validated
        if ($this->form_validation->run() == FALSE){

            $this->load->view('html');
            $this->load->view('header');
            $this->load->view('navigation');
            $this->load->view('cta');

            $this->load->view('resources/side-nav');
            $this->load->view('new_tournament');

            $this->load->view('footer');  
        }else{
            $this->tournament_upload();
            redirect('resources/new_tournament_form');

        }
    }

    // this function uploads an image and deals with the post data
    public function tournament_upload()
        {   
                $config['upload_path']          = 'assets/img/tournament/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 1000;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;
 
            $this->load->library('upload', $config);

                // if the files didnt upload
                // show the errors
                if ( ! $this->upload->do_upload()){

                    $error = array('error' => $this->upload->display_errors());
                    $this->index($error);


                }else{


            #--------------------------------------------------------

            
                    // get the filename
                    $data = $this->upload->data('upload_data','file_name');

                    // this is the filename which gets stored in the database
                    $filename = $data['file_name'];

                 
            #--------------------------------------------------------

                    // ADMIN PHOTO GALLERY - POST DATA
                    // get all post data as an array
                    $post = array(
                        'tournament_name' => $this->input->post('tournament_name'),
                        'email' => $this->input->post('email'),
                        'website' => $this->input->post('website'),
                        'phone' => $this->input->post('phone'),
                        'ticket_price' => $this->input->post('rates'),
                        'region_id' => $this->input->post('region'),
                        'main_img' => $filename,
                        'description' => $this->input->post('description'),
                        'date' => $this->input->post('date')
                    );


                    // get the email address so the id can be found later
                    $email = $this->input->post('email');

                    // send post data to the db table
                    $this->Resource_model->insert_tournament($post);


                    // get the id of this tournament where email is $email
                    $tournamentID = $this->Resource_model->tournament_id($email);


                    // store the tournament id in a session to use in the rest of the form
                    $this->session->set_userdata('tournament_id', $tournamentID[0]->id);

                    redirect('resources/new_tournament_form');
                }

        }   


    public function new_tournament_form()
    {
        // SET THE RULES FOR THE ERROR VALIDATION
        $this->form_validation->set_rules('description1', 'Description', 'required|max_length[1000]|prep_for_form|xss_clean|encode_php_tags');
        $this->form_validation->set_rules('description2', 'Description', 'required|max_length[1000]|prep_for_form|xss_clean|encode_php_tags');

        
        // Set the error message
        $this->form_validation->set_message('required', 'This Field is Required');

        // If the validations ar not yet run show the form
        if ($this->form_validation->run() == FALSE){

            $this->load->view('html');
            $this->load->view('header');
            $this->load->view('navigation');
            $this->load->view('cta');

            $this->load->view('resources/side-nav');
            $this->load->view('resources/new_tournament_form');

            $this->load->view('footer');  
        }else{
            
             $post = array(
                    'description1' => $this->input->post('description1'),
                    'description2' => $this->input->post('description2')
                );


                // update the database with the DESCRIPTIONS, and other info
                // where the id matches the session id
                $data['id'] = $this->session->userdata('tournament_id');
                $id = $data['id'];

                      

                $this->Resource_model->update_tournament($post, $id);

                //load the view for the success message
                $this->load->helper('path');

                $this->load->view('html');
                $this->load->view('header');
                $this->load->view('navigation');
                $this->load->view('cta');

                $this->load->view('resources/side-nav');
                $this->load->view('resources/new_tournament_success');
                $this->load->view('resources/side-ads');

                $this->load->view('footer');
                

        }
        
    }


// -------------------------------------------------------------------------------------------

//                          Campgrounds

// -------------------------------------------------------------------------------------------



    // this function displays all the campground listings
	public function campgrounds()
	{
		// if the post data for the region is not set
        // get all campground data 
        // pass data to the view page
        if(!isset($_POST['region'])){

            $data['campground'] = $this->Resource_model->get_all_campgrounds();
            $this->campground_view($data);
        
        // if the post data for the region has been set
        // get the region name
        // get all the campground data for that region  
        // pass that data to the campground view 
        }else{

            $region = $_POST['region'];
            $data['region'] = $this->Resource_model->get_region($region);
            $data['campground'] = $this->Resource_model->get_campgrounds($region);
            $this->campground_view($data);

            }
	}

    // this function creates the campground view page
    public function campground_view($data)
    {
        $this->load->view('html');
        $this->load->view('header');
        $this->load->view('navigation');
        $this->load->view('cta');

        $this->load->view('resources/side-nav');
        $this->load->view('resources/campgrounds', $data);
        
        $this->load->view('footer');
    }

    // this function creates the view for adding a new campground
    public function new_campground()
    {
        $this->form_validation->set_rules('campground_name', 'Campground Name', 'required|max_length[500]|prep_for_form|xss_clean|encode_php_tags');
        $this->form_validation->set_rules('email', 'Email Address', 'required|valid_email|is_unique[campgrounds.email]|prep_for_form|xss_clean|encode_php_tags');
        $this->form_validation->set_rules('website', 'Website URL', 'required|max_length[200]|prep_for_form|xss_clean|prep_url|encode_php_tags');
        $this->form_validation->set_rules('phone', 'Phone Number', 'required|numeric|prep_for_form|xss_clean|encode_php_tags');
        $this->form_validation->set_rules('region', 'Region', 'required|prep_for_form|xss_clean|encode_php_tags');
        $this->form_validation->set_rules('description', 'Description', 'required|max_length[300]|prep_for_form|xss_clean|encode_php_tags');


        // Set the error messages
        $this->form_validation->set_message('required', 'This Field is Required');
        $this->form_validation->set_message('numeric', 'Please enter a valid phone number');
        $this->form_validation->set_message('valid_email', 'Please enter a valid email address');
        $this->form_validation->set_message('is_unique[campgrounds.email]', 'This email address has already been used');


        // if the form validations have not yet been run
        // load the page to to be validated
        if ($this->form_validation->run() == FALSE){

            $this->load->view('html');
            $this->load->view('header');
            $this->load->view('navigation');
            $this->load->view('cta');

            $this->load->view('resources/side-nav');
            $this->load->view('resources/new_campground');

            $this->load->view('footer');  

        }else{
                $this->campground_upload();
                redirect('resources/new_campground_form');
        }
//---------------------------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------------------------

    }

    // this function uploads multiple campground imgs
    // deals with the post data
    // and sends it all to be stored in the db table
    function campground_upload()
    {
                $config['upload_path']          = 'assets/img/campground/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 1000;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;
 
            $this->load->library('upload', $config);

                // if the files didnt upload
                // show the errors
                if ( ! $this->upload->do_upload()){

                    $error = array('error' => $this->upload->display_errors());
                    //$this->index($error);

                    //echo print_r($error);

                }else{


            #--------------------------------------------------------

            
                    // get the filename
                    $data = $this->upload->data('upload_data','file_name');

                    // this is the filename which gets stored in the database
                    $filename = $data['file_name'];

                 
            #--------------------------------------------------------

                    // ADMIN PHOTO GALLERY - POST DATA
                    // get all post data as an array
                    $post = array(
                        'campground_name' => $this->input->post('campground_name'),
                        'email' => $this->input->post('email'),
                        'website' => $this->input->post('website'),
                        'phone' => $this->input->post('phone'),
                        'region' => $this->input->post('region'),
                        'main_img' => $filename,
                        'description' => $this->input->post('description')
                    );


                    // get the email address so the id can be found later
                    $email = $this->input->post('email');


                    $pop = array_pop($post);


                    // send post data to the db table
                    $this->Resource_model->insert_campground($post);


                    // get the id of this tournament where email is $email
                    $campgroundID = $this->Resource_model->campground_id($email);

                    //echo print_r($campgroundID);

                    // store the tournament id in a session to use in the rest of the form
                    $this->session->set_userdata('campground_id', $campgroundID[0]->id);

                    redirect('resources/new_campground_form');
                }

    }

 public function new_campground_form()
    {
        // SET THE RULES FOR THE ERROR VALIDATION
        $this->form_validation->set_rules('description1', 'Description', 'required|max_length[1000]|prep_for_form|xss_clean|encode_php_tags');
        $this->form_validation->set_rules('description2', 'Description', 'required|max_length[1000]|prep_for_form|xss_clean|encode_php_tags');

        
        // Set the error message
        $this->form_validation->set_message('required', 'This Field is Required');

        // If the validations ar not yet run show the form
        if ($this->form_validation->run() == FALSE){

            $this->load->view('html');
            $this->load->view('header');
            $this->load->view('navigation');
            $this->load->view('cta');

            $this->load->view('resources/side-nav');
            $this->load->view('resources/new_campground_form');

            $this->load->view('footer');  
        }else{
            
             $post = array(
                    'description1' => $this->input->post('description1'),
                    'description2' => $this->input->post('description2')
                );


                // update the database with the DESCRIPTIONS, and other info
                // where the id matches the session id
                $data['id'] = $this->session->userdata('campground_id');
                $id = $data['id'];

                      

                $this->Resource_model->update_campground($post, $id);

                //load the view for the success message
                $this->load->helper('path');

                $this->load->view('html');
                $this->load->view('header');
                $this->load->view('navigation');
                $this->load->view('cta');

                $this->load->view('resources/side-nav');
                $this->load->view('resources/new_campground_success');
                //$this->load->view('resources/side-ads');

                $this->load->view('footer');
                

        }
        
    }

   

    // this function gets all the campground info according to the get id
    // loads the view to display a single campground and all of its info
    // passes the data to the html view to be organised on the page
    public function campground()
    {

        // get all campground data where id is $GET id
        $id = $_GET['id'];
        $data['campground'] = $this->Resource_model->get_campground_info($id);
       
        $this->load->view('html');
        $this->load->view('header');
        $this->load->view('navigation');
        $this->load->view('cta');

        $this->load->view('resources/side-nav');
        $this->load->view('resources/campground', $data);

        $this->load->view('footer');        
    }



// -------------------------------------------------------------------------------------------

//                          Fishing Knots

// -------------------------------------------------------------------------------------------


    // this function loads the page for the albright knot
	public function albright_knot()
	{
		$this->load->helper('path');

		$this->load->view('html');
		$this->load->view('header');
		$this->load->view('navigation');
		$this->load->view('cta');

		$this->load->view('resources/side-nav');
		$this->load->view('resources/albright_knot');
		$this->load->view('resources/side-ads');

		$this->load->view('footer');
	}

    // this function loads the page for the arbor knot
	public function arbor_knot()
	{
		$this->load->helper('path');
		$this->load->helper('html');
        $this->load->helper('url');

		$this->load->view('html');
		$this->load->view('header');
		$this->load->view('navigation');
		$this->load->view('cta');

		$this->load->view('resources/side-nav');
		$this->load->view('resources/arbor_knot');
		$this->load->view('resources/side-ads');

		$this->load->view('footer');
	}

    // this function loads the page for the blood knot
	public function blood_knot()
	{
		$this->load->helper('path');
		$this->load->view('html');
		$this->load->view('header');
		$this->load->view('navigation');
		$this->load->view('cta');

		$this->load->view('resources/side-nav');
		$this->load->view('resources/blood_knot');
		$this->load->view('resources/side-ads');

		$this->load->view('footer');
	}

    // this function loads the page for the clinch knot
	public function clinch_knot()
	{
		$this->load->helper('path');
		$this->load->view('html');
		$this->load->view('header');
		$this->load->view('navigation');
		$this->load->view('cta');

		$this->load->view('resources/side-nav');
		$this->load->view('resources/clinch_knot');
		$this->load->view('resources/side-ads');

		$this->load->view('footer');
	}

    // this function loads the page for the dropper knot
	public function dropper_knot()
	{
		$this->load->helper('path');

		$this->load->view('html');
		$this->load->view('header');
		$this->load->view('navigation');
		$this->load->view('cta');

		$this->load->view('resources/side-nav');
		$this->load->view('resources/dropper_knot');
		$this->load->view('resources/side-ads');

		$this->load->view('footer');
	}

    // this function loads the page for the improved clinch knot
	public function improved_clinch_knot()
	{
		$this->load->helper('path');
		$this->load->view('html');
		$this->load->view('header');
		$this->load->view('navigation');
		$this->load->view('cta');

		$this->load->view('resources/side-nav');
		$this->load->view('resources/improved_clinch');
		$this->load->view('resources/side-ads');

		$this->load->view('footer');
	}

    // this function loads the page for the nail knot
	public function nail_knot()
	{
		$this->load->helper('path');

		$this->load->view('html');
		$this->load->view('header');
		$this->load->view('navigation');
		$this->load->view('cta');

		$this->load->view('resources/side-nav');
		$this->load->view('resources/nail_knot');
		$this->load->view('resources/side-ads');

		$this->load->view('footer');
	}

    // this function loads the page for the palomar knot
	public function palomar_knot()
	{
		$this->load->helper('path');
		$this->load->view('html');
		$this->load->view('header');
		$this->load->view('navigation');
		$this->load->view('cta');

		$this->load->view('resources/side-nav');
		$this->load->view('resources/palomar_knot');
		$this->load->view('resources/side-ads');

		$this->load->view('footer');
	}

    // this function loads the page for the perfection knot
	public function perfection_knot()
	{
		$this->load->helper('path');
		$this->load->view('html');
		$this->load->view('header');
		$this->load->view('navigation');
		$this->load->view('cta');

		$this->load->view('resources/side-nav');
		$this->load->view('resources/perfection_knot');
		$this->load->view('resources/side-ads');

		$this->load->view('footer');
	}

    // this function loads the page for the snell knot
	public function snell_knot()
	{
		$this->load->helper('path');
		$this->load->view('html');
		$this->load->view('header');
		$this->load->view('navigation');
		$this->load->view('cta');

		$this->load->view('resources/side-nav');
		$this->load->view('resources/snell_knot');
		$this->load->view('resources/side-ads');

		$this->load->view('footer');
	}

    // this function loads the page for the surgeon knot
	public function surgeon_knot()
	{
		$this->load->helper('path');
		$this->load->view('html');
		$this->load->view('header');
		$this->load->view('navigation');
		$this->load->view('cta');

		$this->load->view('resources/side-nav');
		$this->load->view('resources/surgeon_knot');
		$this->load->view('resources/side-ads');

		$this->load->view('footer');
	}

    // this function loads the page for the uni knot
	public function uni_knot()
	{
		$this->load->helper('path');

		$this->load->view('html');
		$this->load->view('header');
		$this->load->view('navigation');
		$this->load->view('cta');

		$this->load->view('resources/side-nav');
		$this->load->view('resources/uni_knot');
		$this->load->view('resources/side-ads');

		$this->load->view('footer');
	}






   


}
