<?php 
function get_time_ago($time_ago) {
    $time_ago = strtotime($time_ago);
    $current_time = time();
    $time_difference = $current_time - $time_ago;
    
    if ($time_difference < 1) return 'Just Now';
    
    $seconds = array( 
        31536000 => 'year',
        2592000 => 'month',
        604800 => 'week',
        86400 => 'day',
        3600 => 'hour',
        60 => 'minute',
        1 => 'second'
    );
    
    foreach ($seconds as $unit => $text) {
        if ($time_difference < $unit) continue;
        $numberOfUnits = floor($time_difference / $unit);
        return "$numberOfUnits $text" . ($numberOfUnits > 1 ? 's' : '') . " ago";
    }
}
?>