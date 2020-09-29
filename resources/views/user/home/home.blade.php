@extends('user.base')

@section('title')
@endsection

@section('menu')
<button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>
<header id="header" class="d-flex flex-column justify-content-center">

    <nav class="nav-menu">
        <ul>
            <li class="active"><a href="#resume"><i class="bx bx-home"></i> <span>Beranda</span></a></li>
            <br>
            <li><a href="{{route('profil')}}"><i class="bx bx-user"></i> <span>Profil</span></a></li>
            <li><a href="{{route('logout')}}"><i class="bx bx-log-out-circle"></i> <span>Keluar</span></a></li>
        </ul>
    </nav>

</header>
@endsection

@section('style')
<style>
    body {
        width: 100%;
        height: 100vh;
        background: url("{{asset('assets/img/'.$backgroundImage)}}") top right no-repeat;
        background-size: cover;
        background-attachment: fixed;
    }

    body:before {
        content: "";
        background: rgba(255, 255, 255, 0.8);
        position: fixed;
        bottom: 0;
        top: 0;
        left: 0;
        right: 0;
    }
</style>
@endsection

@section('content')
<div id="main">
    <section id="resume" class="resume portfolio">
        <div class="container" data-aos="zoom-in" data-aos-delay="100">
            <div class="section-title">
                <h2>Kumala Virtual Fair</h2>
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="resume-title">Rundown</h3>
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/mdkyQT7-hC0?autoplay=1&mute=1" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="resume-title">Link Invitation</h3>
                            <div class="resume-item">
                                <h4>Bachelor of Fine Arts &amp; Graphic Design</h4>
                                <h5>2010 - 2014</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <h3 class="resume-title">Rundown</h3>
                    <div class="resume-item">
                        <h4>Bachelor of Fine Arts &amp; Graphic Design</h4>
                        <h5>2010 - 2014</h5>
                        <p><em>Rochester Institute of Technology, Rochester, NY</em></p>
                        <p>Quia nobis sequi est occaecati aut. Repudiandae et iusto quae reiciendis et quis Eius vel ratione eius unde vitae rerum voluptates asperiores voluptatem Earum molestiae consequatur neque etlon sader mart dila</p>
                        <ul>
                            <li>Lead in the design, development, and implementation of the graphic, layout, and production communication materials</li>
                            <li>Delegate tasks to the 7 members of the design team and provide counsel on all aspects of the project. </li>
                            <li>Supervise the assessment of all graphic materials in order to ensure quality and accuracy of the design</li>
                            <li>Oversee the efficient use of production project budgets ranging from $2,000 - $25,000</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row" data-aos="zoom-in" data-aos-delay="100">
                <div class="col-md-12">
                    <h3 class="resume-title">Line Up</h3>
                    <div class="row portfolio-container">
                        <div class="col-lg-4 col-md-6 portfolio-item">
                            <div class="portfolio-wrap zoom_img py-4" style="background-color: transparent;">
                                <img src="{{asset('assets/images/logo/logo_wuling.png')}}" width="100%" height="100px" style="object-fit: contain;">
                                <a href="{{route('lineUp',['brand'=>'wuling'])}}">
                                    <div class="portfolio-info">
                                        <h3 class="resume-title">Wuling</h3>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 portfolio-item">
                            <div class="portfolio-wrap zoom_img py-4" style="background-color: transparent;">
                                <img src="{{asset('assets/images/logo/logo_hino.png')}}" width="100%" height="100px" style="object-fit: contain;">
                                <a href="{{route('lineUp',['brand'=>'hino'])}}">
                                    <div class="portfolio-info">
                                        <h3 class="resume-title">Hino</h3>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 portfolio-item">
                            <div class="portfolio-wrap zoom_img py-4" style="background-color: transparent;">
                                <img src="{{asset('assets/images/logo/logo_mercedes.png')}}" width="100%" height="100px" style="object-fit: contain;">
                                <a href="{{route('lineUp',['brand'=>'mercedes-benz'])}}">
                                    <div class="portfolio-info">
                                        <h3 class="resume-title">Mercedes-Benz</h3>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 portfolio-item">
                            <div class="portfolio-wrap zoom_img py-4" style="background-color: transparent;">
                                <img src="{{asset('assets/images/logo/logo_honda.png')}}" width="100%" height="100px" style="object-fit: contain;">
                                <a href="{{route('lineUp',['brand'=>'honda'])}}">
                                    <div class="portfolio-info">
                                        <h3 class="resume-title">Honda</h3>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 portfolio-item">
                            <div class="portfolio-wrap zoom_img py-4" style="background-color: transparent;">
                                <img src="{{asset('assets/images/logo/logo_mazda.png')}}" width="100%" height="100px" style="object-fit: contain;">
                                <a href="{{route('lineUp',['brand'=>'mazda'])}}">
                                    <div class="portfolio-info">
                                        <h3 class="resume-title">Mazda</h3>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('js')
@endsection