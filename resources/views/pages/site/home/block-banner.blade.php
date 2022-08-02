
    <!-- .block-banner -->
    <style type="text/css">
        .block-banner{
           height: 300px;
        }
         @media (max-width: 767px){
             .block-banner__text {
                 width: 100%;
                 padding-left: 18px;
                 margin-right: 10px;
             }
             .block-banner{
                height: 600px;
             }
         }
     </style>
     <div class="block block-banner" >
        <div class="container">
            <a href="#" class="block-banner__body">
                <div class="block-banner__image block-banner__image--desktop" style="
                background-image: url({{asset('images/s1.jpg')}}) ;
                background-repeat: no-repeat;
                background-position: center;
                background-attachment: fixed;
                background-size: cover;
                height: 300px;
                "></div>

                <div class="block-banner__image block-banner__image--mobile" style="
                background-image: url({{asset('images/h1.jpg')}});
                background-repeat: no-repeat;
                background-position: center;
                background-attachment: fixed;
                background-size: cover;
                height: 600px;

                "></div>
                <div class="block-banner__title"  style="color: white">
                 <br class="block-banner__mobile-br">
                 {{-- $about_home->home_title1 --}}
                 العنوان

                </div>
                <div class="block-banner__text" style="color: white">
                 {{-- $about_home->home_subject1  --}}
                        الموضوع
                </div>
                <div class="block-banner__button" style="color: white">
                    <span class="btn btn-sm btn-primary"> 
                        {{-- $about_home->button1   --}}
                        اسم الزر
                    </span>
                </div>
            </a>
        </div>
    </div>
    <!-- .block-banner / end -->