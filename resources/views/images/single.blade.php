<figure class="col-sm-3">
    <img src="{{ route('getImage', [$image->filename, 'small']) }}" alt="{{ $image->name }}">
    <div class="votes"> Votes: {{ count($image->votes) }}</div>
    <caption> Title: <em>{{$image->name}}</em></caption>
    <figcaption>Title: <em>{{$image->name}}</em></figcaption>

    {!! Form::open(['route' =>  ['postVote'], 'class' => '', 'role' => 'form']) !!}
    {!! Form::hidden('image_id', $image->id) !!}
    {!! Form::submit('Place your vote !!!', ['class' => 'btn btn-link form-control']) !!}
    {!! Form::close() !!}
</figure>
