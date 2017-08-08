  @extends('templates.admin.master')
  @section('main-content')
  <div class="row">
    <div class="col-lg-12">
        <h2 class="title">Edit user: {{ $arUser->username }}</h2>
        <a href="{{ route('admin.user.index') }}" class="btn btn-primary btn-xs pull-left" style="display: block"><b> Back to User Management Page</a> 
    </div>
</div>           
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="content">
            <form action="{{route('admin.user.update',['id'=>$arUser->id])}}" method="post"  enctype='multipart/form-data'>
                {{ csrf_field() }}
                @if (count($errors) > 0)
                <div class="row">
                   <div class="col-md-12">
                    @foreach ($errors->all() as $error)
                    <p class="category danger alert alert-danger">{{ $error }}</p>
                    @endforeach
                </div>
            </div>
            @endif
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control border-input" placeholder="Username" value="{{ $arUser->username }}" readonly>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <label>Fullname</label>
                        <input type="text" name="name" class="form-control border-input" placeholder="Fullname" value="{{ $arUser->name }}">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Level</label>
                    
                        <select name="level" class="form-control border-input">
                            <option value="1" >Admin</option>
                            <option value="2" >Moderator</option>
                            <option value="3" >Member</option>
                        </select>
                     
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control border-input" placeholder="Email" value="{{ $arUser->email }}">
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address" class="form-control border-input" placeholder="Address" value="{{ $arUser->address }}">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" name="phone" class="form-control border-input" placeholder="Phone" value="{{ $arUser->phone }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <label>New Password</label>
                        <input type="password" name="password" class="form-control border-input" placeholder="New Password">
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <label>Confirm New Password</label>
                        <input type="password" name="password_confirmation" class="form-control border-input" placeholder="Confirm password">
                    </div>
                </div>
            </div>
            <div class="row">
               <div class="col-md-5">
                <div class="form-group">
                <label>Current User Avatar</label>
                    @if($arUser->avatar!='')
                    <img src="{{url('storage/app/avatar/'.$arUser->avatar)}}" alt="" class="form-control border-input" style="width:100%;height:auto">
                    @else
                        <p class="text-center" style="color:red">No image Avatar</p>
                    @endif
                </div>
            </div>
            <div class="col-md-5">
                <div class="form-group">
                    <label>New User Avatar <small style="display: block"></label>
                    <input type="file" name="picture" class="form-control border-input">
                </div>
            </div>
        </div>
        <div class="text-center">
            <input type="submit" class="btn btn-info btn-fill btn-wd" value="Edit User" />
        </div>
        <div class="clearfix"></div>
    </form>
</div>
</div>
</div>


</div>
</div>
@stop