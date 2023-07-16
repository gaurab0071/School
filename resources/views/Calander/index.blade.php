@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <div class="container">
        <h1>School Calendar</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Event</th>
                </tr>
            </thead>
            <tbody>
                {{-- @foreach ($events as $event)
                    <tr>
                        <td>{{ $event->date }}</td>
                <td>{{ $event->title }}</td>
                </tr>
                @endforeach --}}
            </tbody>
        </table>
    </div>
</div>
@endsection
