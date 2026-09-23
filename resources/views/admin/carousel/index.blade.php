@extends('layouts.app')

@section('content')

    <main class="dashboard-content">
        <div class="container-fluid px-3 px-lg-4 py-4">
            @if (session('error'))
                <div class="alert alert-danger mt-3 mb-3 d-flex justify-content-between">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success mt-3 mb-3 d-flex justify-content-between">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="page-heading">
                <div class="page-heading-copy">
                    <span class="page-icon"><i class="bi bi-table" aria-hidden="true"></i></span>
                    <div>
                        <p class="eyebrow mb-1">Data</p>
                        <h1 class="h3 mb-1">Tables</h1>
                        <p class="text-muted mb-0">Use responsive, searchable tables for operational records.</p>
                    </div>
                </div>

            </div>

            <section class="panel">
                <div class="panel-header">
                    <div>
                        <h2 class="h5 mb-1 section-title"><i class="bi bi-table" aria-hidden="true"></i><span>Advanced
                                Table</span></h2>
                        <p class="text-muted mb-0">Searchable responsive table for orders and customer data.</p>
                    </div>
                    <input class="form-control form-control-sm table-search" type="search" placeholder="Search orders"
                        data-table-search="ordersTable" aria-label="Search orders">
                    <div class="text-end">
                        <a href="{{ route('carousel.create') }}" class="btn btn-primary">Yangi Carousel Qo'shish</a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table align-middle mb-0" id="ordersTable" data-searchable-table>
                        <thead>
                            <tr>
                                <th>T/R</th>
                                <th>Rasm</th>
                                <th>Sarlavha</th>
                                <th>Yaratilgan Sana</th>
                                <th class="text-end">Harakatlar</th>
                            </tr>
                        </thead>
                        @foreach ($carousels as $carousel)
                            <tbody>
                                <tr>
                                    <td class="fw-semibold">
                                        {{ str_pad($carousels->firstItem() + $loop->index, 2, 0, STR_PAD_LEFT) }}
                                    </td>
                                    <td>
                                        <div class="table-media">
                                            @if ($carousel->image)
                                                <img class="product-thumb"
                                                    src="{{ Str::startsWith($carousel->image, ['https://', 'http://']) ? $carousel->image : asset('storage/' . $carousel->image) }}">
                                            @else
                                                <img src="https://media2.dev.to/dynamic/image/width=1080,height=1080,fit=cover,gravity=auto,format=auto/https%3A%2F%2Fdev-to-uploads.s3.amazonaws.com%2Fuploads%2Farticles%2F7n3mtkmhk0n75vemojcn.png"
                                                    alt="" class="product-thumb">
                                            @endif
                                            <span>{{ $carousel->title }}</span>
                                        </div>
                                    </td>
                                    <td>{{ $carousel->content }}</td>
                                    <td>{{ $carousel->created_at->format('M d') }}, {{ $carousel->created_at->format('Y') }}
                                    </td>
                                    <td class="text-end">
                                        <a href="" class="btn btn-light btn-sm" type="button">Batafsil</a>
                                        <a href="{{ route('carousel.edit', $carousel->id) }}" class="btn btn-light btn-sm"
                                            type="button">Tahrirlash</a>
                                        @can('delete', $carousel)
                                            <form action="{{ route('carousel.destroy', $carousel->id) }}" class="d-inline"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-light btn-sm" type="submit">O'chirish</button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>
            </section>
            <div class="mt-3">
                {{ $carousels->appends(request()->query())->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </main>

@endsection