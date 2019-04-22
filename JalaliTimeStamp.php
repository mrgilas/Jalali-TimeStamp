<?php
//start///////////////////////////////////////////////////////////////JalaliTimeStamp
//Function Developed By Sajjad Alee Mohammad (CEO at GilasWeb.ir)
function jalalitimestamp()
{
//get server date
$yGilasWeb_ir=date('Y');
$mGilasWeb_ir=date('m');
$dGilasWeb_ir=date('d');

//convert date
$d_4 = $yGilasWeb_ir % 4;
$g_a = array(0, 0, 31, 59, 90, 120, 151, 181, 212, 243, 273, 304, 334);
$doy_g = $g_a[(int)$mGilasWeb_ir] + $dGilasWeb_ir;
if ($d_4 == 0 and $mGilasWeb_ir > 2)
$doy_g++;
$d_33 = (int)((($yGilasWeb_ir - 16) % 132) * 0.0305);
$a = ($d_33 == 3 or $d_33 < ($d_4 - 1) or $d_4 == 0) ? 286 : 287;
$b = (($d_33 == 1 or $d_33 == 2) and ($d_33 == $d_4 or $d_4 == 1)) ? 78 : (($d_33 == 3 and $d_4 == 0) ? 80 : 79);
if((int)(($yGilasWeb_ir - 10) / 63) == 30) {
$a--;
$b++;
}
if($doy_g > $b) {
$jy = $yGilasWeb_ir - 621;
$doy_j = $doy_g - $b;
}
else {
$jy = $yGilasWeb_ir - 622;
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
//end///////////////////////////////////////////////////////////////JalaliTimeStamp