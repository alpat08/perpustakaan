@extends(Auth::user()->role === 'admin' ? 'layouts.admin' : 'layouts.main')

@section('container')
    <div class="container mt-4">
        <div class="row justify-content-center mt-4">
            @if (Auth::user()->role === 'admin')
                @foreach ($ceritas as $item)
                    <h5>{{ $item->isi }}</h5>
                @endforeach
                <a href="{{ route('buku.index') }}" class="btn btn-secondary">Kembali</a>
            @else
                @foreach ($ceritas as $item)
                    <h5>{{ $item->isi }}</h5>
                @endforeach
                <a href="{{ route('siswa-pinjam') }}" class="btn btn-secondary w-auto me-auto">Kembali</a>
            @endif
        </div>
    </div>
@endsection
