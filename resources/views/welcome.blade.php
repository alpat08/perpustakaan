@extends('layouts.main')

@section('container')
<div class="container my-5">
    <div class="img-header" data-aos="zoom-in">
        <img class="imgg" src="https://image.tmdb.org/t/p/original/iTxYM1DnCBERLkMPCi1RWJ8GIHh.jpg" alt="Header Image">
    </div>
    <h1 class="text-center mb-4 fw-bold text-primary" data-aos="zoom-in"><i class="bi bi-book-half"></i> Koleksi Buku Terbaik untuk Anda</h1>
    <p class="text-center text-muted" data-aos="zoom-in">📚 "Membaca adalah jendela dunia, satu halaman bisa mengubah hidup Anda."</p>
    
    <div class="row">
        @foreach($books as $book)
        <div class="col-lg-4 col-md-6 mb-4" data-aos="zoom-in">
            <div class="card shadow-lg border-0 rounded hover-effect">
                <div class="image-container">
                    <img class="card-img-top" src="{{ asset('storage/'. $book->image) }}" alt="{{ $book->title }}">
                </div>
                <div class="card-body text-center">
                    <h5 class="card-title text-dark fw-bold"><i class="bi bi-book"></i> {{ $book->title }}</h5>
                    <p class="card-text text-muted">{{ Str::limit($book->description, 100) }}</p>
                    <a href="{{ route('show', $book->id) }}" class="btn btn-primary"><i class="bi bi-eye"></i> Baca Selengkapnya</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Motivational Blog Section -->
<div class="container text-center my-5">
    <div class="row">
        <div class="col-md-6 mb-3" data-aos="zoom-in">
            <blockquote class="blockquote text-muted">
                <h4 class="fw-bold mb-3">Nelson Mandela</h4>
                "Pendidikan adalah senjata paling ampuh yang dapat Anda gunakan untuk mengubah dunia."
            </blockquote>
            <blockquote class="blockquote text-muted">
                <h4 class="fw-bold mb-3">John Wooden</h4>
                "Jangan biarkan apa yang tidak bisa Anda lakukan mengganggu apa yang bisa Anda lakukan."
            </blockquote>
        </div>
        <div class="col-md-6 mb-3" data-aos="zoom-in">
            <blockquote class="blockquote text-muted">
                <h4 class="fw-bold mb-3">Winston Churchill</h4>
                "Kesuksesan bukanlah akhir, kegagalan bukanlah fatal: yang terpenting adalah keberanian untuk terus melangkah."
            </blockquote>
            <blockquote class="blockquote text-muted">
                <h4 class="fw-bold mb-3">Anonim</h4>
                "Lakukan sesuatu hari ini yang akan membuat diri Anda di masa depan berterima kasih."
            </blockquote>
        </div>
    </div>
</div>

<div class="container text-center my-5">
    <h2 class="fw-bold text-primary" data-aos="zoom-in"><i class="bi bi-envelope"></i> Contact Me</h2>
    <p class="text-muted" data-aos="zoom-in">Jika Anda memiliki pertanyaan atau ingin berkolaborasi, jangan ragu untuk menghubungi saya.</p>
    <a href="mailto:contact@perpustakaan.com" data-aos="zoom-in" class="btn btn-success"><i class="bi bi-send"></i> Kirim Email</a>
    <div class="social-links mt-3">
        <a href="https://www.facebook.com" data-aos="zoom-in" class="btn btn-primary me-2"><i class="bi bi-facebook"></i> Facebook</a>
        <a href="https://www.instagram.com" data-aos="zoom-in" class="btn btn-danger me-2"><i class="bi bi-instagram"></i> Instagram</a>
        <a href="https://www.twitter.com" data-aos="zoom-in" class="btn btn-info me-2"><i class="bi bi-twitter"></i> Twitter</a>
        <a href="https://wa.me/1234567890" data-aos="zoom-in" class="btn btn-success"><i class="bi bi-whatsapp"></i> WhatsApp</a>
    </div>
</div>

<footer class="bg-dark text-white text-center py-3 mt-5">
    <p class="mb-0">&copy; 2025 Perpustakaan Digital. All Rights Reserved.</p>
</footer>

<style>
.img-header {
    height: 300px;
    overflow: hidden;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}
.imgg {
    width: 100%;
    object-fit: cover;
    object-position: center;
    filter: brightness(80%);
    transition: 0.3s;
}
.imgg:hover {
    filter: brightness(100%);
}
.image-container {
    height: 300px;
    overflow: hidden;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
}
.card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.card-img-top {
    width: 100%;
    object-fit: cover;
    object-position: center;
    transition: transform 0.3s ease-in-out;
}
.card:hover .card-img-top {
    transform: scale(1.1);
}
.hover-effect:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}
.card-body {
    background-color: #f8f9fa;
    border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px;
}
.card-title {
    font-size: 1.25rem;
}
.card-text {
    font-size: 0.9rem;
}
.btn-primary {
    background-color: #007bff;
    border: none;
}
.btn-primary:hover {
    background-color: #0056b3;
}
footer {
    background-color: #343a40;
}
</style>
@endsection