<?php



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\followUnfollowController;
use App\Http\Controllers\addStaffController;
use App\Http\Controllers\newProductController;


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

// website routes

Route::get('/', 'App\Http\Controllers\indexController@index')->name('index');

Route::get('/shop/{slug}', 'App\Http\Controllers\shopController@shop')->name('shop');

Route::get('/productDetails/{id}', 'App\Http\Controllers\shopController@productDetails')->name('productDetails');

Route::post('/addToCart','App\Http\Controllers\cartController@addToCart')->name('addToCart');

Route::post('/addToWishList','App\Http\Controllers\cartController@addToWishList')->name('addToWishList');

Route::post('/removeFromCart','App\Http\Controllers\cartController@removeFromCart')->name('removeFromCart');

Route::post('/updateCart','App\Http\Controllers\cartController@updateCart')->name('updateCart');

Route::get('/checkout/{id}','App\Http\Controllers\cartController@checkout')->name('checkout');

Route::get('/cart', 'App\Http\Controllers\shopController@cart')->name('cart');

Route::get('/wishList', 'App\Http\Controllers\cartController@wishList')->name('wishList');

Route::post('/verifyCoupon','App\Http\Controllers\couponController@verifyCoupon')->name('verifyCoupon');

Route::post('/wishListDelete/{id}/{type}','App\Http\Controllers\cartController@wishListDelete')->name('wishListDelete');

Route::post('/loginUser','App\Http\Controllers\usersController@loginUser')->name('loginUser');

Route::post('/profilechange','App\Http\Controllers\usersController@ProfileChange')->name('profilechange');

// user profile

Route::get('/userDashboard','App\Http\Controllers\usersController@userDashboard')->name('userDashboard');

Route::get('/address','App\Http\Controllers\usersController@address')->name('address');

Route::get('/additionalComment','App\Http\Controllers\cartController@additionalComment')->name('additionalComment');

Route::post('/cityByCountry','App\Http\Controllers\cartController@cityByCountry')->name('cityByCountry');

Route::get('/signOut','App\Http\Controllers\usersController@signOut')->name('signOut');

Route::post('/profile','App\Http\Controllers\usersController@ChangeProfile')->name('profile');


// checkout

Route::post('/checkoutProcess','App\Http\Controllers\checkoutController@checkoutProcess')->name('checkoutProcess');

Route::get('/orderPlaced','App\Http\Controllers\checkoutController@orderPlaced')->name('orderPlaced');



// paypal

Route::post('paypal', array('as' => 'paypal','uses' => 'App\Http\Controllers\PaypalController@postPaymentWithpaypal',));

Route::get('paypal', array('as' => 'status','uses' => 'App\Http\Controllers\PaypalController@getPaymentStatus',));



// review

Route::post('/reviewSubmit','App\Http\Controllers\productController@reviewSubmit')->name('reviewSubmit');

Route::post('/reviewLike','App\Http\Controllers\productController@reviewLike')->name('reviewLike');

Route::post('/reviewDislike','App\Http\Controllers\productController@reviewDislike')->name('reviewDislike');


// vendor

Route::get('/vendor','App\Http\Controllers\marketController@vendor')->name('vendor');

Route::post('/searchResult','App\Http\Controllers\marketController@searchResult')->name('vendorSearch');

Route::get('/miniStore/{id}','App\Http\Controllers\marketController@miniStore')->name('miniStore');
// Route::get('/miniStore/{id}','App\Http\Controllers\marketController@miniStore')->name('miniStore');


// order

Route::get('/orders','App\Http\Controllers\orderController@orders')->name('orders');

//address

Route::get('/address','App\Http\Controllers\orderController@address')->name('address');

Route::get('/remove-address/{id}','App\Http\Controllers\orderController@removeAddress')->name('remove-address');

Route::post('/insertaddress','App\Http\Controllers\orderController@insertaddress')->name('insertaddress');

Route::get('/account-review','App\Http\Controllers\orderController@accountReview')->name('account-review');

Route::get('/account-payment','App\Http\Controllers\orderController@accountPayment')->name('account-payment');

Route::get('/notification','App\Http\Controllers\orderController@notification')->name('notification');

Route::get('/account-wishlist','App\Http\Controllers\orderController@accountWishlist')->name('account-wishlist');

Route::get('/remove-wishlist/{id}','App\Http\Controllers\orderController@removewishlist')->name('remove-wishlist');

Route::get('/editaddress/{id}','App\Http\Controllers\orderController@editaddress')->name('editaddress');

Route::post('/update-address/{id}','App\Http\Controllers\orderController@updateaddress')->name('update-address');

Route::get('/cancelorder/{id}','App\Http\Controllers\orderController@cancelorder')->name('cancelorder');

Route::get('coupongift','App\Http\Controllers\orderController@coupongift')->name('coupongift');



// services

Route::get('/services','App\Http\Controllers\serviceController@services')->name('servicesWebsite');

Route::get('/serviceDetails/{id}', 'App\Http\Controllers\serviceController@serviceDetails')->name('serviceDetails');
Route::post('/buyservice', 'App\Http\Controllers\serviceController@buyservice')->name('buyservice');
Route::get('buyservice', array('as' => 'servicestatus','uses' => 'App\Http\Controllers\serviceController@getServiceStatus',));
Route::get('viewServiceBook','App\Http\Controllers\serviceController@viewServiceBook')->name('viewServiceBook');
Route::get('deleteServicesBook/{id}','App\Http\Controllers\serviceController@deleteServicesBook')->name('deleteServicesBook');


// faq

Route::get('/faq','App\Http\Controllers\indexController@faq')->name('faq');



// scout support

Route::get('/contact','App\Http\Controllers\indexController@contact')->name('contact');



// about us

Route::get('/aboutUs','App\Http\Controllers\indexController@aboutUs')->name('aboutUs');



// invoice

Route::get('/invoice/{orderId}','App\Http\Controllers\orderController@invoice')->name('invoice');



// vendor login/registration



Route::post('/', 'App\Http\Controllers\indexController@index')->name('index');



Route::post('/newpassword', 'App\Http\Controllers\usersController@NewPassword')->name('newpassword');

Route::get('/resetpassword', 'App\Http\Controllers\usersController@resetPassword')->name('resetpassword');

Route::get('/resetcode', 'App\Http\Controllers\usersController@resetcode')->name('resetcode');

Route::get('/passwordform', 'App\Http\Controllers\usersController@passwordform')->name('passwordform');

Route::post('/codematch', 'App\Http\Controllers\usersController@codematch')->name('codematch');

Route::post('mail-sent', 'App\Http\Controllers\usersController@ResetEmail')->name('mail-sent');





Route::get('/Vendor-detail/{id}','App\Http\Controllers\usersController@vendor_detail')->name('vendor.detail');

Route::post('/vendor-support-request','App\Http\Controllers\VendorSupportController@VenderSuportReq')->name('vendor.supportReq');

Route::get('/vendor-login', 'App\Http\Controllers\indexController@vendor_login')->name('vendor.login');

Route::get('/vendor-terms-agreement', 'App\Http\Controllers\indexController@terms_agreement')->name('vendor.terms_agreement');

Route::post('/vendor/register/action','App\Http\Controllers\usersController@vendor_reg_action')->name('vendor.reg.action');

Route::post('/vendor/login/action','App\Http\Controllers\usersController@vendor_login_action')->name('vendor.login.action');

Route::get('/vendor-register', 'App\Http\Controllers\indexController@vendor_register')->name('vendor.register');

Route::get('/vendor-forget-password', 'App\Http\Controllers\indexController@forget_pass')->name('vendor.forget_pass');

Route::post('/vendor-logout', 'App\Http\Controllers\indexController@vendor_logout')->name('vendor.logout');

Route::post('/get-city','App\Http\Controllers\indexController@get_city')->name('get_city');

Route::get('/vendor-contact-agreement', 'App\Http\Controllers\indexController@vendor__contact_agreement')->name('vendor.contact_agreement');
// ============nikhil 
Route::get('/member-subscription', 'App\Http\Controllers\indexController@member_subscription')->name('member_subscription');
Route::post('/membershipVender-Detail', 'App\Http\Controllers\membershipController@membershipVender_details')->name('membershipVender_details');
Route::post('/membershipShopper-Detail', 'App\Http\Controllers\membershipController@membershipShopper_details')->name('membershipShopper_details');
//==============
Route::post('/removeForWishlist', 'App\Http\Controllers\cartController@removeForWishlist')->name('removeForWishlist');
Route::match(['get' ,'post'],'/removeFromWishlist', 'App\Http\Controllers\cartController@removeFromWishlist')->name('removeFromWishlist');

Route::post('/Follow_vendor',[followUnfollowController::class,'follow'])->name('follow_vendor');




// end website route



//admin Routes begin

// admin manage itself



Route::get('/adminScoutin', 'App\Http\Controllers\adminController@adminLogin')->name('adminFrexar');

Route::get('/editProfile','App\Http\Controllers\adminController@editProfile')->middleware('auth:web')->name('editProfile');

Route::post('/updateProfile','App\Http\Controllers\adminController@updateProfile')->middleware('auth:web')->name('updateProfile');

Route::get('/logout', function () {

    Auth::logout();

    Session::flush();

    return Redirect::to('admin');

})->middleware('auth:web')->name('logout');

Route::post('/adminLogin','App\Http\Controllers\adminController@loginProcess')->name('adminLogin');



//membership manage by admin

Route::get('/addMembershipVendor','App\Http\Controllers\membershipController@addMembershipVendor')->middleware('auth:web')->name('addMembershipVendor');

Route::post('/insertMembershipVendor','App\Http\Controllers\membershipController@insertMembershipVendor')->middleware('auth:web')->name('insertMembershipVendor');

Route::get('/addMembershipShopper','App\Http\Controllers\membershipController@addMembershipShopper')->middleware('auth:web')->name('addMembershipShopper');

Route::post('/insertMembershipShopper','App\Http\Controllers\membershipController@insertMembershipShopper')->middleware('auth:web')->name('insertMembershipShopper');



Route::get('/viewMembershipShopper','App\Http\Controllers\membershipController@viewMembershipShopper')->middleware('auth:web')->name('viewMembershipShopper');

Route::get('/deleteMembershipShopper/{id}','App\Http\Controllers\membershipController@deleteMembershipShopper')->middleware('auth:web')->name('deleteMembershipShopper');



Route::get('/viewMembershipVendor','App\Http\Controllers\membershipController@viewMembershipVendor')->middleware('auth:web')->name('viewMembershipVendor');

Route::get('/deleteMembershipVendor/{id}','App\Http\Controllers\membershipController@deleteMembershipVendor')->middleware('auth:web')->name('deleteMembershipVendor');



//Users manage by admin

Route::get('/addUsers','App\Http\Controllers\usersController@addUsers')->middleware('auth:web')->name('addUsers');

Route::post('/insertUsers','App\Http\Controllers\usersController@insertUsers')->name('insertUsers');

Route::get('/viewUsers','App\Http\Controllers\usersController@viewUsers')->middleware('auth:web')->name('viewUsers');



//markets managed by admin

Route::get('/createMarket','App\Http\Controllers\marketController@createMarket')->middleware('auth:web')->name('createMarket');

Route::post('/insertMarket','App\Http\Controllers\marketController@insertMarket')->middleware('auth:web')->name('insertMarket');

Route::get('/viewMarkets','App\Http\Controllers\marketController@viewMarkets')->middleware('auth:web')->name('viewMarkets');

Route::get('/deleteMarket/{id}','App\Http\Controllers\marketController@deleteMarket')->middleware('auth:web')->name('deleteMarket');


//categories managed by admin

Route::get('/createCategory','App\Http\Controllers\categoryController@createCategory')->middleware('auth:web')->name('createCategory');

Route::post('/insertCategory','App\Http\Controllers\categoryController@insertCategory')->middleware('auth:web')->name('insertCategory');

Route::get('/viewCategories','App\Http\Controllers\categoryController@viewCategories')->middleware('auth:web')->name('viewCategories');

Route::get('/deleteCategory/{id}','App\Http\Controllers\categoryController@deleteCategory')->middleware('auth:web')->name('deleteCategory');



//brand managed by admin

Route::get('/createBrand','App\Http\Controllers\brandController@createBrand')->middleware('auth:web')->name('createBrand');

Route::post('/insertBrand','App\Http\Controllers\brandController@insertBrand')->middleware('auth:web')->name('insertBrand');

Route::get('/viewBrands','App\Http\Controllers\brandController@viewBrands')->middleware('auth:web')->name('viewBrands');

Route::get('/deleteBrand/{id}','App\Http\Controllers\brandController@deleteBrand')->middleware('auth:web')->name('deleteBrand');



//product management by admin

Route::get('/addProduct','App\Http\Controllers\productController@addProduct')->middleware('auth:web')->name('addProduct');

Route::post('/insertProduct','App\Http\Controllers\productController@insertProduct')->middleware('auth:web')->name('insertProduct');

Route::get('/viewProducts','App\Http\Controllers\productController@viewProducts')->middleware('auth:web')->name('viewProducts');

Route::get('/editProduct/{id}','App\Http\Controllers\productController@editProduct')->middleware('auth:web')->name('editProduct');

Route::get('/deleteProduct/{id}','App\Http\Controllers\productController@deleteProduct')->middleware('auth:web')->name('deleteProduct');

Route::get('/Product-Approve-Request','App\Http\Controllers\productController@Product_Approve_Request')->middleware('auth:web')->name('Product_Approve_Request');

Route::get('/Product/Approve/{id}','App\Http\Controllers\productController@approve_Product')->middleware('auth:web')->name('approveProduct');

Route::get('/Product/New/Review/','App\Http\Controllers\productController@newReview_for_approve')->middleware('auth:web')->name('newReview_for_approve');
Route::get('/Product/Review/Approve/{id}','App\Http\Controllers\productController@approve_newReview')->middleware('auth:web')->name('approve_newReview');
Route::get('/Product/All-Review/','App\Http\Controllers\productController@All_Review')->middleware('auth:web')->name('All_Review');
// Route::get('/Product/Review/delete/{id}','App\Http\Controllers\productController@delete_Review')->middleware('auth:web')->name('delete_Review');

//coupons managed by admin

Route::get('/createCoupons','App\Http\Controllers\couponController@createCoupons')->middleware('auth:web')->name('createCoupons');

Route::post('/insertCoupon','App\Http\Controllers\couponController@insertCoupon')->middleware('auth:web')->name('insertCoupon');

Route::get('/viewCoupons','App\Http\Controllers\couponController@viewCoupons')->middleware('auth:web')->name('viewCoupons');

Route::get('/deleteCoupon/{id}','App\Http\Controllers\couponController@deleteCoupon')->middleware('auth:web')->name('deleteCoupon');



//payment managed by admin

Route::get('/managePayment','App\Http\Controllers\settingsController@managePayment')->middleware('auth:web')->name('managePayment');

Route::post('/paymentsUpdate','App\Http\Controllers\settingsController@paymentsUpdate')->middleware('auth:web')->name('paymentsUpdate');



Auth::routes();






//banner managed by admin

Route::get('/createIndexBanner','App\Http\Controllers\IndexbannerController@createIndexBanner')->name('createIndexBanner');

Route::post('/insertIndexBanner','App\Http\Controllers\IndexbannerController@insertIndexBanner')->name('insertIndexBanner');

Route::get('/viewIndexBanner','App\Http\Controllers\IndexbannerController@viewIndexBanner')->name('viewIndexBanner');

Route::get('/deleteIndexBanner/{id}','App\Http\Controllers\IndexbannerController@deleteIndexBanner')->name('deleteIndexBanner');

Route::get('/editIndexBanner/{id}','App\Http\Controllers\IndexbannerController@editIndexBanner')->name('editIndexBanner');

Route::post('/updateIndexBanner/{id}','App\Http\Controllers\IndexbannerController@updateIndexBanner')->name('updateIndexBanner');



// order management

Route::get('/orderManagement','App\Http\Controllers\orderController@orderManagement')->middleware('auth:web')->name('orderManagement');

Route::get('/viewFullOrder/{cartId}','App\Http\Controllers\orderController@viewFullOrder')->middleware('auth:web')->name('viewFullOrder');

Route::post('invoice/status/update/{id}','App\Http\Controllers\orderController@invoiceStatusUpdate')->middleware('auth:web')->name('invoiceStatusUpdate');



// earning management

Route::get('/earnings','App\Http\Controllers\orderController@earnings')->middleware('auth:web')->name('earnings');

// Route::get('/payout','App\Http\Controllers\orderController@payout')->middleware('auth:web')->name('payout');





//faq managed by admin

Route::get('/createFaq','App\Http\Controllers\FaqController@createFaq')->name('createFaq');

Route::post('/insertFaq','App\Http\Controllers\FaqController@insertFaq')->name('insertFaq');

Route::get('/viewFaq','App\Http\Controllers\FaqController@viewFaq')->name('viewFaq');

Route::get('/deleteFaq/{id}','App\Http\Controllers\FaqController@deleteFaq')->name('deleteFaq');

Route::get('/editFaq/{id}','App\Http\Controllers\FaqController@editFaq')->name('editFaq');

Route::post('/updateFaq/{id}','App\Http\Controllers\FaqController@updateFaq')->name('updateFaq');



//Contact managed by admin

Route::get('/editContact/{id}','App\Http\Controllers\ContactController@editContact')->name('editContact');

Route::post('/updateContact/{id}','App\Http\Controllers\ContactController@updateContact')->name('updateContact');

Route::get('/createContact','App\Http\Controllers\ContactController@createContact')->middleware('auth:web')->name('createContact');

Route::post('/insertContact','App\Http\Controllers\ContactController@insertContact')->middleware('auth:web')->name('insertContact');

Route::get('/viewContact','App\Http\Controllers\ContactController@viewContact')->middleware('auth:web')->name('viewContact');

Route::get('/deleteContact/{id}','App\Http\Controllers\ContactController@deleteContact')->middleware('auth:web')->name('deleteContact');

Route::post('/formcontact','App\Http\Controllers\ContactController@formcontact')->name('formcontact');

Route::post('/subscribe','App\Http\Controllers\ContactController@subscribe')->name('subscribe');



//newsletter managed by admin



Route::get('/editNews/{id}','App\Http\Controllers\NewsletterController@editNews')->name('editNews');

Route::post('/updateNews/{id}','App\Http\Controllers\NewsletterController@updateNews')->name('updateNews');

Route::get('/viewNews','App\Http\Controllers\NewsletterController@viewNews')->name('viewNews');

Route::get('/deleteNews/{id}','App\Http\Controllers\NewsletterController@deleteNews')->name('deleteNews');



//slider managed by admin





Route::get('/createSlider','App\Http\Controllers\SliderController@createSlider')->name('createSlider');

Route::post('/insertSlider','App\Http\Controllers\SliderController@insertSlider')->name('insertSlider');

Route::get('/viewSlider','App\Http\Controllers\SliderController@viewSlider')->name('viewSlider');

Route::get('/deleteSlider/{id}','App\Http\Controllers\SliderController@deleteSlider')->name('deleteSlider');

Route::get('/editSlider/{id}','App\Http\Controllers\SliderController@editSlider')->name('editSlider');

Route::post('/updateSlider/{id}','App\Http\Controllers\SliderController@updateSlider')->name('updateSlider');



//banner managed by admin

Route::get('/createBanner','App\Http\Controllers\bannerController@createBanner')->name('createBanner');

Route::post('/insertBanner','App\Http\Controllers\bannerController@insertBanner')->name('insertBanner');

Route::get('/viewBanner','App\Http\Controllers\bannerController@viewBanner')->name('viewBanner');

Route::get('/deleteBanner/{id}','App\Http\Controllers\bannerController@deleteBanner')->name('deleteBanner');

Route::get('/editBanner/{id}','App\Http\Controllers\bannerController@editBanner')->name('editBanner');

Route::post('/updateBanner/{id}','App\Http\Controllers\bannerController@updateBanner')->name('updateBanner');

//Vendor Management

Route::get('/allVendor','App\Http\Controllers\usersController@allVendor')->name('allVendor');
Route::get('/allVendorRequest','App\Http\Controllers\usersController@allVendorRequest')->name('allVendorRequest');
Route::get('/approveVendor/{id}','App\Http\Controllers\usersController@approveVendor')->name('approveVendor');
Route::get('/delete_user/{id}','App\Http\Controllers\usersController@delete_user')->name('delete_user');


// service management

Route::get('/servicesM','App\Http\Controllers\serviceController@index')->middleware('auth:web')->name('services');

Route::get('/addServices','App\Http\Controllers\serviceController@addServices')->middleware('auth:web')->name('addServices');

Route::post('/insertServices','App\Http\Controllers\serviceController@insertServices')->middleware('auth:web')->name('insertServices');

Route::get('/deleteServices/{id}','App\Http\Controllers\serviceController@deleteServices')->middleware('auth:web')->name('deleteServices');







// Follower Managment
Route::get('/all-followers',[followUnfollowController::class,'all_followers'])->name('all_followers');
Route::get('/deleteFollower',[followUnfollowController::class,'deleteFollower'])->name('deleteFollower');

//Staff Managment by vendor
Route::get('/add_staff',[addStaffController::class,'index'])->name('add_staff_form');
Route::post('/add_staff',[addStaffController::class,'add_staff'])->name('add_staff');
Route::get('/View-staff',[addStaffController::class,'view_staff'])->name('view_staff');
Route::get('/Edit-staff/{id}',[addStaffController::class,'editStaff'])->name('editStaff');
Route::post('/Update-staff/{id}/{image}',[addStaffController::class,'updateStaff'])->name('updateStaff');
Route::get('/Delete-staff/{id}',[addStaffController::class,'deleteStaff'])->name('deleteStaff');
Route::get('/Vendor-profile','App\Http\Controllers\usersController@vendor_dashboard_Profile')->name('vendor_dashboard_Profile');
Route::post('/vendor-profile-detail/{id}','App\Http\Controllers\usersController@vendorProfileDetail')->name('vendor-profile-detail');


// profile managed by admin




//end
Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');





Route::prefix('admin')->group(function () {









});





Route::get('/adminss', 'App\Http\Controllers\Admin\AdminFunction@index')->name('admin_dashboard');



Route::get('/vendorDash', 'App\Http\Controllers\Vendor\VendorFunction@index')->name('vender_dashboard');

// Route::get('/vender_dashboard', 'App\Http\Controllers\Vendor\VendorFunction@index')->name('vender_dashboard');







Route::post('/filter_data', 'App\Http\Controllers\shopController@filter_data')->name('filter_data');



//mail



Route::get('/createMail','App\Http\Controllers\MailController@createMail')->name('createMail');

Route::post("send-email", 'App\Http\Controllers\MailController@composeEmail')->name("send-email");

Route::get('cproduct/{id}', 'App\Http\Controllers\indexController@CategoryWiseProduct')->name('cproduct');





// testimonials

Route::get('/testimonials','App\Http\Controllers\indexController@testimonials')->name('testimonials');

Route::post("testimonials", 'App\Http\Controllers\usersController@testimonialsSend')->name("testimonials");

Route::get('/viewTestimonal','App\Http\Controllers\usersController@viewTestimonal')->name('viewTestimonal');

Route::get('/editTestimonal/{id}','App\Http\Controllers\usersController@editTestimonal')->name('editTestimonal');



Route::get('alluser','App\Http\Controllers\usersController@Alluser')->name('alluser');

Route::get('/editVendor/{id}','App\Http\Controllers\usersController@editVendor')->name('editVendor');

Route::post('/vendorProfile','App\Http\Controllers\usersController@vendorProfile')->name('vendorProfile');

Route::get('crop-image-upload', 'App\Http\Controllers\CropImageController@index')->name('crop-image-upload');

Route::post('cropimage', 'App\Http\Controllers\CropImageController@uploadCropImage')->name('cropimage');
Route::get('search', 'App\Http\Controllers\indexController@Search')->name('search');

Route::get('/termsagreement/{id}','App\Http\Controllers\usersController@termsagreement')->name('termsagreement');
Route::post('/get_origin','App\Http\Controllers\indexController@get_origin')->name('get_origin');
Route::post('/user_agree','App\Http\Controllers\usersController@user_agree')->name('user_agree');
Route::post('/updateuser','App\Http\Controllers\usersController@updateuser')->name('updateuser');
Route::get('/product_ajax','App\Http\Controllers\indexController@search_ajax')->name('product_ajax');
Route::get('/autocomplete','App\Http\Controllers\indexController@autocomplete')->name('autocomplete');

// new product form according to new requirement

Route::get('/new_form','App\Http\Controllers\indexController@new_product_form')->name('newform');
Route::post('/new_form',[newProductController::class,'newProduct'])->name('saveNewProduct');

//withdraw


Route::get('/withdraw','App\Http\Controllers\orderController@withdrawManagement')->name('withdraw');

Route::post('/WrequestSent','App\Http\Controllers\orderController@WrequestSent')->name('WrequestSent');
Route::get('/withdrawRequest/{id}','App\Http\Controllers\orderController@withdrawRequest')->name('withdrawRequest');

Route::get('/view-request','App\Http\Controllers\orderController@allvendorRequest')->name('view-request');
Route::post('/withdraw_payment','App\Http\Controllers\orderController@Withdrawpayment')->name('withdraw_payment');
Route::get('withdraw_payment', array('as' => 'status1','uses' => 'App\Http\Controllers\orderController@getPaymentStatus1',));


//chat

Route::post('send-message','App\Http\Controllers\ChatController@store')->name('send-message');
Route::get('/chat/{id}',  'App\Http\Controllers\ChatController@callmessage')->name('chat');
Auth::routes();

Route::get('/message/{id}', 'App\Http\Controllers\HomeController@index1')->name('home');
Route::get('/allmessage', 'App\Http\Controllers\HomeController@allmessage')->name('allmessage');

Route::get('/json','App\Http\Controllers\HomeController@jsonResponse')->name('json');
Route::get('/sound/','App\Http\Controllers\ChatController@soundCheck')->name('sound');
Route::get('/seen/','App\Http\Controllers\ChatController@seenMessage')->name('seen');
Route::get('/seenUpdate/','App\Http\Controllers\ChatController@seenUpdate')->name('seenUpdate');
Route::get('/allmessageview/','App\Http\Controllers\ChatController@allMessageView')->name('allmessageview');
Route::get('/singleSeenUpdate/{id}','App\Http\Controllers\ChatController@singleSeenUpdate')->name('singleSeenUpdate');
Route::post('/typing/','App\Http\Controllers\ChatController@typing')->name('typing');
Route::get('/deletemessage/{id}','App\Http\Controllers\ChatController@deletemessage')->name('deletemessage');
Route::get('/typing-receve/{id}','App\Http\Controllers\ChatController@typinc_receve')->name('typing-receve');

Route::get('/chatuser/','App\Http\Controllers\ChatController@chatuser')->name('chatuser');
//order return
Route::get('/vieworder-return','App\Http\Controllers\orderController@ViewOrderReturn')->name('vieworder-return');
Route::get('/orderReturn_detail/{id}','App\Http\Controllers\orderController@OrderReturn_Detail')->name('orderReturn_detail');
Route::get('/account-return','App\Http\Controllers\orderController@accountReturn')->name('account-return');
Route::post('/order-return','App\Http\Controllers\orderController@OrderReturn')->name('order-return');

Route::post('/saveDynamicData','App\Http\Controllers\ContenteditController@saveDynamicData')->name('saveDynamicData');
Route::POST('/uploadImage','App\Http\Controllers\ContenteditController@uploadImage')->name('uploadImage');
Route::post('/createNewCoupon','App\Http\Controllers\couponController@createNewCoupon')->name('createNewCoupon');