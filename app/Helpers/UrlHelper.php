<?php

namespace App\Helpers;

class UrlHelper
{
    public static function attendanceUrl($grade_id, $date)
    {
        return route('attendance.show', ['grade_id' => $grade_id, 'date' => $date]);
    }
}