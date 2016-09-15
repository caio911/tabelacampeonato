<?php
 
$times = array(
    'time a',
    'time b',
    'time c'
);
include "roundRobin.class.php";
$RoundRobin = new roundRobin;
$rounds = $RoundRobin->execute($times);
shuffle($rounds);
foreach ($rounds as $key => $round) {
    echo '<b>Rodada '.$key.'</b>';
    echo '<br>';
    foreach ($round as $key => $match) {
       echo $match[0].' x '.$match[1];
       echo '<br>';
    }
    echo '<br>';
}