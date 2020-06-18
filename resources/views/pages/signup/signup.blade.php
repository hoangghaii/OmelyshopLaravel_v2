@extends('layout')

@section('content')
<section class="cont">
    <div class="form sign-in">
        <h2>Đăng nhập</h2>

        <form action="{{url('/login-customer')}}" method="POST" autocomplete="off">

            @csrf

            <label>
                <span>Họ và tên</span>
                <input type="text" name="customer_name" required autocomplete="off"/>
            </label>
            <label>
                <span>Mật khẩu</span>
                <input type="password" name="customer_password" required autocomplete="off"/>
            </label>
            <p class="forgot-pass">Quên mật khẩu?</p>
            <button type="submit" class="submit">Đăng nhập</button>
            <button type="button" class="fb-btn">Kết nối với <span>facebook</span></button>

        </form>
    </div>
    <div class="sub-cont">
        <div class="img">
            <div class="img__text m--up">
                <h2>Bạn là người mới?</h2>
                <p>Đăng ký và khám phá những điều kỳ diệu của bánh kẹo!</p>
            </div>
            <div class="img__text m--in">
                <h2>Đã có tài khoản?</h2>
                <p>Nếu bạn đã có tài khoản, hãy đăng nhập. Chúng tôi rất nhớ bạn!</p>
            </div>
            <div class="img__btn">
                <span class="m--up">Đăng ký</span>
                <span class="m--in">Đăng nhập</span>
            </div>
        </div>
        <div class="form sign-up">
            <h2>Đăng ký</h2>
            <form action="{{url('/add-customer')}}" method="post">

                @csrf

                <label>
                    <span>Họ và tên*</span>
                    <input type="text" name="username" required autocomplete="off"
                    data-validation="required" data-validation="length" data-validation-length="5-200" data-validation-error-msg="Bạn chưa nhập đúng họ và tên">
                </label>

                <label>
                    <span>Mật khẩu*</span>
                    <input type="password" name="password" required autocomplete="off"
                    data-validation="required" data-validation="length" data-validation-length="5-200" data-validation-error-msg="Mật khẩu của bạn cần chứa ít nhất 5 ký tự">
                </label>

                <label>
                    <span>Số điện thoại*</span>
                    <input type="text" name="phone" required autocomplete="off"
                    data-validation="required" data-validation="number" data-validation-allowing="range[0;10]" data-validation-error-msg="Bạn nên nhập đúng định dạng só điện thoại">
                </label>

                <label>
                    <span>Email*</span>
                    <input type="email" name="email" pattern=".+@gmail.com" required autocomplete="off"
                    data-validation="required" data-validation-error-msg="Bạn nên nhập đúng định dạng xxx@gmail.com">
                </label>

                <div class="selected">

                    <select class="js-select js-choose" id="province" name="province" required>
                        <option value="" disabled selected
                        data-validation="required" data-validation-error-msg="Bạn cần chọn tỉnh, thành phố"></option>

                        @foreach ($province as $province)
                        <option value="{{$province->matp}}">{{$province->name}}</option>
                        @endforeach

                    </select>
                </div>

                <div class="selected">
                    <select class="js-select js-choose" id="district" name="district" required>
                        <option value="" disabled selected
                        data-validation="required" data-validation-error-msg="Bạn cần chọn quận,huyện"></option>
                    </select>
                </div>

                <div class="selected">
                    <select class="js-select" id="ward" name="ward" required>
                        <option value="" disabled selected
                        data-validation="required" data-validation-error-msg="Bạn cần chọn xã, phường"></option>
                    </select>
                </div>

                <label>
                    <span>Địa chỉ*</span>
                    <input type="text" name="address" required autocomplete="off"
                    data-validation="required" data-validation="length" data-validation-error-msg="Bạn chưa nhập địa chỉ">
                </label>

                <button type="submit" class="submit">Đăng ký</button>
                <button type="button" class="fb-btn">Kết nối với <span>facebook</span></button>
            </form>
        </div>
    </div>
</section>
@endsection
