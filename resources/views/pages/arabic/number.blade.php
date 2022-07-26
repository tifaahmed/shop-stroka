<?php
$english_number = array("0","1","2","3","4","5","6","7","8","9");
$arabic_number = array("٠","١","٢","٣","٤","٥","٦","٧","٨","٩");
 $arabic_reasult = str_replace($english_number , $arabic_number , $number);
 $english_reasult = str_replace($arabic_number , $english_number , $number);


if( Session::get('locale') == 'ar')
   {
   	echo $arabic_reasult;

   }
else
  {
  	echo $english_reasult;

  } 
?>
  <!-- include('pages.arabic.number', ['number' => ++$key ]) -->