@extends('layouts.template')
@section('content')

<section id="schedules" class="schedule section-padding">
    <div class="container" style="margin-top: 50px;">
        <div class="row">
            <div class="col-12">
                <div class="text-center" style="margin-bottom: 30px;">
                    <h4 class="wow fadeInUp" data-wow-delay="0.2s">PROSEDUR LELANG</h4>
                </div>
            </div>
        </div>
        <div class="schedule-area row wow fadeInDown" data-wow-delay="0.3s">
            <div class="schedule-tab-title col-md-3 col-lg-3 col-xs-12">
                <div class="table-responsive">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="monday-tab" data-toggle="tab" href="#monday" role="tab"
                                aria-controls="monday" aria-expanded="true">
                                <div class="item-text">
                                    <h4>Prosedur Mengikuti Lelang</h4>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tuesday-tab" data-toggle="tab" href="#tuesday" role="tab"
                                aria-controls="tuesday">
                                <div class="item-text">
                                    <h4>Prosedur Pengajuan Pelelang</h4>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="wednesday-tab" data-toggle="tab" href="#wednesday" role="tab"
                                aria-controls="wednesday">
                                <div class="item-text">
                                    <h4>Prosedur Pengajuan Barang</h4>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="thursday-tab" data-toggle="tab" href="#thursday" role="tab"
                                aria-controls="thursday">
                                <div class="item-text">
                                    <h4>Prosedur Pemilihan Pemenang Lelang Barang</h4>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="schedule-tab-content col-md-9 col-lg-9 col-xs-12 clearfix">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="monday" role="tabpanel" aria-labelledby="monday-tab">
                        <div id="accordion">
                            <div class="card">
                                <div id="headingOne">
                                    <div class="collapsed card-header" data-toggle="collapse" data-target="#collapseOne"
                                        aria-expanded="false" aria-controls="collapseOne">
                                        <div class="images-box">
                                            <img class="img-fluid" src="assets/img/one.png" alt="">
                                        </div>
                                        <h4 style="margin-top: 10px;">Prosedur Mengikuti Lelang</h4>
                                    </div>
                                </div>
                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                    data-parent="#accordion">
                                    <div class="card-body">
                                        <p>Peserta lelang dapat mengikuti lelang barang jika sudah mempunyai akun, jika tidak mempunyai akun maka peserta tidak bisa mengikuti lelang. Peserta diharapkan mengikuti lelang sesuai nominal dan kelipatan dari barang lelang.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div id="headingTwo">
                                    <div class="collapsed card-header" data-toggle="collapse" data-target="#collapseTwo"
                                        aria-expanded="false" aria-controls="collapseTwo">
                                        <div class="images-box">
                                            <img class="img-fluid" src="assets/img/two.png" alt="">
                                        </div>
                                        <h4 style="margin-top: 10px;">Prosedur Menang Lelang</h4>
                                    </div>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                    data-parent="#accordion">
                                    <div class="card-body">
                                        <p>Jika peserta menang dalam lelang barang, peserta diharapkan melakukan pembayaran pada menu transaksi. Peserta diharapkan melakukan pembayaran 1 x 24, jika peserta melewati waktu pembayaran maka transaksi dianggap gagal.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tuesday" role="tabpanel" aria-labelledby="tuesday-tab">
                        <div id="accordion2">
                            <div class="card">
                                <div id="headingOne1">
                                    <div class="collapsed card-header" data-toggle="collapse"
                                        data-target="#collapseOne1" aria-expanded="false" aria-controls="collapseOne1">
                                        <div class="images-box">
                                            <img class="img-fluid" src="assets/img/one.png" alt="">
                                        </div>
                                        <h4 style="margin-top: 10px;">Prosedur 1</h4>
                                    </div>
                                </div>
                                <div id="collapseOne1" class="collapse show" aria-labelledby="headingOne1"
                                    data-parent="#accordion2">
                                    <div class="card-body">
                                        <p>Silahkan masuk pada menu Pengajuan Lelang. Lalu user diharapkan memasukan beberapa data seperti nama bank, nomer rekening dan foto muka pribadi. Diharapkan user memasukan data dengan benar karena nomer rekening digunakan untuk transaksi.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div id="headingTwo2">
                                    <div class="collapsed card-header" data-toggle="collapse"
                                        data-target="#collapseTwo2" aria-expanded="false" aria-controls="collapseTwo2">
                                        <div class="images-box">
                                            <img class="img-fluid" src="assets/img/two.png" alt="">
                                        </div>
                                        <h4 style="margin-top: 10px;">Prosedur 2</h4>
                                    </div>
                                </div>
                                <div id="collapseTwo2" class="collapse" aria-labelledby="headingTwo2"
                                    data-parent="#accordion2">
                                    <div class="card-body">
                                        <p>Jika user memasukan data yang tidak benar maka admin akan menolak pengajuan</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="wednesday" role="tabpanel" aria-labelledby="wednesday-tab">
                        <div id="accordion3">
                            <div class="card">
                                <div id="headingOne3">
                                    <div class="collapsed card-header" data-toggle="collapse"
                                        data-target="#collapseOne3" aria-expanded="false" aria-controls="collapseOne3">
                                        <div class="images-box">
                                            <img class="img-fluid" src="assets/img/one.png" alt="">
                                        </div>
                                        <h4 style="margin-top: 10px;">Pengajuan Barang</h4>
                                    </div>
                                </div>
                                <div id="collapseOne3" class="collapse show" aria-labelledby="headingOne3"
                                    data-parent="#accordion3">
                                    <div class="card-body">
                                        <p>Pelelang dapat mengajukan barang untuk dilelang pada menu Pengajuan Lelang Barang. Pelelang diharapkan mengisi beberapa data untuk pengajuan lelang barang. Diharapkan pelelang mengisi data dengan benar.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div id="headingTwo3">
                                    <div class="collapsed card-header" data-toggle="collapse"
                                        data-target="#collapseTwo3" aria-expanded="false" aria-controls="collapseTwo3">
                                        <div class="images-box">
                                            <img class="img-fluid" src="assets/img/two.png" alt="">
                                        </div>
                                        <h4 style="margin-top: 10px;">Pengajuan Barang Ditolak</h4>
                                    </div>
                                </div>
                                <div id="collapseTwo3" class="collapse" aria-labelledby="headingTwo3"
                                    data-parent="#accordion3">
                                    <div class="card-body">
                                        <p>Jika pengajuan barang ditolak, maka data yang anda masukan tidak benar. Silahkan masukan data dengan benar!.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div id="headingThree3">
                                    <div class="collapsed card-header" data-toggle="collapse"
                                        data-target="#collapseThree3" aria-expanded="false"
                                        aria-controls="collapseThree3">
                                        <div class="images-box">
                                            <img class="img-fluid" src="assets/img/three.png" alt="">
                                        </div>
                                        <h4 style="margin-top: 10px;">Pengajuan Barang Diterima</h4>
                                    </div>
                                </div>
                                <div id="collapseThree3" class="collapse" aria-labelledby="headingThree3"
                                    data-parent="#accordion3">
                                    <div class="card-body">
                                        <p>Pelelang barang hanya 1 x 24 jam, jika melebihi waktuk yang ditentukan dan tidak ada peserta lelang maka dianggap barang tidak bisa melanjutkan ke transaksi.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="thursday" role="tabpanel" aria-labelledby="thursday-tab">
                        <div id="accordion4">
                            <div class="card">
                                <div id="headingOne">
                                    <div class="collapsed card-header" data-toggle="collapse"
                                        data-target="#collapseOne4" aria-expanded="false" aria-controls="collapseOne4">
                                        <div class="images-box">
                                            <img class="img-fluid" src="assets/img/one.png" alt="">
                                        </div>
                                        <h4 style="margin-top: 10px;">Prosedur 1</h4>
                                    </div>
                                </div>
                                <div id="collapseOne4" class="collapse show" aria-labelledby="headingOne"
                                    data-parent="#accordion4">
                                    <div class="card-body">
                                        <p>Pelelang dapat memilih pemenang pada menu Riwayat Lelang Barang. Lalu peserta yang menang dalam lelang dapat melakukan transaksi selama 1 x 24 jam.</p>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="card">
                                <div id="headingTwo">
                                    <div class="collapsed card-header" data-toggle="collapse"
                                        data-target="#collapseTwo4" aria-expanded="false" aria-controls="collapseTwo4">
                                        <div class="images-box">
                                            <img class="img-fluid" src="assets/img/two.png" alt="">
                                        </div>
                                        <h4 style="margin-top: 10px;">Prosedur 1</h4>
                                    </div>
                                </div>
                                <div id="collapseTwo4" class="collapse" aria-labelledby="headingTwo"
                                    data-parent="#accordion4">
                                    <div class="card-body">
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis quo et enim voluptatibus dignissimos, molestiae quaerat, totam architecto numquam nam optio. Optio in consequatur excepturi vitae quibusdam magni sit sapiente.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div id="headingThree4">
                                    <div class="collapsed card-header" data-toggle="collapse"
                                        data-target="#collapseThree4" aria-expanded="false"
                                        aria-controls="collapseThree4">
                                        <div class="images-box">
                                            <img class="img-fluid" src="assets/img/three.png" alt="">
                                        </div>
                                        <h4 style="margin-top: 10px;">Prosedur 1</h4>
                                    </div>
                                </div>
                                <div id="collapseThree4" class="collapse" aria-labelledby="headingThree"
                                    data-parent="#accordion4">
                                    <div class="card-body">
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore tempore asperiores sed suscipit commodi impedit reiciendis fuga modi labore ab magnam ipsa perferendis, itaque nostrum aperiam rem unde recusandae ratione.</p>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection