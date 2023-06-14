@extends('FrontEndLayout.main')
@section('main.container')
    <section class="breadcumb-area bg-img bg-overlay"
        style="background-image: url(FrontEnd-Assets/img/bg-img/breadcumb3.jpg);">
        <div class="bradcumbContent">
            <p>See what’s new</p>
            <h2>News</h2>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Blog Area Start ##### -->
    <div class="blog-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-9">
                    @forelse ($news as $newz)
                        <!-- Single Post Start -->
                        <div class="single-blog-post mb-100 wow fadeInUp" data-wow-delay="100ms">
                            <!-- Post Thumb -->
                            <div class="blog-post-thumb mt-30">
                                <a href="#"><img src="{{ asset('Admin/News Images/' . $newz->news_image) }}"
                                        alt="Cover Image" width="100%"></a>
                                <!-- Post Date -->
                                <div class="post-date">
                                    <span>Date</span>
                                    <span>{{ $newz->News_Date }}</span>
                                </div>
                            </div>

                            <!-- Blog Content -->
                            <div class="blog-content">
                                <!-- Post Title -->
                                <a href="#" class="post-title">{{ $newz->News_Title }}</a>
                                <!-- Post Meta -->
                                <div class="post-meta d-flex mb-30">
                                    <p class="post-author">By<a href="#"> {{ $newz->user->Name }}</a></p>
                                    <p class="tags">in<a href="#"> News</a></p>
                                </div>
                                <!-- Post Excerpt -->
                                <p> {{ $newz->News_Description }} </p>
                            </div>
                        </div>
                        <!-- Single Post Start -->
                    @empty
                        <h3> No News Exist in Database.</h3>
                    @endforelse

                </div>

                <div class="col-12 col-lg-3">
                    <div class="blog-sidebar-area">

                        <!-- Widget Area -->
                        <div class="single-widget-area mb-30">
                            <div class="widget-title">
                                <h5>Categories</h5>
                            </div>
                            <div class="widget-content">
                                <ul>
                                    @forelse ($categories as $category)
                                        <li><a href="{{ route('Ablums') }}">{{ $category->Cat_title }}</a></li>
                                    @empty
                                        <li><a href="#">No Category Exits</a></li>
                                    @endforelse
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Blog Area End ##### -->
@endsection
