<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

        <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
 

        <!-- Favicon -->
        <link rel="icon" href="{{asset('dashboard/asset/img/brand/favicon.png')}}" type="image/x-icon"/>

        <!-- Icons css -->
        <link href="{{asset('dashboard/asset/css/icons.css')}}" rel="stylesheet">

        <!--  Right-sidemenu css -->
        <link href="{{asset('dashboard/asset/plugins/sidebar/sidebar.css')}}" rel="stylesheet">

        <!-- Sidemenu css -->
        <link rel="stylesheet" href="{{asset('dashboard/asset/css/closed-sidemenu.css')}}">


        <!--- Style css-->
        <link href="{{asset('dashboard/asset/css/style.css')}}" rel="stylesheet">
        <link href="{{asset('dashboard/asset/css/style-dark.css')}}" rel="stylesheet">

        <!---Skinmodes css-->
        <link href="{{asset('dashboard/asset/css/skin-modes.css')}}" rel="stylesheet" />

        <!--- Animations css-->
        <link href="{{asset('dashboard/asset/css/animate.css')}}" rel="stylesheet">
        @vite('resources/css/app.css')

    </head>

    <body class="main-body app sidebar-mini">
       <style type="text/css">
           /* #Tablet (Portrait)
           ================================================== */
           /* Note: Design for a width of 768px */
           /*@media all and (min-width: 768px) and (max-width: 959px) {
               td.col_1,th.col_1{
                   display:none;
                   width:0;
                   height:0;
                   opacity:0;
                   visibility: collapse;       
               } 
           }*/
           /* #Mobile (Landscape)
           ================================================== */
           /* Note: Design for a width of 600px */
           @media all and (min-width: 600px) and (max-width: 767px) {
                th:nth-child(n+5){
                   display:none;
                   width:0;
                   height:0;
                   opacity:0;
                   visibility: collapse;
               } 
                td:nth-child(n+5){
                   display:none;
                   width:0;
                   height:0;
                   opacity:0;
                   visibility: collapse;
               } 
           }
           /* #Mobile (Landscape)
           ================================================== */
           /* Note: Design for a width of 480px */
           @media all and (min-width: 480px) and (max-width: 599px) {
                th:nth-child(n+4){
                   display:none;
                   width:0;
                   height:0;
                   opacity:0;
                   visibility: collapse;
               } 
                td:nth-child(n+4){
                   display:none;
                   width:0;
                   height:0;
                   opacity:0;
                   visibility: collapse;
               }  
           }
           /*  #Mobile (Portrait)
           ================================================== */
           /* Note: Design for a width of 320px */
           @media all and (max-width: 479px) {
                th:nth-child(n+3){
                   display:none;
                   width:0;
                   height:0;
                   opacity:0;
                   visibility: collapse;
               } 
                td:nth-child(n+3){
                   display:none;
                   width:0;
                   height:0;
                   opacity:0;
                   visibility: collapse;
               }    
           }
           th:last-child ,td:last-child ,.never-hide{
                display:revert;
                width:0;
                height:100%;
                opacity:1;
                visibility: unset;
           }
           #ChatBody , #ChatList{
                overflow: scroll;
           }
       </style>
        @if (Auth::check())
            <script>
                window.Laravel = {!!json_encode([
                    'isLoggedin' => true,
                    'user' => Auth::user()
                ])!!}
            </script>
        @else
            <script>
                window.Laravel = {!!json_encode([
                    'isLoggedin' => false
                ])!!}
            </script>
        @endif
        <div id="app" class="page">
            <layout></layout>
        </div>
        @vite('resources/js/app.js')


   



    </body>
</html>