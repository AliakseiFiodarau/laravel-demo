@extends('layouts.app')

@section('content')
    @if (($posts->count())<1)
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            No posts
                        </div>
                        <div class="card-body">
                            There are no posts so far
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @else
        <div class="container-fluid">
            <div class="row justify-content-center">
                <table class="table table-responsive table-striped table-hover">
                    <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">text</th>
                        <th scope="col">written by</th>
                        <th scope="col">phone</th>
                        <th scope="col">email</th>
                        <th scope="col">status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>
                                <button type="button" class="btn btn-lg btn-outline-secondary m-1" data-toggle="modal"
                                        data-target="#modelId{{$post->id}}">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                </button>

                                <div class="modal fade" id="modelId{{$post->id}}" tabindex="-1" role="dialog"
                                     aria-labelledby="modelTitleId{{$post->id}}" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">

                                        <div class="modal-content">
                                            <form action="/posts/{{$post->id}}" method="POST">
                                                @method('patch')
                                                @csrf
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Modal title</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <div class="modal-body">

                                                    <div class="form-group row">
                                                        <label for="name"
                                                               class="col-md-4 col-form-label text-md-right">{{ __('Name:') }}</label>
                                                        <div class="col-md-6">
                                                            <input id="name" type="text"
                                                                   class="form-control  @error('name') is-invalid @enderror"
                                                                   name="name"
                                                                   value="@php echo($post->name) @endphp" autofocus>
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
                                                                   class="form-control @error('email') is-invalid @enderror"
                                                                   name="email"
                                                                   value="@php echo($post->email) @endphp">
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
                                                                   name="phone_number"
                                                                   value="@php echo($post->phone_number) @endphp">
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
                                                            {{$post->text}}
                                                        </textarea>
                                                            @error('text')
                                                            <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="status"
                                                               class="col-md-4 col-form-label text-md-right">{{ __('Status:') }}</label>
                                                        <div class="form-group col-md-6">
                                                            <select class="form-control" name="status">
                                                                <option value="reviewed" @if ($post->status == 'reviewed') selected @endif>reviewed</option>
                                                                <option value="pending" @if ($post->status == 'pending') selected @endif>pending</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">
                                                        Close
                                                    </button>

                                                    <button type="submit" class="btn btn-primary">
                                                        Save
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <form action="/posts/{{$post->id}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-lg btn-outline-danger m-1">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </button>
                                </form>
                            </td>
                            <td class="text-break">{{$post->text}}</td>
                            <td class="">{{$post->user->name}}</td>
                            <td>{{$post->phone_number}}</td>
                            <td>{{$post->email}}</td>
                            <td>{{$post->status}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$posts->links()}}
            </div>
        </div>
    @endif
@endsection
