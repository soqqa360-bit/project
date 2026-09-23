<!DOCTYPE html>
<html lang="uz">

<head>
    <meta charset="UTF-8">
    <title>Blog Postlar Ro'yxati</title>
    <style>

        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        body {
            font-family: 'DejaVu Sans', sans-serif, -apple-system, Arial;
            color: #1e293b;
            margin: 0;
            padding: 0;
            font-size: 9pt;
            line-height: 1.3;
        }

        /* Sarlavha Qismi */
        .header-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 16px;
            border-bottom: 2px solid #2563eb;
            padding-bottom: 12px;
        }

        .header-title {
            font-size: 18pt;
            font-weight: bold;
            color: #0f172a;
            margin: 0 0 4px 0;
        }

        .header-meta {
            font-size: 8.5pt;
            color: #64748b;
            margin: 0;
        }

        .stat-badge {
            display: inline-block;
            background-color: #eff6ff;
            color: #1d4ed8;
            border: 1px solid #bfdbfe;
            padding: 5px 12px;
            border-radius: 6px;
            font-size: 8.5pt;
            font-weight: bold;
        }

        /* Asosiy Jadval Stillari */
        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 4px;
        }

        .data-table th {
            background-color: #0f172a;
            color: #ffffff;
            font-size: 8pt;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 8px 10px;
            text-align: left;
            border: none;
        }

        .data-table td {
            padding: 8px 10px;
            vertical-align: middle;
            border-bottom: 1px solid #e2e8f0;
            font-size: 8.5pt;
            color: #334155;
        }

        .data-table tr:nth-child(even) {
            background-color: #f8fafc;
        }

        /* Ustunlar O'lchami */
        .col-id {
            width: 35px;
            text-align: center;
            font-weight: bold;
            color: #64748b;
        }

        .col-img {
            width: 50px;
            text-align: center;
        }

        .col-title {
            width: 180px;
            font-weight: bold;
            color: #0f172a;
        }

        .col-content {
            width: auto;
            color: #475569;
            font-size: 8pt;
            line-height: 1.35;
        }

        .col-cat {
            width: 110px;
        }

        .col-tags {
            width: 130px;
        }

        .col-date {
            width: 95px;
            text-align: center;
            color: #64748b;
            font-size: 8pt;
            white-space: nowrap;
        }

        /* Yordamchi Elementlar */
        .product-thumb {
            width: 32px;
            height: 32px;
            border-radius: 4px;
            object-fit: cover;
            border: 1px solid #cbd5e1;
            display: block;
            margin: 0 auto;
        }

        .thumb-placeholder {
            width: 32px;
            height: 32px;
            border-radius: 4px;
            background-color: #e2e8f0;
            color: #475569;
            font-weight: bold;
            font-size: 10pt;
            line-height: 32px;
            text-align: center;
            margin: 0 auto;
            border: 1px solid #cbd5e1;
        }

        .category-tag {
            display: inline-block;
            background-color: #f1f5f9;
            color: #0f172a;
            border: 1px solid #cbd5e1;
            padding: 2px 7px;
            border-radius: 4px;
            font-size: 7.5pt;
            font-weight: bold;
        }

        .badge-tag {
            display: inline-block;
            background-color: #eff6ff;
            color: #1e40af;
            border: 1px solid #dbeafe;
            padding: 2px 5px;
            border-radius: 3px;
            font-size: 7pt;
            margin-right: 2px;
            margin-bottom: 2px;
        }

        .badge-empty {
            display: inline-block;
            background-color: #fef2f2;
            color: #991b1b;
            border: 1px solid #fecaca;
            padding: 2px 5px;
            border-radius: 3px;
            font-size: 7pt;
        }
    </style>
</head>

<body>

    <!-- Header qismi -->
    <table class="header-table">
        <tr>
            <td style="padding:0; vertical-align:bottom;">
                <h1 class="header-title">Blog Postlari Ro'yxati</h1>
                <p class="header-meta">
                    Yuklab olingan sana: {{ now()->format('d.m.Y H:i') }} &nbsp;|&nbsp; Mansublik: Admin Panel
                </p>
            </td>
            <td style="padding:0; text-align:right; vertical-align:bottom;">
                <div class="stat-badge">Jami: {{ $blogs->count() }} ta post</div>
            </td>
        </tr>
    </table>

    <!-- Jadval qismi -->
    <table class="data-table">
        <thead>
            <tr>
                <th class="col-id">T/R</th>
                <th class="col-img">Rasm</th>
                <th class="col-title">Sarlavha</th>
                <th class="col-content">Tavsif / Mazmun</th>
                <th class="col-cat">Kategoriya</th>
                <th class="col-tags">Teglar</th>
                <th class="col-date">Yaratilgan Sana</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($blogs as $blog)
                <tr>
                    <td class="col-id">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</td>
                    <td class="col-img">
                        @if ($blog->image)
                            <img class="product-thumb" src="{{ public_path('storage/' . $blog->image) }}">
                        @else
                            <span class="product-thumb">{{ strtoupper(substr($blog->title, 0, 1)) }}</span>
                        @endif
                    </td>
                    <td class="col-title">{{ $blog->title }}</td>
                    <td class="col-content">{{ Str::limit($blog->content, 120) }}</td>
                    <td class="col-cat">
                        <span class="category-tag">{{ $blog->category->name ?? 'Kategoriyasiz' }}</span>
                    </td>
                    <td class="col-tags">
                        @forelse ($blog->tags as $tag)
                            <span class="badge-tag">#{{ $tag->name }}</span>
                        @empty
                            <span class="badge-empty">Tegsiz</span>
                        @endforelse
                    </td>
                    <td class="col-date">{{ $blog->created_at ? $blog->created_at->format('d.m.Y') : '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>