  @extends('templates.admin.master')
@section('main-content')
<div class="row">
    <div class="col-lg-12">
        <h2 class="title">Add </h2>
        <a href="{{ (isset($cat)?route('admin.category.show',['id'=>$cat->id]):route('admin.product.index')) }}" class="btn btn-primary btn-xs pull-left" style="display: block"><b> Back to  Management Page</a> 
    </div>
</div>           
              <div class="row">
                    <div class="col-lg-12 col-md-12">
                            <div class="content">
                                <form action="{{ route('admin.product.update',['id'=>$arProduct->id]) }}" method="post"  enctype='multipart/form-data'>
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
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Product Name</label>
                                                <input type="text" name="name" class="form-control border-input" placeholder="Product Name" value="{{$arProduct->pname}}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Product Price</label>
                                                <div class="input-group">
                                                    <input type="text" name="price" class="form-control" placeholder="Product Price" value="{{$arProduct->price}}">
                                                    <span class="input-group-addon">VNĐ</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Discount</label>
                                                <div class="input-group">
                                                    <input type="text" name="discount" class="form-control border-input" placeholder="Discount" value="{{$arProduct->discount}}">
                                                    <span class="input-group-addon">%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                   
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Brand</label>
                                                <select name="brand" class="brand form-control border-input">
                                                   
                                                  
                                                        @foreach($arBrand as $item)
                                                            <?php
                                                                $selected="";
                                                            if($item->id==$arProduct->brand_id){
                                                                $selected="selected='selected'";
                                                            }
                                                            ?>
                                                            <option {{$selected}} value="{{$item->id}}">{{$item->brand_name}}</option>
                                                        @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Category</label>
                                                <select name="category" class="category form-control border-input">
                                                 
                                                         @foreach($arCat as $item)
                                                            <?php
                                                                $selected="";
                                                            if($item->id==$arProduct->cat_id){
                                                                $selected="selected='selected'";
                                                                }
                                                            ?>
                                                        <option {{$selected}} value="{{$item->id}}">{{$item->cat_name}}</option>
                                                         @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label>Current Image</label>
                                             <div class="form-control border-input" style="height:auto">
                                                @if($arProduct->picture!='')
                                                <img src="{{url('storage/app/imagefiles/'.$arProduct->picture)}}" alt="" class="" style="width:100%;height:auto">
                                                @else
                                                No Image
                                                @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Product Image</label>
                                                <input type="file" name="picture" class="form-control border-input">
                                            </div>
                                        </div>
                                  
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Product Description</label>
                                                <textarea name="preview" rows="4" class="form-control border-input" placeholder="Product Description">{{$arProduct->preview}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Product Detail</label>
                                                <textarea name="detail" rows="4" class="form-control border-input" placeholder="Product Detail">{{$arProduct->detail}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                           
                                    
                                    
                                    <div class="text-center">
                                        <input type="submit" class="btn btn-info btn-fill btn-wd" value="Edit Product" />
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
@stop