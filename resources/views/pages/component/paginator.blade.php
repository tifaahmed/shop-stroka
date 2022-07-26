


<!-- 

<div class="pager">
  <ul class="pagination style2">
    @if ($paginator->lastPage() > 1)
      @if($paginator->currentPage() !== 1)
        <li>
          <a href="{{ $paginator->url(1) }} ">
          <i aria-hidden="{{ ($paginator->currentPage() == 1) ? ' true' : '' }}"  class="fa fa-chevron-right"></i></a>
        </li>
      @endif

      @for ($i = 1; $i <= $paginator->lastPage(); $i++)
        <li class=" {{ ($paginator->currentPage() == $i) ? 'selected' : '' }}">
          <a href="{{ $paginator->url($i) }}">{{ $i }}</a>
        </li>
      @endfor

      @if($paginator->currentPage() !== $paginator->lastPage())
        <li>
          <a href="{{ $paginator->url($paginator->currentPage()+1) }}">
            <i  aria-hidden="{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' ' : 'true' }}" class="fa fa-chevron-left"></i>
          </a>
        </li>
      @endif
    @endif
  </ul>
</div> -->





<div class="col-lg-12 text-center">
    <nav aria-label="...">
        <ul class="pagination pagination-box wow fadeInUp" data-wow-delay="0.4s">



        @if($paginator->currentPage() !== 1)


          <li class="disabled">
              <a href="{{ $paginator->url($paginator->currentPage()-1) }} " aria-label="Previous">
                  <i class="fa fa-angle-double-left"></i>
              </a>
          </li>
        @endif

        @for ($i = 1; $i <= $paginator->lastPage(); $i++)

          @if($paginator->currentPage() == $i)
            <li class="active">
              <a href="#"> @include('pages.arabic.number', ['number' => $i ])  
                <span class="sr-only">(current)</span>
              </a>
            </li>
          @else  
            <li>
              <a href="{{ $paginator->url($i) }}"> @include('pages.arabic.number', ['number' => $i ]) </a>
            </li>
          @endif
        
        @endfor







        @if($paginator->currentPage() !== $paginator->lastPage())
          <li>
              <a href="{{ $paginator->url($paginator->currentPage()+1) }}" aria-label="Next">
                  <i class="fa fa-angle-double-right"></i>
              </a>
          </li>
        @endif



        
        </ul>
    </nav>
</div> <!-- End Pagination -->

                                 <!-- include('pages.paginator', ['paginator' => $items]) -->
