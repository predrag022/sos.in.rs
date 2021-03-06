<?php

//Route::redirect('/', '/login');

Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});


Route::get('/', 'Frontend\HomeController@index')->name('frontend.home');
Route::get('/kontakt', 'Frontend\SiteController@kontakt')->name('frontend.kontakt');
Route::get('/uputstvo', 'Frontend\SiteController@uputstvo')->name('frontend.uputstvo');
Route::get('/najscesce-postavljana-pitanja', 'Frontend\SiteController@faq')->name('frontend.faq');


Auth::routes();
Route::get('userVerification/{token}', 'UserVerificationController@approve')->name('userVerification');
// Admin

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('token/{token}', 'HomeController@token')->name('token');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Operateri
    Route::delete('operateri/destroy', 'OperateriController@massDestroy')->name('operateri.massDestroy');
    Route::resource('operateri', 'OperateriController');

    // Volonteri
    Route::delete('volonteri/destroy', 'VolonteriController@massDestroy')->name('volonteri.massDestroy');
    Route::resource('volonteri', 'VolonteriController');

    // VolonteriOperater
    Route::delete('volonterioperater/destroy', 'VolonteriOperaterController@massDestroy')->name('volonterioperater.massDestroy');
    Route::resource('volonterioperater', 'VolonteriOperaterController');

    // Contact Companies
    Route::delete('contact-companies/destroy', 'ContactCompanyController@massDestroy')->name('contact-companies.massDestroy');
    Route::resource('contact-companies', 'ContactCompanyController');

    // Contact Contacts
    Route::delete('contact-contacts/destroy', 'ContactContactsController@massDestroy')->name('contact-contacts.massDestroy');
    Route::resource('contact-contacts', 'ContactContactsController');

    // Faq Categories
    Route::delete('faq-categories/destroy', 'FaqCategoryController@massDestroy')->name('faq-categories.massDestroy');
    Route::resource('faq-categories', 'FaqCategoryController');

    // Faq Questions
    Route::delete('faq-questions/destroy', 'FaqQuestionController@massDestroy')->name('faq-questions.massDestroy');
    Route::resource('faq-questions', 'FaqQuestionController');

    // Blocks
    Route::delete('blocks/destroy', 'BlockController@massDestroy')->name('blocks.massDestroy');
    Route::post('blocks/media', 'BlockController@storeMedia')->name('blocks.storeMedia');
    Route::post('blocks/ckmedia', 'BlockController@storeCKEditorImages')->name('blocks.storeCKEditorImages');
    Route::resource('blocks', 'BlockController');

    // Dostaves
    Route::delete('dostaves/destroy', 'DostaveController@massDestroy')->name('dostaves.massDestroy');

    Route::resource('dostaves', 'DostaveController');

    Route::get('dostaves/accept/{dostafe}', 'DostaveController@accept')->name('dostaves.accept');
    Route::get('dostaves/delivered/{dostafe}', 'DostaveController@delivered')->name('dostaves.delivered');

});
