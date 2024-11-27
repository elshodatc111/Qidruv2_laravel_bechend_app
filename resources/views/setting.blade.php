@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header text-center"><b>Hududlar</b></div>
                <div class="card-body">
                    <table class="table table-bordered text-center" style="font-size:14px;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Hudud nomi</th>
                                <th>O'chirish</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($Region as $item)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $item['region_name'] }}</td>
                                <td>
                                    <form action="{{ route('setting_delete',$item['id']) }}" method="post">
                                        @csrf 
                                        @method('delete')
                                        <input type="hidden" name="type" value="region_name">
                                        <button class="btn btn-danger p-0 px-1 m-0" type="submit"><i class="bi bi-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <hr>
                    <form action="{{ route('setting_create_rigion') }}" method="post">
                        @csrf 
                        <input class="form-control" name="region_name" placeholder="Yangi hudud nomi" required>
                        <button class="btn btn-primary w-100 mt-2" type="submit">Hududni saqlash</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header text-center"><b>Lavozimlar</b></div>
                <div class="card-body">
                    <table class="table table-bordered text-center" style="font-size:14px;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Lavozim nomi</th>
                                <th>O'chirish</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($Toifa as $item)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $item['toifa_name'] }}</td>
                                <td>
                                    <form action="{{ route('setting_delete',$item['id']) }}" method="post">
                                        @csrf 
                                        @method('delete')
                                        <input type="hidden" name="type" value="toifa_name">
                                        <button class="btn btn-danger p-0 px-1 m-0" type="submit"><i class="bi bi-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <hr>
                    <form action="{{ route('setting_create_toifa') }}" method="post">
                        @csrf 
                        <input class="form-control" name="toifa_name" placeholder="Lavozim nomi" required>
                        <button class="btn btn-primary w-100 mt-2" type="submit">Lavozimni saqlash</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header text-center"><b>Ma'lumot turlari</b></div>
                <div class="card-body">
                    <table class="table table-bordered text-center" style="font-size:14px;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Ma'lumot turi</th>
                                <th>O'chirish</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($Typeing as $item)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $item['type_name'] }}</td>
                                <td>
                                    <form action="{{ route('setting_delete',$item['id']) }}" method="post">
                                        @csrf 
                                        @method('delete')
                                        <input type="hidden" name="type" value="type_name">
                                        <button class="btn btn-danger p-0 px-1 m-0" type="submit"><i class="bi bi-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <hr>
                    <form action="{{ route('setting_create_typing') }}" method="post">
                        @csrf 
                        <input class="form-control" placeholder="Ma'lumot turi nomi" name="type_name" required>
                        <button class="btn btn-primary w-100 mt-2" type="submit">Ma'lumot turini saqlash</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
