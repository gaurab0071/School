@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="card-body">
                        <a href="/subject" class="mb-2 mx-2 btn btn-primary">Back</a>
                        <form action="/subject" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="name">Book No.</label>
                                <input type="text" id="book_num" class="form-control" name="book_num">
                            </div>

                            <div class="form-group">
                                <label for="name">Book Name</label>
                                <input type="text" id="name" class="form-control" name="name">
                            </div>

                            <div class="form-group">
                                <label for="publication">Publication</label>
                                <input type="text" id="publication" class="form-control" name="publication">
                            </div>

                            <div class="form-group">
                                <label for="number">Academic Year</label>
                                <input type="text" id="year" class="form-control" name="academic_year">
                            </div>

                            <div class="form-group">
                                <label for="grade_id">Select Grade</label>
                                <select id="grade_id" class="form-control" name="grade_id">
                                    @foreach ($grades as $grade)
                                    <option value="{{ $grade->id}}">{{ $grade->name}}</option>

                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-success">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
