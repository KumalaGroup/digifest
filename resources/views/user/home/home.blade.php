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
            <li><a href="{{route('transaksi')}}"><i class="bx bxs-basket"></i> <span>Transaksi</span></a></li>
            <br>
            <li><a href="{{route('logout')}}"><i class="bx bx-log-out-circle"></i> <span>Keluar</span></a></li>
        </ul>
    </nav>

</header>
@endsection

@section('style')
<style>
    /* body {
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
        z-index: -1;
        bottom: 0;
        top: 0;
        left: 0;
        right: 0;
    } */

    #tanggal {
        cursor: pointer;
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
                    @if($data->is_live==1)
                    <div class="row">
                        <div class="col-lg-12 portfolio-item">
                            <h3 class="resume-title"><i class="bx bx-cast"></i> Live</h3>
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="{{$data->live}}?autoplay=1&mute=1" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="row">
                        <div class="col-lg-12 portfolio-item">
                            <h3 class="resume-title"><i class="bx bxs-videos"></i> Playlist</h3>
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="{{$data->playlist}}&autoplay=1&mute=1" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                    @endif
                    @if($data->is_zoom==1)
                    <div class="row">
                        <div class="col-lg-12 portfolio-item">
                            <h3 class="resume-title"><i class="bx bx-link-alt"></i> Link Zoom Meeting</h3>
                            <div class="resume-item">
                                <p><a href="{{$data->link_zoom}}" target="_blank" rel="noopener noreferrer">{{$data->link_zoom}}</a></p>
                                <h5>Meeting ID : {{$data->meeting_id}}</h5> <br>
                                <h5>Passcode : {{$data->passcode}}</h5> <br>
                                <h5>Tanggal : {{formatHariTanggal($data->waktu)['tanggal']}}</h5> <br>
                                <h5>Waktu : {{formatHariTanggal($data->waktu)['waktu']}}</h5>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="col-lg-4 portfolio-item">
                    <h3 class="resume-title"><i class="bx bx-collection"></i> Rundown</h3>
                    <div class="resume-item">
                        <h4 id="tanggal">06-10-2020</h4>
                        <table class="table table-condensed">
                            <tbody id="rundown"></tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h3 class="resume-title"><i class="bx bxs-car"></i> Line Up</h3>
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
<script>
    $.fn.datepicker.dates['id'] = {
        days: ["Ahad&nbsp;", "Senin&nbsp;", "Selasa&nbsp;", "Rabu&nbsp;", "Kamis&nbsp;", "Jum'at&nbsp;", "Sabtu"],
        daysShort: ["Ahad&nbsp;", "Senin&nbsp;", "Selasa&nbsp;", "Rabu&nbsp;", "Kamis&nbsp;", "Jum'at&nbsp;", "Sabtu"],
        daysMin: ["Ahad&nbsp;", "Senin&nbsp;", "Selasa&nbsp;", "Rabu&nbsp;", "Kamis&nbsp;", "Jum'at&nbsp;", "Sabtu"],
        months: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Augustus", "September", "Oktober", "November", "Desember"],
        monthsShort: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Aug", "Sep", "Okt", "Nov", "Des"],
        today: "Today",
        clear: "Clear",
        format: "mm/dd/yyyy",
        titleFormat: "MM yyyy",
        weekStart: 0
    };
    $('#tanggal').datepicker({
        format: `yyyy-mm-dd`,
        autoclose: true,
        language: `id`
    }).on("changeDate", function(e) {
        $('#tanggal').html(formatHariTanggal(e.date));
        $.get(location, {
                rundown: true,
                date: formatDate(e.date)
            },
            function(data, textStatus, jqXHR) {
                $('#rundown').children().remove();
                if (data != null)
                    $.each(data, function(indexInArray, valueOfElement) {
                        $('#rundown').append(`<tr>
                        <td>` + valueOfElement.waktu + `</td>
                        <td>` + valueOfElement.judul + `</td>
                        </tr>`);
                    });
                else $('#rundown').append(`<tr>
                        <td>Tidak ada rundown acara</td>
                        </tr>`);
            }, "json");
    });
    $('#tanggal').html(formatHariTanggal(new Date()));
    $.get(location, {
            rundown: true,
            date: formatDate(new Date())
        },
        function(data, textStatus, jqXHR) {
            $('#rundown').children().remove();
            if (data != null)
                $.each(data, function(indexInArray, valueOfElement) {
                    $('#rundown').append(`<tr>
                    <td>` + valueOfElement.waktu + `</td>
                    <td>` + valueOfElement.judul + `</td>
                    </tr>`);
                });
            else $('#rundown').append(`<tr>
                    <td>Tidak ada rundown acara</td>
                    </tr>`);
        }, "json");

    function formatHariTanggal(date) {
        var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        var myDays = ['Ahad', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
        var day = date.getDate();
        var month = date.getMonth();
        var thisDay = date.getDay(),
            thisDay = myDays[thisDay];
        var yy = date.getYear();
        var year = (yy < 1000) ? yy + 1900 : yy;
        return thisDay + ', ' + day + ' ' + months[month] + ' ' + year;
    }

    function formatDate(date) {
        var day = date.getDate(),
            day = day < 10 ? `0` + day : day;
        var month = date.getMonth() + 1,
            month = month < 10 ? `0` + month : month;
        var year = date.getYear(),
            year = (year < 1000) ? year + 1900 : year;
        return year + '-' + month + '-' + day;
    }
</script>
@endsection