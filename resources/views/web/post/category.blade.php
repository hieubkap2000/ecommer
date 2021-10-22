@extends('web.layout')
@section('title', $category->category_name)
@section('content')
    <div class="container">
        <div class="row ">
            <!-- =====  BANNER STRAT  ===== -->
            <div class="col-sm-12">
                <div class="breadcrumb ptb_20">
                    <h1>{{ $category->category_name }}</h1>
                    <ul>
                        <li><a href="{{ route('home') }}">Trang chủ</a></li>
                        <li class="active">{{ $category->category_name }}</li>
                    </ul>
                </div>
            </div>
            <!-- =====  BREADCRUMB END===== -->
            <div id="column-left" class="col-sm-4 col-lg-3 hidden-xs">

                <div class="blog-category left-sidebar-widget mb_50">
                    <div class="heading-part mb_20 ">
                        <h2 class="main_title">Danh mục bài viết</h2>
                    </div>
                    <ul>
                        @foreach ($limitCategory as $item)
                            <li>
                                <a href="{{ route('web.postCategory', ['slug' => $item->slug, 'id' => $item->id]) }}">
                                    {{ $item->category_name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="left_banner left-sidebar-widget mt_30 mb_40">
                    <a href="#">
                        <img src="{{ url('web/images/left1.jpg') }}" alt="Left Banner" class="img-responsive">
                    </a>
                </div>

                <div class="left-blog left-sidebar-widget mb_50">
                    <div class="heading-part mb_20 ">
                        <h2 class="main_title">Bài viết mới nhất</h2>
                    </div>
                    <div id="left-blog">
                        <div class="row ">
                            @foreach ($newPosts as $item)
                                <div class="blog-item mb_20">
                                    <div class="post-format col-xs-4">
                                        <div class="thumb post-img newpost"><a
                                                href="{{ route('web.post.details', ['slug' => $item->slug, 'id' => $item->id]) }}">
                                                <img src="{{ $item->thumbnail }}" alt="OYEENok"></a></div>
                                    </div>
                                    <div class="post-info col-xs-8 ">
                                        <h5> <a
                                                href="{{ route('web.post.details', ['slug' => $item->slug, 'id' => $item->id]) }}">{{ $item->title }}</a>
                                        </h5>
                                        <div class="date pull-left"> <i class="fa fa-calendar" aria-hidden="true">
                                            </i>{{ $item->date_of_publication }}</div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-8 col-lg-9 mtb_20">
                <div class="row">
                    {{-- <div class="three-col-blog text-left"> --}}
                    @foreach ($postOfCategory as $item)
                        <div class="blog-item col-md-6 mb_30">
                            <div class="post-format">
                                <div class="thumb post-img">
                                    <a
                                        href="{{ route('web.post.details', ['slug' => $item->slug, 'id' => $item->id]) }}">
                                        <img src="{{ $item->thumbnail }}" alt="{{ $item->title }}">
                                    </a>
                                </div>
                            </div>
                            <div class="post-info mtb_20 ">
                                <h5 class="mb_10"> <a
                                        href="{{ route('web.post.details', ['slug' => $item->slug, 'id' => $item->id]) }}">{{ $item->title }}</a>
                                </h5>
                                {{-- <p>{!! $item->summary !!}</p> --}}
                                <div class="details mtb_20">
                                    <div class="date pull-left"> <i class="fa fa-calendar" aria-hidden="true"></i>
                                        {{ $item->date_of_publication }}</div>
                                    <div class="more pull-right"> <a
                                            href="{{ route('web.post.details', ['slug' => $item->slug, 'id' => $item->id]) }}">Đọc
                                            thêm <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    {{-- </div> --}}
                </div>
                <div class="pagination-nav text-center mtb_20">
                    <ul>
                        <li><a href="{{ $postOfCategory->previousPageUrl() }}"><i class="fa fa-angle-left"></i></a>
                        </li>

                        <li class="active"><a href="#">{{ $postOfCategory->currentPage() }}</a></li>

                        @if ($postOfCategory->lastPage() != $postOfCategory->currentPage())
                            <li><a href="#">{{ $postOfCategory->lastPage() }}</a></li>
                        @endif

                        <li><a href="{{ $postOfCategory->nextPageUrl() }}"><i class="fa fa-angle-right"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
