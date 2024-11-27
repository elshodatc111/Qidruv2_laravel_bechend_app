@extends('layouts.app')

@section('content')
<div class="container">
    <div class="justify-content-center">
        <div class="card">
            <div class="card-header">Barcha postlar</div>
            <div class="card-body">
                <table class="table table-bordered text-center" style="font-size:14px;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Hudud nomi</th>
                            <th>Hodim lavozim</th>
                            <th>Malumot turi</th>
                            <th>Malumot sarlovhasi</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($Search as $item)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $item['region'] }}</td>
                            <td>{{ $item['toifa'] }}</td>
                            <td>{{ $item['typing'] }}</td>
                            <td>{{ $item['title'] }}</td>
                            <td>
                                <a href="{{ route('home_show',$item['id']) }}" class="btn btn-success p-0 px-1"><i class="bi bi-eye"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
