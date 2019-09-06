@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-8">

                <div class="card">

                    <div class="card-header">Planets</div>

                    <div class="card-body">

                        <div class="row">

                            @foreach ($planets as $planet)

                                @include('partials.planet')

                            @endforeach

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection
