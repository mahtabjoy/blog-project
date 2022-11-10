@extends('admin.master')

@section('title')
    Edit Services
@endsection

@section('body')
    <section class="py-5" style="background-color: lightgrey">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h3>Edit Services</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('services.update',$service->id ) }}" method="post">
                                @csrf
                                @method('put')
                                <div class="row mt-2">
                                    <label for="" class="col-md-4">Article Title</label>
                                    <div class="col-md-8">
                                        <input type="text" value="{{ $service->ser_title }}" name="ser_title" class="form-control">
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <label for="" class="col-md-4">Description</label>
                                    <div class="col-md-8">
                                        <textarea name="description" id="summernote" cols="30" rows="10"></textarea>
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <label for="" class="col-md-4">Article Image</label>
                                    <div class="col-md-8">
                                        <input type="file" name="image" accept="image/*">
                                        @if($service->image)
                                            <img src="{{ asset($service->image) }}" alt="" style="height: 100px">
                                        @endif
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <label for="" class="col-md-4">Status</label>
                                    <div class="col-md-8">
                                        <label for=""><input type="radio" name="status" value="1" {{ $service->status == 1 ? 'checked' : '' }}>Published</label>
                                        <label for=""><input type="radio" name="status" value="0" {{ $service->status == 0 ? 'checked' : '' }}>Not Published</label>
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <label for="" class="col-md-4"></label>
                                    <div class="col-md-8">
                                        <input type="submit" value="Update Service" class="btn btn-success">
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
