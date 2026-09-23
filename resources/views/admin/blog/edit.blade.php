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
                    <form class="panel" action="{{ route('blogs.update', $blog->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
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
                                <input onchange="imgFile(this)" name="image" class="form-control" type="file" id="formName">
                                @if ($blog->image)
                                    <div id="previewImage" class="mt-3 img-thumbnail">
                                        <img class="w-100" src="{{ asset('storage/' . $blog->image) }}" alt="" id="imgshow">
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Sarlavha</label>
                                <input value="{{ $blog->title }}" name="title"
                                    class="form-control @error('title') is-invalid @enderror" type="text" required>
                                @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-12 col-lg-6"><label class="form-label" for="formPlan">Kategoriya</label>
                            <select name="category_id" class="form-select" id="formPlan" required>
                                    <option value="" disabled selected>Kategoriya Tanlang</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == $blog->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">Choose a plan.</div>
                            </div>
                            <div class="col-md-12 col-lg-6"><label class="form-label" for="formPlan">Tag</label>
                                <select name="tags[]" multiple class="form-select" id="tags" required>
                                    <option value="" disabled selected>Teg Tanlang</option>
                                    @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}" {{ $blog->tags->contains($tag->id) ? 'selected' : '' }}>{{ $tag->name }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">Choose a plan.</div>
                            </div>
                            <div class="col-12">
                                <label class="form-label" for="formMessage">Message</label>
                                <textarea name="content" class="form-control @error('content')is-invalid
                                                @enderror" id="formMessage" rows="5"
                                    required>{{ $blog->content }}</textarea>
                                @error('content')
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