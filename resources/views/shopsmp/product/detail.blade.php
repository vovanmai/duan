@extends('templates.shopsmp.homemaster')

@section('main-content')

<div class="banner-top">
	<div class="container">
		<h1>{{$arProduct->pname}}</h1>
		{{ csrf_field() }}
		<em></em>
		<h2><a href="{{ route('shopsmp.index.index') }}">Home</a><label>/<a href="">{{ $arProduct->category->cat_name }}</label></h2></a>
	</div>
</div> 
<div class="single content">
	<div class="container">
		<div class="col-md-12">
			<div class="col-md-6 grid">		
				<div class="flexslider">
					@if($arProduct->discount>0)
					<span class="saleicon">{{$arProduct->discount}}</span>
					@endif
					<div class="thumb-image"> <img src="{{url('storage/app/imagefiles/'.$arProduct->picture)}}" data-imagezoom="true" class="img-responsive"> </div>
				
					<!-- <ul class="slides">
						
						<li data-thumb="">
							<div class="thumb-image"> <img src="" data-imagezoom="true" class="img-responsive"> </div>
						</li> 
						
					</ul> -->
					
				</div>
			</div>	
			<div class="col-md-6 single-top-in">
				<div class="span_2_of_a1 simpleCart_shelfItem">
					<h3>{{$arProduct->pname}}</h3>
					<p class="in-para">{{ $arProduct->preview }}</p>
					<div class="price_single">
						<span class="reducedfrom item_price">{{ number_format($arProduct->price) }} VNĐ</span> 
						
						<span class="available">( Status: Available)</span>					
					
						<div class="clearfix"></div>
					</div>

					<h4 class="quick">Quick Overview:</h4>
					<p class="quick_desc"> </p>
					<div class="quantity"> 
						<div class="quantity-select">                           
							<div class="entry value-minus">&nbsp;</div>
							<div class="entry value"><span>1</span></div>
							<div class="entry value-plus active">&nbsp;</div>
						</div>
					</div>
					<!--quantity-->
					<script>
						$('.value-plus').on('click', function(){
							var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1;
							divUpd.text(newVal);
						});

						$('.value-minus').on('click', function(){
							var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)-1;
							if(newVal>=1) divUpd.text(newVal);
						});
					</script>
					<!--quantity-->
					<div class="simpleCart_shelfItem" data-id="{{$arProduct->id}}">
						<a href="javascript:void(0)" onclick='alert("Add to the cart successful !");' class="add-to item_add hvr-skew-backward">Add to cart</a>
					</div>
					
					<div class="clearfix"> </div>
				</div>
	<script>
	
		$(document).ready(function(){
			$(".item_add").click(function (){
				var id = $(this).closest('.simpleCart_shelfItem').attr('data-id');
				var qty = $('.quantity-select .value').text();
				$.ajax({
				url:"{{route('shopsmp.order.buyingdetail')}}",
				data:{'id':id,'qty':qty},
			    type:"GET",
				success: function (data){
					$('#cart_count').html(data);
     			}
     			});
			});
		});
	</script>
	
				<div class="facts">
					<p>
						<ul>
							<li><span class="glyphicon glyphicon-phone-alt"> Maintain: 0986.308.460 <span class="glyphicon glyphicon-envelope"></span>Support:vovanmai.dt3@gmail.com</li>
							<li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Discount: {{$arProduct->discount}}%.</li>
							<li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Shipping withing 2 weeks.</li>
							<li> <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Support many payment methods.</li>
						</ul>
					</p>
				</div>
				<div class="tags item-content-block tags">
				<!-- 	<label style="color:#fff">Tags: </label>:
					
					<a href=""></a> -->
					
				
				</div>
			</div>
			<div class="clearfix"> </div>
			<!---->
			<div class="tab-head">
				<nav class="nav-sidebar">
					<ul class="nav tabs">
						<li class="active"><a href="#tab1" data-toggle="tab">Product Description</a></li>
						<li class=""><a href="#tab2" data-toggle="tab">Product Specifications </a></li> 
						<li class=""><a href="#tab3" data-toggle="tab">Reviews</a></li>  
					</ul>
				</nav>
				<div class="tab-content one">
					<div class="tab-pane active text-style" id="tab1">
						<div class="facts">
							<p > </p>       
							<p>
								Retina Display</br>
								ATX chip</br>
								iOS 9</br>
								Apps for iPad</br>
								Slim and light design</br>
								12.9" with Retina Display, 2732 x 2048 Resolution</br>
								Apple iOS 9, Dual-Core A9X Chip with Quad-Core Graphics</br>
								8 MP iSight Camera, Four-Speaker Audio</br>
								32GB Capacity, Wi-Fi (802.11a/b/g/n/ac) + MIMO + Bluetooth 4.2</br>
								Up to 10 Hours of Battery Life, 1.57 lbs</br>
								iPad supports new Apple Smart Keyboard and Apple Pencil</br>
							</p> 
						</div>

					</div>
					<div class="tab-pane text-style" id="tab2">

						<div class="facts">									
							<p ></p>
							<p>Quality craftsmanship - Finely crafted with stainless steel, genuine Horween leather and scratch-resistant glass.</br>
							Timely updates at a glance – Get both the time, and what that moment means to you</br>
							Responds to your Voice – Just speak to get the info you need</br>
							Tracks Health and Fitness – Moto Body tracks your steps, distance and calories burned along with your heart rate</br>
							Works with your AndroidTM phone – Pair with any smartphone running Android 4.3 or higher</p>
							</div>	

						</div>
						<div class="tab-pane text-style" id="tab3">

							<div class="facts">
								<p > The iPad Pro review was one that I was really dreading writing – but also one I was the most excited about in a while.</br>

								The issue was this: what is the big iPad Pro for? Is it a genuine laptop replacement? Or is it nothing more than a larger tablet from Apple? And now we've got the iPad Pro 9.7, is this tablet too big?</br>

								It depends what you see a tablet as. For some, it's a device that sits on the sofa with you, and you sometimes idly think about getting a keyboard for it so you could do some writing on the go. For others, it's a laptop that packs a detachable screen for portability.</br>

								The former scenario is where iPads (and most Android tablets) sit. The latter is more the domain of Windows devices, where the operating system and hardware collide with varying results. </br>
								To many, this is a direct rival to Microsoft's Surface Pro 4, but in reality the two devices are coming at the laptop replacement issue from different angles. The iPad Pro is designed for the casual user, one who doesn't need a computer all day long. It's not a MacBook Pro 2016 with a detachable screen – iOS 10 doesn't have macOS Sierra capabilities.</br>

								Microsoft's device is more for those who need to massively multitask all the time, using dedicated desktop applications to get everything done.</br>

								In terms of cost, well, for an Apple device it's actually less than you'd expect. Of course, I'm not saying that you should accept a higher price because it's an iThing, but I was expecting this to tip into a much higher bracket.</br>
								If you want cellular too, the smallest model is 128GB for US$1079 (£899, AU$1699) through Apple, or you can splash out on a 256GB Wi-Fi and 4G model for US$1229 (£1019, AU$1949). Prices with a two-year cellular contract in US bring that down to $729.99.</br>

								Seems expensive. But compare that to the iPhone 7 Plus, which costs US$869 (£819, AU$1419) for the 256GB version, and it doesn't seem that pricey in the pantheon of Apple products.</br>

								The iPad Pro could be a lot of things to many people - including professional users, considering the amount of business apps in the App Store. To some, a great sofa pal. To others, a brilliant hybrid device that enables them to flip effortlessly from sketching to movies to typing reports on the go.</br>

								Is it good enough to usurp the need for a MacBook Air? Could you ever get by just using this tablet and the optional accessories around it, or does it need to be part of a larger family – a device that's perfect for certain situations but gets relegated when it's time for proper work?</br>

								There was only one way to find out – force myself to ditch the laptop and try to write this review on the Pro (and you can see the results below). While that wasn't as easy as I'd hoped, I've found a lot of use for the iPad Pro 12.9 in day to day life.
								</p>
								<ul>
									<li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Research</li>
									<li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Design and Development</li>
									<li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Porting and Optimization</li>
									<li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>System integration</li>
									<li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Verification, Validation and Testing</li>
									<li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Maintenance and Support</li>
								</ul>     
							</div>	

						</div>

					</div>
					<div class="clearfix"></div>
				</div>
				<!---->	
			</div>
<script src="{{ url('resources/assets/templates/shopsmp/js/imagezoom.js')}}"></script>

<script defer src="{{ url('resources/assets/templates/shopsmp/js/jquery.flexslider.js')}}"></script>

<script>
// Can also be used with $(document).ready()
$(window).load(function() {
	$('.flexslider').flexslider({
		animation: "slide",
		controlNav: "thumbnails"
	});
});
</script>

<script src="{{ url('resources/assets/templates/shopsmp/js/simpleCart.min.js')}}"> </script>
<div class="clearfix"></div>
@stop