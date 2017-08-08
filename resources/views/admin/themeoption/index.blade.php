@extends('templates.admin.master')
@section('main-content')
<div class="row">
	<div class="col-lg-12">
		<h2>Theme Option</h2>   
	</div>
</div>              
<!-- /. ROW  -->
<hr style="margin:0px"/>
@include('errors.error')
@include('errors.message')

<div class="row text-center pad-top">
	 <div class="row col-md-12 custyle" style="margin-left:10px">
    <table class="table table-striped custab">
    <thead>
    <a href="{{route('admin.themeoption.create')}}" class="btn btn-primary btn-xs pull-left"><b>+</b> Add new Theme</a>
        <tr>
            <th class="text-center" style="width:4%">ID</th>
            <th class="text-center">Title</th>
            <th class="text-center">Desc</th>
            <th class="text-center">Picture</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
         	@foreach($arThemeOption as $item)
         		<?php
         			$id=$item->id;
                    $urlDel= route('admin.themeoption.destroy',['id'=>$id]);
                    $urlDel= route('admin.themeoption.update',['id'=>$id]);
         		?>
            <tr>
                <td class="text-center">{{$item->id}}</td>
                <td>{{$item->title}}</td>
                <td>{{$item->desc}}</td>
                <td><img style="width:70px;height:auto" src="{{url('storage/app/slide/'.$item->picture)}}"/></td>
                <td class="text-center">
		            <a class='btn btn-info btn-xs' href="{{$urlDel}}"><span class="glyphicon glyphicon-edit"></span> Edit</a> 
		            <a class='btn btn-danger btn-xs' onclick="return confirm('Are you sure to delete ? ');"  href="{{$urlDel}}"><span class="glyphicon glyphicon-remove"></span> Delete</a> 
		            </td>
            </tr>
        	@endforeach
    </table>
    </div>
</div>   
<div class="row">
    <div class="col-6">
         
    </div>
</div>
</div>   
@stop