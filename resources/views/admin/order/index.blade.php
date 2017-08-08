@extends('templates.admin.master')
@section('main-content')
<div class="row">
	<div class="col-lg-12">
		<h2>Order Management</h2>   
	</div>
</div>              
<!-- /. ROW  -->
<hr />
<div class="ajaxmessage">
  
</div>
@include('errors.message')
@include('errors.error')

<!-- /. ROW  --> 

<div class="row" style="padding-left:10px">
<form action="{{ route('admin.order.index') }}" method="GET" class="form-inline">
{{ csrf_field() }}
  <div class="form-group col-md-3">
    <label>From: </label>

     <input type="date" name="orderfrom" class="orderfrom form-control border-input" value="">
   </div>  
  <div class="col-md-3 form-group">
    <label>To: </label>
  
     <input type="date" name="orderto" class="orderto form-control border-input" value="">
   </div>
  <div class="form-group col-md-1">
     <input type="submit" class="btn btn-primary" value="Filter">
   </div>   
   </form>
  <div class="form-group col-md-1">
  <form action="" id="excelForm" method="POST">
  {{ csrf_field() }}
    <input type="hidden" name="from" class="fromdate" value="">
    <input type="hidden" name="to" class="to" value="">
     <button id="excelbtn" class="btn btn-success"><span class="glyphicon glyphicon-export"></span> Export to Excel</button>
     </form>
   </div> 
</div>

<div class="row text-center pad-top">
	 <div class="row col-md-12 custyle" style="margin-left:10px">
    <table class="table table-striped custab">
          <input type="hidden" name="_token" value="{{ csrf_token()}}">
          <input type="hidden" name="_url" value="/admincp/order">
    <thead>
        <tr>
            <th class="text-center">ID</th>
            <th class="text-center" width="20%">Created Date</th>
            <th class="text-center" width="20%">Email</td>
            <th class="text-center">Username</td>
            <th  class="text-center">Name</td>
            <th  class="text-center">Status</th>
          <!--   <th  class="text-center">Payment</th> -->
            <th  class="text-center">Price Total</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
          @foreach($arOrder as $item)
            <tr class="tablecontainer xoa{{$item->id}}" id="">
                <td class="text-center">{{$item->id}}</td>
                <td class="text-center">{!! date("H:m:s d-m-Y", strtotime("$item->created_at")) !!}</td>
                <td class="text-center">{{$item->useremail}}</td>
                <td class="text-center username">{{$item->username}}</td>
                <td class="text-center">{{$item->fullname}}</td>
                <td class="text-center">
                    @if($item->status==1)
                      <a id="{{$item->id}}" class="imagestatus" href="javascript:void(0)">
                        <img src="{{url('resources/assets/templates/admin/assets/images/active.gif')}}" alt="">
                      </a>  
                    @else
                      <a id="{{$item->id}}" class="imagestatus" href="javascript:void(0)">
                        <img src="{{url('resources/assets/templates/admin/assets/images/deactive.gif')}}" alt="">
                      </a>
                    @endif
                </td>
          <!--       <td class="text-center">
                    <select name="payment" class="payment form-control border-input">
              
                      <option value=""></option>
                     
                    </select>
                </td> -->
                <td  class="text-center"> {{number_format($item->price_total)}} VNĐ</td>
                <td class="text-center">
                    <a class='btn btn-success btn-xs' onclick="window.open('{{route('admin.order.show',['id'=>$item->id])}}')" ><span class="glyphicon glyphicon-glyphicon glyphicon-eye-open"></span> View</a> 
                  
                    <a class='btn cbtn btn-danger btn-xs delbtn delete_ajax' id='{{$item->id}}' href='javascript:void(0)' ><span class="glyphicon glyphicon-glyphicon glyphicon-remove"></span> Del</a> 
               
                </td>
            </tr>          
          @endforeach
      </table>
    </div>
</div>
<script>
  
    $(document).ready(function(){
      $(".delete_ajax").click(function (){
        var id=$(this).attr('id');
        var idstring=".xoa"+id;
        
        $.ajax({
        url:"{{route('admin.order.delete')}}",
        data:{'id':id},
        type:"GET",
        success: function (data){
          
            $(idstring).remove();
             $('.ajaxmessage').html('<div class="row message"><div class="col-lg-12"><div class="alert alert-info">Deleted successfully</div></div></div>');
          
          }
          });
      });
    });
  </script>    
<div class="row">
    <div class="col-lg-12">
            {{$arOrder->links()}}
    </div>
</div>

  <h2 class="text-center pad-top">No order between selected dates.</h2>

</div>
<script type="text/javascript">
//   $( document ).ready(function() {
//     $('.save-btn').on('click',function(){
//       var parent = $(this).closest('.tablecontainer');
//       var status = parent.find('.status').val();
//       var payment = parent.find('.payment').val();
//       var id = parent.attr('id');
//       var token = $('input[name="_token"]').val();
//       // console.log(token);
//       $.ajax({
//           type: 'POST',
//           url: '/admincp/order/updateItem/'+id,
//           data: {
//             _token:token,
//             status:status,
//             payment:payment
//           },
//           success: function(result) {
//             console.log(result);
//               $('.ajaxmessage').html(result);
//               setTimeout(function(){
//                 $('.message').slideUp('slow');
//               },3000);
//           },
//           error: function(data){
//               console.log(data.responseText);
//               $('.ajaxmessage').html(data.responseText);
//             }

//       });
//     });
// });
        $(document).ready(function(){
          $(".imagestatus").click(function(){
              var id=$(this).attr('id');
              var idstr='#'+id;
              $.ajax({
                url:"{{route('admin.order.changestatus')}}",
                type:"GET",
                data:{'id':id},
                success: function (data){
                $(idstr).html(data);
                //alert(data);
          }
            });
          });
        });
</script>
@stop