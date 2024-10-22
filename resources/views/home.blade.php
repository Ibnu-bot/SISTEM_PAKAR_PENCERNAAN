@extends('layouts.app')

@section('content')
    <!-- banner section start -->
    <div class="banner_section layout_padding" id="home">
        <div class="container">
            <section class="slide-wrapper">
                <div class="container">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <h1 class="yoga_text">SISPAKCER</h1>
                                <p class="body_text">Sistem Pakar Diagnosis Penyakit Pencernaan</p>
                                <p class="contrary_text">Mari Cek Kesehatan Pencernaanmu Dengan Aplikasi Ini dan Jaga
                                    Pola Hidup Untuk Kesehatanmu Dimasa Depan Nanti</p>
                                <div class="contact_bt">
                                    <a href="{{ route('user.form.pasien') }}" class="btn btn-primary">Cek Diagnosis</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- banner section end -->
@endsection
