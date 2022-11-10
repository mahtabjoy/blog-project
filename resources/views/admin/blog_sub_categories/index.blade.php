@extends('admin.master')

@section('title')
    Manage Sub Blogs
@endsection

@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Manage Sub Blogs</h3>
                        </div>
                        <div class="card-body">
                            <h3 class="text-center text-success">{{ Session::has('message') ? Session::get('message') : '' }}</h3>
                            <table id="datatable" class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Category Name</th>
                                    <th>Sub Category Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($blogSubCategories as $key => $blogSubCategory)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $blogSubCategory->blogCategory->category_name }}</td>
                                        <td>{{ $blogSubCategory->sub_category_name }}</td>
                                        <td>{{ $blogSubCategory->status == 1 ? 'Published': 'Unpublished' }}</td>
                                        <td>

                                            <form action="{{ route( 'blog_sub_categories.destroy', $blogSubCategory->id ) }}" method="post">
                                                <a href="{{ route( 'blog_sub_categories.edit', $blogSubCategory->id ) }}" class="btn btn-warning btn-sm"><i class="bx bx-edit"></i></a>
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
