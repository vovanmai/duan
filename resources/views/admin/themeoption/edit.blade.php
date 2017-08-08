@extends('templates.admin.master')
@section('main-content')
<div class="row">
    <div class="col-lg-12">
        <h2 class="title">Edit ThemeOption</h2>
        <a href="{{route('admin.themeoption.index')}}" class="btn btn-primary btn-xs pull-left" style="display: block"><b> Back to ThemeOption</a> 
    </div>
</div>           
              <div class="row">
                    <div class="col-lg-12 col-md-12">
                            <div class="content">
                                <form action="{{route('admin.themeoption.update',['arThemeOption'=>$arThemeOption->id])}}" method="post"  enctype='multipart/form-data'>
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
                                                <label>Theme Title </label>
                                                <input type="text" name="title" class="form-control border-input" placeholder="" value="{{$arThemeOption->title}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Theme Short Description</label>
                                                <textarea name="desc" rows="4" class="form-control border-input" placeholder="">{{$arThemeOption->title}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                        <label>Old Picture :</label>
                                            <div class="form-group">
                                                <img style="width: 30%;height: 30%;" src="{{url('storage/app/slide/'.$arThemeOption->picture)}}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Picture</label>
                                                <input type="file" name="picture" class="form-control border-input" placeholder="" value="">
                                            </div>
                                        </div>
                                    </div>
                                     <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Link </label>
                                                <input type="text" name="link" class="form-control border-input" placeholder="" value="{{$arThemeOption->link}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <input type="submit" class="btn btn-info btn-fill btn-wd" value="Edit Theme" />
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
@stop