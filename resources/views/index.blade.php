@extends('FrontEndLayout.main')
@section('main.container')
    <!-- ##### Hero Area Start ##### -->
    <section class="hero-area">
        <div class="hero-slides owl-carousel">
            <!-- Single Hero Slide -->
            <div class="single-hero-slide d-flex align-items-center justify-content-center">
                <!-- Slide Img -->
                <div class="slide-img bg-img" style="background-image: url(FrontEnd-Assets/img/bg-img/b2.jpg);"></div>
                <!-- Slide Content -->
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="hero-slides-content text-center">
                                <h6 data-animation="fadeInUp" data-delay="100ms">Latest Music</h6>
                                <h2 data-animation="fadeInUp" data-delay="300ms">Only A Click <span> Away</span></h2>
                                <a data-animation="fadeInUp" data-delay="500ms" href="register.php"
                                    class="btn oneMusic-btn mt-50">Register YourSelf <i class="fa fa-unlock"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single Hero Slide -->
            <div class="single-hero-slide d-flex align-items-center justify-content-center">
                <!-- Slide Img -->
                <div class="slide-img bg-img" style="background-image: url(FrontEnd-Assets/img/bg-img/bg-2.jpg);"></div>
                <!-- Slide Content -->
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="hero-slides-content text-center">
                                <h6 data-animation="fadeInUp" data-delay="100ms"> Music You Want</h6>
                                <h2 data-animation="fadeInUp" data-delay="300ms"> Just Type <span> & Get It.</span></h2>
                                <a data-animation="fadeInUp" data-delay="500ms" href="login.php"
                                    class="btn oneMusic-btn mt-50"> Login <i class="fa fa-user"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Hero Area End ##### -->

    <!-- ##### Latest Albums Area Start ##### -->
    <section class="latest-albums-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading style-2">
                        <p>See New</p>
                        <h2>Latest Albums</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-lg-9">
                    <div class="ablums-text text-center mb-70">
                        <p>Find the latest Music, Each of the Album contains the different related to that specific
                            albums. Also you can search and listen the music of specific artist, just enter the name of
                            singer and the music of that wil appear. </p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="albums-slideshow owl-carousel">
                        @forelse ($musics as $music)
                            <!-- Single Album -->
                            <div class="single-album">
                                <img src="{{ asset('Admin/uploads/' . $music->image) }}" alt="Upload Image" width="75"
                                    height="75">
                                <div class="album-info">
                                    <a href="#">
                                        <h5> {{ $music->title }} </h5>
                                    </a>
                                    <p> {{ $music->Date }} </p>
                                </div>
                            </div>
                            <!-- Single Album -->
                        @empty
                            <h3> No Music Has been Added Yet!</h3>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Latest Albums Area End ##### -->

    <section class="oneMusic-buy-now-area has-fluid bg-gray section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading style-2">
                        <p> Update For</p>
                        <h2>The Upcoming Events</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                @forelse ($events as $event)
                    <!-- Single Event Area -->
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="single-event-area mb-30">
                            <div class="event-thumbnail">
                                <img src="{{ asset('Admin/Event Images/' . $event->event_image) }}" alt="Event Image">
                            </div>
                            <div class="event-text">
                                <h4>{{ $event->Event_Title }}</h4>
                                <div class="event-meta-data">
                                    <a href="#" class="event-place">{{ $event->Event_Description }}</a>
                                    <a href="#" class="event-date">{{ $event->Event_Date }}</a>
                                </div>
                                <a href="#" class="btn see-more-btn">See Event</a>
                            </div>
                        </div>
                    </div>
                    <!-- Single Event Area -->
                @empty
                    <h3> No Event Exists! </h3>
                @endforelse

            </div>


            <div class="row">
                <div class="col-12">
                    <div class="load-more-btn text-center wow fadeInUp" data-wow-delay="300ms">
                        <a href="#" class="btn oneMusic-btn">Load More <i class="fa fa-angle-double-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- #####  ##### -->

    <!-- #####  ##### -->
    <section class="miscellaneous-area section-padding-100-0">
        <div class="container">
            <div class="row">

                <!-- ***** New Hits Songs ***** -->
                <div class="col-12 col-lg-6">
                    <div class="new-hits-area mb-100">
                        <div class="section-heading text-left mb-50 wow fadeInUp" data-wow-delay="50ms">
                            <p>See what’s new</p>
                            <h2>New Hits</h2>
                        </div>
                        @forelse ($musics as $music)
                            <div class="single-new-item d-flex align-items-center justify-content-between wow fadeInUp"
                                data-wow-delay="100ms">
                                <div class="first-part d-flex align-items-center">
                                    <div class="thumbnail">
                                        <img src="{{ asset('Admin/uploads/' . $music->image) }}" alt="Cover Image">
                                    </div>
                                    <div class="content-">
                                        <h6>Tune</h6>
                                        <p>08-11-2022</p>
                                    </div>
                                </div>
                                <audio preload="auto" controls>
                                    <source src="{{ asset('Admin/uploads/' . $music->music) }}">
                                </audio>
                            </div>
                        @empty
                            <h4> No Music Added Yet! </h4>
                        @endforelse


                    </div>
                </div>

                <!-- ***** Popular ***** -->
                <div class="col-12 col-lg-6">
                    <div class="popular-artists-area mb-100">
                        <div class="section-heading text-left mb-50 wow fadeInUp" data-wow-delay="50ms">
                            <p>See what’s new</p>
                            <h2>Popular Categories</h2>
                        </div>
                        @forelse ($categories as $cat)
                            <div class="single-artists d-flex align-items-center wow fadeInUp" data-wow-delay="100ms">
                                <div class="thumbnail">
                                    <img src="{{ asset('Admin/Category Images/' . $cat->Cat_image) }}"
                                        alt="Category Image">
                                </div>
                                <div class="content-">
                                    <p>{{ $cat->Cat_title }}</p>
                                </div>
                            </div>
                        @empty
                        @endforelse

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Miscellaneous Area End ##### -->
@endsection
