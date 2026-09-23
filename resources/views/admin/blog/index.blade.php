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
                    @if (request()->has('trashed'))
                        <div>
                            <h2 class="h5 mb-1 section-title"><i class="bi bi-table" aria-hidden="true"></i><span>Advanced
                                    Table</span></h2>
                            <p class="text-muted mb-0">Searchable responsive table for orders and customer data.</p>
                            <form class="mt-3" action="{{ route('blog.restore-all') }}" method="POST">
                                @csrf
                                <button class="btn btn-success">Restore all</button>
                            </form>
                        </div>
                    @else
                        <div>
                            <h2 class="h5 mb-1 section-title"><i class="bi bi-table" aria-hidden="true"></i><span>Advanced
                                    Table</span></h2>
                            <p class="text-muted mb-0">Searchable responsive table for orders and customer data.</p>
                            <form class="mt-3" action="{{ route('blog.destroyall') }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-success">Delete all</button>
                            </form>
                        </div>
                    @endif
                    <input class="form-control form-control-sm table-search" type="search" placeholder="Search orders"
                        data-table-search="ordersTable" aria-label="Search orders">
                    <div class="text-end">
                        @if (request()->has('trashed'))
                            <a href="{{ route('blogs.index') }}" class="btn btn-outline-success">
                                Barchasi
                            </a>

                        @else
                            <a href="{{ route('blogs.index', ['trashed' => 'true']) }}" class="btn btn-outline-danger">
                                Arxiv
                            </a>
                        @endif
                        <a href="{{ route('blog.export-pdf') }}" class="btn btn-success me-2 ms-2">
                            PDF yuklab olish
                        </a>

                        <a href="{{ route('blog.export-excel') }}" class="btn btn-primary me-2 ms-2">
                            EXCEL yuklab olish
                        </a>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Import Excel
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Excel orqali maqola import qilish
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <!-- Fayl yuklash formasi -->
                                        <form id="importForm" action="{{ route('blog.import') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="excelFile" class="form-label fw-bold">Excel faylni tanlang
                                                    (.xlsx, .xls):</label>
                                                <input type="file" class="form-control" name="file" id="excelFile" required>
                                            </div>
                                        </form>

                                        <hr class="my-4">

                                        <!-- Excel fayl namunasining HTML jadvallari -->
                                        <div class="excel-sample">
                                            <p class="fw-bold mb-2 text-secondary">
                                                <i class="bi bi-info-circle"></i> Excel faylingiz ustunlari tartibi va nomi
                                                quyidagicha bo'lishi kerak:
                                            </p>

                                            <div class="table-responsive">
                                                <table
                                                    class="table table-bordered table-striped align-middle text-center small mb-2">
                                                    <thead class="table-success">
                                                        <tr>
                                                            <th>sarlavha <span class="text-danger">*</span></th>
                                                            <th>content</th>
                                                            <th>kategoriya</th>
                                                            <th>user_id</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-start">Laravel 11 yangiliklari</td>
                                                            <td class="text-start">Yangi imkoniyatlar haqida...</td>
                                                            <td>Texnologiya</td>
                                                            <td>1</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-start">Python asoslari</td>
                                                            <td class="text-start">Dasturlash bo'yicha qo'llanma</td>
                                                            <td>Dasturlash</td>
                                                            <td><span class="text-muted">(bo'sh bo'lishi mumkin)</span></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                            <div class="alert alert-light border small mt-2 mb-0">
                                                <ul class="mb-0 ps-3">
                                                    <li><strong>sarlavha:</strong> Majburiy ustun. Bo'sh bo'lsa, satr
                                                        saqlanmaydi.</li>
                                                    <li><strong>kategoriya:</strong> Mavjud bo'lmasa, baza tomonidan
                                                        avtomatik yaratiladi.</li>
                                                    <li><strong>user_id:</strong> Bo me'yor bo'sh qoldirilsa, tizimga kirgan
                                                        foydalanuvchi ID'si olinadi.</li>
                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Yopish</button>
                                        <button onclick="document.getElementById('importForm').submit()" type="button"
                                            class="btn btn-success">
                                            Importni boshlash
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <a href="{{ route('blogs.create') }}" class="btn btn-primary">Yangi Post Qo'shish</a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table align-middle mb-0" id="ordersTable" data-searchable-table>
                        <thead>
                            <tr>
                                <th>T/R</th>
                                <th>Rasm</th>
                                <th>Sarlavha</th>
                                <th>Kategoriya</th>
                                <th>Teglar</th>
                                <th>Yaratilgan Sana</th>
                                <th class="text-end">Harakatlar</th>
                            </tr>
                        </thead>
                        @foreach ($blogs as $blog)
                            <tbody>
                                <tr>
                                    <td class="fw-semibold">
                                        {{ str_pad($blogs->firstItem() + $loop->index, 2, 0, STR_PAD_LEFT) }}
                                    </td>
                                    <td>
                                        <div class="table-media">
                                            @if ($blog->image)
                                                <img class="product-thumb"
                                                    src="{{ Str::startsWith($blog->image, ['https://', 'http://']) ? $blog->image : asset('storage/' . $blog->image) }}">
                                            @else
                                                <img src="https://media2.dev.to/dynamic/image/width=1080,height=1080,fit=cover,gravity=auto,format=auto/https%3A%2F%2Fdev-to-uploads.s3.amazonaws.com%2Fuploads%2Farticles%2F7n3mtkmhk0n75vemojcn.png"
                                                    alt="" class="product-thumb">
                                            @endif
                                            <span>{{ $blog->title }}</span>
                                        </div>
                                    </td>
                                    <td>{{ $blog->content }}</td>
                                    <td class="fw-semibold">{{ $blog->category ? $blog->category->name : 'Kategoriyasiz' }}</td>
                                    <td>
                                        @forelse ($blog->tags as $tag)
                                            <div class="badge bg-primary">
                                                <span>{{ $tag->name }}</span>
                                            </div>
                                        @empty
                                            <div class="badge bg-danger">
                                                <span>Tegsiz</span>
                                            </div>
                                        @endforelse
                                    </td>
                                    <td>{{ $blog->created_at->format('M d') }}, {{ $blog->created_at->format('Y') }}</td>
                                    <td class="text-end">
                                        @if (request()->has('trashed'))
                                            <form action="{{ route('blog.restore', $blog->id) }}" method="POST">
                                                @csrf
                                                <button class="btn btn-light btn-sm" type="submit">
                                                    <i class="bi bi-arrow-counterclockwise"></i>
                                                    Tiklash
                                                </button>
                                            </form>
                                        @endif
                                        @if (!request()->has('trashed'))
                                            <a href="" class="btn btn-light btn-sm" type="button">Batafsil</a>
                                            <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-light btn-sm"
                                                type="button">Tahrirlash</a>
                                            @can('delete', $blog)
                                                <form action="{{ route('blogs.destroy', $blog->id) }}" class="d-inline" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-light btn-sm" type="submit">O'chirish</button>
                                                </form>
                                            @endcan
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>
            </section>
            <div class="mt-3">
                {{ $blogs->appends(request()->query())->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </main>

@endsection