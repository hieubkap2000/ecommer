@extends('web.layout')
@section('title', $post['post']->title)
@section('content')
    <div class="container">
        <div class="row ">
            <!-- =====  BANNER STRAT  ===== -->
            <div class="col-sm-12">
                <div class="breadcrumb ptb_20">
                    {{-- <h1>{{ $post['post']->title }}</h1> --}}
                    <ul>
                        <li><a href="{{ route('home') }}">Trang chủ</a></li>
                        <li>
                            <a
                                href="{{ route('web.postCategory', ['slug' => $post['post']->category_slug, 'id' => $post['post']->category_id]) }}">
                                {{ $post['post']->category_name }}
                            </a>
                        </li>
                        <li class="active">{{ $post['post']->title }}</li>
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
                    <div class="blog-item listing-effect col-md-12 mb_50">
                        <div class="post-format">
                            <div class="thumb post-img post-details">
                                <a href="#" title="Beautiful Lady">
                                    <img src="{{ $post['post']->thumbnail }}" alt="OYEENok">
                                </a>
                            </div>
                            <div class="post-type"> <i class="fa fa-picture-o" aria-hidden="true"></i> </div>
                        </div>
                        <div class="post-info mtb_20 ">
                            <h2 class="mb_10">
                                <a href="single_blog.html">{{ $post['post']->title }}</a>
                            </h2>
                        </div>

                        <blockquote>
                            {!! $post['post']->summary !!}
                        </blockquote>
                        <div class="details mtb_20">
                            <strong>Ngày viết : </strong> <i>{{ $post['post']->date_of_publication }}</i>
                            <br>
                            <strong>Người viết : </strong><i>{{ $post['post']->name }}</i>
                            <div class="tag">
                                <strong> Tag :</strong>
                                @foreach ($post['tag'] as $item)
                                    <i><a href="">{{ $item->tag_name }}</a></i>
                                @endforeach
                            </div>
                        </div>
                        <div class="content_post">
                            {!! $post['post']->content !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
