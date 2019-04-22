<?php
//start///////////////////////////////////////////////////////////////
//Function Developed By Sajjad Alee Mohammad (Aleemohammad.ir)
function jalalitimestamp()
{
 
//get server date
$yaleemohammad_ir=date('Y');
$maleemohammad_ir=date('m');
$daleemohammad_ir=date('d');

//convert date
$d_4 = $yaleemohammad_ir % 4;
$g_a = array(0, 0, 31, 59, 90, 120, 151, 181, 212, 243, 273, 304, 334);
$doy_g = $g_a[(int)$maleemohammad_ir] + $daleemohammad_ir;
if ($d_4 == 0 and $maleemohammad_ir > 2)
$doy_g++;
$d_33 = (int)((($yaleemohammad_ir - 16) % 132) * 0.0305);
$a = ($d_33 == 3 or $d_33 < ($d_4 - 1) or $d_4 == 0) ? 286 : 287;
$b = (($d_33 == 1 or $d_33 == 2) and ($d_33 == $d_4 or $d_4 == 1)) ? 78 : (($d_33 == 3 and $d_4 == 0) ? 80 : 79);
if((int)(($yaleemohammad_ir - 10) / 63) == 30) {
$a--;
$b++;
}
if($doy_g > $b) {
$jy = $yaleemohammad_ir - 621;
$doy_j = $doy_g - $b;
}
else {
$jy = $yaleemohammad_ir - 622;
$doy_j = $doy_g + $a;
}
if($doy_j < 187) {
$jm = (int)(($doy_j - 1) / 31);
$jd = $doy_j - (31 * $jm++);
}
else {
$jm = (int)(($doy_j - 187) / 30);
$jd = $doy_j - 186 - ($jm * 30);
$jm += 7;
}

//change time zone
date_default_timezone_set("Asia/Tehran");

//get server time on new time zone and send
return $jy.'/'.$jm.'/'.$jd.' - '.date("h:i:sa");
}
//end///////////////////////////////////////////////////////////////