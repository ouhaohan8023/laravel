@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="alert alert-success" role="alert">
            <strong>Well done!</strong> You successfully read this important alert message.
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard978</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!ss876
                        {{--<example-component></example-component>--}}
                        <hello></hello>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
