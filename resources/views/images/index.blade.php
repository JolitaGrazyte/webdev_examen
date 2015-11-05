
@each('images.index', $images, 'images.single', 'images.no-items')

{{--@if(count($images))--}}

    {{--<h1>Images</h1>--}}

    {{--@foreach($images as $image)--}}

        {{--<figure class="col-md-3 image">--}}
            {{--<div class="image-wrap" id="wrapper">--}}
                {{--<img src="{{ route('getImage', [$image->filename, 'medium']) }}" alt="{{ $image->name }}">--}}
            {{--<span> <!--span contains the popup image-->--}}
                {{--<img src="{{ url('uploads/medium_'.$image->filename) }}" alt="{{ $image->name }}" /> <!--popup image-->--}}
                {{--<p><em>{{$image->name}}</em></p> <!--caption appears under the popup image-->--}}
            {{--</span>--}}
            {{--</div>--}}

            {{--<figcaption><em>{{$image->name}}</em> <span class="pull-right">Votes: {{ count($image->votes) }}</span></figcaption>--}}

            {{--<div class="vote">--}}
                {{--{!! Form::open(['route' =>  ['postVote'], 'class' => '', 'role' => 'form']) !!}--}}
                {{--{!! Form::hidden('image_id', $image->id) !!}--}}
                {{--{!! Form::submit('Place your vote !!!', ['class' => 'vote-btn']) !!}--}}
                {{--{!! Form::close() !!}--}}
            {{--</div>--}}
        {{--</figure>--}}


    {{--@endforeach--}}

{{--@endif--}}
