@extends('layouts.app')

@section('content')

    <main class="dashboard-content">
        <div class="container-fluid px-3 px-lg-4 py-4">
            <div class="page-heading">
                <div class="page-heading-copy">
                    <span class="page-icon"><i class="bi bi-ui-checks-grid" aria-hidden="true"></i></span>
                    <div>
                        <p class="eyebrow mb-1">Inputs</p>
                        <h1 class="h3 mb-1">Forms</h1>
                        <p class="text-muted mb-0">Reusable form controls, validation states, and field layouts.</p>
                    </div>
                </div>

            </div>

            <section class="row g-3">
                <div class="col-12 col-xl-7">
                    <form class="panel" action="{{ route('blogs.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="panel-header">
                            <div>
                                <h2 class="h5 mb-1 section-title"><i class="bi bi-ui-checks-grid"
                                        aria-hidden="true"></i><span>Validation Form</span></h2>
                                <p class="text-muted mb-0">Bootstrap-ready fields with custom validation feedback.</p>
                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label class="form-label" for="formName">Rasm Yuklash</label>
                                <input onchange="imgFile(this)" name="image" class="form-control @error('image') is-invalid @enderror" type="file" id="formName">
                                <div id="previewImage" class="d-none mt-3 img-thumbnail">
                                    <img src="" alt="" id="imgshow" style="max-width: 400px;">
                                </div>
                                @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Sarlavha (UZ)</label>
                                <input name="title[uz]" value="{{ old('title.uz') }}" class="form-control @error('title.uz') is-invalid @enderror" type="text">
                                @error('title.uz')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Sarlavha (EN)</label>
                                <input name="title[en]" value="{{ old('title.en') }}" class="form-control @error('title.en') is-invalid @enderror" type="text">
                                @error('title.en')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Sarlavha (RU)</label>
                                <input name="title[ru]" value="{{ old('title.ru') }}" class="form-control @error('title.ru') is-invalid @enderror" type="text">
                                @error('title.ru')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-12"><label class="form-label" for="formPlan">Plan</label>
                                <select name="category_id" class="form-select @error('category_id') is-invalid @enderror" id="formPlan" >
                                    <option value="" disabled selected>Kategoriya Tanlang</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    @error('category_id')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12"><label class="form-label" for="formPlan">Tag</label>
                                <select name="tags[]" multiple class="form-select @error('tags') is-invalid @enderror" id="tags">
                                    <option value="" disabled selected>Teg Tanlang</option>
                                    @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                    @endforeach
                                </select>
                                @error('tags')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label class="form-label" for="formMessage">Message</label>
                                <textarea name="content[uz]" class="form-control @error('content.uz')is-invalid
                                    @enderror" id="formMessage" rows="5">{{ old('content.uz') }}</textarea>
                                @error('content.uz')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label class="form-label" for="formMessage">Message</label>
                                <textarea name="content[en]" class="form-control @error('content.en')is-invalid
                                    @enderror" id="formMessage" rows="5">{{ old('content.en') }}</textarea>
                                @error('content.en')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label class="form-label" for="formMessage">Message</label>
                                <textarea name="content[ru]" class="form-control @error('content.ru')is-invalid
                                    @enderror" id="formMessage" rows="5">{{ old('content.ru') }}</textarea>
                                @error('content.ru')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mt-4">
                            <button class="btn btn-primary" type="submit"><i class="bi bi-send" aria-hidden="true"></i>
                                Submit Form</button>
                            <a href="{{ route('blogs.index') }}" class="btn btn-secondary ms-2">Cancel</a>
                        </div>
                    </form>
                </div>
                <div class="col-12 col-xl-5">
                    <div class="panel h-100">
                        <h2 class="h5 mb-3 section-title"><i class="bi bi-input-cursor-text"
                                aria-hidden="true"></i><span>Input States</span></h2><input class="form-control mb-3"
                            value="Default input"><input class="form-control is-valid mb-3" value="Valid input"><input
                            class="form-control is-invalid mb-3" value="Invalid input">
                        <div class="form-check"><input class="form-check-input" type="checkbox" id="sampleCheck"
                                checked><label class="form-check-label" for="sampleCheck">Sample checkbox</label></div>
                    </div>
                </div>
            </section>
        </div>
    </main>

    <script>
        function imgFile(input) {
            const file = input.files[0]

            if (file) {
                document.getElementById('imgshow').src = URL.createObjectURL(file)
                document.getElementById('previewImage').classList.remove('d-none')
            }
        }
    </script>
@endsection