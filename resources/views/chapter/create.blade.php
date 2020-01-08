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
                <div class="card-header">Add Chapter To Book</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('chapters.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="book_id" class="col-md-4 col-form-label text-md-right">Book</label>

                            <div class="col-md-6">
                                <select id="book_id" name="book_id"  type="text" class="form-control" required>
                                    <option value="">Select-book</option>
                                    @foreach($books as $book)

                                <option value="{{ $book->id }}">{{ $book->book_name }}</option>
                                @endforeach
                                </select>


                                @error('book_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="chapter_name" class="col-md-4 col-form-label text-md-right">Chapter Name</label>

                            <div class="col-md-6">
                                <input id="chapter_name" type="text" class="form-control @error('chapter_name') is-invalid @enderror" name="chapter_name" value="{{ old('chapter_name') }}" required autocomplete="chapter_name" autofocus>

                                @error('chapter_name')
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
                            <a href="{{ route('chapters.index') }}"  class="btn btn-success">
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
