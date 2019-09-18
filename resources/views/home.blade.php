@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-success text-white">Login</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <h1 class="text-success">
                            <i class="fa fa-check-circle" aria-hidden="true"></i>
                        </h1>
                        You are logged in!
                    </div>
                </div>
                <div class="my-4">
                    <a class="btn btn-outline-primary btn-lg btn-block" href="/" role="button">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
