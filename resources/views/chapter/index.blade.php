@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">Books List</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                            <div align="center" class="loader"></div>
                        <div class="table">
                             <a class="btn btn-success btn-sm float-right" href="{{ route('books.create') }}"><i class="fa fa-plus"></i>Add</a>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">SL</th>
                                    <th scope="col">Book Name</th>
                                    <th scope="col">Author Name</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($data as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->book_name }}</td>
                                    <td>{{ $row->author_name }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <form action="{{ route('books.destroy',$row->id) }}" method="POST">
                                                <a href="{{ route('books.edit',$row->id) }}" class="btn btn-dark btn-sm"> <i class="fa fa-edit"></i> </a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Are you sure you want to delete this item?');"  class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>

                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                    <p>No Books Have Found</p>
                                @endforelse
                                </tbody>
                                {{ $data->links() }}
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection
