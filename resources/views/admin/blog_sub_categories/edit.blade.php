@extends('admin.master')

@section('title')
    Add Blog Sub Category
@endsection

@section('body')
    <section class="py-5" style="background-color: lightgrey">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h3>Add Blog Sub Category</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('blog_sub_categories.update',$blogSubCategories->id ) }}" method="post">
                                @csrf
                                @method('put')
                                <div class="row mt-2">
                                    <label for="" class="col-md-4">Category Name</label>
                                    <div class="col-md-8">
                                        <select name="category_id" id="" class="form-control">
                                            <option value="">Select A Category</option>
                                            @foreach($blogCategories as $blogCategory)
                                                <option value="{{ $blogCategory->id }}" {{ $blogCategory->id == $blogSubCategories->category_id ? 'selected' : '' }}>{{ $blogCategory->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <label for="" class="col-md-4">Sub Category Name</label>
                                    <div class="col-md-8">
                                        <input type="text" name="sub_category_name" value="{{ $blogSubCategories->sub_category_name }}" class="form-control">
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <label for="" class="col-md-4">Status</label>
                                    <div class="col-md-8">
                                        <label for=""><input type="radio" name="status" value="1" {{ $blogSubCategories->status == 1 ? 'checked' : '' }}>Published</label>
                                        <label for=""><input type="radio" name="status" value="0" {{ $blogSubCategories->status == 0 ? 'checked' : '' }}>Not Published</label>
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <label for="" class="col-md-4"></label>
                                    <div class="col-md-8">
                                        <input type="submit" value="Create Sub Blog Category" class="btn btn-success">
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
