<?php

   
//     Route::group(['prefix'  =>  'admin'], function () {

//     Route::get('login', 'Admin\LoginController@showLoginForm')->name('admin.login');
//     Route::post('login', 'Admin\LoginController@login')->name('admin.login.post');
//     Route::get('logout', 'Admin\LoginController@logout')->name('admin.logout');

//     Route::group(['middleware' => ['auth:admin']], function () {

//         Route::get('/', function () {
//             return view('admin.dashboard.index');
//         })->name('admin.dashboard');

//     })

// });

    Route::prefix('admin')->group(function(){

        Route::get('login','Admin\LoginController@showLoginForm')->name('admin.login');
        Route::post('login','Admin\LoginController@login')->name('admin.login.post');
        Route::get('logout','Admin\LoginController@logout')->name('admin.logout');

        /**
         * protecting dashboard route, so only authenticated admin 
         * can load the dashboard view
         */
        Route::middleware(['auth:admin'])->group(function () {

            Route::get('/',function () {

                return view('admin.dashboard.index');
            })->name('admin.dashboard');
        
        Route::get('/settings','Admin\SettingController@index')->name('admin.settings');
        Route::post('/settings','Admin\SettingController@update')->name('admin.settings.update');
        

        });

    });

    // Route::group(['prefix'  =>  'admin'], function () {

    // Route::get('login', 'Admin\LoginController@showLoginForm')->name('admin.login');
    // Route::post('login', 'Admin\LoginController@login')->name('admin.login.post');
    // Route::get('logout', 'Admin\LoginController@logout')->name('admin.logout');

    // Route::group(['middleware' => ['auth:admin']], function () {

    //     Route::get('/', function () {
    //         return view('admin.dashboard.index');
    //     })->name('admin.dashboard');
    // });

    // });
    