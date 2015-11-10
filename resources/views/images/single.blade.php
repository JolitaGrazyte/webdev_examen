<li>
    <img src="{{ route('getImage', [$image->filename, 'medium']) }}" alt="{{ $image->name }}">
    <h3><em>{{$image->name}}</em> <span class="pull-right">Votes: {{ count($image->votes) }}</span></h3>

    <p>Posted by: {{ isset($image->author) ? $image->author->first_name : '' }} {{ isset($image->author) ? $image->author->last_name.',' : '' }}
        {{ $image->created_at->format('d M, Y ') }} -   <em>{{ $image->created_at->diffForHumans() }}</em></p>

@include('images.voting-btn')

</li>