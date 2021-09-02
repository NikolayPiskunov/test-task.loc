@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Мои заявки</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">Название заявки</th>
                                <th scope="col">Имя</th>
                                <th scope="col">Телефон</th>
                                <th scope="col">Компания</th>
                                <th scope="col">Просмотр</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($items as $item)
                                @php /** @var \App\Models\Order $item */ @endphp
                                <tr>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->company }}</td>
                                    <td><a href="{{ route('order.show', $item->id) }}" class="btn btn-info">Просмотреть</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        </div>
                        {{ $items->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
