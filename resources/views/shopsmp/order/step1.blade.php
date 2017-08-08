@extends('templates.shopsmp.homemaster')
@section('main-content')

<div class="banner-top">
	<div class="container">
		<h1>Step 1: Shipping Address</h1>
		<em></em>
		<h2><a href="{{ route('shopsmp.index.index') }}">Home</a><label>/</label>Shipping Address</h2>
	</div>
</div>
<div class="check-out content">
@if(Session::has('popupmsg'))
   <script>
	smoke.alert("{{ Session::get('popupmsg') }}", function(e){
}, {
	ok: "OK",
	classname: "custom-class"
});
</script>
@endif
	<div class="container">
		<div class="row">
			<div class="col-md-6 shipping col-sm-6 col-xs-12">
				<h3 class="text-center" style="color:#E8DAB4;margin-bottom:24px;padding-bottom:25px;border-bottom:3px solid #E8DAB4">Shipping Address</h3>
				@if (count($errors) > 0)
			
					<div class="col-md-12">
						@foreach ($errors->all() as $error)
						<input style="background-color:#b99f9f" type="text" name="name" class="form-control input-sm" readonly value="{{$error}}">
						</br>
						@endforeach
					</div>
				
				@endif
					@php
				if(Auth::user()){
					$user = Auth::user();			
					$name = $user->name;
					$address = $user->address;
					$phone = $user->phone;
					$email = $user->email;
				}else{
					$name = null;
					$address = null;
					$phone = null;
					$email = null;
				}
				@endphp
				
					<div class="col-xs-6 col-sm-6 col-md-6" >
						<form action="{{route('shopsmp.order.poststep1')}}" method="POST">
							{{ csrf_field() }}
							<div class="form-group">
								<input type="text" name="name" class="form-control input-sm" placeholder="Fullname" value="{{$name}}">
							</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
							<input type="text" name="phone" class="form-control input-sm" placeholder="Phone" value="{{$phone}}">
						</div>
					</div>

					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
							<input type="email" name="email" class="form-control input-sm" placeholder="Email" value="{{$email}}">
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
							<select name="payment" class="form-control border-input">
								<option value="1">Thanh toán 1</option>
								<option value="2">Thanh toán 2</option>
								<option value="3">Thanh toán 3</option>
							</select>
						</div>
					</div>

					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="form-group">
							<textarea placeholder="Detail" name="detail" class="form-control" rows="5"></textarea>
						</div>
					</div>

					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="form-group">
							<input type="text" class="form-control border-input" value="{{$address}}" name="address" placeholder="Enter shipping address">
						</div>
					</div> 
					<div class="col-md-12">
						<a href="{{ route('shopsmp.order.indexcart') }}" class="btn hvr-skew-backward">Back to Cart</a>
						<input  type="submit" class="btn pull-right hvr-skew-backward" value="Continue"/>
					</div>
				</div>
			</form>
			<div class="col-md-6">
				@if(Cart::count()>0)
				<table class="table-heading simpleCart_shelfItem">
					<tr>
						<th width="20%">Item</th>
						<th width="5%">Quantity</th>
						<th>Subtotal</th>
					</tr>
					@foreach(Cart::content() as $item)
					<tr class="cart-header">
						<td class="ring-in"><a href="" class="at-in"><img src="{{url('storage/app/imagefiles/'.$item->options->picture)}}" class="img-responsive" alt=""></a>
							<div class="sed">
								<h5><a href="">{{$item->name}}</a></h5>			
							</div>
							<div class="clearfix"> </div>
						</td>
						<td>{{$item->qty}}</td>
						<td class="item_price" style="color:#fff"><span class="subtotalprice">{{number_format($item->price*$item->qty)}}</span> VNĐ</td>
					</tr>
					@endforeach
					
					<tr style="border-top:2px solid #E8DAB4">
						<td style="color:#fff">Total:</td>
						<td>{{ Cart::count() }}</td>
						<td><span style="color:white" class="totalprice">{{number_format(intval(str_replace(',','',Cart::subtotal())))}} VNĐ</span> </td>
					</tr>
				</table>
				@endif
				@if(Cart::count()==0)
					<h2 style="color:#E8DAB4;text-align: center">You dont have any item in Cart.</h2>
				@endif
				</br>
				<div class="four">
					<a href="{{ route('shopsmp.index.index') }}" class="hvr-skew-backward">Back To Shopping</a>
				</div>	
	
			</div>
		</div>
		@stop