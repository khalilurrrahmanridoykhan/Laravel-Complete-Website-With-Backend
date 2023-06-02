@extends('fontend.layouts.main')

@section('content')


    <main>

        @if (!empty($blog))
            @foreach ($blog as $blogs)
                <section class="hero-small">
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active"
                                style="background-image: url({{ asset('fontend/assets/images/banner1.jpg') }}) ;">
                                <div class="hero-small-background-overlay"></div>
                                <div class="container  h-100">
                                    <div class="row align-items-center d-flex h-100">
                                        <div class="col-md-12">
                                            <div class="block">
                                                <span class="text-uppercase text-sm letter-spacing"></span>
                                                <h1 class="mb-3 mt-3 text-center">{{ $blogs->name }}</h1>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="section-2  py-5">
                    <div class="container py-2">
                        <div class="row">
                            <div class="col-md-6 align-items-center d-flex">
                                <div class="about-block">
                                    <h1 class="title-color mb-2">{{ $blogs->name }}</h1>
                                    <div class="mb-2">
                                        <small>{{ date('d/m/y', strtotime($blogs->created_at)) }}</small>
                                    </div>
                                    <h5 class="title-color mb-3">{{ $blogs->short_desc }}</h5>
                                    <p>{!! $blogs->description !!}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="image-red-background">
                                    @if (!empty($blogs->img))
                                        <img src="{{ asset('uploads/blogs/thumb/large/' . $blogs->img) }}"
                                            class="card-img-top" alt="">
                                    @else
                                        <img src="{{ asset('ridoy/ridoy.jpg') }}" class="card-img-top" alt="">
                                    @endif
                                </div>

                            </div>

                            <div class="comment-box mb-4">
                                <h5>Comment Here</h5>
                                <br>
                                <form action="" id="commentFrom" name="commentFrom">
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" name="blogs_id" id="blogs_id"
                                            aria-describedby="helpId" placeholder="" value="{{ $blogs->blogs_id }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Your Name</label>
                                        <input type="text" name="name" id="name" class="form-control"
                                            placeholder="" aria-describedby="helpId">
                                        <p class="text-danger error name-error invalid-feedback"></p>

                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <textarea placeholder="Enter your comment here..." name="comment" id="comment" cols="30" rows="5"
                                                    class="form-control"></textarea>
                                                <p class="text-danger error comment-error invalid-feedback"></p>

                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                            <hr>
                            <h5>Comments</h5>


                            {{-- @dd($blogcomment) --}}

                            @if (!empty($blogcomment))
                                @foreach ($blogcomment as $blogcomments)
                                    <div class="card mb-2">
                                        <div class="card-body">
                                            <div class="h5">{{ $blogcomments->name }}</div>
                                            <div class="">{{ $blogcomments->comment }}</div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                        </div>
                    </div>
                </section>


                <section class="section-4 py-5 text-center">
                    <div class="hero-background-overlay"></div>
                    <div class="container">
                        <div class="help-container">
                            <h1 class="title">Do you need help?</h1>
                            <p class="card-text mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi
                                ipsum, odit velit exercitationem praesentium error id iusto dolorem expedita nostrum eius
                                atque? Aliquam ab reprehenderit animi sapiente quasi, voluptate dolorum?</p>
                            <a href="#" class="btn btn-primary mt-3">Call Us Now <i
                                    class="fa-solid fa-angle-right"></i></a>
                        </div>
                    </div>
                </section>

                <section class="section-3 py-5">
                    <div class="container">
                        <div class="divider mb-3"></div>
                        <h2 class="title-color mb-4 h1">Service</h2>
                        <div class="cards">
                            <div class="services-slider">
                                @if (!empty($service))
                                    @foreach ($service as $services)
                                        <div class="card border-0 ">
                                            @if (!empty($services->img))
                                                <img src="{{ asset('uploads/services/thumb/small/' . $services->img) }}"
                                                    class="card-img-top" alt="">
                                            @else
                                                <img src="{{ asset('ridoy/ridoy.jpg') }}" class="card-img-top"
                                                    alt="">
                                            @endif
                                            <div class="card-body p-3">
                                                <h1 class="card-title mt-2"><a href="#">{{ $services->name }}</a>
                                                </h1>
                                                <div class="content pt-2">
                                                    <p class="card-text">{{ $services->short_desc }}</p>
                                                </div>
                                                <a href="{{ url('/service/detail/' . $services->services_id) }}"
                                                    class="btn btn-primary mt-4">Details <i
                                                        class="fa-solid fa-angle-right"></i></a>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </section>
            @endforeach
        @endif
    </main>

@endsection

@section('extrajsforcomment')
    <script>
        $("#commentFrom").submit(function(e) {
            e.preventDefault();

            $.ajax({
                type: "POST",
                url: "{{ route('fontend.blog.commentsave') }}",
                data: $(this).serializeArray(),
                success: function(response) {
                    if (response['status'] == 0) {
                        if (response['status'] == 0) {
                            if (response['errors']['name']) {
                                $(".name-error").html(response['errors']['name']);
                                $("#name").addClass('is-invalid');
                            } else {
                                $(".name-error").html('');
                                $("#name").removeClass('is-invalid');
                            }
                        }

                        if (response['status'] == 0) {
                            if (response['errors']['comment']) {
                                $(".comment-error").html(response['errors']['comment']);
                                $("#comment").addClass('is-invalid');
                            } else {
                                $(".comment-error").html('');
                                $("#comment").removeClass('is-invalid');
                            }
                        }
                    }else{
                        location.reload(true)
                    }
                },
                error: function() {

                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

        });
    </script>
@endsection
