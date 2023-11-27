@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-1">
                <div class="col-sm-6">
                    <h1 class="m-0">Teachers</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Teachers</li>
                    </ol>
                </div><!-- /.col -->

                <!--Select text -->
                <div class="col-sm-6">
                    <a href="/teacher/create" class="mb-2 btn btn-info">+ Add Teacher</a>
                </div>

                <!-- search bar  -->
                <div class="col-sm-6 col-md-6">
                    <nav class="navbar-light bg-light float-sm-right">
                        <form class="d-flex" method="GET" action="/teacher">
                            <input class="form-control mr-2" type="search" value="{{ request('name') }}" name="name" id="searchInput" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                            @if(request()->has('name'))
                            <button class="btn btn-outline-primary mx-1" type="button" onclick="clearSearch()">Clear</button>
                            @endif
                        </form>
                    </nav>
                </div>
            </div><!-- /.row -->
        </div><!-- container -->
    </div><!-- /.content-header -->


    <div class="container-fluid">
        <div class="table-responsive">
            @if ($teachers->isEmpty() && $search)
            <h3>No teacher found for '{{ $search }}'.</h3>
        @elseif ($teachers->isEmpty())
            <p>No teachers found.</p>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>SN</th>
                        <th>Name</th>
                        <th>Contact</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                @foreach ($teachers as $teacher)
                <tbody>
                    <tr>
                        <td>{{ $teacher->id }}</td>
                        <td>{{ $teacher->name }}</td>
                        <td>{{ $teacher->contact }}</td>
                        <td>{{ $teacher->email }}</td>
                        <td>
                            <form action="/teacher/{{ $teacher->id }}" method="post" id="teacher">
                                @csrf
                                @method('delete')
                                <a href="/teacher/{{ $teacher->id }}/edit" class="badge bg-info">Edit</a>
                                <button type="submit" class="badge btn bg-danger">Delete</button>
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
        @endif
    </div><!-- container-fluid -->
</div>
</div>
<script>
    function clearSearch() {
        document.getElementById('searchInput').value = '';
        document.querySelector('form').submit();
    }
</script>
@endsection

