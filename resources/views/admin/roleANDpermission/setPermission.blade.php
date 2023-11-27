@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="container-fluid">
        <div class="container py-2 p-4">
            <h2 class="font-weight-light text-center text-muted py-3">Roles And Permission</h2>
            <div class="box">
                <div class="card-body">
                    <div class="card-title">
                        <h4 class="mb-0">{{ $role->name }}</h4>
                    </div>
                    <hr>
                    <form action="{{ route('role.set.permissions', $role->id) }}" method="POST">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="row">
                                        @foreach ($permissions as $value)
                                        <div class="col-md-3">
                                            <input class="form-check-input" name="permission[]" type="checkbox" value="{{ $value->id }}" id="flexCheckSuccess" <?php if (in_array($value->id, $rolePermissions, true)) {
                                                    echo 'checked';
                                                } ?>>
                                            <label class="form-check-label" for="flexCheckSuccess">
                                                {{ $value->name }}
                                            </label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
