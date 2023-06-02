
<footer class="footer section gray-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 mr-auto col-sm-6">
                <div class="widget mb-5 mb-lg-0">
                    <div class="logo mb-4">
                        <img src="{{ asset('fontend/assets/images/logo.png') }}" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="widget mb-5 mb-lg-0">
                    <h4 class="text-capitalize mb-3">Services</h4>
                    <div class="divider mb-4"></div>

                    <ul class="list-unstyled footer-menu lh-35">
                        <li><a href="#!">Logo Design</a></li>
                        <li><a href="#!">Digital Marketing</a></li>
                        <li><a href="#!">T-shirt Design</a></li>
                        <li><a href="#!">Book Cover Design</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="widget mb-5 mb-lg-0">
                    <h4 class="text-capitalize mb-3">Quick Links</h4>
                    <div class="divider mb-4"></div>

                    <ul class="list-unstyled footer-menu lh-35">
                        <li><a href="{{ route('fontend.terms') }}">Terms &amp; Conditions</a></li>
                        <li><a href="{{ route('fontend.privacy') }}">Privacy Policy</a></li>
                        <li><a href="{{ route('fontend.about') }}">About Us</a></li>
                        <li><a href="{{ route('fontend.blog') }}">Blog</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="widget widget-contact mb-5 mb-lg-0">
                    <h4 class="text-capitalize mb-3">Get in Touch</h4>
                    <div class="divider mb-4"></div>

                    <div class="footer-contact-block mb-4">

                        <h4 class="mt-2"><i class="fa-solid fa-envelope"></i> <a href="mailto:example@example.com">example@example.com</a></h4>
                        <h4 class="mt-2"><i class="fa-solid fa-phone-square" aria-hidden="true"></i> <a href="tel:+00-000-0000"> +XX-XXX-XXXX</a></h4>
                    </div>

                    <div class="footer-contact-block">

                        <ul class="list-inline footer-socials mt-4">
                            <li class="list-inline-item">
                                <a href="#"><i class="fa-brands fa-facebook-f"></i> </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#"><i class="fa-brands fa-twitter"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-btm py-4 mt-5">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-6">
                    <div class="copyright">
                        Copyright © 2022 example company
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-lg-4">
                    <a class="backtop scroll-top-to reveal" href="#top">
                        <i class="icofont-long-arrow-up"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>
</body>


<script src="{{ asset('fontend/assets/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('fontend/assets/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script src="{{ asset('fontend/assets/js/custom.js') }}"></script>
{{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
{{-- <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script> --}}
</html>
