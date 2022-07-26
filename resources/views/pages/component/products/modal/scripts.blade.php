
<style type="text/css">
    .modal-backdrop {
         position: relative!important; 
         top: 0!important;  
         left: 0!important; 
         z-index: 1040!important; 
         width: 0!important;  
         height: 0!important; 
         background-color: #fff!important;  
    }
</style>
<!-- quickview-modal -->
<div id="quickview-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content"  > </div>
    </div>
</div>
    <!-- quickview-modal / end -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

<script type="text/javascript">
    /*
    // quickview
    */
    const quickview = {
        cancelPreviousModal: function() {},
        clickHandler: function() {
            const modal = $('#quickview-modal');
            const button = $(this);
            var url =  $(this).children('.quickview_url').val() ;

            const doubleClick = button.is('.product-card__quickview--preload');

            quickview.cancelPreviousModal();

            if (doubleClick) {
                return;
            }

            button.addClass('product-card__quickview--preload');

            let xhr = null;
            // timeout ONLY_FOR_DEMO!
            const timeout = setTimeout(function() {
                xhr = $.ajax({
                    type:'GET',
                    url: "{{asset('product_modal')}}"+'/'+url,

                    
                    success: function(data) {
                        quickview.cancelPreviousModal = function() {};
                        button.removeClass('product-card__quickview--preload');

                        modal.find('.modal-content').html(data);
                        modal.find('.quickview__close').on('click', function() {
                             $("#quickview-modal").modal('hide');

                        });
                        modal.find('.product-gallery__zoom').on('click', function() {
                            
                          
                            // $( ".owl-carousel .product-image__img:first-child" ).val();
                        var url = $(this).parent()
                        .children('.owl-carousel')
                        .children('.owl-stage-outer')
                        .children('.owl-stage')
                        .children('.active')
                        .children('.product-image')
                        .children('.product-image__body')
                        .children('img')
                        .attr('src');

                        var win = window.open(url, '_blank');
                        if (win) {
                            //Browser has allowed it to be opened
                            win.focus();
                        } else {
                            //Browser has blocked it
                            alert('Please allow popups for this website');
                        }    
                            

                        });
                        
                        modal.modal('show');
                    }
                });

            }, 1);

            quickview.cancelPreviousModal = function() {
                button.removeClass('product-card__quickview--preload');

                if (xhr) {
                    xhr.abort();
                }

                // timeout ONLY_FOR_DEMO!
                clearTimeout(timeout);
            };
        }
    };

    $(function () {
        const modal = $('#quickview-modal');

        modal.on('shown.bs.modal', function() {
            modal.find('.product').each(function () {
                const gallery = $(this).find('.product-gallery');

                if (gallery.length > 0) {
                    // alert($(this).data('layout'));
                    // initProductGallery(gallery[0], $(this).data('layout'));
                }
            });

            $('.input-number', modal).customNumber();
        });

        $('.product-card__quickview').on('click', function() {
            
            
            quickview.clickHandler.apply(this, arguments);
        });
    });


</script>



<script src="{{asset('asset_ar/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('asset_ar/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('asset_ar/vendor/owl-carousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('asset_ar/vendor/nouislider/nouislider.min.js')}}"></script>
<script src="{{asset('asset_ar/vendor/photoswipe/photoswipe.min.js')}}"></script>
<script src="{{asset('asset_ar/vendor/photoswipe/photoswipe-ui-default.min.js')}}"></script>
<script src="{{asset('asset_ar/vendor/select2/js/select2.min.js')}}"></script>
<script src="{{asset('asset_ar/js/number.js')}}"></script>
<script src="{{asset('asset_ar/js/main.js')}}"></script>
<script src="{{asset('asset_ar/js/header.js')}}"></script>
<script src="{{asset('asset_ar/vendor/svg4everybody/svg4everybody.min.js')}}"></script>
<script>
    svg4everybody();
</script>