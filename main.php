<?php

$q = mysqli_connect('localhost', 'root', '')or die('no: ' . mysqli_error($q));
mysqli_select_db($q,"queuekz");
$result_money = mysqli_query($q,"SELECT * FROM dle_users WHERE name='{$_GET["user"]}'");
 $myrow_money = mysqli_fetch_array($result_money);
 $uuid = $myrow_money[uuid];
;


$result_money = mysqli_query($q,"SELECT * FROM flanstechacivments_achievements WHERE playername='{$uuid}' limit 0,6");
 $myrow_money = mysqli_fetch_array($result_money);

while( $myrow_money = $result_money->fetch_array() )
{
    echo '<a href="#" aria-label="' . $myrow_money['description'] .'"><li><img src="{THEME}/assets/img/achievement/' . $myrow_money['achievement'] . '.png" alt=' . $myrow_money['achievement'] . '></li></a>';
}







?>
