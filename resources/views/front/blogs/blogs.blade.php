@extends('front.master')

@section('title')

@endsection

@section('body')

    <section class="page-title overlay" style="background-image: url({{ asset('/') }}front/images/background/page-title.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="text-white font-weight-bold">Blogs</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="{{ route('home') }}">Home</a>
                        </li>
                        <li>{{ $blogs->first()->blogCategory->category_name }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- *** Blog Section Start *** -->
    <section class="bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 py-100">
                    @foreach($blogs as $blog)
                    <!-- Blog Post -->
                    <article class="bg-white rounded mb-40">
                        <!-- Post Thumbnail -->
                        <a href="blog-single.html">
                            <img class="img-fluid w-100 rounded-top" src="{{ asset($blog->image) }}" alt="post-thumb">
                        </a>
                        <!-- Post Content -->
                        <div>
                            <div class="d-flex align-items-center border-bottom">
                                <!-- Published Date -->
                                <div class="text-center border-right p-4">
                                    <h3 class="text-primary mb-0">
                                      {{ $blog->created_at->format('d') }}
                                        <span class="d-block paragraph">{{ $blog->created_at->format('M') }}</span>
                                    </h3>
                                </div>
                                <div class="px-4">
                                    <!-- Post Title -->
                                    <a class="h4 d-block mb-10" href="blog-single.html">{{ $blog->blog_title }}</a>
                                    <!-- Post Meta -->
                                    <ul class="list-inline">
                                        <li class="list-inline-item paragraph mr-5">By
                                            <a href="#" class="paragraph">{{ $blog->user->name }}</a>
                                        </li>
                                        <li class="list-inline-item paragraph">Advice, Fitness</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Post Excerpts -->
                            <div class="p-4">
                                {!! $blog->description !!}
                                <a href="blog-single.html" class="btn btn-sm btn-primary">Read More</a>
                            </div>
                        </div>
                    </article>
                    @endforeach
                    <!-- Pagination -->
{{--                    <nav class="mb-md-50">--}}
{{--                        <ul class="pagination justify-content-center align-items-center">--}}
{{--                            <li class="page-item disabled prev">--}}
{{--                                <a class="page-link" href="#" tabindex="-1">Prev</a>--}}
{{--                            </li>--}}
{{--                            <li class="page-item active">--}}
{{--                                <a class="page-link" href="#">1</a>--}}
{{--                            </li>--}}
{{--                            <li class="page-item">--}}
{{--                                <a class="page-link" href="#">2</a>--}}
{{--                            </li>--}}
{{--                            <li class="page-item">--}}
{{--                                <a class="page-link" href="#">3</a>--}}
{{--                            </li>--}}
{{--                            <li class="page-item">--}}
{{--                                <a class="page-link" href="#">4</a>--}}
{{--                            </li>--}}
{{--                            <li class="page-item">--}}
{{--                                <a class="page-link" href="#">5</a>--}}
{{--                            </li>--}}
{{--                            <li class="page-item next">--}}
{{--                                <a class="page-link" href="#">Next</a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </nav>--}}
                    {{ $blogs->links() }}
                </div>
                <div class="col-lg-4">
                    <!-- Sidebar -->
                    <div class="bg-white px-4 py-100 sidebar-box-shadow">
                        <!-- Search Widget -->
                        <div class="mb-50">
                            <h4 class="mb-3">Search Here</h4>
                            <div class="search-wrapper">
                                <input type="text" class="form-control" name="search" placeholder="Type Here...">
                            </div>
                        </div>
                        <!-- categories -->
                        <div class="mb-50">
                            <h4 class="mb-3">Categories</h4>
                            <ul class="pl-0 mb-0">
                                <li class="border-bottom">
                                    <a href="#" class="d-block text-color py-10">Business Analysis</a>
                                </li>
                                <li class="border-bottom">
                                    <a href="#" class="d-block text-color py-10">Consultancy</a>
                                </li>
                                <li class="border-bottom">
                                    <a href="#" class="d-block text-color py-10">Investment</a>
                                </li>
                                <li class="border-bottom">
                                    <a href="#" class="d-block text-color py-10">Profit & Growth</a>
                                </li>
                                <li>
                                    <a href="#" class="d-block text-color py-10">Marketing Guidance</a>
                                </li>
                            </ul>
                        </div>
                        <!-- Widget Recent Post -->
                        <div class="mb-50">
                            <h4 class="mb-3">Recent News</h4>
                            <div class="d-flex py-3 border-bottom">
                                <div class="mr-4">
                                    <a href="blog-single.html">
                                        <img class="rounded" src="images/blog/post-thumb-sm-01.jpg" alt="post-thumb">
                                    </a>
                                </div>
                                <div>
                                    <h6 class="mb-3">
                                        <a class="text-dark" href="blog-single.html">Marketing Strategy 2017-2018.</a>
                                    </h6>
                                    <p class="meta">16 Dec, 2018</p>
                                </div>
                            </div>
                            <div class="d-flex py-3 border-bottom">
                                <div class="mr-4">
                                    <a href="blog-single.html">
                                        <img class="rounded" src="images/blog/post-thumb-sm-02.jpg" alt="post-thumb">
                                    </a>
                                </div>
                                <div class="content">
                                    <h6 class="mb-3">
                                        <a class="text-dark" href="blog-single.html">Jack Ma & future of E-commerce</a>
                                    </h6>
                                    <p class="meta">16 Dec, 2018</p>
                                </div>
                            </div>
                            <div class="d-flex py-3">
                                <div class="mr-4">
                                    <a href="blog-single.html">
                                        <img class="rounded" src="images/blog/post-thumb-sm-03.jpg" alt="post-thumb">
                                    </a>
                                </div>
                                <div class="content">
                                    <h6 class="mb-3">
                                        <a class="text-dark" href="blog-single.html">Jack Ma & future of E-commerce</a>
                                    </h6>
                                    <p class="meta">16 Dec, 2018</p>
                                </div>
                            </div>
                        </div>
                        <!-- Widget Tags -->
                        <div class="mb-50">
                            <h4 class="mb-3">Tags</h4>
                            <ul class="list-inline tag-list">
                                <li class="list-inline-item">
                                    <a href="#">Business</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">Marketing</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">Finance</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">Consultancy</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">Market Analysis</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">Rvenenue</a>
                                </li>
                            </ul>
                        </div>
                        <!-- Widget Newsletter -->
                        <div class="newsletter">
                            <h4 class="mb-3">Stay Updated</h4>
                            <form action="#">
                                <input type="text" name="name" id="name" class="form-control" placeholder="Name">
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                                <button type="submit" class="btn btn-primary btn-sm">Subscribe</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- *** Blog Section End *** -->

@endsection
