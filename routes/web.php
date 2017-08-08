<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::pattern('slugcat','(.*)');
Route::pattern('keyword','(.*)');
Route::pattern('slug','(.*)');
Route::pattern('rowId','(.*)');

Route::pattern('id','([0-9]*)');
Route::pattern('qty','([0-9]*)');
Route::group(['namespace'=>'shopsmp'],function(){
	Route::get('',[
		'uses' =>'IndexController@index',
		'as'  =>'shopsmp.index.index'
		]);
	Route::get('about.html',[
		'uses' =>'IndexController@about',
		'as'  =>'shopsmp.index.about'
		]);
	Route::get('contact.html',[
		'uses' =>'IndexController@contact',
		'as'  =>'shopsmp.index.contact'
		]);
	Route::post('contact.html',[
		'uses' =>'IndexController@postContact',
		'as'  =>'shopsmp.index.contact'
		]);
	Route::get('/{slugcat}/{slug}-{id}.html',[
		'uses' =>'ProductController@detail',
		'as'   =>'shopsmp.product.detail'
		]);
	Route::post('/{slugcat}/{slug}-{id}.html',[
		'uses' =>'ProductController@addintocart',
		'as'   =>'shopsmp.product.addintocart'
		]);
	Route::get('search/',[
		'uses' =>'IndexController@search',
		'as'  =>'shopsmp.index.search'
		]);

	
	Route::get('{slug}/{id}.html',[
		'uses' =>'ProductController@cat',
		'as'  =>'shopsmp.product.cat'
		]);
	Route::get('cart/buying',[
		'uses' =>'CartController@buying',
		'as'  =>'shopsmp.order.cartbuying'
		]);
	Route::get('cart/buyingdetail',[
		'uses' =>'CartController@buyingdetail',
		'as'  =>'shopsmp.order.buyingdetail'
		]);
	Route::get('cart',[
		'uses' =>'CartController@index',
		'as'  =>'shopsmp.order.indexcart'
		]);
	Route::get('cart/delete',[
		'uses' =>'CartController@delete',
		'as'  =>'shopsmp.order.delete'
		]);

	Route::get('cart/update/{rowId}/{qty}',[
		'uses' =>'CartController@updatecart',
		'as'  =>'shopsmp.order.update'
		]);
	Route::get('order/step1.html',[
		'uses' =>'OrderController@getStep1',
		'as'  =>'shopsmp.order.step1'
		]);
	Route::post('order/step1.html',[
		'uses' =>'OrderController@postStep1',
		'as'  =>'shopsmp.order.poststep1'
		]);
	Route::get('order/step2.html',[
		'uses' =>'OrderController@getStep2',
		'as'  =>'shopsmp.order.step2'
		]);

	Route::post('order/store',[
		'uses' =>'OrderController@store',
		'as'  =>'shopsmp.order.store'
		]);




	

});
Route::group(['namespace'=>'Auth'],function(){
	Route::get('login.html',[
			'uses' =>'AuthController@getLogin',
			'as'  =>'auth.login'
			]);
	Route::get('logout.html',[
			'uses' =>'AuthController@logoutPublic',
			'as'  =>'auth.publiclogout'
		]);
	Route::post('login.html',[
			'uses' =>'AuthController@postLogin',
			'as'  =>'auth.login'
			]);
	Route::get('register.html',[
			'uses' =>'AuthController@getRegister',
			'as'  =>'auth.register'
			]);
	Route::post('register.html',[
			'uses' =>'AuthController@postRegister',
			'as'  =>'auth.register'
			]);
	Route::get('admin/login.html',[
			'uses' =>'AuthController@getLoginAdmin',
			'as'  =>'auth.loginadmin'
		]);
	Route::post('admin/login.html',[
			'uses' =>'AuthController@postLoginAdmin',
			'as'  =>'auth.loginadmin'
		]);
	Route::get('admin/logout.html',[
			'uses' =>'AuthController@logout',
			'as'  =>'auth.logout'
		]);

});

Route::group(['namespace'=>'admin','prefix'=>'admin','middleware'=>'auth'],function(){
	Route::get('',[
		'uses' =>'IndexController@index',
		'as'  =>'admin.index.index'
		]);

	Route::group(['prefix'=>'brand'],function(){
		Route::get('',[
			'uses' =>'BrandController@index',
			'as'   =>'admin.brand.index'
			]);
		Route::get('create',[
				'uses'=>'BrandController@create',
				'as'  =>'admin.brand.create'
			]);
		Route::post('create',[
				'uses'=>'BrandController@store',
				'as'  =>'admin.brand.store'
			]);
		Route::get('del/{id}',[
			'uses' =>'BrandController@destroy',
			'as'   =>'admin.brand.destroy'
			]);
		Route::get('edit/{id}',[
			'uses' =>'BrandController@edit',
			'as'   =>'admin.brand.edit'
			]);
		Route::post('edit/{id}',[
		'uses'=>'BrandController@update',
		'as'  =>'admin.brand.update'
			]);
		});

	Route::group(['prefix'=>'cat'],function(){
		Route::get('',[
			'uses' =>'CategoryController@index',
			'as'   =>'admin.category.index'
			]);
		Route::get('create',[
				'uses'=>'CategoryController@create',
				'as'  =>'admin.category.create'
			]);
		Route::post('create',[
				'uses'=>'CategoryController@store',
				'as'  =>'admin.category.store'
			]);
		Route::get('del/{id}',[
			'uses' =>'CategoryController@destroy',
			'as'   =>'admin.category.destroy'
			]);
		Route::get('edit/{id}',[
			'uses' =>'CategoryController@edit',
			'as'   =>'admin.category.edit'
			]);
		Route::post('edit/{id}',[
		'uses'=>'CategoryController@update',
		'as'  =>'admin.category.update'
			]);
		});	


	Route::group(['prefix'=>'product'],function(){
		Route::get('',[
			'uses' =>'ProductControllerAdmin@index',
			'as'   =>'admin.product.index'
			]);
		Route::get('create',[
				'uses'=>'ProductControllerAdmin@create',
				'as'  =>'admin.product.create'
			]);
		Route::post('create',[
				'uses'=>'ProductControllerAdmin@store',
				'as'  =>'admin.product.store'
			]);
		Route::get('edit/{id}',[
			'uses' =>'ProductControllerAdmin@edit',
			'as'   =>'admin.product.edit'
			]);
		Route::post('edit/{id}',[
			'uses'=>'ProductControllerAdmin@update',
			'as'  =>'admin.product.update'
			]);
		Route::get('del/{id}',[
			'uses' =>'ProductControllerAdmin@destroy',
			'as'   =>'admin.product.destroy'
			]);
	
		});	

	Route::group(['prefix'=>'themeoption'],function(){
		Route::get('',[
			'uses' =>'ThemeOptionController@index',
			'as'   =>'admin.themeoption.index'
			]);
		Route::get('create',[
				'uses'=>'ThemeOptionController@create',
				'as'  =>'admin.themeoption.create'
			]);
		Route::get('edit/{id}',[
				'uses'=>'ThemeOptionController@edit',
				'as'  =>'admin.themeoption.edit'
			]);
		Route::post('edit/{id}',[
				'uses'=>'ThemeOptionController@update',
				'as'  =>'admin.themeoption.update'
			]);
		
		Route::post('create',[
				'uses'=>'ThemeOptionController@store',
				'as'  =>'admin.themeoption.store'
			]);
		Route::get('del/{id}',[
			'uses' =>'ThemeOptionController@destroy',
			'as'   =>'admin.themeoption.destroy'
			]);
	
		});	

	Route::group(['prefix'=>'user'],function(){
		Route::get('',[
			'uses' =>'UserController@index',
			'as'   =>'admin.user.index'
			]);
		Route::get('create',[
				'uses'=>'UserController@create',
				'as'  =>'admin.user.create'
			]);
		Route::post('create',[
				'uses'=>'UserController@store',
				'as'  =>'admin.user.store'
			]);

		Route::get('del/{id}',[
			'uses' =>'UserController@destroy',
			'as'   =>'admin.user.destroy'
			]);
		Route::get('edit/{id}',[
			'uses' =>'UserController@edit',
			'as'   =>'admin.user.edit'
			]);
		Route::post('edit/{id}',[
			'uses' =>'UserController@update',
			'as'   =>'admin.user.update'
			]);
	
		});
	Route::group(['prefix'=>'contact'],function(){
		Route::get('',[
			'uses' =>'ContactController@index',
			'as'   =>'admin.contact.index'
			]);
		Route::get('/{id}',[
			'uses' =>'ContactController@destroy',
			'as'   =>'admin.contact.destroy'
			]);
	
		});	
	Route::group(['prefix'=>'order'],function(){
		Route::get('',[
			'uses' =>'OrderController@index',
			'as'   =>'admin.order.index'
			]);
		Route::get('status',[
			'uses' =>'OrderController@changestatus',
			'as'   =>'admin.order.changestatus'
			]);
		Route::get('show/{id}',[
			'uses' =>'OrderController@show',
			'as'   =>'admin.order.show'
			]);
		Route::get('show1/{id}',[
			'uses' =>'OrderController@show1',
			'as'   =>'admin.order.show1'
			]);
		Route::get('delete',[
			'uses' =>'OrderController@destroy',
			'as'   =>'admin.order.delete'
			]);
		Route::get('select',[
			'uses' =>'OrderController@sel',
			'as'   =>'admin.order.sel'
			]);
		});
		
			

});



Route::get('noaccess',function(){
		return view('auth.noaccess');
	});	

