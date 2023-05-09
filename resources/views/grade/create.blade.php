@extends('layouts.app')
@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card-body">
                    <a href="/grade" class="mb-2 btn btn-primary">Back</a>
                    <form action="/grade" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="name">Class</label>
                            <input type="text" id="name" class="form-control" name="name">
                        </div>

                        <div class="form-group">
                            <label for="teacher">Class teacher</label>
                            <input type="text" id="teacher" class="form-control" name="teacher">
                        </div>

                        <div class="form-group">
                            <label for="number">No of Students</label>
                            <input type="text" id="number" class="form-control" name="number">
                        </div>

                        <div class="form-group">
                            <label for="section">Class section</label>
                            <input type="text" id="section" class="form-control" name="section">
                        </div>

                        <button type="submit" class="btn btn-success">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection