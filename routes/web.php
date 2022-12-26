<?php

use Illuminate\Support\Facades\Route;

$locale = Request::segment(1);
$locale=(!empty($locale))?$locale:session()->get('locale');

if(in_array($locale, ['en'])){
    app()->setLocale($locale);
}else{
    app()->setLocale('ro');
    $locale = '';
}
Route::group(['prefix' => $locale], function(){ 
    // Auth Routes
    require __DIR__.'/auth.php'; 
    Route::group(['middleware' => ['auth']], function () {
        
    });
   
    Route::group(['namespace' => 'App\Http\Controllers\Backend', 'prefix' => 'admin', 'as' => 'backend.', 'middleware' => ['auth', 'can:view_backend']], function () {  
           
    });
});
