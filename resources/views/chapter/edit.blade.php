@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
                <div class="card-header">Add Books Name</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('books.update',$book->id) }}">
                        @csrf

                        @method('put')

                        <div class="form-group row">
                            <label for="book_name" class="col-md-4 col-form-label text-md-right">Book Name</label>

                            <div class="col-md-6">
                                <input id="book_name" type="text" class="form-control @error('book_name') is-invalid @enderror" name="book_name" value="{{ $book->book_name }}" required autocomplete="book_name" autofocus>

                                @error('book_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="author_name" class="col-md-4 col-form-label text-md-right">Author Name</label>

                            <div class="col-md-6">
                                <input id="author_name" type="text" class="form-control @error('author_name') is-invalid @enderror" name="author_name" value="{{ $book->author_name }}" required autocomplete="author_name" autofocus>

                                @error('author_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                            <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                   Submit
                                </button>
                            <a href="{{ route('books.index') }}"  class="btn btn-success">
                                    Back
                                 </a>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
