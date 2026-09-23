@extends('layouts.app')

@section('content')
    <main class="dashboard-content">
        <div class="container-fluid px-3 px-lg-4 py-4">
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
                    <a href="{{ route('tags.create') }}" class="btn btn-primary">Yangi Post Qo'shish</a>
                </div>
                <div class="table-responsive">
                    <table class="table align-middle mb-0" id="ordersTable" data-searchable-table>
                        <thead>
                            <tr>
                                <th>T/R</th>
                                <th>Tag</th>
                                <th>Yaratilgan Sana</th>
                                <th class="text-end">Harakatlar</th>
                            </tr>
                        </thead>
                        @foreach ($tags as $tag)
                            <tbody>
                                <tr>
                                    <td class="fw-semibold">{{ str_pad($loop->iteration, 2, 0, STR_PAD_LEFT) }}</td>
                                    <td>{{ $tag->name }}</td>
                                    <td>{{ $tag->created_at->format('M d') }}, {{ $tag->created_at->format('Y')  }}
                                    </td>
                                    <td class="text-end">
                                        <a href="" class="btn btn-light btn-sm" type="button">Batafsil</a>
                                        <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-light btn-sm"
                                            type="button">Tahrirlash</a>
                                        <form action="{{ route('tags.destroy', $tag->id) }}" class="d-inline"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-light btn-sm" type="submit">O'chirish</button>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>
            </section>
        </div>
    </main>
@endsection