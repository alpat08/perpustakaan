@extends('layouts.main')

@section('container')
    <div class="d-flex gap-3 justify-content-center text-decoration-none">
        <a href=""><div class="bg-primary bg-gradient text-center align-content-center my-3" style="width: 15rem;height: 10rem;">
            <h4 class="text-light">Adventure</h4>
        </div></a>
        <a href=""><div class="bg-info text-center align-content-center my-3" style="width: 15rem;height: 10rem;">
            <h4 class="text-light">Adventure</h4>
        </div></a>
        <a href=""><div class="bg-primary bg-gradient text-center align-content-center my-3" style="width: 15rem;height: 10rem;">
            <h4 class="text-light">Adventure</h4>
        </div></a>
        <a href=""><div class="bg-info text-center align-content-center my-3" style="width: 15rem;height: 10rem;">
            <h4 class="text-light">Adventure</h4>
        </div></a>
    </div>
    <div class="card rounded-4 p-3 shadow">
        <div class="card-body">
            <div class="row" style="width: 75rem">
                <div class="col-4 my-4">
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