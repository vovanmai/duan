@extends('templates.admin.master')
@section('main-content')
<div class="row">
    <div class="col-lg-12">
        <h2 class="title">Edit Category</h2>
        <a href="{{ route('admin.brand.index') }}" class="btn btn-primary btn-xs pull-left" style="display: block"><b> Back to Product Page</a> 
    </div>
</div>           
              <div class="row">
                    <div class="col-lg-12 col-md-12">
                            <div class="content">
                                <form action="" method="post"  enctype='multipart/form-data'>
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
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Category Name</label>
                                                <input type="text" name="name" class="form-control border-input" placeholder="Brand name" value="{{$arCat->cat_name}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Category Short Description</label>
                                                <textarea name="desc" rows="4" class="form-control border-input" placeholder="Brand Description">{{$arCat->cat_desc}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="text-center">
                                        <input type="submit" class="btn btn-info btn-fill btn-wd" value="Edit Category" />
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
@stop