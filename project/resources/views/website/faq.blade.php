@include('websiteLayout.header')
<section class="section-padding bg-secondary">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12">
  
  
  <div class="card p-lg-5 p-3 shadow-lg faq-card">
    
  
  <!-- Basic accordion -->
  <div class="accordion" id="quesaccordion">
      <div class="h_title">
            <h1>Frequently Asked Questions</h1>
   </div>
  
    <!-- Item -->
    @foreach($data as $fq)
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingOne{{$fq->id}}">
          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#quesfaq{{$fq->id}}" aria-expanded="true" aria-controls="quesfaq{{$fq->id}}">
          Q. {{$fq->title}}</button>
        </h2>
        <div class="accordion-collapse collapse show" id="quesfaq{{$fq->id}}" aria-labelledby="headingOne{{$fq->id}}" data-bs-parent="#quesaccordion">
          <div class="accordion-body">{{$fq->description}}.</div>
        </div>
      </div>
    @endforeach

    </div>
  </div>
          </div>
      </div>
    </div>
  </section>
  
@include('websiteLayout.footer')

