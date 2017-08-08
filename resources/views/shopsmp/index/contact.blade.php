@extends('templates.shopsmp.homemaster')
@section('title')
Contact Us - SMP Shop
@stop
@section('main-content')


<div class="banner-top">
	<div class="container">
		<h1>Contact</h1>
		<em></em>
		<h2><a href="{{ route('shopsmp.index.index') }}">Home</a><label>/</label>Contact</h2>
	</div>
</div>	

<div class="contact content">
	<div class="contact-form">
		<div class="container">
			<div class="col-md-10 contact-left">
				
						<div class=" contact-top">
							<h3>Contact with us?</h3>
							@if (count($errors) > 0)
							<div class="row">
								<div class="col-md-12">
									@foreach ($errors->all() as $error)
									<p class="category danger alert alert-danger">{{ $error }}</p>
									@endforeach
								</div>
							</div>
							@endif
							<?php
								if(Auth::user()!=null){
									$fullname=Auth::user()->name;
									$email=Auth::user()->email;
									$phone=Auth::user()->phone;
								}else{
									$fullname =null;
									$phone = null;
									$email = null;
								}
								
							?>
							<form action="{{route('shopsmp.index.contact')}}" method="POST">
							{{csrf_field()}}
								<div>
									<span>Your Name </span>		
									<input type="text" name="contact_name" value="{{$fullname}}" >						
								</div>
								<div>
									<span>Your Email </span>		
									<input type="text" name="contact_email" value="{{$email}}" >						
								</div>
								<div>
									<span>Your Phone Number </span>		
									<input type="text" name="contact_phone" value="{{$phone}}" >						
								</div>
								<div>
									<span>Title</span>		
									<input type="text" name="contact_title" value="" >	
								</div>
								<div>
									<span>Your Message</span>		
									<textarea name="contact_detail"> </textarea>	
								</div>
								<label class="hvr-skew-backward">
									<input type="submit" value="Send" >
								</label>
							</form>						
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			@stop