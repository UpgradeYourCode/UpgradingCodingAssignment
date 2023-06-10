<link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
<nav class="navbar navbar-expand-sm navbar-light">
    <div class="container">
        <a class="navbar-brand" href="/">Home</a>
        <button class="navbar-toggler third-button" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <div class="animated-icon3"><span></span><span></span><span></span></div>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto text-center">
                <a class="nav-link" href="/gown">Gown</a>
                <a class="nav-link" href="/makeups">Make Up</a>
                <a class="nav-link" href="/testi">Testimonial</a>
                <a class="btn btn-primary tombol page-scroll" href="#contact-us">Contact Us</a>
            </div>
        </div>
    </div>
</nav>

<script>
    $(document).ready(function() {

        $('.first-button').on('click', function() {

            $('.animated-icon1').toggleClass('open');
        });
        $('.second-button').on('click', function() {

            $('.animated-icon2').toggleClass('open');
        });
        $('.third-button').on('click', function() {

            $('.animated-icon3').toggleClass('open');
        });
    });
</script>