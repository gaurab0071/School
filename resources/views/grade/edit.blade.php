@extends('layouts.app')
@section('content')


<div class="content-wrapper">

<div class="container">

    <div class="row">
        <div class="col-md-12">

            <div class="card-body">
                <a href="/grade" class="mb-2 mx-2 btn btn-primary">Back</a>
                <form action="/grade/{{ $grade->id }}" method="post">
                @csrf
                    @method('put')
                <div class="form-group">
                    <label for="name">class</label>
                    <input type="text" id="name" class="form-control" name="name" value="{{$grade->name}}">
                </div>

                <div class="form-group">
                    <label for="teacher">Class teacher</label>
                    <input type="text" id="teacher" class="form-control" name="teacher" value="{{$grade->teacher}}">
                </div>

                <div class="form-group">
                    <label for="number">Student's number</label>
                    <input type="text" id="number" class="form-control" name="number" value="{{$grade->number}}">
                </div>

                <div class="form-group">
                    <label for="section">Class section</label>
                    <input type="text" id="section" class="form-control" name="section" value="{{$grade->section}}">
                </div>

                <button type="submit" class="btn btn-success">Update</button>



                </form>
            </div>
        </div>
    </div>
</div>
</div>

@endsection
