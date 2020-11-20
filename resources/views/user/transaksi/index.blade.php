@extends('user.base')

@section('title')
@endsection

@section('menu')
<button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>
<header id="header" class="d-flex flex-column justify-content-center">

    <nav class="nav-menu">
        <ul>
            <li><a href="{{route('home')}}"><i class="bx bx-home"></i> <span>Beranda</span></a></li>
            <br>
            <li><a href="{{route('profil')}}"><i class="bx bx-user"></i> <span>Profil</span></a></li>
            <li class="active"><a href="#contact"><i class="bx bxs-basket"></i> <span>Transaksi</span></a></li>
            <br>
            <li><a href="{{route('logout')}}"><i class="bx bx-log-out-circle"></i> <span>Keluar</span></a></li>
        </ul>
    </nav>

</header>
@endsection

@section('style')
<style>
    /* begin:: untuk background dinamis */
    body {
        width: 100%;
        height: 100vh;
        background: url("{{$backgroundImageM}}") top no-repeat;
        background-size: cover;
        background-attachment: fixed;
    }

    @media only screen and (min-device-width: 768px) {
        body {
            width: 100%;
            height: 100vh;
            background: url("{{$backgroundImageDT}}") top right no-repeat;
            background-size: cover;
            background-attachment: fixed;
        }
    }

    /* end:: untuk background dinamis */

    /* begin:: untuk overlay */
    /* body:before {
        content: "";
        background: rgba(255, 255, 255, 0.5);
        position: fixed;
        z-index: -1;
        bottom: 0;
        top: 0;
        left: 0;
        right: 0;
    } */
    /* end:: untuk overlay */

    .form-control[readonly] {
        background-color: #fff;
    }

    .error {
        color: red;
        padding-top: 5px;
        margin: 0;
        font-size: 10pt;
    }

    #tabelRiwayat tr:hover {
        cursor: pointer;
    }

</style>
@endsection

@section('content')
<div id="main">
    <section id="contact" class="contact about portfolio">
        <div class="container" data-aos="zoom-in" data-aos-delay="100">
            <div class="section-title">
                <h2>Transaksi</h2>
            </div>
            <div class="row">
                <div class="col-md-12 portfolio-item">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" data-toggle="tab" href="#nav-profile"><i class="bx bxs-basket"></i> &nbsp; Keranjang</a>
                            <a class="nav-item nav-link" data-toggle="tab" href="#nav-contact"><i class="bx bx-layer"></i> &nbsp; Riwayat Transaksi</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-profile">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive mt-5">
                                        <table class="table table-condensed text-center">
                                            <thead>
                                                <tr>
                                                    <th>{{-- <input type="checkbox" id="checkAll"> &nbsp; Semua --}}</th>
                                                    <th>Brand</th>
                                                    <th>Model</th>
                                                    <th>Jumlah</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(!empty($data))
                                                @foreach($data as $value)
                                                <tr>
                                                    <td><input type="checkbox" value="{{$value->id}}" class="check"></td>
                                                    <td>{{ucwords($value->brand)}}</td>
                                                    <td>{{$value->model}}</td>
                                                    <td>{{$value->jumlah}}</td>
                                                    <td>
                                                        <a href="javascript:void(0)" class="badge badge-primary edit" data-id="{{$value->id}}" data-unit="{{$value->unit}}">Ubah</a>
                                                        <a href="javascript:void(0)" class="badge badge-danger hapus" data-id="{{$value->id}}">Hapus</a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                @else
                                                <tr>
                                                    <td colspan="5">Belum ada data</td>
                                                </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="form-group text-center">
                                        <div class="zoom_img mt-4 mb-4"><button id="checkout" class="btn_round">Checkout</button></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-contact">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive mt-5">
                                        <table id="tabelRiwayat" class="table table-condensed text-center table-hover" width="100%">
                                        </table>
                                    </div>
                                </div>
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
    $('tbody').on('click', '.hapus', async function() {
        if (confirm('Apakah anda yakin? Data akan dihapus')) {
            var response = await $.post(location, {
                _token: '{{csrf_token()}}'
                , id: $(this).data('id')
                , method: 'delete'
            });
            if (response.status == 'success') {
                alert(response.msg);
                $(this).closest('tr').remove();
            }
        }
    });
    var selectedId = [];
    var selectedBrand = null;
    var jumlah_origin = [];
    var jumlah_temp = [];
    var aksi_temp;
    $('tbody').on('click', '.check', function() {
        var parent = $(this).closest('tr');
        if ($(this).is(':checked')) {
            var brand = parent.find('td').eq(1);
            if (selectedBrand === null) {
                selectedBrand = brand.html();
            }
            if (selectedBrand != brand.html()) {
                alert('Tidak dapat memilih brand yang berbeda');
                return false;
            }
            selectedId.push($(this).val());
        } else {
            var index = selectedId.indexOf($(this).val())
            selectedId.splice(index, 1);
            var check = $('tbody').find('.check:checked');
            if (check.length === 0) {
                selectedBrand = null;
            }
        }
    });
    $('tbody').on('click', '.edit', function() {
        var parent = $(this).closest('tr');
        var index = parent.index();
        var jumlah = parent.find('td').eq(3);
        var aksi = parent.find('td').eq(4);
        jumlah_origin[index] = jumlah_temp[index] = jumlah.html();
        aksi_temp = aksi.html();
        jumlah.html(`
            <div class="php-email-form">
                <div class="form-group row mb-0">
                    <input type="number" class="form-control jumlah" value="` + jumlah_temp[index] + `" name="jumlah" id="jumlah" placeholder="Jumlah" required autocomplete="off" maxlength="3" style="text-align:center;" />
                </div>
            </div>
        `);
        aksi.html(`
            <a href="javascript:void(0)" class="badge badge-primary save" data-id="` + $(this).data('id') + `" data-unit="` + $(this).data('unit') + `">Simpan</a>
            <a href="javascript:void(0)" class="badge badge-danger cancel">Batal</a>
        `);
    });
    $('tbody').on('change', '.jumlah', function() {
        var parent = $(this).closest('tr');
        var index = parent.index();
        var jumlah = parent.find('.jumlah');
        if (jumlah.val() < 0) jumlah.val(0);
        jumlah_temp[index] = jumlah.val();
    });
    $('tbody').on('click', '.save', async function() {
        var parent = $(this).closest('tr');
        var index = parent.index();
        var jumlah = parent.find('td').eq(3);
        var aksi = parent.find('td').eq(4);
        var response;
        if (jumlah_temp[index] == 0) {
            if (confirm('Apakah anda yakin? Data akan dihapus'))
                response = await $.post(location, {
                    _token: '{{csrf_token()}}'
                    , id: $(this).data('id')
                    , method: 'delete'
                });
            else return false;
        } else response = await $.post(location, {
            _token: '{{csrf_token()}}'
            , unit: $(this).data('unit')
            , jumlah: jumlah_temp[index]
            , method: 'post'
        });
        if (response.status == 'success') {
            alert(response.msg);
            if (jumlah_temp[index] == 0)
                $(this).closest('tr').remove();
            else {
                jumlah.html(jumlah_temp[index]);
                aksi.html(aksi_temp);
            }
        }
    });
    $('tbody').on('click', '.cancel', function() {
        var parent = $(this).closest('tr');
        var index = parent.index();
        var jumlah = parent.find('td').eq(3);
        var aksi = parent.find('td').eq(4);
        jumlah.html(jumlah_origin[index]);
        aksi.html(aksi_temp);
    });
    $('#checkout').on('click', function() {
        if (selectedId.length == 0) alert(`Silahkan pilih item`)
        else {
            var data = btoa(JSON.stringify(selectedId));
            location.replace(`{{route('transaksiCheckout',['kd'=>generateKode(4)])}}&brand=` + selectedBrand.toLowerCase() + `&query=` + data);
        }
    });

    var datatable = $('#tabelRiwayat').DataTable({
        processing: true
        , serverSide: true
        , order: []
        , responsive: true
        , language: {
            search: 'No. Transaksi :'
        }
        , ajax: {
            type: 'post'
            , url: location
            , data: function(data) {
                data.datatable = true;
                data._token = '{{csrf_token()}}'
            }
        }
        , columns: [{
            data: null
            , title: 'No'
            , width: 35
            , orderable: false
            , render: function(data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
            }
        , }, {
            data: 'kode'
            , title: 'No. Transaksi'
        , }, {
            data: 'item'
            , title: 'Jumlah'
        , }, {
            data: null
            , title: 'Uang Tanda Jadi'
            , searchable: false
            , render: function(data, type, row, meta) {
                var uangMuka = '';
                if (data.uangMuka != data.potongan) {
                    uangMuka = `<small style="color:#dc3545"><strike>IDR ` + data.uangMuka + `,-</strike></small> `
                }
                return uangMuka + `IDR ` + data.potongan + `,-`;
            }
        , }, {
            data: null
            , title: 'Status Pembayaran'
            , searchable: false
            , render: function(data, type, row, meta) {
                if (data.status == 0) {
                    return `<a href="javascript:void(0)" class="badge badge-warning">Tertunda</a>`
                } else if (data.status == 1) {
                    return `<a href="javascript:void(0)" class="badge badge-info">Menunggu verifikasi</a>`
                } else if (data.status == 2) {
                    return `<a href = "javascript:void(0)" class="badge badge-success">Terverifikasi</a>`
                } else {
                    return `<a href = "javascript:void(0)" class="badge badge-danger">Verifikasi gagal</a>`
                }
            }
        , }, ]
    , });

    $('#tabelRiwayat').on('click', 'tr', function() {
        var inv = $(this).find('td').eq(1);
        if (inv.html() !== undefined) {
            var data = btoa(JSON.stringify([inv.html()]));
            location.replace(`{{route('transaksiRiwayat')}}?kdinvdg=` + data);
        }
    });

</script>
@endsection
