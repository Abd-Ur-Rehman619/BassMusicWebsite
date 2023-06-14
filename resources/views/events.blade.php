@extends('FrontEndLayout.main')
@section('main.container')
    <!-- ##### Breadcumb Area Start ##### -->
    <section class="breadcumb-area bg-img bg-overlay"
        style="background-image: url(FrontEnd-Assets/img/bg-img/breadcumb3.jpg);">
        <div class="bradcumbContent">
            <p>See what’s new</p>
            <h2>Events</h2>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Events Area Start ##### -->
    <section class="events-area section-padding-100">
        <div class="container">
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
                    <h3> No Event has been added!!!!!!!!!</h3>
                @endforelse


            </div>

            <div class="row">
                <div class="col-12">
                    <div class="load-more-btn text-center mt-70">
                        <a href="#" class="btn oneMusic-btn">Load More <i class="fa fa-angle-double-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Events Area End ##### -->
@endsection
