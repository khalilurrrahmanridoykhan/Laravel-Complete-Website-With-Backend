<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Motion Blur Effect</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta https-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('fontend/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('fontend/assets/css/style.css') }}">



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>

<body>

    <div class="cards">
        <div class="services-slider">
            <div class="card border-0 ">
                <img src="{{ asset('fontend/assets/images/logo-design.jpg') }}" class="card-img-top" alt="">
                <div class="card-body p-3">
                    <h1 class="card-title mt-2"><a href="#">Dummy Heading</a></h1>
                    <div class="content pt-2">
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi ipsum,
                            odit velit exercitationem praesentium error id iusto dolorem expedita nostrum eius atque?
                            Aliquam ab reprehenderit animi sapiente quasi, voluptate dolorum?</p>
                    </div>
                    <a href="#" class="btn btn-primary mt-4">Details <i class="fa-solid fa-angle-right"></i></a>
                </div>
            </div>
            <div class="card border-0">
                <img src="{{ asset('fontend/assets/images/digital-marketing.jpg') }}" class="card-img-top"
                    alt="">
                <div class="card-body p-3">
                    <h1 class="card-title mt-2"><a href="#">Dummy Heading</a></h1>
                    <div class="content pt-2">
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi ipsum,
                            odit velit exercitationem praesentium error id iusto dolorem expedita nostrum eius atque?
                            Aliquam ab reprehenderit animi sapiente quasi, voluptate dolorum?</p>
                    </div>
                    <a href="#" class="btn btn-primary mt-4">Details <i class="fa-solid fa-angle-right"></i></a>
                </div>
            </div>
            <div class="card border-0">
                <img src="{{ asset('fontend/assets/images/t-shirt-design.jpg') }}" class="card-img-top" alt="">
                <div class="card-body p-3">
                    <h1 class="card-title mt-2"><a href="#">Dummy Heading</a></h1>
                    <div class="content pt-2">
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi ipsum,
                            odit velit exercitationem praesentium error id iusto dolorem expedita nostrum eius atque?
                            Aliquam ab reprehenderit animi sapiente quasi, voluptate dolorum?</p>
                    </div>
                    <a href="#" class="btn btn-primary mt-4">Details <i class="fa-solid fa-angle-right"></i></a>
                </div>
            </div>

            <div class="card border-0">
                <img src="{{ asset('fontend/assets/images/book-cover-design.jpg') }}" class="card-img-top"
                    alt="">
                <div class="card-body p-3">
                    <h1 class="card-title mt-2"><a href="#">Book Cover Design</a></h1>
                    <div class="content pt-2">
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi ipsum,
                            odit velit exercitationem praesentium error id iusto dolorem expedita nostrum eius atque?
                            Aliquam ab reprehenderit animi sapiente quasi, voluptate dolorum?</p>
                    </div>
                    <a href="#" class="btn btn-primary mt-4">Details <i class="fa-solid fa-angle-right"></i></a>
                </div>
            </div>
        </div>
    </div>


    <script src="main.js"></script>

    <script>

$(document).ready(function(){

alert("Hello! I am an alert box!");


$('.services-slider').slick({
    dots: true,
    infinite: true,
    speed: 300,
    slidesToShow: 3,
    slidesToScroll: 1,
    prevArrow:"<a href='javscript:void(0);' type='button' class='slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></a>",
    nextArrow:"<a href='javscript:void(0);' type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></a>",
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
          infinite: true,
          dots: true
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
    ]
  });

});

    </script>

<script src="{{ asset('fontend/assets/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('fontend/assets/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script src="{{ asset('fontend/assets/js/custom.js') }}"></script>
{{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
{{-- <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script> --}}

</body>

</html>
