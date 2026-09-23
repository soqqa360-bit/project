@extends('layouts.master')

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.3.1/css/all.min.css" integrity="sha512-QeR2VH+lsBE5LSAe1Q5EnTBbe7XTBubt8dG93Y7gidSgdMCr8nVqKcfKAMyN96SV8KDbZVTDXChatu5G2KQGzg==" crossorigin="anonymous" referrerpolicy="no-referrer">

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

        <div id="hero-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

            @foreach ($carousels as $carousel)
                <div class="carousel-item active">
                <img src="{{ asset('storage/'. $carousel->image) }}" alt="">
                <div class="carousel-container">
                    <h2>{{ $carousel->title }}</h2>
                    <p>{{ $carousel->content }}</p>
                </div>
            </div>
            @endforeach

            <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
            </a>

            <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
            </a>

            <ol class="carousel-indicators"></ol>

        </div>

    </section><!-- /Hero Section -->

    <!-- Services Section -->
    <section id="services" class="services section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>{{ __('service') }}</h2>
            <p>{{ __('fresh_produce') }}</p>
        </div><!-- End Section Title -->
        <div class="content">
            <div class="container">
                <div class="row g-0">
                    @foreach ($services as $service)
                        <div class="col-lg-3 col-md-6">
                        <div class="service-item">
                            <span class="number">{{ str_pad($services->firstItem() + $loop->index, 2, 0, STR_PAD_LEFT) }}</span>
                            <div class="service-item-icon">
                                @if ($service->icon)
                                <div style="height: 90px;">
                                    <i class="{{ $service->icon }}" style="font-size: 70px;"></i>
                                </div>
                                @elseif($service->image)
                                <div style="height: 90px;">
                                    <img style="width: 100%;" src="{{{ asset('storage/'. $service->image) }}}" alt="">
                                </div>
                                @endif
                            </div>
                            <div class="service-item-content">
                                <h3 class="service-heading">{{ $service->title }}</h3>
                                <p>
                                    {{ $service->content }}
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section><!-- /Services Section -->

    <!-- About Section -->
    <section id="about" class="about section">

        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mb-4 mb-lg-0">
                        <img src="{{ asset('assets/img/img_long_5.jpg') }}" alt="Image " class="img-fluid img-overlap"
                            data-aos="zoom-out">
                    </div>
                    <div class="col-lg-5 ml-auto" data-aos="fade-up" data-aos-delay="100">
                        <h3 class="content-subtitle text-white opacity-50">{{ __('choose_reason') }}</h3>
                        <h2 class="content-title mb-4">
                            {{ __('about_village') }}
                        </h2>
                        <p class="opacity-50">
                            Reprehenderit, odio laboriosam? Blanditiis quae ullam quasi illum
                            minima nostrum perspiciatis error consequatur sit nulla.
                        </p>

                        <div class="row my-5">
                            <div class="col-lg-12 d-flex align-items-start mb-4">
                                <i class="bi bi-cloud-rain me-4 display-6"></i>
                                <div>
                                    <h4 class="m-0 h5 text-white">{{ __('plants') }}</h4>
                                    <p class="text-white opacity-50">Lorem ipsum dolor sit amet.</p>
                                </div>
                            </div>
                            <div class="col-lg-12 d-flex align-items-start mb-4">
                                <i class="bi bi-heart me-4 display-6"></i>
                                <div>
                                    <h4 class="m-0 h5 text-white">{{ __('organic_food') }}</h4>
                                    <p class="text-white opacity-50">Lorem ipsum dolor sit amet.</p>
                                </div>
                            </div>
                            <div class="col-lg-12 d-flex align-items-start">
                                <i class="bi bi-shop me-4 display-6"></i>
                                <div>
                                    <h4 class="m-0 h5 text-white">{{ __('veggies') }}</h4>
                                    <p class="text-white opacity-50">Lorem ipsum dolor sit amet.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /About Section -->

    <!-- About 3 Section -->
    <section id="about-3" class="about-3 section">

        <div class="container">
            <div class="row gy-4 justify-content-between align-items-center">
                <div class="col-lg-6 order-lg-2 position-relative" data-aos="zoom-out">
                    <img src="{{ asset('assets/img/img_sq_1.jpg') }}" alt="Image" class="img-fluid">
                    <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox pulsating-play-btn">
                        <span class="play"><i class="bi bi-play-fill"></i></span>
                    </a>
                </div>
                <div class="col-lg-5 order-lg-1" data-aos="fade-up" data-aos-delay="100">
                    <h2 class="content-title mb-4">{{ __('plants_make') }}</h2>
                    <p class="mb-4">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim
                        necessitatibus placeat, atque qui voluptatem velit explicabo vitae
                        repellendus architecto provident nisi ullam minus asperiores commodi!
                        Tenetur, repellat aliquam nihil illo.
                    </p>
                    <ul class="list-unstyled list-check">
                        <li>Lorem ipsum dolor sit amet</li>
                        <li>Velit explicabo vitae repellendu</li>
                        <li>Repellat aliquam nihil illo</li>
                    </ul>

                    <p><a href="#" class="btn-cta">{{ __('get_in_touch') }}</a></p>
                </div>
            </div>
        </div>
    </section><!-- /About 3 Section -->

    <!-- Services 2 Section -->
    <section id="services-2" class="services-2 section dark-background">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>{{ __('service') }}</h2>
            <p>Necessitatibus eius consequatur</p>
        </div><!-- End Section Title -->

        <div class="services-carousel-wrap">
            <div class="container">
                <div class="swiper init-swiper">
                    <script type="application/json" class="swiper-config">
                              {
                                "loop": true,
                                "speed": 600,
                                "autoplay": {
                                  "delay": 5000
                                },
                                "slidesPerView": "auto",
                                "pagination": {
                                  "el": ".swiper-pagination",
                                  "type": "bullets",
                                  "clickable": true
                                },
                                "navigation": {
                                  "nextEl": ".js-custom-next",
                                  "prevEl": ".js-custom-prev"
                                },
                                "breakpoints": {
                                  "320": {
                                    "slidesPerView": 1,
                                    "spaceBetween": 40
                                  },
                                  "1200": {
                                    "slidesPerView": 3,
                                    "spaceBetween": 40
                                  }
                                }
                              }
                            </script>
                    <button class="navigation-prev js-custom-prev">
                        <i class="bi bi-arrow-left-short"></i>
                    </button>
                    <button class="navigation-next js-custom-next">
                        <i class="bi bi-arrow-right-short"></i>
                    </button>
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="service-item">
                                <div class="service-item-contents">
                                    <a href="#">
                                        <span class="service-item-category">We do</span>
                                        <h2 class="service-item-title">Planting</h2>
                                    </a>
                                </div>
                                <img src="{{ asset('assets/img/img_sq_1.jpg') }}" alt="Image" class="img-fluid">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="service-item">
                                <div class="service-item-contents">
                                    <a href="#">
                                        <span class="service-item-category">We do</span>
                                        <h2 class="service-item-title">Mulching</h2>
                                    </a>
                                </div>
                                <img src="{{ asset('assets/img/img_sq_3.jpg') }}" alt="Image" class="img-fluid">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="service-item">
                                <div class="service-item-contents">
                                    <a href="#">
                                        <span class="service-item-category">We do</span>
                                        <h2 class="service-item-title">Watering</h2>
                                    </a>
                                </div>
                                <img src="{{ asset('assets/img/img_sq_8.jpg') }}" alt="Image" class="img-fluid">
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="service-item">
                                <div class="service-item-contents">
                                    <a href="#">
                                        <span class="service-item-category">We do</span>
                                        <h2 class="service-item-title">Fertilizing</h2>
                                    </a>
                                </div>
                                <img src="{{ asset('assets/img/img_sq_4.jpg') }}" alt="Image" class="img-fluid">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="service-item">
                                <div class="service-item-contents">
                                    <a href="#">
                                        <span class="service-item-category">We do</span>
                                        <h2 class="service-item-title">Harvesting</h2>
                                    </a>
                                </div>
                                <img src="{{ asset('assets/img/img_sq_5.jpg') }}" alt="Image" class="img-fluid">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="service-item">
                                <div class="service-item-contents">
                                    <a href="#">
                                        <span class="service-item-category">We do</span>
                                        <h2 class="service-item-title">Mowing</h2>
                                    </a>
                                </div>
                                <img src="{{ asset('assets/img/img_sq_6.jpg') }}" alt="Image" class="img-fluid">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="service-item">
                                <div class="service-item-contents">
                                    <a href="#">
                                        <span class="service-item-category">We do</span>
                                        <h2 class="service-item-title">Seeding Plants</h2>
                                    </a>
                                </div>
                                <img src="{{ asset('assets/img/img_sq_8.jpg') }}" alt="Image" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </section><!-- /Services 2 Section -->

    <!-- Testimonials Section -->
    <section class="testimonials-12 testimonials section" id="testimonials">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>{{ __('testimonials') }}</h2>
            <p>Necessitatibus eius consequatur</p>
        </div><!-- End Section Title -->

        <div class="testimonial-wrap">
            <div class="container">
                <div class="row">
                    @foreach ($latestComments as $latestComment)
                        <div class="col-md-6 mb-4 mb-md-4">
                            <div class="testimonial">
                                @if ($latestComment->user->avatar)
                                <img src="{{ asset('storage/'. $latestComment->user->avatar) }}" alt="Testimonial author">
                                @else
                                <img src="https://www.shutterstock.com/image-vector/image-not-found-grayscale-photo-260nw-1737334631.jpg" alt="">
                                @endif
                                <blockquote>
                                    <p>
                                        {{ $latestComment->comment }}
                                    </p>
                                </blockquote>
                                <p class="client-name">{{ $latestComment->user->name }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section><!-- /Testimonials Section -->

    <!-- Recent Posts Section -->
    <section id="recent-posts" class="recent-posts section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>{{ __('recent_post') }}</h2>
            <p>Necessitatibus eius consequatur</p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row gy-5">
                @foreach ($recentPosts as $recentPost)
                    <div class="col-xl-4 col-md-6">
                        <div class="post-item position-relative h-100" data-aos="fade-up" data-aos-delay="100">

                            <div class="post-img position-relative overflow-hidden">
                                @if ($recentPost->image)
                                    <img src="{{ Str::startsWith($recentPost->image, ['http://', 'https://']) ? $recentPost->image : asset('storage/' . $recentPost->image) }}" class="img-fluid" alt="">
                                @else
                                    <img src="https://www.tea-tron.com/antorodriguez/blog/wp-content/uploads/2016/04/image-not-found-4a963b95bf081c3ea02923dceaeb3f8085e1a654fc54840aac61a57a60903fef.png"
                                        alt="" class="img-fluid">
                                @endif
                                <span class="post-date">{{ $recentPost->created_at->format('F d') }}</span>
                            </div>

                            <div class="post-content d-flex flex-column">

                                <h3 class="post-title">{{ Str::limit($recentPost->title, 30) }}</h3>

                                <div class="meta d-flex align-items-center">
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-person"></i> <span class="ps-2">{{ $recentPost->user->name }}</span>
                                    </div>
                                    <span class="px-3 text-black-50">/</span>
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-folder2"></i> <span
                                            class="ps-2">{{ $recentPost->category->name }}</span>
                                    </div>
                                </div>

                                <hr>

                                <a href="{{ route('blog.detail', $recentPost->slug) }}"
                                    class="readmore stretched-link"><span>{{ __('read_more') }}</span><i class="bi bi-arrow-right"></i></a>

                            </div>

                        </div>
                    </div>
                @endforeach
            </div>

        </div>

    </section><!-- /Recent Posts Section -->

@endsection