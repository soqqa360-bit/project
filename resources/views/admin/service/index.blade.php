@extends('layouts.app')

@section('content')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

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
                        <a href="{{ route('services.create') }}" class="btn btn-primary">Yangi Service Qo'shish</a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table align-middle mb-0" id="ordersTable" data-searchable-table>
                        <thead>
                            <tr>
                                <th>T/R</th>
                                <th>Rasm & Icon</th>
                                <th>Sarlavha</th>
                                <th>Yaratilgan Sana</th>
                                <th class="text-end">Yaratgan Odam</th>
                                <th class="text-end">Harakatlar</th>
                            </tr>
                        </thead>
                        @foreach ($services as $service)
                            <tbody>
                                <tr>
                                    <td class="fw-semibold">
                                        {{ str_pad($services->firstItem() + $loop->index, 2, 0, STR_PAD_LEFT) }}
                                    </td>
                                    <td>
                                        <div class="table-media">
                                            @if ($service->image)
                                                <img class="product-thumb"
                                                    src="{{ Str::startsWith($service->image, ['https://', 'http://']) ? $service->image : asset('storage/' . $service->image) }}">

                                            @elseif($service->icon)
                                                <div class="product-thumb d-flex align-items-center justify-content-center bg-light border rounded"
                                                    style="width: 40px; height: 40px;">
                                                    <i class="{{ $service->icon }} fs-5 text-dark"></i>
                                                </div>
                                            @else
                                                <img src="https://media2.dev.to/dynamic/image/width=1080,height=1080,fit=cover,gravity=auto,format=auto/https%3A%2F%2Fdev-to-uploads.s3.amazonaws.com%2Fuploads%2Farticles%2F7n3mtkmhk0n75vemojcn.png"
                                                    alt="" class="product-thumb">
                                            @endif
                                            <span>{{ $service->title }}</span>
                                        </div>
                                    </td>
                                    <td>{{ $service->content }}</td>
                                    <td>{{ $service->created_at->format('M d') }}, {{ $service->created_at->format('Y') }}
                                    </td>
                                    <td>{{ $service->user->name }}</td>
                                    <td class="text-end">
                                        <a href="" class="btn btn-light btn-sm" type="button">Batafsil</a>
                                        <a href="{{ route('carousel.edit', $service->id) }}" class="btn btn-light btn-sm"
                                            type="button">Tahrirlash</a>
                                        @can('delete', $service)
                                            <form action="{{ route('services.destroy', $service->id) }}" class="d-inline"
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
                {{ $services->appends(request()->query())->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </main>

@endsection