@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card-body">
                        <a href="/attendance" class="mb-2 btn btn-primary">Back</a>
                        <form method="POST" action="/attendance" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="teacher">Student's Name</label>
                                    <input type="text" id="name" class="form-control" name="name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="date">Date:</label>
                                <input type="date" class="form-control" id="date" name="date" required>
                            </div>
                            <div class="form-group">
                                <label for="status">Status:</label>
                                <select class="form-control" id="status" name="status">
                                    <option value="">Select status</option>
                                    <option value="1">Present</option>
                                    <option value="0">Absent</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success">Save Attendance</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
