@extends('templates.admin.master')
@section('main-content')
<div class="row">
	<div class="col-lg-12">
		<h2>Product Management</h2>   
	</div>
</div>              
<!-- /. ROW  -->
<hr />
@include('errors.message')
<!-- /. ROW  --> 
<div class="row text-center pad-top">
	 <div class="row col-md-12 custyle" style="margin-left:10px">
    <table class="table table-striped custab">
    <thead>
    <a href="{{route('admin.product.create')}}" class="btn btn-primary btn-xs pull-left"><b>+</b> Add new product</a>
        <tr>
            <th class="text-center" style="width:4%">ID</th>
            <th class="text-center">Name Product</th>
            <th class="text-center">Image</th>
            <th class="text-center">Price</th>
            <th class="text-center">Brand</th>
            <th class="text-center">Category</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
            @foreach($arProduct as $item)
                <?php
                    $id=$item->id;
                    $pname=$item->pname;
                    $image=$item->image;
                    $price=$item->price;
                    $picture=$item->picture;
                    $urlEdit=route('admin.product.edit',['id'=>$id]);
                    $urlDel= route('admin.product.destroy',['id'=>$id]);
                ?>
            <tr>
                <td>{{$id}}</td>
                <td>{{$pname}}</td>
                <td>
                @if($picture!='')
                 <img style="width:70px;height:auto" src="{{url('storage/app/imagefiles/'.$picture)}}"/>
                @else
                    No image
                @endif
                </td>
                <td>{{number_format($price)}} VNĐ</td>
                <td>{{ $item->brand->brand_name}}</td>
                <td>{{ $item->category->cat_name}}</td>
                
                <td class="text-center">
                <a class='btn btn-info btn-xs' href="{{ $urlEdit}}"><span class="glyphicon glyphicon-edit"></span> Edit</a> 
                <a class='btn btn-danger btn-xs' onclick="return confirm('Are you sure to delete ? ');"  href="{{ $urlDel}}"><span class="glyphicon glyphicon-remove"></span> Delete</a> 
                </td>
            </tr>
            @endforeach
    </table>
    </div>
</div>   
<div class="row">
    <div class="col-6">
        {{ $arProduct->links() }}
    </div>
</div>
</div>
@stop
