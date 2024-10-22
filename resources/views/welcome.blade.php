@extends('layouts.app')
@section('content')
    <div class="banner_section layout_padding">
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
                                <div class="contact_bt"><a href="{{ route('login') }}">Cek Diagnosis</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    
@endsection
