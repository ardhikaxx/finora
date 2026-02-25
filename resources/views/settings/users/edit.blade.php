@extends('layouts.app')
@section('title', 'Edit Pengguna - FINORA')
@section('page-title', 'Edit Pengguna')

@section('content')
<div class="card card-custom">
    <div class="card-header">
        <div class="d-flex align-items-center gap-2">
            <div class="avatar avatar-warning">
                <i class="fas fa-user-edit"></i>
            </div>
            <span>Edit Pengguna</span>
        </div>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('users.update', $user->id) }}">
            @csrf @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label-custom">Nama</label>
                    <input type="text" class="form-control form-control-custom @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}" required>
                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label-custom">Email</label>
                    <input type="email" class="form-control form-control-custom @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}" required>
                    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label-custom">Kata Sandi (kosongkan jika tidak ingin mengubah)</label>
                    <div class="input-group">
                        <input type="password" class="form-control form-control-custom" name="password" id="password">
                        <button type="button" class="btn btn-outline-secondary" onclick="togglePassword('password', 'togglePasswordIcon')">
                            <i class="fas fa-eye" id="togglePasswordIcon"></i>
                        </button>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label-custom">Peran</label>
                    <select class="form-control form-control-custom" name="role_id">
                        <option value="">Pilih Peran</option>
                        @foreach($roles as $role)
                        <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary-custom">
                    <i class="fas fa-save"></i> Update
                </button>
                <a href="{{ route('users.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-times"></i> Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
