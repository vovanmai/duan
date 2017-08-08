@extends('templates.admin.master')
@section('main-content')
<div class="row">
	<div class="col-lg-12">
		<h2>User Management</h2>   
	</div>
</div>              
<!-- /. ROW  -->
<hr />
@include('errors.warning')
@include('errors.message')
@include('errors.error')

<!-- /. ROW  --> 
<div class="row text-center pad-top">
	 <div class="row col-md-12 custyle" style="margin-left:10px">
    <table class="table table-striped custab">
    <thead>
    <a href="{{route('admin.user.create')}}" class="btn btn-primary btn-xs pull-left"><b>+</b> Add new user</a>
        <tr>
            <th class="text-center" style="width:4%">ID</th>
            <th class="text-center">Username</th>
            <th class="text-center">Fullname</th>
            <th class="text-center" style="width:20%">Address</th>
           
            <th class="text-center">Phone</th>
            <th class="text-center">Avatar</th>
            <th class="text-center">Level (ACL)</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
            @foreach($arUser as $item)
                <?php
                    $id=$item->id;
                    $username=$item->username;
                    $name=$item->name;
                    $address=$item->address;
                  
                    $phone=$item->phone;
                    $avatar=$item->avatar;
                    $level=$item->level;
                    $urlEdit=route('admin.user.edit',['id'=>$id]);
                    $urlDel=route('admin.user.destroy',['id'=>$id]);
                    
                    if($level==1){
                        $level1="Admin";
                    }else if($level==2){
                        $level1="Moderator";
                    }else{
                        $level1="Member";
                    }

                ?>
            <tr>
                <td>{{$id}}</td>
                <td>{{$username}}</td>
                <td>{{$name}}</td>
                <td>{{$address}}</td>
               
                <td>{{$phone}}</td>
                <td>
                    @if($avatar!='')
                     <img style="width:100px;height:auto" src="{{url('storage/app/avatar/'.$avatar)}}"/>
                    @else
                        No avatar image 
                    @endif
                </td>
                <td>{{$level1}}</td>
                <td class="text-center">
                <a class='btn btn-info btn-xs' href="{{$urlEdit}}"><span class="glyphicon glyphicon-edit"></span> Edit</a>
                @if($username!='admin')
                <a class='btn btn-danger btn-xs' onclick="return confirm('Are you sure to delete ? ');"  href="{{$urlDel}}"><span class="glyphicon glyphicon-remove"></span> Delete</a> 
                @endif
                </td>
            </tr>
        @endforeach
    </table>
    </div>
</div>   
<div class="row">
    <div class="col-lg-12">
          {{$arUser->links()}}
    </div>
</div>
</div>
@stop