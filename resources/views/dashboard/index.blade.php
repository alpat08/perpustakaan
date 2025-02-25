@extends('layouts.main')

@section('container')
<div class="card rounded-4 p-3 shadow">
    <div class="card-body">
        <div class="d-flex justify-content-between">
            <div class="items">
                <h1 data-aos="zoom-in-up" class="fw-bold">The Book</h1>
                <h4 data-aos="zoom-in-up" class="mt-5"># A knowledgeable person will never feel satisfied because the more they know, the more they realize how little they understand</h4>
                <h4 data-aos="zoom-in-up" class="mt-5"># Knowledge is like water; it seeks low places. Those who are humble will always be filled with wisdom</h4>
                <h4 data-aos="zoom-in-up" class="mt-5"># Do not feel superior because of knowledge, for even the vast sky has limits, while knowledge does not</h4>
            </div>
            <div class="items">
                <img data-aos="zoom-in-up" class="" src="{{ asset('img/lovepik-stacked-books-png-image_401308409_wh1200-removebg-preview.png') }}" alt="">
            </div>
        </div>
            <div class="d-flex gap-3 justify-content-center text-decoration-none">
                <a data-aos="zoom-in-up" href=""><div class="bg-primary bg-gradient text-center align-content-center my-2" style="width: 15rem;height: 10rem;">
                    <h4 class="text-light">Fisika</h4>
                </div></a>
                <a data-aos="zoom-in-up" href=""><div class="bg-info text-center align-content-center my-2" style="width: 15rem;height: 10rem;">
                    <h4 class="text-light">Matematika</h4>
                </div></a>
                <a data-aos="zoom-in-up" href=""><div class="bg-primary bg-gradient text-center align-content-center my-2" style="width: 15rem;height: 10rem;">
                    <h4 class="text-light">IPS</h4>
                </div></a>
                <a data-aos="zoom-in-up" href=""><div class="bg-info text-center align-content-center my-2" style="width: 15rem;height: 10rem;">
                    <h4 class="text-light">Al-Islam</h4>
                </div></a>
            </div>
            <div class="d-flex gap-3 justify-content-center text-decoration-none">
                <a data-aos="zoom-in-up" href=""><div class="bg-primary bg-gradient text-center align-content-center my-2" style="width: 15rem;height: 10rem;">
                    <h4 class="text-light">Fikih</h4>
                </div></a>
                <a data-aos="zoom-in-up" href=""><div class="bg-info text-center align-content-center my-2" style="width: 15rem;height: 10rem;">
                    <h4 class="text-light">IPA</h4>
                </div></a>
                <a data-aos="zoom-in-up" href=""><div class="bg-primary bg-gradient text-center align-content-center my-2" style="width: 15rem;height: 10rem;">
                    <h4 class="text-light">PJOK</h4>
                </div></a>
                <a data-aos="zoom-in-up" href=""><div class="bg-info text-center align-content-center my-2" style="width: 15rem;height: 10rem;">
                    <h4 class="text-light">Qur'an Hadist</h4>
                </div></a>
            </div>
            <div class="row" style="width: 75rem">
                <div data-aos="zoom-in-up" class="col-4 my-4">
                    <div class="d-flex">
                        <img class="rounded" style="max-width: 200px" src="https://th.bing.com/th/id/OIP.5ZTNAhxLvZ8CfgYAHwBZfwAAAA?rs=1&pid=ImgDetMain" alt="">
                        <div class="d-inline container">
                            <h4 class="fw-bold">Judul Buku</h4>
                            <hr>
                            <h5 class="fw-bold">Nama Author</h5>
                            <p>{{ Str::limit('Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea rerum omnis quidem veniam cum dolorem est. Eius odit unde facere, officiis, molestiae aperiam, dolore ad numquam vitae aliquid quibusdam minima.','85') }}</p>
                            <a href="" class="btn btn-sm btn-primary">Show</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection