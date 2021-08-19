@include('websiteLayout.header')
@include('website.user.sidebar')
  <div class="col-lg-8">

    <div class="bg-white rounded-3 shadow-lg p-4 mb-5 mb-lg-0">
     <!-- Toolbar-->
     <div class=" d-lg-flex justify-content-between align-items-center pt-lg-3 mb-3">
      <h4 class="fs-base  mb-3">My All Reviews :</h4>
    </div>

    <div class="account-review">

       <!-- Post comment -->
      


      @foreach ($response as $res)
      <!-- Post comment -->
     <div class=" d-flex align-items-start border-bottom pb-3 mb-3">
        <img class="rounded-circle" width="50" src="img/shop/reviews/02.jpg" alt="user"/>
        <div class="ps-3">
          <div class="d-flex justify-content-between align-items-center mb-2">
            <h6 class="fs-md mb-0"> {{$res->email}} </h6>
            <div class="star-rating">
              <i class="star-rating-icon ci-star-filled active"></i>
              <i class="star-rating-icon ci-star-filled active"></i>
              <i class="star-rating-icon ci-star-filled active"></i>
              <i class="star-rating-icon ci-star-filled active"></i>
              <i class="star-rating-icon ci-star"></i>
            </div>
          </div>
          <p class="fs-md mb-1"><b>REVIEW: </b>{{$res->review}}</p>
          <p class="fs-md mb-1"><b>PROS: </b>{{$res->pros}}</p>
          <p class="fs-md mb-1"><b>CONS: </b>{{$res->cons}}</p>
          <span class="fs-ms text-muted">
            <i class="ci-time align-middle me-2"></i>
            {{ date('M d,Y',strtotime($res->created_at)) }}
          </span>
        </div>
      </div>
    </div>
    @endforeach  
      






      <!-- Pagination: with icons -->
<!-- <nav aria-label="Page navigation ">
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
</nav> -->

{{ $response->links() }}
    </div>




  </div>
</div>
</div>
</div>
</section>


	
@include('websiteLayout.footer')