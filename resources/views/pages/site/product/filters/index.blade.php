<div class="block-sidebar__header">
    <div class="block-sidebar__title">Filters</div>
    <button class="block-sidebar__close" type="button">
        <svg width="20px" height="20px">
            <use xlink:href="images/sprite.svg#cross-20"></use>
        </svg>
    </button>
</div>
<div class="block-sidebar__item">
    <div class="widget-filters widget widget-filters--offcanvas--mobile" data-collapse data-collapse-opened-class="filter--opened">
        <h4 class="widget-filters__title widget__title">Filters</h4>
        <div class="widget-filters__list">

            <form id="filter_form" method="get" action=" {{ route('products', app()->getLocale() ) }}  " enctype="multipart/form-data" >  

            
                @include('pages.product.filters.category')
                @include('pages.product.filters.price')
                @include('pages.product.filters.brand')
                @include('pages.product.filters.color')
                <input type="" name="sort_by_form" id="sort_by_form">
                
                <button class="btn btn-primary btn-sm real_submet" type="submet" hidden="">Filter</button>

            </form>


        </div>
        <div class="widget-filters__actions d-flex">
            <button class="btn btn-primary btn-sm fake_submet">Filter</button>
            <a href="{{asset(Request::segment(1).'/products')}}" class="btn btn-secondary btn-sm">Reset</a>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).on('click', '.fake_submet', function (event) {
        $('.real_submet').click();
    });
</script>