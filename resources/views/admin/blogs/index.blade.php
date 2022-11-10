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
                            <h3>Manage Blogs</h3>
                        </div>
                        <div class="card-body">
                            <h3 class="text-center text-success">{{ Session::has('message') ? Session::get('message') : '' }}</h3>
                            <table id="datatable" class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Category Name</th>
                                    <th>Sub Category Name</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($blogs as $blog)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $blog->blogcategory->category_name }}</td>
                                        <td>{{ $blog->blogSubCategory->sub_category_name }}</td>
                                        <td>{{ $blog->blog_title }}</td>
                                        <td>{!! $blog->description !!}</td>
                                        <td>
                                            <img src="{{ asset($blog->image) }}" alt="" style="height: 80px; width: 80px">
                                        </td>
                                        <td>{{ $blog->status == 1 ? 'Published': 'Unpublished' }}</td>
                                        <td>

                                            <form action="{{ route( 'blogs.destroy', $blog->id ) }}" method="post" onclick="">
                                                <a href="{{ route( 'blogs.edit', $blog->id ) }}" class="btn btn-warning btn-sm"><i class="bx bx-edit"></i></a>
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
