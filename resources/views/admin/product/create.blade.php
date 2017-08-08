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
                                <form action="{{ route('admin.product.store') }}" method="post"  enctype='multipart/form-data'>
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
                                                <input type="text" name="name" class="form-control border-input" placeholder="Product Name" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Product Price</label>
                                                <div class="input-group">
                                                    <input type="text" name="price" class="form-control" placeholder="Product Price" value="">
                                                    <span class="input-group-addon">VNĐ</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Discount</label>
                                                <div class="input-group">
                                                    <input type="text" name="discount" class="form-control border-input" placeholder="Discount" value="">
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
                                                    <option value="0">Choose product's brand</option>
                                                        @foreach($arBrand as $item)
                                                        <option value="{{$item->id}}">{{$item->brand_name}}</option>
                                                        @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Category</label>
                                                <select name="category" class="category form-control border-input">
                                                    <option value="0">Choose product's category</option>
                                                         @foreach($arCat as $item)
                                                        <option value="{{$item->id}}">{{$item->cat_name}}</option>
                                                         @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
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
                                                <textarea name="preview" rows="4" class="form-control border-input" placeholder="Product Description"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Product Detail</label>
                                                <textarea name="detail" rows="4" class="form-control border-input" placeholder="Product Detail"></textarea>
                                            </div>
                                        </div>
                                    </div>
                           
                                    
                                    
                                    <div class="text-center">
                                        <input type="submit" class="btn btn-info btn-fill btn-wd" value="Add Product" />
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
@stop