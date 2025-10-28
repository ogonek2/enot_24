<?php

use App\Http\Controllers\Auth\SmsAuthController;
use Illuminate\Support\Facades\Route;
use Telegram\Bot\Laravel\Facades\Telegram;
use Telegram\Bot\Api;

Route::get('/login', function() {
    if (Auth::check()) {
        return redirect()->route('home');
    }
    return view('auth.login');
})->name('login');
Route::post('/send-sms-code', [SmsAuthController::class, 'sendSmsCode'])->name('send_verify');
Route::post('/login-with-sms-code', [SmsAuthController::class, 'loginWithSmsCode'])->name('verify_code');
Route::get('/login-with-sms-code', function() {
    if (Auth::check()) {
        return redirect()->route('home');
    }
    return view('auth.verify');
})->name('verify_page');

Route::get('/login-admin-auth', function() {
    if (Auth::check()) {
        return redirect()->route('home');
    }
    return view('auth.login_admin');
})->name('verify_admin');

Route::post('/login-admin-auth/submit', 'AuthController@loginAdmin')->name('login.admin.hash');

Route::get('/', 'mainController@index')->name('welcome');
Route::post('/close-modal', 'mainController@closeModal')->name('close_modal_session');
Route::get('/contacts', 'mainController@locations')->name('contacts');
Route::get('/poslugi', 'mainController@servicesListPage')->name('services');
Route::get('/poslugi/categoriya/{id}', 'mainController@servicesCategoryPage')->name('posluga_category');
Route::get('/poslugi/{posluga}', 'mainController@posluga')->name('posluga');
Route::get('/prices', 'mainController@servicesPage')->name('prices');
Route::get('/cart', 'CartController@index')->name('cart');
Route::post('/cart/order/submit', 'CartController@submit')->name('cart_submit_orders');

Route::get('/akciya/{id}/{name}', 'mainController@thisDiscount')->name('this_discount');

Route::post('/feedback', 'orderController@feedback')->name('feedback');
Route::post('/duration/feedback/submit', 'orderController@durationForm')->name('durationForm');
Route::post('/duration/feedback/submit/phone', 'orderController@durationFormPhone')->name('durationFormPhone');

Route::get('/courier', function () {
    return view('courier');
})->name('courier');
Route::get('/consultation', function () {
    return view('consultation');
})->name('consultation');

Route::get('/thanks', function () {
    return view('thanksyoupage');
})->name('thanks');
Route::get('/survey15', function() {
    return view('survay15');
})->name('survay15');
Route::post('/survey15/submit', 'mainController@survey15')->name('survey15.submit');

Route::get('/oferta', function() { 
    return view('oferta'); 
})->name('oferta'); 
Route::get('/privacy-policy', function() { 
    return view('privacy_policy'); 
})->name('privacy_policy'); 
Route::get('/umovy', function() {
    return view('umovy');
})->name('umovy');

Route::get('/dostavka', 'mainController@indexDelivery')->name('delivery');
Route::get('/prijmalne-viddilennya/{seo_link}', 'mainController@indexLocation')
    ->where('seo_link', '.*') // This allows any character, including slashes.
    ->name('show.location.card');

Route::group(['prefix' => 'admin', 'middleware' => 'checkRoleStatus:3'], function () {

    Route::get('/', function () {
        return view('admin.main');
    })->name('admin');

    Route::get('/refresh/services', 'adminController@refreshServices')->name('admin.refresh_services');
    Route::get('/refresh/discount', 'adminController@refreshDiscount')->name('admin.refresh_discount');
    
    Route::get('/sitemap/get-sitemap-list', 'adminController@getServicesSitemap')->name('admin.get_services_sitemap');

    // Locations
    Route::get('/locations', 'adminController@indexLocations')->name('admin.locations');
    Route::get('/locations/delete/item={id}', 'adminController@deleteLocation')->name('admin.locations.delete');
    Route::post('/location/edit/image/item={id}', 'adminController@editLocationImage')->name('admin.location_img.edit');
    Route::post('/locations/edit/item={id}', 'adminController@editLocation')->name('admin.locations.edit');
    Route::post('/locations/store', 'adminController@storeLocation')->name('admin.locations.store');
    
    Route::get('/auth/hash', function() {
        return view('admin.makeAdmin');
    })->name('admin.makeAdmin');
    Route::post('/auth/hash/store', 'AuthController@makeAdmin')->name('admin.admin.store');

    // Services
    Route::get('/services', 'adminController@indexServices')->name('admin.services');
    Route::post('/category/store', 'adminController@storeCategory')->name('admin.category.store');
    Route::post('/category/edit/image/item={id}', 'adminController@editCategoryImage')->name('admin.category_img.edit');
    Route::post('/category/edit/item={id}', 'adminController@editCategory')->name('admin.category.edit');
    Route::get('/category/delete/item={id}', 'adminController@deleteCategory')->name('admin.category.delete');
    Route::post('/service/store', 'adminController@storeService')->name('admin.service.store');
    Route::post('/service/edit/{id}/content/replace', 'adminController@editService')->name('admin.service.edit');
    Route::post('/service/edit/page/item={id}', 'adminController@editServicePage')->name('admin.service.edit.page');
    Route::get('/service/delete/item={id}', 'adminController@deleteService')->name('admin.service.delete');

    // Stock
    Route::get('/stock', 'adminController@indexStock')->name('admin.stock');
    Route::post('/stock/store', 'adminController@storeStock')->name('admin.stock.store');
    Route::post('/stock/edit/image/item={id}', 'adminController@editStockImage')->name('admin.stock_img.edit');
    Route::post('/stock/edit/item={id}', 'adminController@editStock')->name('admin.stock.edit');
    Route::get('/stock/delete/item={id}', 'adminController@stockDelete')->name('admin.stock.delete');

});
Route::group(['prefix' => 'system/admin', 'middleware' => 'checkRoleStatus:3'], function () {
    Route::get('/', 'userSystemAdminController@showIndex')->name('userAdmin');
    Route::post('/barcode', 'userSystemAdminController@scan')->name('scan_code');
    Route::get('/getservices', 'userSystemAdminController@getServices')->name('getservices');
    Route::post('/order/succsess', 'userSystemAdminController@orderSuccess')->name('order_succsess_admin');
    Route::post('/order/make/auth/submit', 'userSystemAdminController@makeOrderAuth')->name('make_order_auth_admin');
    Route::post('/order/make/reserve/submit', 'userSystemAdminController@makeOrderReserve')->name('make_order_reserve_admin');

    Route::get('/notifications', 'notificationsController@showAdmin')->name('notifications_admin');
    Route::post('/notifications/makeProfile/submit', 'notificationsController@makeProfile')->name('notifications_admin_make_profile');
    Route::post('/notifications/makeIndividual/submit', 'notificationsController@makeIndividual')->name('notifications_admin_make_individual');
    Route::post('/notifications/makeMailing/submit', 'notificationsController@makeMailing')->name('notifications_admin_make_mailing');
    Route::post('/notifications/makeBonus/submit', 'notificationsController@makeBonus')->name('notifications_admin_make_bonus');

    Route::post('/make/client/submit', 'userSystemAdminController@makeUser')->name('make_client');
    Route::get('/logs', 'userSystemAdminController@showLogs')->name('logs.index');
    Route::get('/analytics', 'userSystemAdminController@showAnalytics')->name('analytics.index');
    Route::get('/clients', 'userSystemAdminController@showClients')->name('clients.index');

    Route::resource('planer', PlanerController::class);
});

Route::post('/add-to-cart-post-methos-url-db', 'CartController@store')->name('cart.store');
Route::get('/all/cart/destroy/function-delete/{id}', 'CartController@destroy')->name('cart_this.delete');
Route::get('/all/cart/destroy/function-delete-all', 'CartController@allDestroy')->name('cart_all.delete');

// Search
Route::get('/autocomplete-search', 'searchController@autocompleteSearch')->name('autocomplete-search');
Route::post('/search/result', 'searchController@resultSearch')->name('search_result');

Route::get('/logout', function() {
    Auth::logout();
    return redirect()->route('welcome');
})->name('logout');


Route::group(['prefix' => 'home', 'middleware' => 'auth'], function () {
    Route::get('/', 'userSystemController@viewHome')->name('home');
    Route::post('/rating/submit', 'userSystemController@rating')->name('rating_user');
    Route::post('/question/submit', 'userSystemController@question')->name('question_user');

    // Edit profile
    Route::post('/update/name/submit', 'userSystemController@editName')->name('user.update.name');
    Route::post('/update/phone/submit', 'userSystemController@editPhone')->name('user.update.phone');
});

// Telegram Bot
Route::post('/webhook/telegram', function () {
    $telegram = new Api();
    $update = $telegram->getWebhookUpdate();

    // Здесь обрабатываем обновления (например, отправка сообщения)
    $chat_id = $update->getMessage()->getChat()->getId();
    $telegram->sendMessage([
        'chat_id' => $chat_id,
        'text' => 'Привет, мир!',
    ]);

    return 'OK';
});
