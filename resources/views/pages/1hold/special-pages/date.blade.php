<?php 
    $months = array("Jan" => "يناير", "Feb" => "فبراير", "Mar" => "مارس", "Apr" => "أبريل", "May" => "مايو", "Jun" => "يونيو", "Jul" => "يوليو", "Aug" => "أغسطس", "Sep" => "سبتمبر", "Oct" => "أكتوبر", "Nov" => "نوفمبر", "Dec" => "ديسمبر");
    $your_date = $date->format('y-m-d'); // The Current Date
    $en_month = $date->format("M", strtotime($your_date)) ;
    foreach ($months as $en => $ar) {
        if ($en == $en_month) { $ar_month = $ar; }
    }

    $find = array ("Sat", "Sun", "Mon", "Tue", "Wed" , "Thu", "Fri");
    $replace = array ("السبت", "الأحد", "الإثنين", "الثلاثاء", "الأربعاء", "الخميس", "الجمعة");
    $ar_day_format = $date->format('D'); // The Current Day
    $ar_day = str_replace($find, $replace, $ar_day_format);

    header('Content-Type: text/html; charset=utf-8');
    $standard = array("0","1","2","3","4","5","6","7","8","9");
    $eastern_arabic_symbols = array("٠","١","٢","٣","٤","٥","٦","٧","٨","٩");
    $y_date =$date->format('Y');
    $d_date =$date->format('d');
    $m_date =$date->format('m');
    $y_date = str_replace($standard , $eastern_arabic_symbols , $y_date);
    $d_date = str_replace($standard , $eastern_arabic_symbols , $d_date);
    $m_date = str_replace($standard , $eastern_arabic_symbols , $m_date);
?>

{{$y_date}} / {{ $m_date}} / {{ $d_date}}