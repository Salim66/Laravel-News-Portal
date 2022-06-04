<div class="row">
    <div class="col">
        @if($paginator->hasPages())
        <div class="pagination-area">

        @if($paginator->onFirstPage())

        @else
          <a href="{{ $paginator->previousPageUrl() }}" class="prev page-numbers">
            <i class='bx bx-chevron-left'></i>
          </a>
        @endif


          @foreach ($elements as $element)
            @if(is_array($element))
            @foreach ($element as $page => $url)
                @if($paginator->currentPage() == $page)
                    <a href="{{ $url }}" class="page-numbers current">{{ $page }}</a>
                @else
                    <a href="{{ $url }}" class="page-numbers active">{{ $page }}</a>
                @endif
            @endforeach
            @endif
          @endforeach

          @if($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="next page-numbers">
                <i class='bx bx-chevron-right'></i>
            </a>
          @endif
        </div>

 @endif
    </div>
 </div>



