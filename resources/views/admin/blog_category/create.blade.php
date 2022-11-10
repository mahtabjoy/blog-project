@extends('admin.master')

@section('title')
    Add Blog Category
@endsection

@section('body')
   <section class="py-5" style="background-color: lightgrey">
       <div class="container">
           <div class="row">
               <div class="col-md-6 mx-auto">
                   <div class="card">
                       <div class="card-header">
                           <h3>Add Blog Category</h3>
                       </div>
                       <div class="card-body">
                           <form action="{{ route('new_blog_category') }}" method="post">
                               @csrf
                               <div class="row mt-2">
                                   <label for="" class="col-md-4">Category Name</label>
                                   <div class="col-md-8">
                                       <input type="text" name="category_name" class="form-control">
                                   </div>
                               </div>
                               <div class="row mt-2">
                                   <label for="" class="col-md-4">Status</label>
                                   <div class="col-md-8">
                                       <label for=""><input type="radio" name="status" value="1">Published</label>
                                       <label for=""><input type="radio" name="status" value="0">Not Published</label>
                                   </div>
                               </div>
                               <div class="row mt-2">
                                   <label for="" class="col-md-4"></label>
                                   <div class="col-md-8">
                                       <input type="submit" value="Create Blog Category" class="btn btn-success">
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
