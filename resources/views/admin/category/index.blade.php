@extends('templates.admin.master')
@section('main-content')
<div class="row">
	<div class="col-lg-12">
		<h2>Brand Management</h2>   
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
    <a href="{{route('admin.brand.create')}}" class="btn btn-primary btn-xs pull-left"><b>+</b> Add new categories</a>
        <tr>
            <th class="text-center" style="width:4%">ID</th>
            <th class="text-center">Category Title</th>
            <th class="text-center">Category Desc</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
            @foreach($arCat as $item)
                <?php
                    $id=$item->id;
                    $cat_name=$item->cat_name;
                    $cat_desc=$item->cat_desc;
                    $urlDel=route('admin.category.destroy',['id'=>$id]);
                    $urlEdit=route('admin.category.update',['id'=>$id]);
                ?>
            <tr>
                <td>{{$id}}</td>
                <td>{{$cat_name}}</td>
                <td>{{$cat_desc}}</td>
                <td class="text-center">
                 <a class='btn btn-success btn-xs' href=""><span class="glyphicon glyphicon-eye-open"></span> View</a> 
                <a class='btn btn-info btn-xs' href="{{$urlEdit}}"><span class="glyphicon glyphicon-edit"></span> Edit</a> 
                <a class='btn btn-danger btn-xs' onclick="return confirm('Are you sure to delete ? ');"  href="{{$urlDel}}"><span class="glyphicon glyphicon-remove"></span> Delete</a> 
                </td>
            </tr>
            @endforeach
    </table>
    </div>
</div>   
<div class="row">
    <div class="col-6">
           {{$arCat->links()}}
    </div>
</div>
</div>
@stop