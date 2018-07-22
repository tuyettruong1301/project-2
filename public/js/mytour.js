$(document).ready(function() {
    if($('span').hasClass('loiSodienthoai') || $('div').hasClass('loiDangKyKhach') || $('div').hasClass('thanhcongkhach')){
        $('#DangKyKhach').modal();
    }
    if($('span').hasClass('loiSodienthoaiHDV') || $('div').hasClass('loiDangKyHDV') || $('div').hasClass('thanhconghdv')){
        $('#DangKyHDV').modal();
    }
    if($('div').hasClass('loiLogin') || $('div').hasClass('loiDangNhap')){
        $('#DangNhap').modal();
    }
    if($('div').hasClass('loiDatTour')){
        $('#DatTour').modal();
    }
    if($('div').hasClass('successDatTour')){
        $('#DatTour').modal();
        $('#btnDatTour').attr('disabled','');
    }
}); 