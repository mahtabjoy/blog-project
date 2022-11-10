@extends('admin.master')

@section('title')
    Manage Blogs
@endsection

@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Manage blogs</h3>
                        </div>
                        <div class="card-body">
                            <h3 class="text-center text-success">{{ Session::has('message') ? Session::get('message') : '' }}</h3>
                            <table id="datatable" class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Category Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($blogCategories as $key => $blogCategory)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $blogCategory->category_name }}</td>
                                        <td>{{ $blogCategory->status == 1 ? 'Published': 'Unpublished' }}</td>
                                        <td>
                                            <a href="{{ route('edit_blog_category',['id' => $blogCategory->id]) }}" class="btn btn-warning">
                                                <i class="bx bx-edit"></i>
                                            </a>
                                            <a href="{{ route('delete_blog_category',['id' => $blogCategory->id]) }}" onclick="return confirm( 'Are u Sure To Delete This Blog' )" class="btn btn-danger">
                                                <i class="bx bx-trash"></i>
                                            </a>
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
