@extends('layouts.app')
@section('title', 'Detail Struktur Gaji - FINORA')
@section('page-title', 'Detail Struktur Gaji')

@section('content')
<div class="card card-custom">
    <div class="card-header">
        <div class="d-flex align-items-center gap-2">
            <div class="avatar avatar-success">
                <i class="fas fa-money-bill-wave"></i>
            </div>
            <span>{{ $salaryStructure->name }}</span>
        </div>
    </div>
    <div class="card-body">
        <div class="row mb-4">
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="text-muted" style="font-size: 0.8rem;">Gaji Pokok</label>
                    <div class="fw-bold text-primary" style="font-size: 1.25rem;">@rupiah($salaryStructure->basic_salary)</div>
                </div>
            </div>
        </div>
        <h6 class="mb-3">Komponen Gaji</h6>
        <div class="table-responsive">
            <table class="table table-custom mb-0">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Tipe</th>
                        <th class="text-end">Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($salaryStructure->components as $component)
                    <tr>
                        <td>{{ $component->name }}</td>
                        <td>
                            @if($component->type === 'allowance')
                            <span class="badge badge-custom badge-active">Tunjangan</span>
                            @else
                            <span class="badge badge-custom badge-overdue">Potongan</span>
                            @endif
                        </td>
                        <td class="text-end fw-medium">
                            @if($component->is_percentage)
                            {{ $component->amount }}%
                            @else
                            @rupiah($component->amount)
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center py-3 text-muted">Tidak ada komponen</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
