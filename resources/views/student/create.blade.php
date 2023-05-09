@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="containerfluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="card-body">
                        <a href="/student" class="mb-2 btn btn-primary">Back</a>
                        <form action="/student" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="name">ID Number</label>
                                <input type="text" id="id" class="form-control" name="idnumber">
                            </div>

                            <div class="form-group">
                                <label for="name">Roll No</label>
                                <input type="text" id="roll" class="form-control" name="roll">
                            </div>

                            <div class="form-group">
                                <label for="teacher">Student's Name</label>
                                <input type="text" id="name" class="form-control" name="name">
                            </div>

                            <div class="form-group">
                                <label for="number">Parent's Name</label>
                                <input type="text" id="parent" class="form-control" name="parent">
                            </div>

                            <div class="form-group">
                                <label for="section">Contact Number</label>
                                <input type="text" id="section" class="form-control" name="contact">
                            </div>

                            <div class="form-group">
                                <label for="section">Address</label>
                                <input type="text" id="section" class="form-control" name="address">
                            </div>

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

                            <div class="form-group">
                                <label for="section">Gender</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Male
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault2">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        female
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="section">Report</label>
                                <input type="file" id="section" class="form-control-file" name="report">
                            </div>

                            <button type="submit" class="btn btn-success">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
