@extends('layouts.app')
@section('title', 'Bagan Akun - FINORA')
@section('page-title', 'Bagan Akun')

@section('content')
<div class="row mb-4">
    <div class="col-md-8">
        <form method="GET">
            <div class="d-flex gap-2">
                <div class="search-box flex-grow-1">
                    <i class="fas fa-search search-icon"></i>
                    <input type="text" class="form-control form-control-custom" name="search" placeholder="Cari akun..." value="{{ request('search') }}">
                </div>
                <select class="form-select form-select-custom" name="account_type" style="width: 180px;">
                    <option value="">Semua Jenis</option>
                    <option value="asset" {{ request('account_type') === 'asset' ? 'selected' : '' }}>Aktiva</option>
                    <option value="liability" {{ request('account_type') === 'liability' ? 'selected' : '' }}>Kewajiban</option>
                    <option value="equity" {{ request('account_type') === 'equity' ? 'selected' : '' }}>Ekuitas</option>
                    <option value="revenue" {{ request('account_type') === 'revenue' ? 'selected' : '' }}>Pendapatan</option>
                    <option value="expense" {{ request('account_type') === 'expense' ? 'selected' : '' }}>Beban</option>
                </select>
                <button type="submit" class="btn btn-primary-custom">
                    <i class="fas fa-filter"></i> Filter
                </button>
            </div>
        </form>
    </div>
    <div class="col-md-4 text-md-end mt-3 mt-md-0">
        <a href="{{ route('accounts.create') }}" class="btn btn-primary-custom">
            <i class="fas fa-plus-circle"></i> Tambah Akun
        </a>
    </div>
</div>

<div class="card card-custom">
    <div class="card-header">
        <div class="d-flex align-items-center gap-2">
            <div class="avatar avatar-primary">
                <i class="fas fa-book"></i>
            </div>
            <span>Daftar Akun</span>
        </div>
        <span class="badge badge-custom badge-processed">{{ $accounts->count() }} Akun</span>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-custom mb-0">
                <thead>
                    <tr>
                        <th>Nomor Akun</th>
                        <th>Nama Akun</th>
                        <th>Jenis</th>
                        <th>Akun Induk</th>
                        <th class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($accounts as $account)
                    <tr class="animate-fade-in" style="animation-delay: {{ $loop->index * 0.03 }}s;">
                        <td class="fw-bold" style="font-family: 'Courier New', monospace;">{{ $account->account_number }}</td>
                        <td>
                            <div class="d-flex align-items-center gap-3">
                                <div class="avatar 
                                    @if($account->account_type === 'asset') avatar-success
                                    @elseif($account->account_type === 'liability') avatar-danger
                                    @elseif($account->account_type === 'equity') avatar-info
                                    @elseif($account->account_type === 'revenue') avatar-warning
                                    @else avatar-primary @endif">
                                    <i class="fas fa-{{ $account->account_type === 'asset' ? 'box' : ($account->account_type === 'liability' ? 'credit-card' : ($account->account_type === 'revenue' ? 'arrow-up' : ($account->account_type === 'expense' ? 'arrow-down' : 'pie-chart'))) }}"></i>
                                </div>
                                <span class="fw-semibold">{{ $account->account_name }}</span>
                            </div>
                        </td>
                        <td>
                            @if($account->account_type === 'asset')
                            <span class="badge badge-custom badge-active">Aktiva</span>
                            @elseif($account->account_type === 'liability')
                            <span class="badge badge-custom badge-overdue">Kewajiban</span>
                            @elseif($account->account_type === 'equity')
                            <span class="badge badge-custom badge-processed">Ekuitas</span>
                            @elseif($account->account_type === 'revenue')
                            <span class="badge badge-custom badge-paid">Pendapatan</span>
                            @else
                            <span class="badge badge-custom badge-pending">Beban</span>
                            @endif
                        </td>
                        <td class="text-muted">{{ $account->parentAccount->account_name ?? '-' }}</td>
                        <td>
                            <div class="d-flex gap-1 justify-content-end">
                                <a href="{{ route('accounts.show', $account->id) }}" class="btn btn-icon btn-info" title="Lihat Detail">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('accounts.edit', $account->id) }}" class="btn btn-icon btn-warning" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('accounts.destroy', $account->id) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-icon btn-danger" title="Hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus akun ini?')">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5">
                            <div class="empty-state">
                                <i class="fas fa-book-open mb-3" style="font-size: 3.5rem;"></i>
                                <h5 class="fw-semibold">Belum Ada Akun</h5>
                                <p class="text-muted mb-3">Silakan tambah akun terlebih dahulu</p>
                                <a href="{{ route('accounts.create') }}" class="btn btn-primary-custom">
                                    <i class="fas fa-plus"></i> Tambah Akun
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
