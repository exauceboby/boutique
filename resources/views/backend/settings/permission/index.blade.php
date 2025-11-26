@extends('backend.master')

@section('title', 'Permissions')

@section('content')
<div class="card">

    @can('role_view')
    <div class="mt-n5 mb-3 d-flex justify-content-end">
        <a href="{{ route('backend.admin.roles') }}" class="btn bg-gradient-primary">
            <i class="fas fa-ruler-vertical"></i>
            Rôles
        </a>
    </div>
    @endcan
    <div class="card-body">
        <div class="row">
            <div class="col-md-12 table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Slug</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissions as $data)
                        <tr>
                            <td>{{ snakeToTitle($data->name) }}</td>
                            <td>{{ $data->name }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
