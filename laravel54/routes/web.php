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

Route::get('/', function () {
    return view('welcome');
});



// Route::get('/homelogin', 'home\IndexController@');


Route::any('/loginone', 'admin\LoginController@homeindex_one');
Route::any('/change_one', 'home\AdminController@admin_change_pwd');
Route::any('/user_one_show', 'admin\LoginController@user_show_a');
Route::any('/login_insert_one', 'admin\LoginController@login_insert');
Route::any('/updates_one', 'home\AdminController@updates');
Route::any('/admin_del', 'home\AdminController@admin_delect');
Route::any('/user_one', 'home\AdminController@user_insert_one');
Route::any('/home_change_password', 'home\AdminController@admin_change_password');
Route::any('/home_insert_admin', 'home\AdminController@admin_insert_user');
Route::any('/home_show_admin', 'home\AdminController@admin_show_user');
Route::any('/insert_user_one', 'home\AdminController@insert_user');
Route::any('/show_user_one', 'home\AdminController@user_show_one');
Route::any('/update_user_one', 'home\AdminController@user_update_one');
Route::any('/adminorder', 'admin\OrderController@order');
Route::any('/user_insert', 'admin\LoginController@insert_user');
Route::any('/login_user', 'admin\LoginController@login_one');
Route::get('/hometop', 'home\IndexController@top');
Route::get('/homebottom', 'home\IndexController@bottom');
Route::get('/homemain', 'home\IndexController@main_info');
Route::get('/adminindex', 'admin\IndexController@index');
Route::get('/homeleft', 'home\IndexController@left');
Route::post('/add_user', 'admin\LoginController@add_user');
Route::get('/validation', 'admin\LoginController@validation');
Route::post('/page', 'PostController@store');
Route::get('reg', 'RegController@index');
Route::get('/login', 'admin\LoginController@login');
Route::get('/homeindex', 'home\IndexController@index');
Route::get('/homeone', 'home\IndexController@one');
Route::any('/user_xiangqing', 'admin\LoginController@user_a_show');
Route::get('/adminuser', 'admin\UserController@user');
Route::get('/finishinfo', 'admin\UserController@finishinfo');
Route::post('/adduserinfo', 'admin\UserController@adduserinfo');
Route::any('/updateuser', 'admin\UserController@updateuser');
Route::any('/updateuser_do', 'admin\UserController@updateuser_do');
Route::any('/orderbook', 'admin\OrderController@orderbook');
Route::any('/allocation', 'admin\OrderController@allocation');
Route::any('/delorder', 'admin\UserController@delorder');
Route::get('/book', 'home\BookController@book_type');  //图书管理页面
Route::get('type_add', 'home\BookController@type_add');
Route::get('see', 'home\BookController@book_see');		//图书分类展示页
Route::get('/del', 'home\BookController@del');
Route::get('/update', 'home\BookController@update');
Route::get('/book_modify', 'home\BookController@book_modify');	//修改数据
Route::get('/del2', 'home\BookController@del2');
Route::get('/add_book', 'home\BookController@add_book');	//添加图书
Route::post('/books', 'home\BookController@books');	  //文件上传
Route::get('/books_show', 'home\BookController@books_show');   //分页搜索
Route::get('/books_del', 'home\BookController@books_del');
Route::get('/books_update', 'home\BookController@books_update');	//跳转修改页面
Route::get('/books_books', 'home\BookController@books_books');
Route::get('/del3', 'home\BookController@del3');

Route::get('/borrowing/examine','home\borrowingController@examine');//借阅审核
Route::get('/borrowing/examine_show','home\borrowingController@examine_show');
Route::get('/borrowing/borrowed','home\borrowingController@borrowed');//已借阅书籍
Route::get('/borrowing/borrowed_show','home\borrowingController@borrowed_show');
Route::get('/borrowing/revert','home\borrowingController@revert');//书籍归还
Route::get('/borrowing/revert_show','home\borrowingController@revert_show');
Route::get('/borrowing/e_b','home\borrowingController@e_b');
Route::get('/borrowing/b_r','home\borrowingController@b_r');
Route::get('/borrowing/r_p','home\borrowingController@r_p');
Route::get('/borrowing/r_n','home\borrowingController@r_n');
Route::get('/borrowing/borrow','home\borrowingController@borrow');//前台提交借阅审核








