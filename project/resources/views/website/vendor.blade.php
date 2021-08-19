@include('websiteLayout.header')

<!-- Page Title (Light)-->
<div class="breadcum-banner">
    <div class="container">

      <div class="breadtext">
        <h1 class="mb-0 text-white">- MEET OUR VENDORS, SHOP FROM THEIR STORES -</h1>
      </div>


    </div>
  </div>


  <section class="section-padding vendors-block">
    <div class="container">

        <div class="vendor-card">
          <div class="row">

            <!-- Content-->
            <div class="col-lg-12 pt-lg-4 pb-md-4">


              <div class="">
                <h2 class="h3  text-center text-sm-start">Vendors<span class="badge bg-faded-accent fs-sm text-body align-middle ms-2">{{ $countMarkets }}</span></h2>
                <hr>

        <div class="bg-light shadow-lg rounded-3  mb-4 mt-3">
          <div class="d-block align-items-center">


            <form method="POST" action="{{ route('vendorSearch') }}">
           <div class="input-group w-100">
             @csrf
              <input class="form-control form-control-lg" type="text" name="search" placeholder="You can search here for .......">
              <button class="btn btn-primary" type="submit"><i class="ci-search "></i> Search</button>
            </div>
        </form>

          </div>
        </div>

                <div class="row pt-2">
                    @foreach ($response as $res)

                  <!-- Product-->
                  <div class="col-lg-3 mb-grid-gutter">
                    <div class="card product-card-alt">
                      <div class="product-thumb">
                       <a class="product-thumb-overlay" href="{{ route('miniStore',$res->id) }}"></a><img src="{{ asset($res->imageUrl) }}" alt="Product">
                       </div>
                      <div class="card-body">

                        <div class="d-flex flex-wrap justify-content-between align-items-center">
                                                <h3 class="product-title fs-sm mb-2"><a href="{{ route('miniStore',$res->id) }}">{{ $res->name }}</a></h3>

                          <div class="fs-sm me-2"><i class="ci-download text-muted me-1"></i><?php echo $sales=App\Http\Controllers\Controller::marketSales($res->id);?><span class="fs-xs ms-1">Sales</span></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Product-->
                  @endforeach

                </div>

  <div class="row">
    <div class="col-lg-12">
      <!-- Pagination: with icons -->
  {{-- <nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
      <li class="page-item">
        <a href="#" class="page-link" aria-label="Previous">
          <i class="ci-arrow-left"></i>
        </a>
      </li>
      <li class="page-item d-sm-none">
        <span class="page-link page-link-static">2 / 5</span>
      </li>
      <li class="page-item d-none d-sm-block">
        <a href="#" class="page-link">1</a>
      </li>
      <li class="page-item active d-none d-sm-block" aria-current="page">
        <span class="page-link">
          2
          <span class="visually-hidden">(current)</span>
        </span>
      </li>
      <li class="page-item d-none d-sm-block">
        <a href="#" class="page-link">3</a>
      </li>
      <li class="page-item d-none d-sm-block">
        <a href="#" class="page-link">4</a>
      </li>
      <li class="page-item d-none d-sm-block">
        <a href="#" class="page-link">5</a>
      </li>
      <li class="page-item">
        <a href="#" class="page-link" aria-label="Next">
          <i class="ci-arrow-right"></i>
        </a>
      </li>
    </ul>
  </nav> --}}
  {{ $response->links() }}
    </div>
  </div>

              </div>
            </div>
          </div>
        </div>

    </div>

  </section>

@include('websiteLayout.footer')