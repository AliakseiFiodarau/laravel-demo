@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Post
                    </div>
                    @guest
                        <div class="card-body">
                            You are not logged in
                        </div>
                    @else
                        <div class="card-body">
                            <form method="POST" action="">
                                @csrf
                                <div class="form-group row">
                                    <label for="name"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Name:') }}</label>
                                    <div class="col-md-6">
                                        <input id="name" type="text"
                                               class="form-control  @error('name') is-invalid @enderror" name="name"
                                               value="@php echo($user->name) @endphp" autofocus>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email"
                                           class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address:') }}</label>
                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                               class="form-control @error('email') is-invalid @enderror" name="email"
                                               value="@php echo($user->email) @endphp">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="phone_number"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Phone Number:') }}</label>
                                    <div class="col-md-6">
                                        <input id="phone_number" type="text"
                                               class="form-control @error('phone_number') is-invalid @enderror"
                                               name="phone_number">
                                        @error('phone_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="text"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Text:') }}</label>
                                    <div class="col-md-6">
                                        <textarea id="text" name="text" rows="6"
                                                  class="form-control @error('text') is-invalid @enderror">
                                        </textarea>
                                        @error('text')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary" formaction="/posts">
                                            {{ __('Submit') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @endguest
                </div>
                @guest
                    <div class="my-4">
                        <a class="btn btn-outline-primary btn-lg btn-block" href="/login" role="button">Login</a>
                    </div>
                @endguest
            </div>
        </div>
    </div>
@endsection
