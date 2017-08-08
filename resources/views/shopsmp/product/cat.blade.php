@extends('templates.shopsmp.master')
@section('main-content')
<div class="banner-top">
	<div class="container">
		{{ csrf_field() }}
		@if($arCat!=null)
		<h1>{{ $arCat->cat_name }}</h1>
		<em></em>
		<h2><a href="{{ route('shopsmp.index.index') }}">Home</a><label>/</label>{{ $arCat->cat_name }}</h2>
		<input type="hidden" id="catpage" class="categorypage" value="">
		@elseif($arBrand!=null)
		<h1>{{ $arBrand->brand_name }}</h1>
		<em></em>
		<h2><a href="{{ route('shopsmp.index.index') }}">Home</a><label>/</label>{{ $arBrand->brand_name }}</h2>
		<input type="hidden" id="catpage" class="brandpage" value="">
		@endif
	</div>
</div>
<div class="product content">
	<div class="container">
		<div class="col-md-9 ajaxcontent">
			<div class="mid-popular">
				@foreach($arProduct->chunk(3) as $chunk)
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
					<div class="col-md-4 item-grid1 simpleCart_shelfItem" data-id="{{ $item->id }}">
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
											<span>{{ $item->category->cat_name}}</span>
											<h6><a href="{{$url}}">{{ $item->pname }}</a></h6>
										</div>
										<div class="img item_add" id="{{$item->id}}">
											<a href="javascript:void(0)" onclick='alert("Add to the cart successful !");' >
												<img src="{{url('resources/assets/templates/shopsmp/images/ca.png')}}" alt="">
											</a>
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
					<div class="clearfix"></div>
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
					<div class="pagination">
						{{ $arProduct->links() }}
					</div>
				</div>
			</div>

			@stop