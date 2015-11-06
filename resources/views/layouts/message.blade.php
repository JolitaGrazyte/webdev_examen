@if (Session::has('message'))

    <div data-0="opacity: 1; position: relative; text-align: center; z-index: 13" data-200="opacity: 0" class="alert {{ Session::get('alert-class', 'alert-info') }}">

        {{ Session::get('message') }}

    </div>

@endif