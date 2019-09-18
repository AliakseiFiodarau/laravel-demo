@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-danger text-white">Forbidden</div>
                    <div class="card-body">
                        <h1 class="text-danger">
                            <i class="fa fa-times-circle" aria-hidden="true"></i>
                        </h1>
                        Registration of new users is forbidden
                    </div>
                </div>
                <div class="my-4">
                    <a class="btn btn-outline-primary btn-lg btn-block" href="/" role="button">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
