@extends('templates.shopsmp.homemaster')
@section('main-content')
<div class="banner-top">
	<div class="container">
		<h1>Cart</h1>
		<em></em>
		<h2><a href="{{ route('shopsmp.index.index') }}">Home</a><label>/</label>Cart</h2>
	</div>
</div>
<div class="check-out content">

<div class="container">
	{{ csrf_field() }}
	<div class="ajaxmessages">
  
	</div>
	<div class="bs-example4" data-example-id="simple-responsive-table">
    <div class="table-responsive" style="overflow-y: hidden!important">
   
    	  <table class="table-heading simpleCart_shelfItem">
		  <tr>
		  	<th class="text-center" style="width:5%">Picture</th>
			<th class="text-center" >Item</th>	
			<th class="text-center">Prices</th>
			<th class="text-center" width="5%">Quantity</th>
			<th  class="text-center" >Discount</th>
			<th class="text-center" >Subtotal</th>
			<th class="text-center" >Action</th>
		  </tr>
	    @if($count>0)
	    <form>
	    <input type="hidden" name="_token" value="{{csrf_token()}} " />
		  @foreach($content as $item)
		 
		  <tr class="cart-header" id="delete{{$item->rowId}}">
		  	<td>
				<a href="" ><img style="width:1000px;height:auto !important" src="{{url('storage/app/imagefiles/'.$item->options->picture)}}" class="img-responsive" alt=""></a>
			</td>
			
			<td class="text-center">
			<a href="" style="color:white">{{$item->name}}</a>
			</td>
			<td class="itemprice" rawprice=""> {{number_format($item->price)}} VNĐ</td>
			<td><input  class="aaaa form-control border-input itemqty" type="number"   value="{{$item->qty}}"></td>
			<td> {{$item->options->discount}} %</td>
			<td class="item_price" style="color:#fff"><span class="subtotalprice sub{{$item->rowId}}">{{number_format($item->price*$item->qty)}}</span> VNĐ</td>
			<td class="add-check">
			<a class="item_add btn btn-success updatecart"  id="{{$item->rowId}}" href="javascript:void(0)"><span class="glyphicon glyphicon-refresh"></span></a>

			<a class="item_add btn btn-danger remove_item" onclick="return confirm('Are you sure to delete ? ');" id="{{$item->rowId}}" href="javascript:void(0)"><span class="glyphicon glyphicon-trash"></span></a>
			</td>
		  </tr>
		  @endforeach
		</form>

                
        
	<script>
	
		$(document).ready(function(){
			$(".updatecart").click(function (){
				var rowId=$(this).attr('id');
		 		var qty =$(this).parent().parent().find(".itemqty").val();
				var token=$("input[name='_token']").val();
				var class_subtotal='.sub'+rowId;
				
				$.ajax({
				url:"cart/update/"+rowId+"/"+qty,
				data:{'_token':token,'rowId':rowId,'qty':qty},
			    type:"GET",
				success: function (data){

					$('#cartcount').html(data[0]);
					$(class_subtotal).html(number_format(data[1]));
				    $('.subtotaltong').html(number_format(data[2]));
				    $('.ajaxmessages').html('<div class="row message"><div class="col-lg-12"><div class="alert alert-info text-center">Updated successfully</div></div></div>');
				 //    setTimeout(function(){
					// $('.ajaxmessages').slideUp('slow');
					// },3000);
     			}
     			});
			});
		});
	</script>
	<script>
	
		$(document).ready(function(){
			$(".remove_item").click(function (){
				var rowId=$(this).attr('id');
				var class_delete="#delete"+rowId;
				$.ajax({
				url:"{{route('shopsmp.order.delete')}}",
				data:{'rowId':rowId},
			    type:"GET",
				success: function (data){
					$(class_delete).remove();
					$('#cart_count').html(data[0]);
					$('.subtotaltong').html(data[1]);
					$('.ajaxmessages').html('<div class="row message"><div class="col-lg-12"><div class="alert alert-info text-center">Deleted successfully</div></div></div>');
					// setTimeout(function(){
					// $('.ajaxmessages').slideUp('slow');
					// },3000);
     			}
     			});
			});
		});
	</script>	

	</table>
	
	 <table class="">
  		<tr style="border-top:2px solid #E8DAB4">
		  	<td class="col-md-6" ></td>
		  	
		  
		  	<td class="col-md-3">Total: </td>
		  	<td class="col-md-3"  ><span class="subtotaltong" style="color:white">{{number_format(intval(str_replace(',','',$total)))}} VNĐ</span> </td>
		  </tr>
	</table>
	<div class="produced">
	<a href="{{route('shopsmp.order.step1')}}" class="btn hvr-skew-backward">Proceed To Order</a>
	 </div>
	@else

		<h2 style="color:#E8DAB4;text-align: center">You dont have any item in Cart.</h2>
	@endif	
		<div class="four">
		<a href="{{route('shopsmp.index.index')}}" class="btn hvr-skew-backward">Back To Shopping</a>
		</div>	
	
	</div>
	</div>
</div>
@stop