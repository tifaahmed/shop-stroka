


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

        <div class="page-indicator">
            <ul>

              @if($paginator->currentPage() !== 1)
                <li><a href="{{ $paginator->url($paginator->currentPage()-1) }}" class="tran3s"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a></li>
              @endif


              @for ($i = 1; $i <= $paginator->lastPage(); $i++)
                <li class="{{ ($paginator->currentPage() == $i) ? 'active' : '' }}">
                  <a href="{{ $paginator->url($i) }}" class="tran3s">$i</a>
                </li>
              @endfor


                @if($paginator->currentPage() !== $paginator->lastPage())
                  <li><a href="{{ $paginator->url($paginator->currentPage()+1) }}" class="tran3s"><i class="fa fa-angle-double-left" aria-hidden="true"></i></a></li>
                @endif
            </ul>
        </div>
                  <!-- include('pages.paginator', ['paginator' => $items]) -->
