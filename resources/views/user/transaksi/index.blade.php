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
    .form-control[readonly] {
        background-color: #fff;
    }

    .error {
        color: red;
        padding-top: 5px;
        margin: 0;
        font-size: 10pt;
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
                                                    <th><input type="checkbox" id="checkAll"> &nbsp; Semua</th>
                                                    <th>Brand</th>
                                                    <th>Model</th>
                                                    <th>Jumlah</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(!empty($data->cart))
                                                @foreach($data->cart as $value)
                                                <tr>
                                                    <td><input type="checkbox" value="{{$value->id}}" class="check"></td>
                                                    <td>{{ucwords($value->brand)}}</td>
                                                    <td>{{$value->model}}</td>
                                                    <td>{{$value->jumlah}}</td>
                                                    <td>
                                                        <a href="javascript:void(0)" class="badge badge-primary edit" data-id="{{$value->id}}" data-unit="{{$value->unit}}">Edit</a>
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
                                        <table class="table table-condensed text-center">
                                            <thead>
                                                <tr>
                                                    <th>No. Transaksi</th>
                                                    <th>Jumlah</th>
                                                    <th>Uang Tanda Jadi</th>
                                                    <th>Status Pembayaran</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(!empty($data->riwayat))
                                                @foreach($data->riwayat as $value)
                                                <tr>
                                                    <td>{{$value->kode}}</td>
                                                    <td>{{$value->item}}</td>
                                                    <td>IDR {{formatRupiah($value->uang_muka)}},-</td>
                                                    <td>{!!$value->status == 0
                                                        ?'<a href="javascript:void(0)" class="badge badge-warning">Belum Lunas</a>'
                                                        :'<a href="javascript:void(0)" class="badge badge-success">Lunas</a>'!!}</td>
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
            var data = await $.post(location, {
                _token: '{{csrf_token()}}'
                , id: $(this).data('id')
                , method: 'delete'
            });
            data = JSON.parse(data);
            if (data.status == 'success') {
                alert(data.msg);
                $(this).closest('tr').remove();
            }
        }
    });
    var selectedId = [];
    var jumlah_origin = [];
    var jumlah_temp = [];
    var aksi_temp;
    $('#checkAll').on('click', function() {
        var rows = $('tbody').find('.check');
        selectedId.length = 0;
        if ($(this).is(':checked')) {
            $.each(rows, function() {
                $(this).prop('checked', true);
                selectedId.push($(this).val());
            });
        } else {
            selectedId.length = 0;
            $.each(rows, function() {
                $(this).prop('checked', false);
            });
        }
    })
    $('tbody').on('click', '.check', function() {
        if ($(this).is(':checked')) {
            var check = $('tbody').find('.check').not(':checked');
            selectedId.push($(this).val());
            if (check.length == 0)
                $('#checkAll').prop('checked', true);
        } else {
            var index = selectedId.indexOf($(this).val())
            selectedId.splice(index, 1);
            $('#checkAll').prop('checked', false);
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
            <form class="php-email-form editform">
                <div class="form-group row mb-0">
                    <input type="number" class="form-control jumlah" value="` + jumlah_temp[index] + `" name="jumlah" id="jumlah" placeholder="Jumlah" required autocomplete="off" maxlength="3" style="text-align:center;" />
                </div>
            </form>
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
        var data;
        if (jumlah_temp[index] == 0) {
            if (confirm('Apakah anda yakin? Data akan dihapus'))
                data = await $.post(location, {
                    _token: '{{csrf_token()}}'
                    , id: $(this).data('id')
                    , method: 'delete'
                });
            else return false;
        } else data = await $.post(location, {
            _token: '{{csrf_token()}}'
            , unit: $(this).data('unit')
            , jumlah: jumlah_temp[index]
            , method: 'post'
        });
        data = JSON.parse(data);
        if (data.status == 'success') {
            alert(data.msg);
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
            location.replace(`{{route('transaksiCheckout',['kd'=>generateKode(4)])}}&query=` + data);
        }
    });

</script>
@endsection
