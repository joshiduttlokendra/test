@include('websiteLayout.header')

<section class="section-padding">
	
	<!-- Split section: Map + Contact form-->
	<div class="container-fluid " >
		<div class="row g-0">
			<div class="col-lg-6 ">
				<div class="scout-img text-center">
					<img src="img/content/support.jpg" alt="" class="img-fluid">
				</div>
			</div>
			<div class="col-lg-5 ">
				<div class="cloud-background">
					<p>Hi! Welcome to Scout Support! We are your customer service team 
						here to serve you and ensure that your experience at ScoutiN.Online is 
					always a delightful one!</p>
					<p>
						We love to serve you! Please let us know below what we can help you 
						with. One of our Scout Support Staff will contact you as soon as 
					possible. </p>
					<p>
						Feel free to visit our FAQ page to learn if any of these categories can 
					help you immediately. </p>
				
				</div>

				<h2 class="h4 mb-4">Drop us a line</h2>
				<form class="needs-validation mb-3"  action="{{route('formcontact')}}" method="post">
				@csrf()
					<div class="row g-3">
						<div class="col-sm-6">
							<label class="form-label" for="cf-name">Your name:&nbsp;<span class="text-danger">*</span></label>
							<input class="form-control" name="name" type="text" id="cf-name" placeholder="" required>
							<div class="invalid-feedback">Please fill in you name!</div>
						</div>
						<div class="col-sm-6">
							<label class="form-label" for="cf-email">Email address:&nbsp;<span class="text-danger">*</span></label>
							<input class="form-control"  name="email" type="email" id="cf-email" placeholder="" required>
							<div class="invalid-feedback">Please provide valid email address!</div>
						</div>
						<div class="col-sm-6">
							<label class="form-label" for="cf-phone">Your phone:&nbsp;<span class="text-danger">*</span></label>
							<input class="form-control" type="text"  name="phone_no"id="cf-phone" placeholder="" required>
							<div class="invalid-feedback">Please provide valid phone number!</div>
						</div>
						<div class="col-sm-6">
							<label class="form-label" for="cf-subject">Subject:</label>
							<input class="form-control" type="text" name="subject" id="cf-subject" placeholder="">
						</div>
						<div class="col-12">
							<label class="form-label" for="cf-message">Message:&nbsp;<span class="text-danger">*</span></label>
							<textarea class="form-control"  name="message" id="cf-message" rows="6" placeholder="" required></textarea>
							<div class="invalid-feedback">Please write a message!</div>
							<button class="btn btn-primary mt-4" type="submit" >Send message</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>



@include('websiteLayout.footer')