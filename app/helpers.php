<?php

if (!function_exists('convertTimeTo12HourFormat')) {
    function convertTimeTo12HourFormat($time) {
        $dateTime = DateTime::createFromFormat('H:i:s', $time);
        return $dateTime->format('h:i A');
    }
}
