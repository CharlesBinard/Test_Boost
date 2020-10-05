
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Answers</h2>
        </div>
    </div>
</div>

<hr>

@foreach ($answers as $answer)
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Owner:</strong>
                {{ $answer->owner->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                {{ $answer->description }}
            </div>
        </div>
    </div>
    @if ($answer->owner->id === Auth::id())
        <form action="{{ route('answers.destroy',$answer->id) }}" method="POST">

            <a class="btn btn-primary" href="{{ route('answers.edit',$answer->id) }}">Edit</a>

            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    @endif
    <hr>
@endforeach

