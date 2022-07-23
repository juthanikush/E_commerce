<?php
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\SubCategoryController;
use App\Http\Controllers\admin\CouponController;
use App\Http\Controllers\admin\SizeController;
use App\Http\Controllers\admin\ColorController;
use App\Http\Controllers\admin\BrandController;
use App\Http\Controllers\admin\TaxController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\BanerController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\VendoerManageMentControler;
use App\Http\Controllers\front\FrontController;
use App\Http\Controllers\vendor\VendorSizeController;
use App\Http\Controllers\vendor\VendorColorController;
use App\Http\Controllers\vendor\VendorTaxController;
use App\Http\Controllers\vendor\VendorProductController;

use Illuminate\Support\Facades\Route;

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
/**for test */
Route::get('test',[FrontController::class,'test']);
/**User Login */
Route::get('/',[FrontController::class,'index']);
Route::get('user_registrashion',[FrontController::class,'registrashion_view']);
Route::get('user_login',[FrontController::class,'userlogin_view'])->name('user_login');
Route::post('user_regi',[FrontController::class,'user_register'])->name('user_register');
Route::post('user_login',[FrontController::class,'user_login'])->name('user_login');
Route::get('verification/{id}',[FrontController::class,'verification']);
Route::get('forget_password',[FrontController::class,'forgot_password_view']);
Route::post('user_forgot_password',[FrontController::class,'user_forgot_password'])->name('user_forgot_password');
Route::get('forgotpassword/{id}',[FrontController::class,'forgotpassword_form_view']);

Route::post('user_new_password',[FrontController::class,'user_new_password'])->name('user_new_password');

Route::get('quick_view/{id}',[FrontController::class,'quick_view']);
Route::get('product_details/{id}',[FrontController::class,'product_details']);

Route::get('category/{id}',[FrontController::class,'category']);
Route::get('sub_category/{id}',[FrontController::class,'sub_category']);


Route::get('blog',[FrontController::class,'blog']);
Route::group(['middleware'=>'user_login'],function(){
    Route::get('user/logout', function () {
        session()->forget('USER_LOGIN');
        session()->forget('USER_id');
        session()->flash('message','logout sucessfully');
        return redirect('user_login');
    });

    Route::get('user/profile',[FrontController::class,'profile_view']);
    Route::get('add/address',[FrontController::class,'address_form']);
    Route::post('add_address',[FrontController::class,'add_address'])->name('add_address');
    Route::get('user/address/delete/{id}',[FrontController::class,'delete_addres']);
    Route::get('user/cart',[FrontController::class,'cart']);
    Route::get('user/address/edit/{id}',[FrontController::class,'edit_addres']);
    Route::post('edit_address',[FrontController::class,'edit_address'])->name('edit_address');
    Route::post('add_to_cart',[FrontController::class,'add_to_cart'])->name('add_to_cart');
    Route::post('remove_add_to_cart',[FrontController::class,'remove_add_to_cart'])->name('remove_add_to_cart');
    Route::post('minus_add_to_cart',[FrontController::class,'minus_add_to_cart'])->name('minus_add_to_cart');
    Route::post('plus_add_to_cart',[FrontController::class,'plus_add_to_cart'])->name('plus_add_to_cart');
    Route::post('add_add_to_cart',[FrontController::class,'add_add_to_cart'])->name('add_add_to_cart');
    Route::get('checkout',[FrontController::class,'checkout']);
    Route::get('clear/cart',[FrontController::class,'clear_cart']);
    Route::get('thankyou',[FrontController::class,'thankyou']);
    Route::post('coupon_code',[FrontController::class,'coupon_code'])->name('coupon_code');
    Route::post('place/order',[FrontController::class,'place_order'])->name('place_order');
    
    Route::post('wishlist',[FrontController::class,'wishlist'])->name('wishlist');
    Route::get('user_wishlist',[FrontController::class,'view_wishilist']);
    Route::post('removewishlist',[FrontController::class,'removewishlist'])->name('removewishlist');
    Route::get('user/ordered',[FrontController::class,'ordered']);
    Route::get('order_view/{id}',[FrontController::class,'order_view']);
    /**Vendor Login */
    Route::get('vendoer_login', [FrontController::class,'vendoer_login']);
    Route::post('vendor_login',[FrontController::class,'vendor_login1'])->name('vendor_login1');

    Route::get('vendoer_reigistrashion', [FrontController::class,'vendoer_reigistrashion']);
    Route::post('vendor_regi',[FrontController::class,'vendor_regi'])->name('vendor_regi');
    
});


Route::post('admin/login',[AdminController::class,'admin_login'])->name('admin_login');
Route::get('/create_admin', [AdminController::class,'create_admin']);
Route::get('admin/forpass', function () {
    return view('admin/forpass');
});
Route::get('forgot_password_change/{id}',[AdminController::class,'forgot_password_change']);
Route::post('forget/password',[AdminController::class,'forpass'])->name('forpass');
Route::post('new/password',[AdminController::class,'new_pass'])->name('new_pass');
Route::post('create/admin',[AdminController::class,'auth'])->name('auth');
Route::get('login',[AdminController::class,'login']);

Route::group(['middleware'=>'admin_login'],function(){

    Route::prefix('admin')->group(function () {
        /**categorys routes */
        Route::get('/', [CategoryController::class,'view']);
        Route::get('/category/delete/{id}', [CategoryController::class,'delete']);
        Route::get('/category/edit/{id}', [CategoryController::class,'edit']);
        Route::get('/category/status/{id}/{status}', [CategoryController::class,'status']);
        Route::get('/add/form', function () {
            return view('admin/forms/add_category');
        });
        Route::post('/add/category', [CategoryController::class,'add_category'])->name('add_category');
        Route::post('/edit/category', [CategoryController::class,'edit_category'])->name('edit_category');

        /**sub categorys routes */
        Route::get('/sub_category', [SubCategoryController::class,'view']);
        Route::get('/add/sub_category',[SubCategoryController::class,'view_sub_category']);
        Route::post('/add/sub_category', [SubCategoryController::class,'add_sub_category'])->name('add_sub_category');
        Route::get('/sub_category/delete/{id}', [SubCategoryController::class,'delete']);
        Route::get('/sub_category/edit/{id}', [SubCategoryController::class,'edit']);
        Route::get('/sub_category/status/{id}/{status}', [SubCategoryController::class,'status']);
        Route::post('/edit/sub_category', [SubCategoryController::class,'edit_sub_category'])->name('edit_sub_category');

        /**Coupon */
        Route::get('/coupon', [CouponController::class,'view']);
        Route::get('/add/coupon', function () {
            return view('admin/forms/add_coupon');
        });
        Route::post('/add/coupon', [CouponController::class,'add_coupon'])->name('add_coupon');
        Route::get('/coupon/delete/{id}', [CouponController::class,'delete']);
        Route::get('/coupon/status/{id}/{status}', [CouponController::class,'status']);
        Route::get('/coupon/edit/{id}', [CouponController::class,'edit']);
        Route::post('/edit/coupon', [CouponController::class,'edit_coupon'])->name('edit_coupon');
    /**SIZE */
        Route::get('/size', [SizeController::class,'view']);
        Route::get('/add/size', function () {
            return view('admin/forms/add_size');
        });
        Route::post('/add/size', [SizeController::class,'add_size'])->name('add_size');
        Route::get('/size/delete/{id}', [SizeController::class,'delete']);
        Route::get('/size/status/{id}/{status}', [SizeController::class,'status']);
        Route::get('/size/edit/{id}', [SizeController::class,'edit']);
        Route::post('/edit/size', [SizeController::class,'edit_size'])->name('edit_size');
        /**Color */
        Route::get('/color', [ColorController::class,'view']);
        Route::get('/add/color', function () {
            return view('admin/forms/add_color');
        });
        Route::post('/add/color', [ColorController::class,'add_color'])->name('add_color');
        Route::get('/color/delete/{id}', [ColorController::class,'delete']);
        Route::get('/color/status/{id}/{status}', [ColorController::class,'status']);
        Route::get('/color/edit/{id}', [ColorController::class,'edit']);
        Route::post('/edit/color', [ColorController::class,'edit_color'])->name('edit_color');

        /**Brands */
        Route::get('/brands', [BrandController::class,'view']);
        Route::get('/add/brands', function () {
            return view('admin/forms/add_brands');
        });
        Route::post('/add/Brand', [BrandController::class,'add_brands'])->name('add_brands');
        Route::get('/brand/delete/{id}', [BrandController::class,'delete']);
        Route::get('/brand/status/{id}/{status}', [BrandController::class,'status']);
        Route::get('/brand/edit/{id}', [BrandController::class,'edit']);
        Route::post('/edit/brand', [BrandController::class,'edit_brand'])->name('edit_brand');


        /**Tax */
        Route::get('/tax', [TaxController::class,'view']);
        Route::post('/add/tax', [TaxController::class,'add_tax'])->name('add_tax');
        Route::get('/add/tax', function () {
            return view('admin/forms/add_tax');
        });
        Route::get('/tax/edit/{id}', [TaxController::class,'edit']);
        Route::post('/edit/tax', [TaxController::class,'edit_tax'])->name('edit_tax');
        
        /**baner */
        Route::get('/baner', [BanerController::class,'view']);
        Route::get('/add/baner', function () {
            return view('admin/forms/add_baner');
        });
        Route::post('/add/baner', [BanerController::class,'add_baner'])->name('add_baner');
        Route::get('/baner/delete/{id}', [BanerController::class,'delete']);
        Route::get('/baner/status/{id}/{status}', [BanerController::class,'status']);
        Route::get('/baner/edit/{id}', [BanerController::class,'edit']);
        Route::post('/edit/baner', [BanerController::class,'edit_baner'])->name('edit_baner');


        /**Logout */
        Route::get('/logout', function () {
            session()->forget('ADMIN_LOGIN');
            session()->forget('ADMIN_ID');
            session()->flash('error','logout sucessfully');
            return redirect('login');
            
        });

        /**Users */
        Route::get('/user',[UserController::class,'view']);
        Route::get('/user/delete/{id}', [UserController::class,'delete']);
        Route::get('/user/address/{id}', [UserController::class,'address']);
        Route::get('/user/status/{id}/{status}', [UserController::class,'status']);
        
        // /**Vendero Management  */
        // Route::get('/vendoer',[VendoerManageMentControler::class,'view']);
        // Route::get('/vendoer/delete/{id}', [VendoerManageMentControler::class,'delete']);
        
        // Route::get('/vendoer/status/{id}/{status}', [VendoerManageMentControler::class,'status']);
        

        /**Product */
        Route::get('/product',[ProductController::class,'view']);
        Route::get('/add/product',[ProductController::class,'add_product_view']);
        Route::post('/add/product',[ProductController::class,'add_product'])->name('add_product');
        Route::get('/product/delete/{id}', [ProductController::class,'delete']);
        Route::get('/product/pro_attr/{id}', [ProductController::class,'pro_attr'])->name('pro_attr1');
        Route::get('/product_attr/delete/{id}', [ProductController::class,'delete_attr']);
        Route::get('/product_attr/edit/{id}', [ProductController::class,'edit_attr']);
        Route::get('/product_attr/status/{id}/{status}',[ProductController::class,'status_attr']);
        Route::get('/product/status/{id}/{status}',[ProductController::class,'status']);
        Route::get('/product/edit/{id}', [ProductController::class,'edit']);
        Route::post('/edit/product',[ProductController::class,'edit_save'])->name('edit_save');
        Route::post('/edit/product_attr1',[ProductController::class,'edit_attr_save'])->name('edit_attr_save');



        /**order */
        Route::get('/order', [OrderController::class,'view']);
        Route::get('/total_order_of_user/{id}', [OrderController::class,'total_order_of_user']);
        Route::get('/order_view/{id}',[OrderController::class,'order_view']);
        /**Vendore Management */
        Route::get('/vendoer', [VendoerManageMentControler::class,'view']);
        Route::get('/vendor_details/{id}', [VendoerManageMentControler::class,'vendor_details']);
        Route::get('/vendor_product/details/{id}',[VendoerManageMentControler::class,'details'])->name('details');
        Route::get('/product/vendor_attr/{id}',[VendoerManageMentControler::class,'vendor_attr'])->name('vendor_attr');
        Route::get('/vendor_attr/status/{id}/{status}',[VendoerManageMentControler::class,'status_attr']);
        Route::get('/vendor/status/{id}/{uid}/{status}',[VendoerManageMentControler::class,'status']);
        


        // Route::get('/order', function () {
        //     return view('admin/order');
        // });
        // Route::get('/review', function () {
        //     return view('admin/review');
        // });

    });

});


Route::group(['middleware'=>'vendor_login'],function(){
    /**Logout */
    Route::get('/vedor_logout', function () {
        session()->forget('VENDOR_LOGIN');
        session()->forget('VENDOR_NAME');
        session()->forget('VENDOR_ID');
        
        session()->flash('error','logout sucessfully');
        return redirect('/');
        
    });
    Route::get('vendor_index',[FrontController::class,'vendor_index']);
    Route::prefix('vendor')->group(function () {
    /**Size */
        Route::get('/size', [VendorSizeController::class,'index']);
        Route::get('/add/size', function () {
            return view('front/vendore/forms/add_size');
        });
        Route::post('/add/size', [VendorSizeController::class,'add_size'])->name('add_size');
        Route::get('/size/delete/{id}', [VendorSizeController::class,'delete']);
        Route::get('/size/status/{id}/{status}', [VendorSizeController::class,'status']);
        Route::get('/size/edit/{id}', [VendorSizeController::class,'edit']);
        Route::post('/edit/size', [VendorSizeController::class,'edit_size'])->name('edit_size');


    /**Color */
        Route::get('/color', [VendorColorController::class,'view']);
        Route::get('/add/color', function () {
            return view('front/vendore/forms/add_color');
        });
        Route::post('/add/color', [VendorColorController::class,'add_color'])->name('add_color');
        Route::get('/color/delete/{id}', [VendorColorController::class,'delete']);
        Route::get('/color/status/{id}/{status}', [VendorColorController::class,'status']);
        Route::get('/color/edit/{id}', [VendorColorController::class,'edit']);
        Route::post('/edit/color', [VendorColorController::class,'edit_color'])->name('edit_color');
 

        /**Tax */
        Route::get('/tax', [VendorTaxController::class,'view']);
        Route::post('/add/tax', [VendorTaxController::class,'add_tax'])->name('add_tax');
        Route::get('/add/tax', function () {
            return view('front/vendore/forms/add_tax');
        });
        Route::get('/tax/edit/{id}', [VendorTaxController::class,'edit']);
        Route::post('/edit/tax', [VendorTaxController::class,'edit_tax'])->name('edit_tax');
        
        /**Product Vendor */
        Route::get('/product',[VendorProductController::class,'view']);
        Route::get('/add/product',[VendorProductController::class,'add_product_view']);
        Route::post('/add/product',[VendorProductController::class,'add_product'])->name('add_product');
        Route::get('/product/delete/{id}', [VendorProductController::class,'delete']);
        Route::get('/product/pro_attr/{id}', [VendorProductController::class,'pro_attr'])->name('pro_attr');
        Route::get('/product_attr/delete/{id}', [VendorProductController::class,'delete_attr']);
        Route::get('/product_attr/edit/{id}', [VendorProductController::class,'edit_attr']);
        Route::get('/product_attr/status/{id}/{status}',[VendorProductController::class,'status_attr']);
        Route::get('/product/status/{id}/{status}',[VendorProductController::class,'status']);
        Route::get('/product/edit/{id}', [VendorProductController::class,'edit']);
        Route::post('/edit/product',[VendorProductController::class,'edit_save'])->name('edit_save');
        Route::post('/edit/product_attr',[VendorProductController::class,'edit_attr_save'])->name('edit_attr_save');


    });
});