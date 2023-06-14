@extends('FrontEndLayout.main')
@section('main.container')
    <section class="breadcumb-area bg-img bg-overlay"
        style="background-image: url(FrontEnd-Assets/img/bg-img/breadcumb3.jpg);">
        <div class="bradcumbContent">
            <p>See what’s new</p>
            <h2>Latest Albums</h2>
        </div>
    </section>

    <!-- ##### Song Area Start ##### -->
    <div class="one-music-songs-area mb-70 mt-70">
        <div class="container">
            <div class="row">
                @forelse ($musics as $music)
                    <!-- Single Song Area -->
                    <div class="col-12">
                        <div class="single-song-area mb-30 d-flex flex-wrap align-items-end">
                            <div class="song-thumbnail">
                                <img src="{{ asset('Admin/uploads/' . $music->image) }}" alt="Cover Image">
                            </div>
                            <div class="song-play-area">
                                <div class="song-name">
                                    <p> Tune </p>
                                </div>
                                <audio preload="auto" controls>
                                    <source src="{{ asset('Admin/uploads/' . $music->music) }}" alt="Audio File">
                                </audio>
                            </div>
                        </div>
                    </div>
                    <!-- Single Song Area -->
                @empty
                    <h3> No Music has been Uploaded Yet!!!!</h3>
                @endforelse

            </div>
            <div class="row">
                <div class="col-12">
                    <div class="load-more-btn text-center">
                        <a href="{{ route('register') }}" class="btn oneMusic-btn">Load More <i
                                class="fa fa-angle-double-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Song Area End ##### -->
@endsection
