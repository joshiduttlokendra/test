


@if ($paginator->hasPages())
<nav class="d-flex justify-content-between pt-2" aria-label="Page navigation">
          

                    <ul class="pagination">
                        @if($paginator->onFirstPage()) 
                                <li class="page-item"><a class="disabled"><i class="ci-arrow-left me-2"></i>Prev</a>
                                </li>
                        @else
                                <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}"><i class="ci-arrow-left me-2"></i>Prev</a>
                                </li>
                        @endif
                    </ul>
                    <ul class="pagination">
                    @foreach ($elements as $element)
                        @if (is_string($element))
                        
                            <li class="page-item d-none d-sm-block disabled"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                                            
                        @endif
                           @if (is_array($element))
                                @foreach ($element as $page => $url)
                                    @if ($page == $paginator->currentPage())
                                
                                        <li class="page-item active d-none d-sm-block" aria-current="page"><span
                                                class="page-link">{{ $page }}<span class="visually-hidden">(current)</span></span></li>
                                    @else
                                    <li class="page-item d-none d-sm-block"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                                
                                    @endif
                                @endforeach
                            @endif
                     @endforeach

                    </ul>
                    <ul class="pagination">
                    @if ($paginator->hasMorePages())
                        <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}" aria-label="Next">Next<i class="ci-arrow-right ms-2"></i></a></li>
                    @else
                          <li class="page-item"><a class="disabled" href="#" aria-label="Next">Next<i class="ci-arrow-right ms-2"></i></a></li>
                   
                    @endif
                    </ul>
                </nav>





@endif 