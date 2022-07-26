        <style type="text/css">
        .fadeeeee {
        animation-name: fade;
        animation-duration: 2s;
        }
        @keyframes fade {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
        }
        </style>



        <script src="https://cdn.jsdelivr.net/npm/lozad"></script>

        <script type="text/javascript">
            lozad('.lozad', {
                load: function(el) {
                    el.src = el.dataset.src;
                    el.onload = function() {
                        el.classList.add('fadeeeee')
                    }
                }
            }).observe()
        </script>




