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

Route::get('/', ['as' => 'trang-chu','uses' => 'PageController@getTrangChu']);

Route::post('dang-ky-khach',['as'=>'dang-ky-khach', 'uses'=> 'PageController@postDangKyKhach']);
Route::post('dang-ky-hdv',['as'=>'dang-ky-hdv', 'uses'=> 'PageController@postDangKyHDV']);
Route::post('dang-nhap',['as'=>'dang-nhap', 'uses'=> 'PageController@postDangNhap']);
Route::get('dang-xuat',['as'=>'dang-xuat', 'uses'=> 'PageController@getDangXuat']);

Route::get('tour-dia-diem/{iddd}',['as'=>'tour-dia-diem', 'uses'=>'PageController@getTourDiaDiem']);
Route::get('chi-tiet/{id}', ['as' => 'chi-tiet', 'uses' => 'TourController@show']);

Route::post('dat-tour-{idtour}',['as' => 'dattour', 'uses' => 'PageController@postDatTour']);
Route::get('lich-su-dat-tour',['as'=>'lich-su','uses'=>'PageController@getLichSu']);

Route::get('tour-cua-hdv-{idhdv}',['as' => 'tour_hdv', 'uses' => 'PageController@getTourCuaHdv']);

Route::post('danh-gia-{idtour}',['as'=>'danh-gia','uses' => 'PageController@DanhGia']);

//xu ly ajax
Route::post('binhluan','AjaxController@postBinhLuan');

//--------------------HDV------------------
Route::group(['prefix'=>'hdv','middleware'=>'CheckHDV'], function(){
    Route::get('trang-chu',['as' => 'trang-chu-hdv', 'uses'=>'HdvController@trangchu']);
    Route::resource('tour','TourController');
    Route::post('anhienTour/{id}',['as'=>'anhienTour','uses'=>'TourController@anhienTour']);

    Route::get('dsdontour',['as'=>'dsdontour', 'uses'=>'HdvController@getDSdontour']);
    Route::get('dsdontourmoi',['as'=>'dsdontourmoi', 'uses'=>'HdvController@getDSdontourmoi']);
    Route::get('dsdontourchapnhan',['as'=>'dsdontourchapnhan', 'uses'=>'HdvController@getDSdontourchapnhan']);
    Route::get('dsdontourthanhtoan',['as'=>'dsdontourthanhtoan', 'uses'=>'HdvController@getDSdontourthanhtoan']);
    Route::get('edit-bill/{id}/{page}','HdvController@getEditBill');

    Route::post('cndontour/{idd}',['as'=>'chapnhan', 'uses'=>'HdvController@postChapnhandon']);
    Route::post('tcdontour/{idd}',['as'=>'tuchoi', 'uses'=>'HdvController@postTuchoidon']);
    Route::post('xacnhan/{idd}',['as'=>'xacnhanditour', 'uses'=>'HdvController@postXacnhanditour']);
    Route::post('xacnhantt/{idd}',['as'=>'xacnhantt', 'uses'=>'HdvController@postXacnhantt']);
    Route::post('xoatour/{id}',['as'=>'xoatour','uses'=>'HdvController@postXoaTour']);
    Route::post('edit-bill/{id}/{page}',['as'=>'edit-bill','uses'=>'HdvController@postEditBill']);

});
