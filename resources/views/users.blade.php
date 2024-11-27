@extends('layouts.app')

@section('content')
<div class="container">
    <div class="justify-content-center">
        <div class="card">
            <div class="card-header">Barcha hodimlar</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <table class="table table-bordered text-center" style="font-size:14px;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>FIO</th>
                            <th>Hudud</th>
                            <th>Lavozimi</th>
                            <th>Email</th>
                            <th>Yaratilgan vaqt</th>
                            <th>O'chirish</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($User as $item)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['region'] }}</td>
                            <td>{{ $item['toifa'] }}</td>
                            <td>{{ $item['email'] }}</td>
                            <td>{{ $item['created_at'] }}</td>
                            <td>
                                <form action="{{ route('user_delete',$item['id']) }}" method="post">
                                    @csrf 
                                    @method('delete')
                                    <button class="btn btn-danger p-0 px-1" type="submit"><i class="bi bi-trash"></i></button>
                                </form>
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
