@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-info" href="/"> Home</a>
            </div>
            <div class="pull-left">
                <a class="btn btn-success" href="{{ route('questions.create') }}"> Create New Question</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    @if ($message = Session::get('error'))
    <div class="alert alert-error">
        <p>{{ $message }}</p>
    </div>
@endif

    <table class="table table-bordered">
        <tr>
            <th>Owner</th>
            <th>Title</th>
            <th>Description</th>
        </tr>
        @foreach ($questions as $question)
        <tr>
            <td>{{ $question->owner->name }}</td>
            <td> <a href="{{ route('questions.show',$question->id) }}"> {{$question->title}}</a> </td>
            <td>{{ substr($question->description, 0 ,40) }}</td>
        </tr>
        @endforeach
    </table>

    {!! $questions->links() !!}

@endsection
