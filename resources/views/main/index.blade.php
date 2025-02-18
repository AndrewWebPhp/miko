@extends('layouts.default')


@section('content')

    <h1>Main page</h1>

    <ul>
        @foreach ($cities as $city)
            <li>
                <a href="{{ route('index', $city->slug) }}" @class([
                    'fw-bold' => session('city_session') && session('city_session.slug') == $city->slug
                ])>
                    {{ $city->title }}
                </a>
            </li>
        @endforeach
    </ul>

@endsection