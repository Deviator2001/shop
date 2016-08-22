<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/
//Поиск товара на сайте
Route::get('search', ['as' => 'product.search', 'uses' => 'ProductController@search']);

//Route::post('/', 'IndexController@search');

Route::get('/post/index', ['as' => 'post.index', 'uses' => 'PostController@index']);
Route::get('/', ['as' => 'index.index', 'uses' => 'IndexController@index']);
Route::get('/contacts', ['as' => 'index.contacts', 'uses' => 'IndexController@contacts']);
Route::get('/trainers', ['as' => 'index.trainers', 'uses' => 'IndexController@trainers']);
Route::get('/gallery/index', ['as' => 'gallery.index', 'uses' => 'GalleryController@index']);
Route::get('/schedule', ['as' => 'schedule.index', 'uses' => 'ScheduleController@index']);

// Вызов страницы авторизации
Route::get('login', 'AuthController@login');
// Пользователь заполнил форму авторизации и отправил
Route::post('login', 'AuthController@loginProcess');
// Вызов страницы регистрации пользователя
Route::get('register', 'AuthController@register');
// Пользователь заполнил форму регистрации и отправил
Route::post('register', 'AuthController@registerProcess');
// Пользователь получил письмо для активации аккаунта со ссылкой сюда
Route::get('activate/{id}/{code}', 'AuthController@activate');

// Пользователь забыл пароль и запросил сброс пароля. Это начало процесса -
// Страница с запросом E-Mail пользователя
Route::get('reset', 'AuthController@resetOrder');
// Пользователь заполнил и отправил форму с E-Mail в запросе на сброс пароля
Route::post('reset', 'AuthController@resetOrderProcess');
// Пользователю пришло письмо со ссылкой на эту страницу для ввода нового пароля
Route::get('reset/{id}/{code}', 'AuthController@resetComplete');
// Пользователь ввел новый пароль и отправил.
Route::post('reset/{id}/{code}', 'AuthController@resetCompleteProcess');
// Сервисная страничка, показываем после заполнения рег формы, формы сброса и т.
// о том, что письмо отправлено и надо заглянуть в почтовый ящик.
Route::get('wait', 'AuthController@wait');






Route::group(['middleware' => ['web']], function () {

// Выход пользователя из системы
Route::get('logout', 'AuthController@logoutuser');




//Вывод страницы категории

    Route::get('category/{id?}', ['as' => 'category.show', 'uses'=>'CategoryController@show']);
//Вывод страницы продукта
    Route::get('product/{productid}', ['as' => 'product.show', 'uses'=>'ProductController@show']);
//Добавление товара в корзину
    Route::get('addtocart', ['as' => 'product.add', 'uses' => 'ProductController@addtocart']);
//Содержимое корзины
    Route::get('cart', ['as' => 'product.cart', 'uses' => 'ProductController@showcart']);
//Удаление товара из корзины
    Route::get('removeitem/{id}', ['as' => 'product.remove', 'uses' => 'ProductController@remove']);

//Оформление заказа
    Route::get('order', ['as' => 'order.form', 'uses' => 'OrderController@show']);






    Route::get('attaches/{date}/{filename}', function ($date,$filename)
    {
        return Storage::get('attaches/'.$date.'/'.$filename);
    });

    Route::get('post/create', ['as' => 'post.create', 'uses' => 'PostController@create']);//вызов формы добавления записи
    Route::post('post', ['as' => 'post.store', 'uses' => 'PostController@store']);//получение данных из формы и запись в базу

    Route::DELETE('post/{post}', ['as' => 'post.destroy', 'uses' => 'PostController@destroy']);
    Route::get('post/{post}', ['as' => 'post.show', 'uses' => 'PostController@show']);
    Route::get('post/{post}/edit', ['as' => 'post.edit', 'uses' => 'PostController@edit']);
    Route::post('post/{post}', ['as' => 'post.update', 'uses' => 'PostController@update']);


    Route::get('/fileentry/{post}', ['as' => 'fileentry', 'uses' => 'FileEntryController@index']);
    Route::get('/fileentry/get/{filename}', ['as' => 'getentry', 'uses' => 'FileEntryController@get']);
    Route::post('/fileentry/add/{post}',['as' => 'addentry', 'uses' => 'FileEntryController@add']);
    Route::get('/fileentry/del/{post}',['as' => 'delentry', 'uses' => 'FileEntryController@del']);

    Route::get('galery/create', ['as' => 'galery.create', 'uses' => 'GaleryController@create']);//вызов формы добавления записи
    Route::post('galery', ['as' => 'galery.store', 'uses' => 'GaleryController@store']);//получение данных из формы и запись в базу
    Route::DELETE('galery/{galery}', ['as' => 'galery.destroy', 'uses' => 'GaleryController@destroy']);
    Route::get('galery/{galery}', ['as' => 'galery.show', 'uses' => 'GaleryController@show']);
    Route::get('galery/{galery}/edit', ['as' => 'galery.edit', 'uses' => 'GaleryController@edit']);
    Route::post('galery/{galery}', ['as' => 'galery.update', 'uses' => 'GaleryController@update']);



});
