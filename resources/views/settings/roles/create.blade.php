@extends('layouts.app')
@section('title', 'Create Role - FINORA')
@section('page-title', 'Create Role')

@section('content')
<div class="card">
    <div class="card-header bg-white">
        <h5 class="mb-0">Create New Role</h5>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('roles.store') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required>
                @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea class="form-control" name="description" rows="3">{{ old('description') }}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Permissions</label>
                <div class="row">
                    @foreach($permissions as $permission)
                    <div class="col-md-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $permission->id }}" id="perm_{{ $permission->id }}">
                            <label class="form-check-label" for="perm_{{ $permission->id }}">{{ $permission->name }}</label>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Create Role</button>
                <a href="{{ route('roles.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
