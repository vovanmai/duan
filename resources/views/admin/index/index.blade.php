@extends('templates.admin.master')
@section('main-content')
<div class="row">
	<div class="col-lg-12">
		<h2>ADMIN DASHBOARD</h2>   
	</div>
</div>              
<!-- /. ROW  -->
<hr />
@include('errors.error')

<div class="row">
	<div class="col-lg-12 ">
		<div class="alert alert-info">
			<strong>Welcome ! </strong> Have a nice day.
		</div>
		
	</div>
</div>
<!-- /. ROW  --> 
<div class="row text-center pad-top">
	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
		<div class="ct-chart1 ct-perfect-fourth"></div>
		<label style="margin-top:25px;font-style: italic">Number of avaiable products in SMP Store</label>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
		<hr>
		<img class="img-responsive" style="display:block;margin:0px auto" src="/assets/img/logo.png" alt="">
		<hr>
		<label><a href=""></a></label>
		<hr>
		<label><a href="">Newest Order: </a></label>
		<hr>
		<label><a href="">Newest Comment: </a></label>
		<hr>
		
		<label><a href="">Most Viewed Product: </a></label>
		<hr>
		<a href="" class="btn btn-primary col-md-12"><span class="glyphicon glyphicon-plus"></span> Add a product</a>
		<hr>
	</div>
</div>
<!-- /. ROW  --> 
</div>
</div>
<script>
	
</script>
@stop