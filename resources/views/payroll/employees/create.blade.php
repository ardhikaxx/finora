@extends('layouts.app')
@section('title', 'Tambah Karyawan - FINORA')
@section('page-title', 'Tambah Karyawan')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card card-custom animate-fade-in">
            <div class="card-header">
                <div class="d-flex align-items-center gap-2">
                    <div class="avatar avatar-primary">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <span>Form Tambah Karyawan</span>
                </div>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('employees.store') }}">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label-custom">Nama Depan</label>
                            <input type="text" class="form-control form-control-custom @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" placeholder="Masukkan nama depan" required>
                            @error('first_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label-custom">Nama Belakang</label>
                            <input type="text" class="form-control form-control-custom @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" placeholder="Masukkan nama belakang" required>
                            @error('last_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="row g-3 mt-2">
                        <div class="col-md-6">
                            <label class="form-label-custom">Tanggal Lahir</label>
                            <input type="date" class="form-control form-control-custom" name="date_of_birth" value="{{ old('date_of_birth') }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label-custom">Jenis Kelamin</label>
                            <select class="form-select form-select-custom" name="gender">
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="male">Laki-laki</option>
                                <option value="female">Perempuan</option>
                                <option value="other">Lainnya</option>
                            </select>
                        </div>
                    </div>
                    <div class="row g-3 mt-2">
                        <div class="col-md-6">
                            <label class="form-label-custom">Nomor Telepon</label>
                            <input type="text" class="form-control form-control-custom" name="phone_number" value="{{ old('phone_number') }}" placeholder="Masukkan nomor telepon">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label-custom">Tanggal Masuk <span class="text-danger">*</span></label>
                            <input type="date" class="form-control form-control-custom @error('hire_date') is-invalid @enderror" name="hire_date" value="{{ old('hire_date') }}" required>
                            @error('hire_date') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="mt-3">
                        <label class="form-label-custom">Alamat</label>
                        <textarea class="form-control form-control-custom" name="address" rows="2" placeholder="Masukkan alamat">{{ old('address') }}</textarea>
                    </div>
                    <div class="row g-3 mt-2">
                        <div class="col-md-6">
                            <label class="form-label-custom">Jabatan <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-custom @error('job_title') is-invalid @enderror" name="job_title" value="{{ old('job_title') }}" placeholder="Masukkan jabatan" required>
                            @error('job_title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label-custom">Departemen</label>
                            <select class="form-select form-select-custom" name="department_id">
                                <option value="">Pilih Departemen</option>
                                @foreach($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row g-3 mt-2">
                        <div class="col-md-6">
                            <label class="form-label-custom">Struktur Gaji</label>
                            <select class="form-select form-select-custom" name="salary_structure_id">
                                <option value="">Pilih Struktur Gaji</option>
                                @foreach($salaryStructures as $structure)
                                <option value="{{ $structure->id }}">{{ $structure->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label-custom">Status <span class="text-danger">*</span></label>
                            <select class="form-select form-select-custom @error('status') is-invalid @enderror" name="status" required>
                                <option value="active">Aktif</option>
                                <option value="inactive">Nonaktif</option>
                                <option value="terminated">Berhenti</option>
                            </select>
                        </div>
                    </div>
                    <div class="d-flex gap-2 mt-4 pt-2">
                        <button type="submit" class="btn btn-primary-custom">
                            <i class="fas fa-save"></i> Simpan Karyawan
                        </button>
                        <a href="{{ route('employees.index') }}" class="btn btn-secondary-custom">
                            <i class="fas fa-times"></i> Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card card-custom animate-fade-in animate-delay-1">
            <div class="card-header">
                <div class="d-flex align-items-center gap-2">
                    <div class="avatar avatar-info">
                        <i class="fas fa-info-circle"></i>
                    </div>
                    <span>Informasi</span>
                </div>
            </div>
            <div class="card-body">
                <p class="text-muted small mb-3">Isi formulir di samping untuk menambahkan karyawan baru ke sistem.</p>
                <ul class="list-unstyled small text-muted">
                    <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Field dengan tanda * wajib diisi</li>
                    <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Pastikan data karyawan valid</li>
                    <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Email harus unik dalam sistem</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
