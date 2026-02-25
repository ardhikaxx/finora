@extends('layouts.app')
@section('title', 'Tambah Pengguna - FINORA')
@section('page-title', 'Tambah Pengguna')

@section('content')
<div class="card card-custom">
    <div class="card-header">
        <div class="d-flex align-items-center gap-2">
            <div class="avatar avatar-primary">
                <i class="fas fa-user-plus"></i>
            </div>
            <span>Tambah Pengguna Baru</span>
        </div>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('users.store') }}">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label-custom">Nama</label>
                    <input type="text" class="form-control form-control-custom @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required>
                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label-custom">Email</label>
                    <input type="email" class="form-control form-control-custom @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>
                    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label-custom">Kata Sandi</label>
                    <div class="input-group">
                        <input type="password" class="form-control form-control-custom @error('password') is-invalid @enderror" name="password" id="password" required>
                        <button type="button" class="btn btn-outline-secondary" onclick="togglePassword('password', 'togglePasswordIcon')">
                            <i class="fas fa-eye" id="togglePasswordIcon"></i>
                        </button>
                    </div>
                    @error('password') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label-custom">Peran</label>
                    <select class="form-control form-control-custom @error('role_id') is-invalid @enderror" name="role_id">
                        <option value="">Pilih Peran</option>
                        @foreach($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                    @error('role_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label-custom">Karyawan (Opsional)</label>
                <select class="form-control form-control-custom" name="employee_id">
                    <option value="">Pilih Karyawan</option>
                    @foreach($employees as $employee)
                    <option value="{{ $employee->id }}">{{ $employee->full_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary-custom">
                    <i class="fas fa-save"></i> Simpan
                </button>
                <a href="{{ route('users.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-times"></i> Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
