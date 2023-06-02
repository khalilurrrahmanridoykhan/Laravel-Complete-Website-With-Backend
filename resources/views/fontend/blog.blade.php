@extends('fontend.layouts.main')

@section('content')
    <main>
        <section class="hero-small">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active"
                        style="background-image: url('{{ asset('fontend/assets/images/banner1.jpg') }}') ;">
                        <div class="hero-small-background-overlay"></div>
                        <div class="container  h-100">
                            <div class="row align-items-center d-flex h-100">
                                <div class="col-md-12">
                                    <div class="block text-center">
                                        <span class="text-uppercase text-sm letter-spacing"></span>
                                        <h1 class="mb-3 mt-3 text-center">Blog & News</h1>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-3 py-5">
            <div class="container">
                <div class="cards">
                    <div class="row">

                        @if (!empty($blog))
                            @foreach ($blog as $blogs)
                                <div class="col-md-4 mb-4">
                                    <div class="card border-0">
                                        @if (!empty($blogs->img))
                                        <img src="{{ asset('uploads/blogs/thumb/small/'.$blogs->img) }}" class="card-img-top" alt="">
                                        @else
                                        <img src="{{ asset('no_image/no_image_large.png') }}" class="card-img-top" alt="">
                                        @endif
                                        <div class="card-body p-3">
                                            <h1 class="card-title mt-2"><a href="#">{{ $blogs->name }} </a></h1>
                                            <div class="content pt-2">
                                                <p class="card-text">{{ $blogs->short_desc }}</p>
                                            </div>
                                            <a href="{{ url('/blog/detail/' . $blogs->blogs_id) }}"
                                                class="btn btn-primary mt-4">Details <i
                                                    class="fa-solid fa-angle-right"></i></a>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
