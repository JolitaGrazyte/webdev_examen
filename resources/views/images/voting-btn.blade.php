<div class="vote">
    {!! Form::open(['route' =>  ['postVote'], 'class' => '', 'role' => 'form']) !!}
    {!! Form::hidden('image_id', $image->id) !!}
    {!! Form::submit('Place your vote !!!', ['class' => 'vote-btn']) !!}
    {!! Form::close() !!}
</div>