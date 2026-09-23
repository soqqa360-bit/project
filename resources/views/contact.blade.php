@extends('layouts.master')

@section('content')

    <!-- Page Title -->
    <div class="page-title dark-background" data-aos="fade" style="background-image: url(assets/img/page-title-bg.webp);">
        <div class="container position-relative">
            <h1>Contact</h1>
            <p>
                Home
                /
                Contact
            </p>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li class="current">Contact</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

        <div class="mb-5">
            <iframe style="width: 100%; height: 400px;"
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621"
                frameborder="0" allowfullscreen=""></iframe>
        </div><!-- End Google Maps -->

        <div class="container" data-aos="fade">

            <div class="row gy-5 gx-lg-5">

                <div class="col-lg-4">

                    <div class="info">
                        <h3>Get in touch</h3>
                        <p>Et id eius voluptates atque nihil voluptatem enim in tempore minima sit ad mollitia commodi
                            minus.</p>

                        <div class="info-item d-flex">
                            <i class="bi bi-geo-alt flex-shrink-0"></i>
                            <div>
                                <h4>Location:</h4>
                                <p>A108 Adam Street, New York, NY 535022</p>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="info-item d-flex">
                            <i class="bi bi-envelope flex-shrink-0"></i>
                            <div>
                                <h4>Email:</h4>
                                <p>info@example.com</p>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="info-item d-flex">
                            <i class="bi bi-phone flex-shrink-0"></i>
                            <div>
                                <h4>Call:</h4>
                                <p>+1 5589 55488 55</p>
                            </div>
                        </div><!-- End Info Item -->

                    </div>

                </div>

                <div class="col-lg-8">
                    <form action="{{ route('contact.send') }}" class="p-4 shadow-sm rounded" style="height: 450px;"
                        method="POST" role="form">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="text" value="{{ auth()->check() ? auth()->user()->name : '' }}" {{ auth()->check() ? 'readonly' : '' }} name="name"
                                    class="form-control @error('name') is-invalid @enderror" id="name"
                                    placeholder="Your Name">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <input type="email" value="{{ auth()->check() ? auth()->user()->email : '' }}" {{ auth()->check() ? 'readonly' : '' }}
                                    class="form-control @error('email') is-invalid @enderror" name="email" id="email"
                                    placeholder="Your Email">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" value="{{ old('subject') }}"
                                class="form-control @error('subject') is-invalid @enderror" name="subject" id="subject"
                                placeholder="Subject">
                            @error('subject')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <textarea class="form-control @error('message') is-invalid @enderror" rows="6" name="message"
                                placeholder="Message">{{ old('message') }}</textarea>
                            @error('message')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        @if (session('success'))
                            <div class="alert alert-success mt-3 mb-3">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="text-center mt-3"><button class="btn btn-success px-4" type="submit">Send
                                Message</button></div>
                    </form>
                </div><!-- End Contact Form -->

            </div>

        </div>

    </section><!-- /Contact Section -->

@endsection