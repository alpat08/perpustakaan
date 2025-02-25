@extends('layouts.admin')

@section('container')
    <div class="card rounded-4 shadow-sm p-3">
        <div class="card-body">
            <h4 class="card-title">Edit User</h4>

            <form action="{{route('user.update', $user->id)}}" method="post">
                @csrf
                @method('put')

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text"  value="{{old('name', $user->name)}}" class="form-control @error('name') is-invalid @enderror" name="name" id="name" />
                    @error('name')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" value="{{old('email', $user->email)}}" class="form-control @error('email') is-invalid @enderror" name="email" id="email" />
                    @error('email')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                        id="password" />
                </div>

                <div class="mb-3">
                    <label for="role" class="form-label">Role</label>
                    <select class="form-select @error('role') is-invalid @enderror" name="role" id="role">
                        <option selected disabled>Select one</option>
                        <option value="guru">Guru</option>
                        <option value="siswa">Siswa</option>
                        @error('role')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </select>
                </div>

                <a href="{{route('user.index')}}" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>

@endsection