<?php
//======================Start frontEnd==============================
Route::get('/',[
    'uses'=>'SuperMarketController@index',
    'as'=>'/'
]);

Route::get('/category-product/{id}',[
    'uses'=>'SuperMarketController@categoryProduct',
    'as'=>'/category-product'
]);

Route::get('/product-details/{id}',[
    'uses'=>'SuperMarketController@productDetails',
    'as'=>'product-details'
]);
Route::post('/search','SuperMarketController@searchProduct')->name('search');
Route::post('/autocomplete/fetch', 'SuperMarketController@fetch')->name('autocomplete.fetch');


Route::get('/customer-signup-form','CheckoutController@index')->name('checkout');
Route::post('/customer-signup','CheckoutController@customerSignUp')->name('customer.signup');
Route::get('/customer-login-form','CheckoutController@customerLoginForm')->name('customer.login.form');
Route::post('/customer-login','CheckoutController@customerLogin')->name('customer.login');
Route::get('/help','CheckoutController@help')->name('customer.help');
Route::post('/help/info/save','CheckoutController@saveInfo')->name('customer.help.save');
//customer logout
Route::post('checkout/customer-logout','CheckoutController@customerLogout')->name('customer-logout');

Route::get('/checkout/shipping','CheckoutController@shippingForm')->name('checkout-shipping');
Route::post('/shipping/save','CheckoutController@saveShippingInfo')->name('new-shipping');
Route::get('/checkout/payment','CheckoutController@paymentForm')->name('checkout-payment');
Route::post('/checkout/order','CheckoutController@newOrder')->name('new-order');
Route::get('/compete/order','CheckoutController@completeOrder')->name('complete-order');
Route::get('/ajax-email-check/{id}','CheckoutController@ajaxEmailChek')->name('ajax-email-check');
//front-end(cart)
Route::get('/checkout','CartController@cartProductList');
Route::post('/add/to-cart/{product_id}','CartController@addToCart');
Route::get('increase-cart/{incItem}','CartController@increaseItem');
Route::get('decrease-cart/{decItem}','CartController@decreaseItem');
Route::get('/item/destroy/{item_id}','CartController@cartItemDestroy');
//coupon apply
Route::post('apply/coupon','CartController@applyCoupon')->name('apply-coupon');

//(wishlist)
Route::get('add/to-wishlist/{productId}','WishlistController@addWishlist');
Route::get('/wishlist','WishlistController@wishlist');
Route::get('/wishlist/destroy/{wish_id}','WishlistController@wishDestroy');
//======================End FrontEnd==============================



//======================Start admin panel==============================
Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');

//start group middleware
Route::group(['middleware'=> 'CheckLogin'],function (){
        //add category
        Route::get('/add/category',[
            'uses'=>'CategoryController@index',
            'as'=>'add.category'
        ]);

        Route::post('/new/category',[
            'uses'=>'CategoryController@saveCategory',
            'as'=>'/new-category'
        ]);

        Route::get('/manage/category',[
            'uses'=>'CategoryController@manageCat',
            'as'=>'manage.category'
        ]);

        Route::get('/category/unpublished/{id}',[
            'uses'=>'CategoryController@UnpublishedCategory',
            'as'=>'unpublished-category'
        ]);

        Route::get('/category/published/{id}',[
            'uses'=>'CategoryController@publishedCategory',
            'as'=>'published-category'
        ]);

        Route::get('/category/edit/{id}',[
            'uses'=>'CategoryController@editCategory',
            'as'=>'edit-category'
        ]);

        Route::post('/category/update',[
            'uses'=>'CategoryController@updateCategory',
            'as'=>'update-category'
        ]);

        Route::get('/category/delete/{id}',[
            'uses'=>'CategoryController@deleteCategory',
            'as'=>'delete-category'
        ]);


        //brands
        Route::get('/add/brand/',[
            'uses'=>'BrandController@index',
            'as'=>'/add-brand'
        ]);

        Route::post('/new/brand',[
            'uses'=>'BrandController@saveBrand',
            'as'=>'/new-brand'
        ]);

        Route::get('/manage/brand',[
            'uses'=>'BrandController@manageBrand',
            'as'=>'/manage-brand'
        ]);


        Route::get('/brand/unpublished/{id}',[
            'uses'=>'BrandController@UnpublishedBrand',
            'as'=>'unpublished-brand'
        ]);

        Route::get('/brand/published/{id}',[
            'uses'=>'BrandController@publishedBrand',
            'as'=>'published-brand'
        ]);

        Route::get('/brand/edit/{id}',[
            'uses'=>'BrandController@editBrand',
            'as'=>'edit-brand'
        ]);

        Route::post('/brand/update',[
            'uses'=>'BrandController@updateBrand',
            'as'=>'update-brand'
        ]);

        Route::get('/brand/delete/{id}',[
            'uses'=>'BrandController@deleteBrand',
            'as'=>'delete-brand'
        ]);


        //products
        Route::get('product/add',[
            'uses'=>'ProductController@index',
            'as'=>'/add-product'
        ]);

        Route::post('new/product',[
            'uses'=>'ProductController@saveProduct',
            'as'=>'/new-product'
        ]);
        Route::get('manage/product','ProductController@manageProduct')->name('/manage-product');
        Route::get('/product/unpublished/{id}',[
            'uses'=>'productController@Unpublishedproduct',
            'as'=>'unpublished-product'
        ]);

        Route::get('/product/published/{id}',[
            'uses'=>'productController@publishedproduct',
            'as'=>'published-product'
        ]);

        Route::get('edit/product/{id}',[
            'uses'=>'productController@editProduct',
            'as'=>'edit-product'
        ]);
        Route::POST('update/product/','ProductController@updateProduct');
        Route::get('delete/product/{id}','ProductController@deleteProduct');
    //===========order Controller===========
        Route::get('/order/manage-order','orderController@manageOrderInfo')->name('manage-order');
        Route::get('/order/view-order-details/{id}','orderController@viewOrderDetails')->name('view-order-details');
        Route::get('/order/view-order-invoice/{id}','orderController@viewOrderInvoice')->name('view-order-invoice');
        Route::get('/order/download-order-invoice/{id}','orderController@downloadOrderInvoice')->name('download-order-invoice');
        Route::get('/order/destroy/{id}','orderController@Orderdestroy');

        Route::get('/order/approved/{id}','orderController@OrderApproved');
        Route::get('/order/processing/{id}','orderController@OrderProcessing');
        Route::get('/order/pending/{id}','orderController@OrderPending');
        Route::get('/order/delivered/{id}','orderController@OrderDelivered');
        Route::get('/order/returned/{id}','orderController@OrderReturend');


     //coupon
        Route::get('/add/coupon/',[
            'uses'=>'CouponController@index',
            'as'=>'/add-coupon'
        ]);

        Route::post('/new/coupon',[
            'uses'=>'CouponController@saveCoupon',
            'as'=>'/new-coupon'
        ]);

        Route::get('/manage/coupon',[
            'uses'=>'CouponController@manageCoupon',
            'as'=>'/manage-coupon'
        ]);


        Route::get('/coupon/unpublished/{id}',[
            'uses'=>'CouponController@UnpublishedCoupon',
            'as'=>'unpublished-coupon'
        ]);

        Route::get('/coupon/published/{id}',[
            'uses'=>'CouponController@publishedCoupon',
            'as'=>'published-coupon'
        ]);

        Route::get('/coupon/edit/{id}',[
            'uses'=>'CouponController@editCoupon',
            'as'=>'edit-coupon'
        ]);

        Route::post('/coupon/update',[
            'uses'=>'CouponController@updateCoupon',
            'as'=>'update-coupon'
        ]);

        Route::get('/coupon/delete/{id}',[
            'uses'=>'CouponController@deleteCoupon',
            'as'=>'delete-coupon'
        ]);
});
//end group middleware
//======================End admin panel==============================
