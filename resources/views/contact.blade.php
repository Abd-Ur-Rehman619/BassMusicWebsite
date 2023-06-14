@extends('FrontEndLayout.main')
@section('main.container')
    <!-- ##### Breadcumb Area Start ##### -->
    <section class="breadcumb-area bg-img bg-overlay" style="background-image: url(FrontEnd-Assets/img/bg-img/b2.jpg);">
        <div class="bradcumbContent">
            <p>IF You Have any Query! Feel Free to Contact Us.</p>
            <h2>Contact</h2>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Contact Area Start ##### -->
    <section class="contact-area section-padding-100-0">
        <div class="container">
            <div class="row">
                @if (Session::has('success'))
                    <div class="alert alert-info alert-dismissible col-md-12" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <strong>Success!</strong> {{ Session::get('success') }}
                    </div>
                @endif
                <div class="col-12 col-lg-3">
                    <div class="contact-content mb-100">
                        <!-- Title -->
                        <div class="contact-title mb-50">
                            <h5>Contact Info</h5>
                        </div>

                        <!-- Single Contact Info -->
                        <div class="single-contact-info d-flex align-items-center">
                            <div class="icon mr-30">
                                <span class="icon-placeholder"></span>
                            </div>
                            <p>Kohat University of Science and Technology, KUST</p>
                        </div>

                        <!-- Single Contact Info -->
                        <div class="single-contact-info d-flex align-items-center">
                            <div class="icon mr-30">
                                <span class="icon-smartphone"></span>
                            </div>
                            <p>+92 331 5185150</p>
                        </div>

                        <!-- Single Contact Info -->
                        <div class="single-contact-info d-flex align-items-center">
                            <div class="icon mr-30">
                                <span class="icon-mail"></span>
                            </div>
                            <p>yourmail@gmail.com</p>
                        </div>

                        <!-- Contact Social Info -->
                        <div class="contact-social-info mt-50">
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Pinterest"><i
                                    class="fa fa-pinterest" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><i
                                    class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i
                                    class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Dribbble"><i
                                    class="fa fa-dribbble" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Behance"><i
                                    class="fa fa-behance" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Linkedin"><i
                                    class="fa fa-linkedin" aria-hidden="true"></i></a>
                        </div>

                    </div>
                </div>

                <div class="col-12 col-lg-9">
                    <!-- ##### Google Maps ##### -->
                    <div class="map-area mb-100">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m26!1m12!1m3!1d63250.14179486464!2d71.40795373902345!3d33.57477687634213!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m11!3e6!4m3!3m2!1d33.6070402!2d71.4655563!4m5!1s0x38d8ec241a467237%3A0xf7409abf0918f110!2skust%20university!3m2!1d33.5232835!2d71.44589169999999!5e0!3m2!1sen!2s!4v1666261049203!5m2!1sen!2s"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ##### Contact Area End ##### -->

    <!-- ##### Contact Area Start ##### -->
    <section class="contact-area section-padding-0-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <p>Feel Free to Contact Us.</p>
                        <h2>Get In Touch</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <!-- Contact Form Area -->
                    <div class="contact-form-area">
                        <form action="{{ route('SendMessage') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <input type="text" name="name" minlength="3" class="form-control"
                                            id="name" placeholder="Name" value="{{ old('name') }}">
                                    </div>
                                    @if ($errors->has('name'))
                                        <span class="text-danger"> {{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <input type="email" name="email" value="{{ old('email') }}"
                                            class="form-control" id="email" placeholder="E-mail">
                                    </div>
                                    @if ($errors->has('email'))
                                        <span class="text-danger"> {{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <input type="text" value="{{ old('Phone') }}" name="Phone"
                                            class="form-control" id="Phone" placeholder="Contact Number">
                                    </div>
                                    @if ($errors->has('Phone'))
                                        <span class="text-danger"> {{ $errors->first('Phone') }}</span>
                                    @endif
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input type="text" value="{{ old('subject') }}" name="subject"
                                            class="form-control" id="subject" placeholder="Subject">
                                    </div>
                                    @if ($errors->has('subject'))
                                        <span class="text-danger"> {{ $errors->first('subject') }}</span>
                                    @endif
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea name="message" class="form-control" id="message" cols="30" rows="10" placeholder="Message">{{ old('message') }}</textarea>
                                    </div>
                                    @if ($errors->has('message'))
                                        <span class="text-danger"> {{ $errors->first('message') }}</span>
                                    @endif
                                </div>
                                <div class="col-12 text-center">

                                    <button class="btn oneMusic-btn mt-30" type="submit" name="submit">Send <i
                                            class="fa fa-share"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Contact Area End ##### -->
@endsection
@section('js-section')
    <!-- toastr CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/css/toastr.css" rel="stylesheet" />
    {{-- toastr js --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    {{-- Toastr Script --}}
    <script>
        $(document).ready(function() {
            toastr.options.timeOut = 10000;
            @if (Session::has('error'))
                toastr.error('{{ Session::get('error') }}');
            @elseif (Session::has('success'))
                toastr.success('{{ Session::get('success') }}');
            @endif
        });
    </script>
@endsection
