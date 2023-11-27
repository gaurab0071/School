@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <!-- ... -->
    </div><!-- /.content-header -->
    <div class="container-fluid">
        <div class="table-responsive">
            <form method="POST" action="/assign_roles">
                @csrf
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Teacher Name</th>
                            <th>Roles</th>
                            <th>Permissions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($teachers as $teacher)
                        <tr>
                            <td>{{ $teacher->name }}</td>
                            <td>
                                <select name="roles[{{ $teacher->id }}]">
                                    @foreach($roles as $role)
                                        <option value="{{ $role->name }}" {{ $teacher->hasRole($role->name) ? 'selected' : '' }}>
                                            {{ $role->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                @foreach($permissions as $permission)
                                    <label>
                                        <input type="checkbox" name="permissions[{{ $teacher->id }}][]" value="{{ $permission->name }}" {{ in_array($permission->name, $teacher->permissions->pluck('name')->toArray()) ? 'checked' : '' }}>
                                        {{ $permission->name }}
                                    </label>
                                @endforeach
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection
