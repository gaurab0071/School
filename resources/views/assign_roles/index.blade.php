@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-1">
                <div class="col-sm-6">
                    <h1 class="m-0">Assign Roles</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Assign Roles</li>
                    </ol>
                </div><!-- /.col -->


                <!-- add student button -->
                <div class="col-sm-6">
                    <a href="/assign_roles/create" class="mb-2 btn btn-info">+ Add new Role</a>
                </div>

                <!-- search bar  -->
                <div class="col-sm-6">
                    <nav class="navbar-light bg-light float-sm-right">
                        <form class="d-flex ">
                            <input class="form-control mr-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </nav>
                </div>
            </div><!-- /.row -->
        </div><!-- container -->
    </div><!-- /.content-header -->



    <div class="container-fluid">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>SN</th>
                        <th>Teacher Name</th>
                        <th>Roles</th>
                        <th>Permissions</th>
                    </tr>
                </thead>
                @foreach ($teachers  as $teacher)
                <tbody>
                    <tr>
                        <td>{{ $loop->index + 1}}</td>
                        <td>{{ $teacher->name }}</td>
                        {{-- <td>
                            @foreach($teacher->roles as $role)
                                {{ $role->name }}<br>
                            @endforeach
                        </td> --}}
                        <td>
                            <form method="POST" action="{{ route('assignRoleToTeacher', ['teacherId' => $teacher->id]) }}">
                                @csrf
                                <select name="role_name" id="role_name">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                <button type="submit" class="badge btn btn-success">Assign Role</button>
                            </form>
                        </td>
                        
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
        {{-- <div class="pagination">
            {{ $teachers->links() }}
        </div> --}}
    </div>
</div>

















@endsection