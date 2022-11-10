@extends('admin.master')

@section('title')
    Manage Services
@endsection

@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Manage Services</h3>
                        </div>
                        <div class="card-body">
                            <h3 class="text-center text-success">{{ Session::has('message') ? Session::get('message') : '' }}</h3>
                            <table id="datatable" class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Service Name</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($services as $service)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $service->ser_title }}</td>
                                        <td>{!! $service->description !!}</td>
                                        <td>
                                            <img src="{{ asset($service->image) }}" alt="" style="height: 100px">
                                        </td>
                                        <td>
                                        <td>{{ $service->status == 1 ? 'Published': 'Unpublished' }}</td>
                                        <td>

                                            <form action="{{ route( 'services.destroy', $service->id ) }}" method="post" onclick="return confirm( 'Are u Sure To Delete This Blog' )">

                                                <a href="{{ route( 'services.edit', $service->id ) }}" class="btn btn-warning btn-sm"><i class="bx bx-edit"></i></a>
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
