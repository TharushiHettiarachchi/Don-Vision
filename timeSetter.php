<?php


$d =  new DateTime();
$tz =  new DateTimeZone("Asia/Colombo");
$d->setTimezone($tz);
$date = $d->format("d S F Y");
$time = $d->format("H:i:s");


?>
<span class="span1"> <?php echo ($date); ?></span>
<span class="span1"> <?php echo ($time) ?></span>
<i class="fa-solid fa-calendar" onclick="calendar();"></i>



