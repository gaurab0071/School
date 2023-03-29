@extends('layouts.app')
@section('content')


<div class="content-wrapper">

<div class="container">

    <div class="row">
        <div class="col-md-12">

            <div class="card-body">
                <a href="/teacher" class="mb-2 mx-2 btn btn-primary">Back</a>
                <form action="/teacher/{{ $teacher->id }}" method="post">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" class="form-control" name="name" value="{{$teacher->name}}">
                </div>

                <div class="form-group">
                    <label for="contact">Contact</label>
                    <input type="text" id="contact" class="form-control" name="contact" value="{{$teacher->contact}}">
                </div>

                <div class="form-group">
                    <label for="name">Email</label>
                    <input type="text" id="email" class="form-control" name="email" value="{{$teacher->email}}">
                </div>

                <button type="submit" class="btn btn-success">Update</button>



                </form>
            </div>
        </div>
    </div>
</div>
</div>

@endsection
