@extends('admin.master')

@section('title')
    Manage Articles
@endsection

@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Manage Articles</h3>
                        </div>
                        <div class="card-body">
                            <h3 class="text-center text-success">{{ Session::has('message') ? Session::get('message') : '' }}</h3>
                            <table id="datatable" class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Articles Name</th>
                                    <th>Image</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($articles as $article)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $article->art_title }}</td>
                                        <td>
                                            <img src="{{ asset($article->image) }}" alt="" style="height: 80px; width: 80px">
                                        </td>
                                        <td>{!! $article->description !!}</td>
                                        <td>{{ $article->status == 1 ? 'Published': 'Unpublished' }}</td>
                                        <td>

                                            <form action="{{ route( 'articles.destroy', $article->id ) }}" method="post">
                                                <a href="{{ route( 'articles.edit', $article->id ) }}" class="btn btn-warning btn-sm"><i class="bx bx-edit"></i></a>
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="bx bx-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
