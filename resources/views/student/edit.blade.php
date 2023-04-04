@extends('layouts.app')
@section('content')


<div class="content-wrapper">

<div class="container">

    <div class="row">
        <div class="col-md-12">

            <div class="card-body">
                <a href="/student" class="mb-2 mx-2 btn btn-primary">Back</a>
                <form action="/student/{{ $students->id }}" method="post">
                @csrf
                    @method('put')

                    <div class="form-group">
                        <label for="name">ID Number</label>
                        <input type="text" id="id" class="form-control" name="idnumber" value="{{$students->idnumber}}">
                    </div>

                <div class="form-group">
                    <label for="name">Roll No</label>
                    <input type="text" id="roll" class="form-control" name="roll" value="{{$students->roll}}">
                </div>

                <div class="form-group">
                    <label for="teacher">Student's Name</label>
                    <input type="text" id="name" class="form-control" name="name" value="{{$students->name}}">
                </div>

                <div class="form-group">
                    <label for="number">Parent's Name</label>
                    <input type="text" id="parent" class="form-control" name="parent" value="{{$students->parent}}">
                </div>

                <div class="form-group">
                    <label for="section">Parent's Contact</label>
                    <input type="text" id="contact" class="form-control" name="contact" value="{{$students->contact}}">
                </div>

                <div class="form-group">
                    <label for="section">Address</label>
                    <input type="text" id="address" class="form-control" name="address" value="{{$students->address}}">
                </div>

                <div class="form-group">
                    <label for="grade_id">Select Grade</label>
                    <select id="grade_id" class="form-control" name="grade_id">
                        @foreach ($grades as $grade)
                        <option value="{{ $grade->id }}" {{ $grade->id == old('grade_id', $students->grade_id) ? 'selected' : '' }}>
                            {{ $grade->name }}
                        </option>

                        @endforeach
                    </select>
                </div>




                <div class="form-group">
                    <label for="section">Gender</label>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault1" value="{{$students->gender}}">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Male
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault2" value="{{$students->gender}}">
                        <label class="form-check-label" for="flexRadioDefault2">
                            female
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="section">image</label>
                    <input type="file" id="section" class="form-control-file" name="report" value="{{$students->report}}">
                </div>
                <div class="my-2">
                    <img src="{{asset ($students->report )}}" width="100" alt="">
                </div>

                <button type="submit" class="btn btn-success">Update</button>



                </form>
            </div>
        </div>
    </div>
</div>
</div>

@endsection
