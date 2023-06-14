<link rel="stylesheet" href="{{ asset('style.css') }}">
@extends('DashboardLayout.maindash')
@section('css-section')
    </head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <style>
        body {
            margin-top: 20px;
        }

        .content-item {
            padding: 30px 0;
            background-color: #FFFFFF;
        }

        .content-item.grey {
            background-color: #F0F0F0;
            padding: 50px 0;
            height: 100%;
        }

        .content-item h2 {
            font-weight: 700;
            font-size: 35px;
            line-height: 45px;
            text-transform: uppercase;
            margin: 20px 0;
        }

        .content-item h3 {
            font-weight: 400;
            font-size: 20px;
            color: #555555;
            margin: 10px 0 15px;
            padding: 0;
        }

        .content-headline {
            height: 1px;
            text-align: center;
            margin: 20px 0 70px;
        }

        .content-headline h2 {
            background-color: #FFFFFF;
            display: inline-block;
            margin: -20px auto 0;
            padding: 0 20px;
        }

        .grey .content-headline h2 {
            background-color: #F0F0F0;
        }

        .content-headline h3 {
            font-size: 14px;
            color: #AAAAAA;
            display: block;
        }


        #comments {
            box-shadow: 0 -1px 6px 1px rgba(0, 0, 0, 0.1);
            background-color: #FFFFFF;
        }

        #comments form {
            margin-bottom: 30px;
        }

        #comments .btn {
            margin-top: 7px;
        }

        #comments form fieldset {
            clear: both;
        }

        #comments form textarea {
            height: 100px;
        }

        #comments .media {
            border-top: 1px dashed #DDDDDD;
            padding: 20px 0;
            margin: 0;
        }

        #comments .media>.pull-left {
            margin-right: 20px;
        }

        #comments .media img {
            max-width: 100px;
        }

        #comments .media h4 {
            margin: 0 0 10px;
        }

        #comments .media h4 span {
            font-size: 14px;
            float: right;
            color: #999999;
        }

        #comments .media p {
            margin-bottom: 15px;
            text-align: justify;
        }

        #comments .media-detail {
            margin: 0;
        }

        #comments .media-detail li {
            color: #AAAAAA;
            font-size: 12px;
            padding-right: 10px;
            font-weight: 600;
        }

        #comments .media-detail a:hover {
            text-decoration: underline;
        }

        #comments .media-detail li:last-child {
            padding-right: 0;
        }

        #comments .media-detail li i {
            color: #666666;
            font-size: 15px;
            margin-right: 10px;
        }
    </style>
@endsection
@section('main.dashboard')
    <div class="dashboard-wrapper">
        <div class="dashboard-influence">
            <div class="container-fluid dashboard-content">

                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h3 class="mb-2"> Dashboard </h3>
                            {{-- <a href="" class="btn btn-danger btn-xs float-right"> Deleted Events </a> --}}
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"
                                                class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="{{ route('admin.musics.index') }}"
                                                class="breadcrumb-link">Musics
                                                Files
                                            </a></li>
                                        <li class="breadcrumb-item active"><a href="#" class="breadcrumb-link">Music
                                                Informators
                                            </a></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        @if (Session::has('success'))
                            <div class="alert alert-info alert-dismissible col-md-12" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                                <strong>Success!</strong> {{ Session::get('success') }}
                            </div>
                        @endif
                        @if (Session::has('error'))
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                                <strong>Success!</strong> {{ Session::get('error') }}
                            </div>
                        @endif

                        <div class="section-block">
                            <h3 class="section-title"> Music Details</h3>
                        </div>
                        <div class="card">
                            <div class="col-12">
                                <div class="single-song-area mt-30 mb-30 d-flex flex-wrap align-items-end">
                                    <div class="song-thumbnail">
                                        <img src="{{ asset('Admin/uploads/' . $music->image) }}" width="35"
                                            alt="Cover Image">
                                    </div>

                                    <div class="song-play-area">
                                        <div class="song-name">
                                            <p> {{ $music->title }}</p>
                                        </div>
                                        <audio preload="auto" controls>
                                            <source src="{{ asset('Admin/uploads/' . $music->music) }}" alt="Audio File">
                                        </audio>
                                        <div class="mt-3 list-inline">
                                            <div class="row">
                                                {{-- <form action="#" method="post">
                                                    <button type="submit" name="Unlike" class="btn btn-primary  btn-xs">
                                                        <i class="far fa-thumbs-down me-2"></i> UnLike </button>
                                                </form>

                                                <a href="#" class="showbtn btn btn-secondary btn-xs ml-2"
                                                    data-toggle="modal" data-target="#Modal" id="showbtn"> <i
                                                        class="fa fa-comment me-2"></i> Comment </a> --}}
                                            </div>
                                        </div>


                                        <form id="showhideForm" action="" method="post">
                                            <input type="hidden" name="userId" value="{{ Auth::user()->id }}">
                                            <div class="form-outline w-100 mt-4">
                                                <textarea class="form-control" id="textAreaExample" rows="4" style="background: #fff;" name="comment"
                                                    minlength="3" required></textarea>
                                                <label class="form-label" for="textAreaExample"> Comments</label>
                                            </div>
                                            <button type="submit" name="submit" class="btn btn-primary text-right">
                                                Post </button>
                                            <button class="hidebtn btn btn-danger">Close </button>

                                        </form>
                                    </div>

                                </div>
                                <section class="content-item mb-3" id="comments">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <p> <b> {{ count($comments) }} </b> Comments
                                                    <span> <b> {{ count($likes) }} </b> Likes </span>
                                                </p>
                                                @forelse ($comments as $comment)
                                                    <!-- COMMENT 1 - START -->
                                                    <div class="media">
                                                        <a class="pull-left" href="#"><img class="media-object"
                                                                src="{{ asset('Admin/user images/' . $comment->user->profile) }}"
                                                                alt="User Profile image"></a>
                                                        <div class="media-body">
                                                            <h4 class="media-heading"> {{ $comment->user->Name }} </h4>
                                                            <p> {{ $comment->comments }} </p>
                                                            <ul class="list-unstyled list-inline media-detail pull-left">
                                                                <li><i class="fa fa-calendar"></i> {{ $comment->Date }}
                                                                    <!--<i class="fa fa-thumbs-up pl-4"></i>13 <a href="">Like</a> -->
                                                                </li>
                                                            </ul>
                                                            <ul class="list-unstyled list-inline media-detail pull-right">
                                                                <!--	<li class=""><a href="">Reply</a></li> -->
                                                            </ul>
                                                        </div>

                                                    </div>
                                                    <!-- COMMENT 1 - END -->
                                                @empty
                                                    <h6> No Comments are posted on this Music</h6>
                                                @endforelse

                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"> Post Your Comment Here</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="get" action="#">
                                <div class="modal-body">
                                    <div class="form-outline w-100">
                                        <textarea class="form-control" id="textAreaExample" rows="4" style="background: #fff;" name="comment"
                                            minlength="3" required></textarea>
                                        <label class="form-label" for="textAreaExample"> Comments</label>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary"> Post </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    @endsection
    @section('js-section')
        <script>
            $(document).ready(function() {
                $('#showhideForm').hide(100);
                $('.showbtn').click(function() {
                    $('#showhideForm').show(500);
                    $('#showbtn').hide();
                });
                $('.hidebtn').click(function() {
                    $('#showhideForm').hide(500);
                    $('#showbtn').show(500);
                });
            });
        </script>
    @endsection
