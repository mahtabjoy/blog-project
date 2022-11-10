@extends('admin.master')

@section('title')
    Edit Blogs
@endsection

@section('body')
    <section class="py-5" style="background-color: lightgrey">
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h3>Edit Blogs</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('blogs.update', $blog->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="row mt-2">
                                    <label for="" class="col-md-4">Category Name</label>
                                    <div class="col-md-8">
                                        <select name="blog_category_id" id="categoryName" class="form-control">
                                            <option value="">Select A Category</option>
                                            @foreach($blogCategories as $blogCategory)
                                                <option value="{{ $blogCategory->id }}" {{ $blog->blog_category_id == $blogCategory->id ? 'selected' : '' }}>{{ $blogCategory->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <label for="" class="col-md-4">Sub Category Name</label>
                                    <div class="col-md-8">
                                        <select name="blog_sub_category_id" id="subCategoryName" class="form-control">
                                            <option value="" disabled selected>Select A Sub Category</option>
                                            @foreach($blogSubCategories as $blogSubCategory)
                                                <option value="{{ $blogSubCategory->id }}" {{ $blog->blog_sub_category_id == $blogSubCategory->id ? 'selected' : '' }}>{{ $blogSubCategory->sub_category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <label for="" class="col-md-4">Blog Title</label>
                                    <div class="col-md-8">
                                        <input type="text" name="blog_title" value="{{ $blog->blog_title }}" class="form-control">
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <label for="" class="col-md-4">Blog Description</label>
                                    <div class="col-md-8">
                                        <textarea name="description" id="summernote" cols="30" rows="10">{!! $blog->description !!}</textarea>
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <label for="" class="col-md-4">Featured Image</label>
                                    <div class="col-md-8">
                                        <input type="file" name="image" class="form-control">
                                        @if($blog->image)
                                            <img src="{{ asset($blog->image) }}" alt="" style="height: 100px;">
                                        @endif
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <label for="" class="col-md-4">Status</label>
                                    <div class="col-md-8">
                                        <label for=""><input type="radio" name="status" value="1" {{ $blog->status == 1 ? 'checked' : '' }}>Published</label>
                                        <label for=""><input type="radio" name="status" value="0" {{ $blog->status == 0 ? 'checked' : '' }}>Not Published</label>
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <label for="" class="col-md-4"></label>
                                    <div class="col-md-8">
                                        <input type="submit" value="Update Blog" class="btn btn-success">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
