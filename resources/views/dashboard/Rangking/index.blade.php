@extends('layouts.app')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Perhitungan Metode SMART</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Perangkingan Alternatif</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Alternatif</th>
                            <th>Hasil Akhir</th>
                            <th>Perangkingan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($r as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item[0] }}</td>
                                <td>{{ number_format($item[1], 2, '.', ',') }}</td>
                                <td>{{ 'Urut' . ' ' . $loop->iteration }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
