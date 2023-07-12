@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-1">
                <div class="col-sm-6">
                    <h1 class="m-0">Subjects</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Subjects</li>
                    </ol>
                </div><!-- /.col -->

                <!-- add student button -->
                <div class="col-sm-6">
                    <a href="/subject/create" class="mb-2 btn btn-info">+ Add new Subject</a>
                </div>
            </div><!-- row -->
        </div><!-- container-fluid -->
    </div><!-- conetnt header -->

    {{-- <!-- Divider -->
    <hr class="mt-1 mb-2" />
    <!-- Divider end --> --}}

    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Search Subjects</h3>
            </div>
            <form method="get" action="">
                <div class="card-body">
                    <div class="row">
                        <div class="form-group">
                            <label for="grade_id">Select Grade</label>
                            <select id="grade_id" class="form-control" name="grade_id" data-search="true"
                                data-silent-initial-value-set="true">
                                <option value="">Select</option>
                                @foreach ($grades as $grade)
                                    <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>




    {{-- <div class="container-fluid">
        <div class="row ">
            @foreach ($grades as $grade)
            <div class="col-lg-3 col-sm-12">
                <div class="card" style="width: 15rem; height: 5rem">
                    <div class="col-12 card-body ">
                        <a href="/subject/{{ $grade->id }}/view" class="btn btn-primary d-flex aligns-items-center justify-content-center">
                            {{ $grade->name }}</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div> --}}
</div><!-- content-wrapper -->
@endsection
