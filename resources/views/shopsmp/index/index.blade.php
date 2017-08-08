@extends('templates.shopsmp.homemaster')
@section('main-content')

<!--banner-->
<div class="banner-wrp container">
	<div id="bootstrap-touch-slider" class="carousel bs-slider fade  control-round indicators-line" data-ride="carousel" data-pause="hover" data-interval="5000" >

		<!-- Indicators -->
		<ol class="carousel-indicators">
			@php
			$i = 0;
			@endphp
			@foreach($arThemeOption as $item)
			<li data-target="#bootstrap-touch-slider" class="<?php if($i==0) echo 'active'?>" data-slide-to="{{$i}}"></li>
			@php
			$i++;
			@endphp
			@endforeach
		
		</ol>

		<!-- Wrapper For Slides -->
		<div class="carousel-inner" role="listbox">

			<!-- Third Slide -->
			<?php
				$i=0;
			?>
			@foreach($arThemeOption as $item)

			<div class="item <?php if($i==0) echo 'active'?>">

				<!-- Slide Background -->
				<img src="{{url('storage/app/slide/'.$item->picture)}}" alt=""  class="slide-image"/>
				<div class="bs-slider-overlay"></div>

				<div class="container">
					<div class="row">
						<!-- Slide Text Layer -->
						<div class="slide-text slide_style_left">
							<h1 data-animation="animated zoomInRight">{{ $item->title }}</h1>
							<p data-animation="animated fadeInLeft">{{ $item->desc }}</p>
							<a href="{{$item->link}}" target="_blank" class="btn btn-primary" data-animation="animated fadeInLeft">More</a>
							{{-- <a href="#" target="_blank"  class="btn btn-default" data-animation="animated fadeInRight"><img src="storage/app/public/images/cart.png" alt=""/></a> --}}
						</div>
					</div>
				</div>
			</div>
			<?php 
			$i++;
			?>
			@endforeach
			<!-- End of Slide -->

		</div><!-- End of Wrapper For Slides -->
		@include('errors.message')
		@include('errors.error')
		@include('errors.warning')
		@include('errors.popup')

	</div>
	<!--content-->

	<div class="content">
		<div class="container">
			<div class="content-mid">
				<h3>Sale Products</h3>
				<label class="line"></label>
				{{ csrf_field() }}
				<div class="newest_items">
					@foreach($ar10sales as $item)
						<?php
							$id=$item->id;
							$pname_slug=str_slug($item->pname);
							
							$namecat_slug=str_slug($item->category->cat_name);
							$url=route('shopsmp.product.detail',['slugcat'=>$namecat_slug,'slug'=>$pname_slug,'id'=>$id]);
							$oldprice=$item->price; 
							$discount=$item->discount;
							if($discount>0){
								$newprice=((100-$discount)*$oldprice)/100;
								
							}else{
								$newprice=$item->price;
							}
						?>
					<div class="col-md-3 col-sm-6 col-xs-6 item-grid simpleCart_shelfItem" data-id="">
						<div class=" mid-pop">
							<div class="pro-img">
								@if($item->discount>0)
								<span class="saleicon">{{ $item->discount }}</span>
								@endif							
									<a href="{{$url}}">
									<img  src="{{url('storage/app/imagefiles/'.$item->picture)}}" class="img-responsive" alt=""></a>
									<div class="zoom-icon ">
										<a class="picture" href="{{url('storage/app/imagefiles/'.$item->picture)}}" rel="{{ $item->pname }}" class="b-link-stripe b-animate-go  thickbox"><i class="glyphicon glyphicon-search icon "></i></a>
										
									</div>
								</div>
								<div class="mid-1">
									<div class="women">
										<div class="women-top">
											<span>{{ $item->category->cat_name }}</span>
											<h6><a href="{{$url}}">{{ $item->pname }}</a></h6>
										</div>
										<div class="img item_add" id="{{$item->id}}" >
											<a href="javascript:void(0)" onclick='alert("Add to the cart successful !");' ><img src="{{url('resources/assets/templates/shopsmp/images/ca.png')}}" alt=""></a>
										</div>
										<div class="clearfix"></div>
									</div>
									<div class="mid-2">
										<p ><label>
										@if($discount>0)
										{{number_format($oldprice) }}VNĐ @endif</label><em class="item_price">
											{{number_format($newprice)}} VNĐ
										</em></p>
										<div class="block">
											<div class="starbox small ghosting"> </div>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
						</div>
					@endforeach	
						
				</div>
				</div>
				<div class="content-mid">
					<h3>Hot Products</h3>
					<label class="line"></label>
					<div class="mid-popular">
						@foreach($ar12hot->chunk(4) as $chunk)

						<div class="row">
							@foreach($chunk as $item)
							<?php
							$id=$item->id;
							$pname_slug=str_slug($item->pname);
							$namecat_slug=str_slug($item->category->cat_name);
							$url=route('shopsmp.product.detail',['slugcat'=>$namecat_slug,'slug'=>$pname_slug,'id'=>$id]);
							$oldprice=$item->price; 
							$discount=$item->discount;
							if($discount>0){
								$newprice=((100-$discount)*$oldprice)/100;
								
							}else{
								$newprice=$item->price;
							}
						?>
							<div class="col-md-3 item-grid simpleCart_shelfItem" data-id="">
								<div class=" mid-pop">
									<div class="pro-img">
										@if($item->discount>0)
										<span class="saleicon">{{ $item->discount }}</span>
										@endif
										<a href="{{$url}}">
											<img src="{{url('storage/app/imagefiles/'.$item->picture)}}" class="img-responsive" alt=""></a>
											<div class="zoom-icon ">
												<a class="picture" href="{{url('storage/app/imagefiles/'.$item->picture)}}" rel="title" class="b-link-stripe b-animate-go  thickbox"><i class="glyphicon glyphicon-search icon "></i></a>
												
											</div>
										</div>
										<div class="mid-1">
											<div class="women">
												<div class="women-top">
													<span>{{ $item->category->cat_name }}<span>
													<h6><a href="{{$url}}">{{ $item->pname }}</a></h6>
												</div>
												<div class="img item_add" id="{{$item->id}}" >
													<a onclick='alert("Add to the cart successful !");' href="javascript:void(0)"  ><img src="{{url('resources/assets/templates/shopsmp/images/ca.png')}}"  alt=""></a>
												</div>
												<div class="clearfix"></div>
											</div>
											<div class="mid-2">
												<p ><label>@if($discount>0)
										{{number_format($oldprice) }}VNĐ @endif</label><em class="item_price">{{number_format($newprice)}} VNĐ</em></p>
												<div class="block">
													<div class="starbox small ghosting"> </div>
													</div>
												<div class="clearfix"></div>
											</div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
						@endforeach
						</div>
						
						<div class="clearfix"></div>

					</div>
	<script>
	
		$(document).ready(function(){
			$(".item_add").click(function (){
				var id=$(this).attr('id');
				$.ajax({
					url:"{{route('shopsmp.order.cartbuying')}}",
					data:{'id':id},
				    type:"GET",
					success: function (data){
						$('#cart_count').html(data);
						

	     			}
	     			});
			});
		});
	</script>	
				</div> 
				</br>
				</br>
				<div class="row">
					<div class="col-lg-12">
					   {{$ar12hot->links()}}
					</div>
				</div>
				<!--//products-->
				@stop