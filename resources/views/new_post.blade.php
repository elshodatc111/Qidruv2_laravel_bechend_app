@extends('layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" rel="stylesheet">
<div class="container">
    <div class="justify-content-center">
        <div class="card">
            <div class="card-header">Yangi POST</div>
            <div class="card-body">
                <div class="col-12">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                <form action="{{ route('new_post_create') }}" method="post"  enctype="multipart/form-data">
                    @csrf 
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="title" class="my-2" style="font-weight:500">Post sarlovhasi</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>
                        <div class="col-lg-4">
                            <label for="region_id" class="my-2" style="font-weight:500">Hudud</label>
                            <select name="region_id" required class="form-select">
                                <option value="">Tanlang</option>
                                <option value="1">Barcha hududlar</option>
                                @foreach($Region as $item)
                                <option value="{{ $item['id'] }}">{{ $item['region_name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-4">
                            <label for="toifa_id" class="my-2" style="font-weight:500">Lavozim</label>
                            <select name="toifa_id" required class="form-select">
                                <option value="">Tanlang</option>
                                <option value="1">Barchas hodimlarga</option>
                                @foreach($Toifa as $item)
                                <option value="{{ $item['id'] }}">{{ $item['toifa_name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-4">
                            <label for="typeing_id" class="my-2" style="font-weight:500">Malumot turi</label>
                            <select name="typeing_id" required class="form-select">
                                <option value="">Tanlang</option>
                                @foreach($Typeing as $item)
                                <option value="{{ $item['id'] }}">{{ $item['type_name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-12">
                            <label for="description" class="my-2" style="font-weight:500">Post haqida to'liq malumot</label>
                            <textarea id="summernote" name="description" required></textarea>
                        </div>
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-primary w-50 mt-3">Saqlash</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script>
    <script>
        $(document).ready(function() {
        // Initialize Summernote
        $('#summernote').summernote({
            placeholder: 'Post haqida malumotlarni kiriting...',
            tabsize: 2,
            height: 300,
            toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'italic', 'underline', 'clear']],
            ['fontname', ['fontname']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['insert', ['picture', 'link', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
        });
    </script>
@endsection
