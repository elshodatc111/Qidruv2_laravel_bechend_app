@extends('layouts.app')

@section('content')
<div class="container">
    <div class="justify-content-center">
        <div class="card">
            <div class="card-header"><h4>{{ $about['title'] }}</h4></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-2 text-center">
                        <img src="../images/{{ $about['image'] }}" style="width:100%">
                        
                    </div>
                    <div class="col-lg-5">
                        <ul>
                            <li><b>Hudud nomi: </b>  {{ $about['region'] }}</li>
                            <li><b>Hodim lavozim: </b>  {{ $about['toifa'] }}</li>
                            <li><b>Malumot turi: </b>  {{ $about['typing'] }}</li>
                            <li><b>Malumot yaratildi: </b>  {{ $about['created_at'] }}</li>
                            <li><b>Malumot yangilandi: </b>  {{ $about['updated_at'] }}</li>
                        </ul>
                    </div>
                    <div class="col-lg-5">
                        <form action="{{ route('updates_images',$about['id']) }}" method="post" enctype="multipart/form-data" class="w-100 text-center">
                            @csrf
                            @method('put')
                            <h5>Rasmni yangilash</h5>
                            <div class="row">
                                <div class="col-8">
                                    <input type="file" name="image" class="form-control" required>
                                </div>
                                <div class="col-4">
                                    <button type="submit" class="btn btn-primary w-100">Saqlash</button>
                                </div>
                            </div>
                        </form>
                        <hr>
                        <a href="{{ route('home_show_update',$about['id']) }}" class="btn btn-primary w-100">Malumotlarni yangilash</a>
                    </div>
                    <hr class="my-3">
                    <div class="col-lg-12">
                        {!! $about['description'] !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="card mt-3" style="display:none;">
            <div class="card-header">Qo'shimcha fayl yuklash</div>
            <div class="card-body">
                <div class="row ">
                    <div class="col-lg-6 text-center">
                        <form action="" method="post">
                            <label for="">Video fayl yuklash (.mp4 max:45MB)</label>
                            <input type="file" name="" required class="form-control">
                            <button type="submit" class="btn btn-primary w-100 mt-2">Saqlash</button>
                        </form>
                    </div>
                    <div class="col-lg-6 text-center">
                        <form action="" method="post">
                            <label for="">Rasm yuklash (.jpg, .png)</label>
                            <input type="file" name="" required class="form-control">
                            <button type="submit" class="btn btn-primary w-100 mt-2">Saqlash</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-100 mt-3 text-center" style="display:none;">
            <a href="#">Qo'shimcha yuklangan fayllar</a>
        </div>
    </div>
</div>
@endsection
