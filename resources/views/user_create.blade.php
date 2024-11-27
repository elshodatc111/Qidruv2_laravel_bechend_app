@extends('layouts.app')

@section('content')
<div class="container">
    <div class="justify-content-center">
        <div class="card">
            <div class="card-header">Yangi hodim</div>
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form action="{{ route('user_create_post') }}" method="post">
                    @csrf 
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="region_id" class="my-2 w-100 text-center">Hudud</label>
                            <select name="region_id" required class="form-select">
                                <option value="">Tanlang</option>
                                <option value="1">Barcha hududlar</option>
                                @foreach($Region as $item)
                                    <option value="{{ $item['id'] }}">{{ $item['region_name'] }}</option>
                                @endforeach
                            </select>
                            <label for="toifa_id" class="my-2 w-100 text-center">Lavozim</label>
                            <select name="toifa_id" required class="form-select">
                                <option value="">Tanlang</option>
                                @foreach($Toifa as $item)
                                    <option value="{{ $item['id'] }}">{{ $item['toifa_name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <label for="name" class="my-2 w-100 text-center">Hodim FIO</label>
                            <input type="text" name="name" required class="form-control">
                            <label for="email" class="my-2 w-100 text-center">Hodim Email</label>
                            <input type="email" name="email" required class="form-control">
                        </div>
                        <div class="col-lg-12 text-center mt-3">
                            <button type="submit" class="btn btn-primary w-50">Saqlash</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
