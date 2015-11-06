<li>
    <img src="{{ route('getImage', [$image->filename, 'medium']) }}" alt="{{ $image->name }}">
    <h3><em>{{$image->name}}</em> <span class="pull-right">Votes: {{ count($image->votes) }}</span></h3>

    <p>Posted by: {{ isset($image->author) ? $image->author->first_name : '' }} {{ isset($image->author) ? $image->author->last_name.',' : '' }}
        <em>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $image->created_at)->diffForHumans() }}</em></p>

</li>