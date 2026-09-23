@extends('layouts.master')

@section('content')

    <!-- Page Title -->
    <div class="page-title dark-background" data-aos="fade"
        style="background-image: url( {{ asset('assets/img/page-title-bg.webp') }} );">
        <div class="container position-relative">
            <h1>Blog Details</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ route('home.page') }}">Home</a></li>
                    <li><a href="{{ route('blog.page') }}">Blog</a></li>
                    <li class="current">Blog Details</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <div class="container">
        <div class="row">

            <!-- Main Content Column -->
            <div class="col-lg-8">

                <!-- Blog Details Section -->
                <section id="blog-details" class="blog-details section">
                    <div class="container p-0">

                        <article class="article">

                            <div class="post-img">
                                @if ($blog->image)
                                    <img src="{{ Str::startsWith($blog->image, ['https://', 'http://']) ? $blog->image : asset('storage/' . $blog->image) }}"
                                        style="height: 300px; width: 100%; object-fit: cover;" class="img-fluid" alt="">
                                @else
                                    <img src="{{ asset('assets/img/blog/blog-1.jpg') }}"
                                        style="height: 300px; width: 100%; object-fit: cover;" class="img-fluid" alt="">
                                @endif
                            </div>

                            <h2 class="title">{{ $blog->title }}</h2>

                            <div class="meta-top">
                                <ul>
                                    <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                            href="#">{{ $blog->user->name }}</a></li>
                                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="#"><time
                                                datetime="2020-01-01">{{ $blog->created_at->format('M d, Y') }}</time></a>
                                    </li>
                                    <li class="d-flex align-items-center"><i class="bi bi-folder-fill"></i>
                                        <a
                                            href="{{ route('blog.page', ['category' => $blog->category->id]) }}">{{ $blog->category->name }}</a>
                                    </li>

                                    <li class="d-flex align-items-center">
                                        <i class="bi bi-clock-fill"></i>
                                        <span>O'qish vaqti: {{ $blog->reading_time }}</span>
                                    </li>

                                    <li class="d-flex align-items-center">
                                        <i class="bi bi-eye"></i>
                                        <span>Ko'rishlar Soni: {{ number_format($blog->views) }}</span>
                                    </li>
                                </ul>
                            </div><!-- End meta top -->

                            <div class="content">
                                <p>
                                    {!! nl2br(e($blog->content)) !!}
                                </p>
                            </div><!-- End post content -->

                            <div class="meta-bottom">
                                <i class="bi bi-folder"></i>
                                <ul class="cats">
                                    <li><a href="#">{{ $blog->category->name }}</a></li>
                                </ul>

                                @if ($blog->tags->count() > 0)
                                    <i class="bi bi-tags"></i>
                                    <ul class="tags">
                                        @foreach ($blog->tags as $tag)
                                            <li><a href="{{ route('blog.page', ['tag' => $tag->id]) }}">{{ $tag->name }}</a></li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div><!-- End meta bottom -->

                        </article>

                    </div>
                </section><!-- /Blog Details Section -->

                <!-- Blog Comments Section -->
                <section id="blog-comments" class="blog-comments section">
                    <div class="container p-0">

                        <h4 class="comments-count">{{ $blog->comments->count() }} Comments</h4>

                        @foreach ($blog->comments as $comment)
                            <div class="comment">
                                <div>
                                    <div style="width: 30px; height: 30px;"
                                        class="comment-img d-flex align-items-center justify-content-center rounded-circle bg-secondary text-white">
                                        <span>{{ strtoupper(substr($comment->user->name, 0, 1)) }}</span>
                                    </div>
                                    <div class="d-flex align-items-center gap-3">
                                        <h5><a href="">{{ $comment->user->name }}</a> <a href="#" class="reply"><i
                                                    class="bi bi-reply-fill"></i> Reply</a></h5>
                                        @can('delete', $comment)
                                            <form action="{{ route('comments.delete', $comment->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        @endcan
                                    </div>
                                    <time datetime="2020-01-01">{{ $comment->created_at->format('d M, Y') }}</time>
                                    <p>
                                        {!! nl2br($comment->comment) !!}
                                    </p>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </section><!-- /Blog Comments Section -->

                <!-- Comment Form Section -->
                <section id="comment-form" class="comment-form section">
                    <div class="container p-0">

                        @auth
                            <form action="{{ route('comments.store', $blog->id) }}" method="POST">
                                @csrf
                                <h4>Post Comment</h4>
                                <p>Your email address will not be published. Required fields are marked * </p>
                                <div class="row">
                                    <div class="col form-group">
                                        <textarea name="comment" class="form-control" placeholder="Your Comment*"></textarea>
                                    </div>
                                </div>

                                <div class="text-center mt-3">
                                    <button type="submit" class="btn btn-primary">Post Comment</button>
                                </div>
                            </form>
                        @else
                            <div class="text-center">
                                <p>Comment Yozishga Tizimga Kiring</p>
                                <div class="btn-group">
                                    <a class="btn btn-success btn-sm" href="{{ route('login') }}">Kirish</a>
                                    <a class="btn btn-danger btn-sm" href="{{ route('register') }}">Ro'yhatdan O'tish</a>
                                </div>
                            </div>
                        @endauth

                    </div>
                </section><!-- /Comment Form Section -->

            </div><!-- End Main Content Column -->

            <!-- Sidebar Column -->
            <div class="col-lg-4 sidebar">
                <div class="widgets-container">

                    <!-- Blog Author Widget -->
                    <div class="blog-author-widget widget-item">
                        <div class="d-flex flex-column align-items-center">
                            <div class="d-flex align-items-center w-100">
                                <div>
                                    <h4>{{ $blog->user->name }}</h4>
                                    <div class="social-links">
                                        <a target="_blank"
                                            href="https://twitter.com/{{ urlencode($blog->title) }} & url={{ urlencode(url()->current()) }}"><i
                                                class="bi bi-twitter-x"></i></a>
                                        <a href="https://facebook.com/#"><i class="bi bi-facebook"></i></a>
                                        <a title="Telegram ulashish" target="_blank"
                                            href="https://t.me/share/url? url={{ urlencode(url()->current()) }}"><i
                                                class="bi bi-telegram"></i></a>
                                        <a
                                            href="https://linkedin.com/{{ urlencode($blog->title) }} & url={{ urlencode(url()->current()) }}"><i
                                                class="bi bi-linkedin"></i></a>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-2">
                                Ushbu blogni muallifi
                            </p>
                        </div>
                    </div><!--/Blog Author Widget -->

                    <!-- Search Widget -->
                    <div class="search-widget widget-item">
                        <h3 class="widget-title">Search</h3>
                        <form action="{{ route('blog.page') }}" method="GET">
                            <input name="search" type="text">
                            <button type="submit" title="Search"><i class="bi bi-search"></i></button>
                        </form>
                    </div><!--/Search Widget -->

                    <!-- Categories Widget -->
                    <div class="categories-widget widget-item">
                        <h3 class="widget-title">Categories</h3>
                        <ul class="mt-3">
                            @forelse($categories as $category)
                                <li><a href="{{ route('blog.page', ['category' => $category->id]) }}">{{ $category->name }}
                                        <span>({{ $category->blogs_count }})</span></a></li>
                            @empty
                            @endforelse
                        </ul>
                    </div><!--/Categories Widget -->

                    <!-- Recent Posts Widget 2 -->
                    <div class="recent-posts-widget-2 widget-item">
                        <h3 class="widget-title">Recent Posts</h3>
                        @forelse($recentBlogs as $recentBlog)
                            <div class="post-item">
                                <h4><a href="{{ route('blog.detail', $recentBlog->slug) }}">{{ $recentBlog->title }}</a></h4>
                                <time datetime="2020-01-01">{{ $recentBlog->created_at->format('M d, Y') }}</time>
                            </div>
                        @empty
                            <p>Boshqa bloglar mavjud emas</p>
                        @endforelse
                    </div><!--/Recent Posts Widget 2 -->

                    <!-- Popular Posts -->
                    <div class="recent-posts-widget-2 widget-item">
                        <h3 class="widget-title">Popular Posts</h3>
                        @forelse($popularBlogs as $popularBlog)
                            <div class="post-item">
                                <h4><a href="{{ route('blog.detail', $popularBlog->slug) }}">{{ $popularBlog->title }}</a></h4>
                                <span> Ko'rishlar Soni: {{ number_format($popularBlog->views) }} ta</span>
                            </div>
                        @empty
                            <p>Boshqa bloglar mavjud emas</p>
                        @endforelse
                    </div>

                    <!-- Topical Posts -->
                    <div class="recent-posts-widget-2 widget-item">
                        <h3 class="widget-title">Topical Posts</h3>
                        @forelse($topicalBlogs as $topicalBlog)
                            <div class="post-item">
                                <h4><a href="{{ route('blog.detail', $topicalBlog->slug) }}">{{ $topicalBlog->title }}</a></h4>
                                <span> Ko'rishlar Soni: {{ number_format($topicalBlog->views) }} ta</span>
                            </div>
                        @empty
                            <p>Boshqa bloglar mavjud emas</p>
                        @endforelse
                    </div>

                    <!-- Tags Widget -->
                    <div class="tags-widget widget-item">
                        <h3 class="widget-title">Tags</h3>
                        <ul>
                            @foreach ($tags as $tag)
                                <li><a href="{{ route('blog.page', ['tag' => $tag->id]) }}">{{ $tag->name }}</a></li>
                            @endforeach
                        </ul>
                    </div><!--/Tags Widget -->

                </div>
            </div><!-- End Sidebar Column -->

        </div>
    </div>

@endsection