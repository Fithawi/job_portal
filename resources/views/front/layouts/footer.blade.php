
    <!-- footer -->
	<div class="footer_top_agileits">
		<div class="container">
			<div class="col-md-2 footer_grid">
			</div>
			<div class="col-md-5 footer_grid">
				<h3>{{$aboutus->name}}</h3>
				<p>{!! Str::limit($aboutus->desc,360)!!}</p>
			</div>
			<div class="col-md-5 footer_grid">
				<h3>Contact Info</h3>
				<ul class="address">
					<li><i class="fa fa-map-marker" aria-hidden="true"></i>@isset($contact){{$contact->address}}@endif<span></span></li>
					<li><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:@isset($contact){{$contact->email}}@endif">@isset($contact){{$contact->email}}@endif</a></li>
					<li><i class="fa fa-phone" aria-hidden="true"></i><a href="tel:@isset($contact){{$contact->phone_number}}@endif">@isset($contact){{$contact->phone_number}}@endif</a></li>
				</ul>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<div class="footer_w3ls">
		<div class="container">
			<div class="footer_bottom">
				<div class="col-md-9 footer_bottom_grid">
					<div class="footer_bottom1">
						<a href="{{route('index')}}">
							<h2><span class="fa fa-signal" aria-hidden="true"></span> Job Portal <label>Job Portal</label></h2>
						</a>
						<p>© 2021 All rights reserved </p>
					</div>
				</div>
				<div class="col-md-3 footer_bottom_grid">
					<!-- <h6>Follow Us</h6>
					<div class="social">
						<ul>
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-rss"></i></a></li>
						</ul> -->
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- //footer -->