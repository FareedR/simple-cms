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

Route::get('/','HomeController@home')->name('home');
Route::get('/portfolio-detail/{id}','HomeController@portfolioDetail')->name('portfolio-detail');

Route::get('/login-form','Auth\LoginController@loginForm')->name('login-form');
Route::post('/login','Auth\LoginController@login')->name('login');
Route::post('/logout','Auth\LoginController@logout')->name('logout');

Route::prefix('admin')->middleware('role:admin')->group(function(){
    Route::get('/','Admin\HomeController@home')->name('view-home-admin');

    Route::get('/list-banner','Admin\BannerController@listBanner')->name('list-banner');
    Route::get('/create-banner','Admin\BannerController@createBanner')->name('create-banner');
    Route::post('/store-banner','Admin\BannerController@storeBanner')->name('store-banner');
    Route::get('/edit-banner/{id}','Admin\BannerController@editBanner')->name('edit-banner');
    Route::patch('/update-banner/{id}','Admin\BannerController@updateBanner')->name('update-banner');
    Route::delete('/delete-banner/{id}','Admin\BannerController@deleteBanner')->name('delete-banner');

    Route::get('/list-wysiwyg','Admin\WysiwygController@listWYSIWYG')->name('list-wysiwyg');
    Route::patch('/update-wysiwyg-about','Admin\WysiwygController@updateAboutWYSIWYG')->name('update-wysiwyg-about');
    Route::patch('/update-wysiwyg-skill','Admin\WysiwygController@updateSkillWYSIWYG')->name('update-wysiwyg-skill');

    Route::get('/list-skill','Admin\SkillController@listSkill')->name('list-skill');
    Route::get('/create-skill','Admin\SkillController@createSkill')->name('create-skill');
    Route::post('store-skill','Admin\SkillController@storeSkill')->name('store-skill');
    Route::get('/edit-skill/{id}','Admin\SkillController@editSkill')->name('edit-skill');
    Route::patch('/update-skill/{id}','Admin\SkillController@updateSkill')->name('update-skill');
    Route::delete('/delete-skill/{id}','Admin\SkillController@deleteSkill')->name('delete-skill');

    Route::get('/list-service','Admin\ServiceController@listService')->name('list-service');
    Route::get('/create-service','Admin\ServiceController@createService')->name('create-service');
    Route::post('store-service','Admin\ServiceController@storeService')->name('store-service');
    Route::get('/edit-service/{id}','Admin\ServiceController@editService')->name('edit-service');
    Route::patch('/update-service/{id}','Admin\ServiceController@updateService')->name('update-service');
    Route::delete('/delete-service/{id}','Admin\ServiceController@deleteService')->name('delete-service');

    Route::get('/list-portfolio','Admin\PortfolioController@listPortfolio')->name('list-portfolio');
    Route::get('/create-portfolio','Admin\PortfolioController@createPortfolio')->name('create-portfolio');
    Route::post('/store-portfolio','Admin\PortfolioController@storePortfolio')->name('store-portfolio');
    Route::get('/edit-portfolio/{id}','Admin\PortfolioController@editPortfolio')->name('edit-portfolio');
    Route::patch('/update-portfolio/{id}','Admin\PortfolioController@updatePortfolio')->name('update-portfolio');
    Route::delete('/delete-portfolio/{id}','Admin\PortfolioController@deletePortfolio')->name('delete-portfolio');
    
    Route::get('/list-team','Admin\TeamController@listTeam')->name('list-team');
    Route::get('/create-team','Admin\TeamController@createTeam')->name('create-team');
    Route::post('/store-team','Admin\TeamController@storeTeam')->name('store-team');
    Route::get('/edit-team/{id}','Admin\TeamController@editTeam')->name('edit-team');
    Route::patch('/update-team/{id}','Admin\TeamController@updateTeam')->name('update-team');
    Route::delete('/delete-team/{id}','Admin\TeamController@deleteTeam')->name('delete-team');

    Route::get('/contact-us','Admin\ContactController@showContactUs')->name('show-contact-us');
    Route::patch('/update-contact-us','Admin\ContactController@updateContactUs')->name('update-contact-us');
    
});
