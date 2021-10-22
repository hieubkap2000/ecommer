<div class="newsletters mb_50">
    <div class="row">
        <div class="col-sm-6">
            <div class="news-head pull-left">
                <h2>ĐĂNG KÝ ĐỂ NHẬN TIN MỚI NHẤT</h2>
                <div class="new-desc">Hãy là người đầu tiên biết về hàng mới của chúng tôi và nhiều hơn thế
                    nữa!
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="news-form pull-right">
                @if (\Session::has('success'))
                    <div class="alert alert-success">
                        <ul>
                            <li>{!! \Session::get('success') !!}</li>
                        </ul>
                    </div>
                @elseif (\Session::has('danger'))
                    <div class="alert alert-danger">
                        <ul>
                            <li>{!! \Session::get('danger') !!}</li>
                        </ul>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form onsubmit="return validatemail();" action="{{ route('newsletter.store') }}" method="post">
                    @csrf
                    <div class="form-group required">
                        <input name="email" id="email" placeholder="Nhập email của bạn..." class="form-control input-lg"
                            required="" type="email">
                        <button type="submit" class="btn btn-default btn-lg">ĐĂNG KÍ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
