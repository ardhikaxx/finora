@extends('layouts.app')
@section('title', 'Tambah Akun - FINORA')
@section('page-title', 'Tambah Akun')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card card-custom animate-fade-in">
            <div class="card-header">
                <div class="d-flex align-items-center gap-2">
                    <div class="avatar avatar-primary">
                        <i class="fas fa-plus-circle"></i>
                    </div>
                    <span>Form Tambah Akun</span>
                </div>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('accounts.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label-custom">Nomor Akun <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-custom" name="account_number" placeholder="Contoh: 1101" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label-custom">Nama Akun <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-custom" name="account_name" placeholder="Masukkan nama akun" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label-custom">Jenis Akun <span class="text-danger">*</span></label>
                        <select class="form-select form-select-custom" name="account_type" required>
                            <option value="">Pilih Jenis Akun</option>
                            <option value="asset">Aktiva</option>
                            <option value="liability">Kewajiban</option>
                            <option value="equity">Ekuitas</option>
                            <option value="revenue">Pendapatan</option>
                            <option value="expense">Beban</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="form-label-custom">Akun Induk</label>
                        <select class="form-select form-select-custom" name="parent_account_id">
                            <option value="">Tidak Ada</option>
                            @foreach($parentAccounts as $account)
                            <option value="{{ $account->id }}">{{ $account->account_number }} - {{ $account->account_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary-custom">
                            <i class="fas fa-save"></i> Simpan
                        </button>
                        <a href="{{ route('accounts.index') }}" class="btn btn-secondary-custom">
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
                    <span>Petunjuk</span>
                </div>
            </div>
            <div class="card-body">
                <ul class="list-unstyled small text-muted">
                    <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Nomor akun harus unik</li>
                    <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Pilih jenis akun yang sesuai</li>
                    <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Akun induk bersifat opsional</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
