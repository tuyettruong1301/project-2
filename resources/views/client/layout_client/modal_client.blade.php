<div class="modal" id="DangKyKhach">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="btn btn-danger modal-dangky" data-dismiss="modal">X</button>
            <div class="modal-header">  
                <div align="center">Đăng ký khách du lịch</div>
            </div>

            <div class="modal-body">
                @if(Session::has('thanhcongkhach'))
                    <div class="alert alert-success text-center thanhcongkhach">{{Session::get('thanhcongkhach')}}</div>
                @endif
                @if((count($errors) > 0) && (Session::has('loiDangKyKhach')))
                    <div class="loiDangKyKhach"></div>
                @endif

                <form action="{{route('dang-ky-khach')}}" method="POST" class="form-dangky">
                    <fieldset>
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <label>Họ tên</label> 
                        <span>{{$errors->first('hoten')}}</span>
                        <input class="form-control" name="hoten" type="text" value="{{ old('hoten') }}"><br>

                        <label>Email</label> <span id="msgbox"></span>
                        <span>{{$errors->first('email')}}</span>           
                        <input class="form-control" name="email" type="email" value="{{ old('email') }}" id="email"><br>

                        <label>Mật khẩu</label>
                        <span>{{$errors->first('password')}}</span>   
                        <input class="form-control" name="password" type="password"><br>

                        <label>Nhập lại mật khẩu</label>
                        <span>{{$errors->first('passwordAgain')}}</span>   
                        <input class="form-control" name="passwordAgain" type="password"><br>

                        <label>Số điện thoại</label>
                        <span>{{$errors->first('sodienthoai')}}</span>
                        @if(Session::has('loiSodienthoai'))
                            <span class="loiSodienthoai">{{Session::get('loiSodienthoai')}}</span>
                        @endif  
                        <input type="text" name="sodienthoai" class="form-control" value="{{ old('sodienthoai') }}"><br>

                        <div align="center"><button type="submit" class="btn btn-lg btn-success btn-block" id="btnKhach" >Đăng ký</button></div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="DangKyHDV">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="btn btn-danger modal-dangky" data-dismiss="modal">X</button>
            <div class="modal-header">  
                <div align="center">Đăng ký Hướng dẫn viên</div>
            </div>
            <div class="modal-body">
                @if(Session::has('thanhconghdv'))
                    <div class="alert alert-success text-center thanhconghdv">{{Session::get('thanhconghdv')}}</div>
                @endif
                 @if((count($errors) > 0) && (Session::has('loiDangKyHDV')))
                    <div class="loiDangKyHDV"></div>
                @endif

                <form action="{{route('dang-ky-hdv')}}" method="POST" class="form-dangky">
                    <fieldset>
                        <input type="hidden" name="_token" value="{{csrf_token()}}">

                        <label>Họ tên</label> 
                        <span>{{$errors->first('hoten')}}</span>
                        <input class="form-control" name="hoten" type="text" value="{{ old('hoten') }}"><br>

                        <label>Email</label> <span id="msgbox1"></span>
                        <span>{{$errors->first('email')}}</span>
                        <input class="form-control" name="email" type="email" value="{{ old('email') }}" id="email1"><br>

                        <label>Mật khẩu</label>
                        <span>{{$errors->first('password')}}</span>
                        <input class="form-control" name="password" type="password"><br>

                        <label>Nhập lại mật khẩu</label>
                        <span>{{$errors->first('passwordAgain')}}</span>
                        <input class="form-control" name="passwordAgain" type="password"><br>

                        <label>Số điện thoại</label>
                        <span>{{$errors->first('sodienthoai')}}</span>
                        @if(Session::has('loiSodienthoaiHDV'))
                            <span class="loiSodienthoaiHDV">{{Session::get('loiSodienthoaiHDV')}}</span>
                        @endif  
                        <input type="text" name="sodienthoai" class="form-control" value="{{ old('sodienthoai') }}"><br>

                        <label>Địa chỉ</label>
                        <span>{{$errors->first('diachi')}}</span>
                        <input type="text" name="diachi" class="form-control" value="{{ old('diachi') }}"><br>

                        <div align="center"><button type="submit" class="btn btn-lg btn-success btn-block" id="btnHDV">Đăng ký</button></div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="DangNhap">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="btn btn-danger modal-dangnhap" data-dismiss="modal">X</button>
            <div class="modal-header">  
                <div align="center">Đăng nhập</div>
            </div>
            <div class="modal-body">
                @if(Session::has('loiLogin'))
                    <div class="alert alert-danger text-center loiLogin">{{Session::get('loiLogin')}}</div>
                @endif
                @if((count($errors) > 0) && (Session::has('loiDangNhap')))
                    <div class="loiDangNhap"></div>
                @endif
                <form action="{{route('dang-nhap')}}" method="POST" class="form-dangnhap">
                    <fieldset">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">

                        <label>Email</label>
                        <span>{{$errors->first('email')}}</span>
                        <input class="form-control" name="email" type="email" value="{{ old('email') }}"><br>

                        <label>Mật khẩu</label>
                        <span>{{$errors->first('password')}}</span>
                        <input class="form-control" name="password" type="password"><br>

                        <div align="center">
                            <input type="checkbox" name="ghinho" id="chkGhinho"> <label id="ghinho">Ghi nhớ đăng nhập</label>
                            <button type="submit" class="btn btn-lg btn-success btn-block btnDangNhap">Đăng nhập</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>

@if(Auth::check())
    @if(isset($cttour))
    <div class="modal" id="DatTour">
        <div class="modal-dialog">
            <div class="modal-content">
                <button type="button" class="btn btn-danger modal-dattour" data-dismiss="modal">X</button>
                <div class="modal-header">  
                    <div align="center">Đặt Tour</div>
                </div>
                @if(Session::has('successDatTour'))
                    <div class="alert alert-success text-center successDatTour">{{Session::get('successDatTour')}}</div>
                @endif
                @if((count($errors) > 0 && Session::has('errorDatTour')) || Session::has('loiKhachMax') || Session::has('loiThoiGian') )
                    <div class="loiDatTour"></div>
                @endif

                <div class="modal-body">
                    <form action="{{route('dattour',$cttour->id)}}" method="POST" class="form-dattour">
                        <fieldset>
                            <input type="hidden" name="_token" value="{{csrf_token()}}">

                            <label>Tên tour</label>
                            <input type="text" class="form-control" readonly="" name="tentour" value="{{$cttour->tentour}}"><br>

                            <label>Địa điểm</label>
                            <input type="text" class="form-control" readonly="" name="tendiadiem" value="{{$cttour->diadiem->tendiadiem}}"><br>
                                
                            <label>Giá tiền</label>
                            <input type="text" class="form-control" readonly="" name="giatour" value="{{$cttour->giatour}}"><br>

                            <label>Thời gian bắt đầu</label>
                            <span>
                                {{$errors->first('thoigianbatdau')}}
                                @if(session('loiThoiGian'))
                                    {{Session::get('loiThoiGian')}}
                                @endif
                            </span>
                            <input type="date" class="form-control" name="thoigianbatdau" value="{{old('thoigianbatdau')}}"><br>
                                
                            <label>Số lượng khách đăng ký</label>
                            <span>
                                {{$errors->first('sokhachdangky')}}
                                @if(session('loiKhachMax'))
                                    {{Session::get('loiKhachMax')}}
                                @endif
                            </span>         
                            <input type="text" class="form-control" name="sokhachdangky"  value="{{old('sokhachdangky')}}"><br>

                            <div align="center"><button type="submit" class="btn btn-lg btn-success btn-block" id="btnDatTour">Đặt tour</button></div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif
@endif