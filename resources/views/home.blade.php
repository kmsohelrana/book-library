@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Books</div>
                  <div class="card-body">
                    <div class="card-header">
                    <a href="{{ route('books.index') }}">Books List</a>
                    </div>
                    <div class="card-header">
                    <a href="{{ route('books.create') }}">Books Create</a>
                    </div>
                  </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Chapters</div>
                  <div class="card-body">
                    <div class="card-header">
                    <a href="{{ route('chapters.index') }}">Chapter List</a>
                    </div>
                    <div class="card-header">
                    <a href="{{ route('chapters.create') }}">Chapters Create</a>
                    </div>
                  </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
