@extends('master')

@section('content')
    <div class="masthead">
        <div class="container">
            <div class="masthead-style">
                <h1 class="boasting-1">
                    Thousands of independent collectors <br>
                    showcasing quality items.
                </h1>
            <a class="btn-cus btn-view-now" href="{{ route('user.item.info') }}">
                VIEW NOW!
            </a>
            </div>
        </div>
    </div>
@endsection
