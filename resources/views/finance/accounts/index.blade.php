@extends('layouts.app')
@section('title', 'Bagan Akun - FINORA')
@section('page-title', 'Bagan Akun')

@section('content')
<div class="card card-custom">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span><i class="fas fa-book me-2 text-primary"></i>Daftar Akun</span>
        <a href="{{ route('accounts.create') }}" class="btn btn-primary-custom">
            <i class="fas fa-plus me-1"></i> Tambah Akun
        </a>
    </div>
    <div class="card-body">
        <form method="GET" class="mb-4">
            <div class="row g-3">
                <div class="col-md-4">
                    <select class="form-control form-control-custom" name="account_type">
                        <option value="">Semua Jenis</option>
                        <option value="asset">Aktiva</option>
                        <option value="liability">Kewajiban</option>
                        <option value="equity">Ekuitas</option>
                        <option value="revenue">Pendapatan</option>
                        <option value="expense">Beban</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary-custom w-100">
                        <i class="fas fa-filter me-1"></i> Filter
                    </button>
                </div>
            </div>
        </form>
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
                        <th width="120">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($accounts as $account)
                    <tr>
                        <td class="fw-medium">{{ $account->account_number }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="bg-light rounded p-2 me-3" style="width: 40px; height: 40px;">
                                    <i class="fas fa-{{ $account->account_type === 'asset' ? 'box' : ($account->account_type === 'liability' ? 'credit-card' : ($account->account_type === 'revenue' ? 'arrow-up' : ($account->account_type === 'expense' ? 'arrow-down' : 'pie-chart'))) }} text-secondary"></i>
                                </div>
                                {{ $account->account_name }}
                            </div>
                        </td>
                        <td>
                            @if($account->account_type === 'asset')
                            <span class="badge badge-custom badge-active">Aktiva</span>
                            @elseif($account->account_type === 'liability')
                            <span class="badge badge-custom badge-overdue">Kewajiban</span>
                            @elseif($account->account_type === 'equity')
                            <span class="badge badge-custom badge-info">Ekuitas</span>
                            @elseif($account->account_type === 'revenue')
                            <span class="badge badge-custom badge-paid">Pendapatan</span>
                            @else
                            <span class="badge badge-custom badge-pending">Beban</span>
                            @endif
                        </td>
                        <td>{{ $account->parentAccount->account_name ?? '-' }}</td>
                        <td>
                            <a href="{{ route('accounts.show', $account->id) }}" class="btn btn-icon btn-info" title="Lihat"><i class="fas fa-eye"></i></a>
                            <a href="{{ route('accounts.edit', $account->id) }}" class="btn btn-icon btn-warning" title="Edit"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('accounts.destroy', $account->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-icon btn-danger" title="Hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus akun ini?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-4">
                            <div class="empty-state">
                                <i class="fas fa-book d-block mb-2"></i>
                                <p class="mb-0">Tidak ada akun</p>
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
