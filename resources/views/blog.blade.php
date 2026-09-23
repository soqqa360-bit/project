@extends('layouts.master')

@section('content')

    <!-- Page Title -->
    <div class="page-title dark-background" data-aos="fade" style="background-image: url(assets/img/page-title-bg.webp);">
        <div class="container position-relative">
            <h1>Blog</h1>
            <p>
                Home
                /
                Blog</p>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li class="current">Blog</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <!-- Blog Posts 2 Section -->
    <section id="blog-posts-2" class="blog-posts-2 section">

        <div class="container">
            <form action="{{ route('blog.page') }}" method="GET" class="mb-4">
                @csrf
                <div class="input-group mb-3" style="max-width: 500px;">
                    <input value="{{ $searchQuery }}" name="search" placeholder="Qidirish" class="form-control" type="text">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-search"></i>
                    </button>
                    @if ($searchQuery or $selectedTag)
                        <a href="{{ route('blog.page') }}" class="btn btn-danger">
                            <i class="bi bi-trash"></i>
                        </a>
                    @endif
                </div>

                @if ($searchQuery)
                    <small>
                        "<strong>{{ $searchQuery }}</strong>" bo'yicha
                        <strong>{{ $blogs->total() }}</strong> ta natija topildi
                    </small>
                @endif
            </form>
            <div class="d-flex mb-3 gap-3">
                <a href="{{ route('blog.page', array_filter(['search' => $searchQuery, 'tag' => $selectedTag ?: null])) }}" class="btn btn-sm {{ $selectedCategory === 0 ? 'btn-primary' : 'btn-outline-primary' }}">Barchasi</a>

                @foreach ($categories as $category)
                    <a href="{{ route('blog.page', array_filter(['search' => $searchQuery, 'tag' => $selectedTag ?: null, 'category' => $category->id])) }}" class="btn btn-sm {{ $selectedCategory === $category->id ? 'btn-primary' : 'btn-outline-primary' }}">
                        {{ $category->name }}
                        <span class="badge bg-white text-primary ms-2">{{ $category->blogs_count }}</span>
                    </a>
                @endforeach
            </div>
            <div class="row gy-4">

                @foreach ($blogs as $blog)
                    <div class="col-lg-4">
                        <article class="position-relative h-100">

                            <div class="post-img position-relative overflow-hidden">
                                @if ($blog->image)
                                    <img src="{{ Str::startsWith($blog->image, ['http://', 'https://']) ? $blog->image : asset('storage/' . $blog->image) }}"
                                        style="height: 300px; width: 100%; object-fit: cover;" class="img-fluid" alt="">
                                @else
                                    <img src="assets/img/blog/blog-1.jpg" style="height: 300px; width: 100%; object-fit: cover;"
                                        class="img-fluid" alt="">
                                @endif
                            </div>

                            <div class="meta d-flex align-items-end">
                                <span
                                    class="post-date"><span>{{ $blog->created_at->format('d') }}</span>{{ $blog->created_at->format('F') }}</span>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-person"></i> <span class="ps-2">{{ $blog->user->name }}</span>
                                </div>
                                <span class="px-3 text-black-50">/</span>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-folder2"></i> <span class="ps-2">{{ $blog->category->name }}</span>
                                </div>
                            </div>

                            <div class="post-content d-flex flex-column">

                                <h3 class="post-title">{{ $blog->title }}</h3>
                                <a href="{{ route('blog.detail', $blog->slug) }}" class="readmore stretched-link"><span>Read More</span><i
                                        class="bi bi-arrow-right"></i></a>

                            </div>

                        </article>
                    </div>
                @endforeach
            </div>
            <div class="mt-5">
                {{ $blogs->appends(request()->query())->links('pagination::bootstrap-5') }}
            </div>
        </div>

    </section><!-- /Blog Posts 2 Section -->


@endsection