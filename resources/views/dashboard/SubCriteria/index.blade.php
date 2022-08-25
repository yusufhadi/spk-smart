@extends('layouts.app')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Sub Kriteria</h1>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSubKriteria">
            Tambah Data
        </button>
    </div>

    @foreach ($criteria as $item)
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="font-weight-bold text-primary">{{ $item->kriteria }} ({{ $item->kode_kriteria }})</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Sub Kriteria</th>
                                <th>Bobot</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($subCriteria as $c)
                                @if ($item->id == $c->id_kriteria)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $c->sub_kriteria }}</td>
                                        <td>{{ $c->bobot }}</td>
                                        <td>
                                            <a href="" class="btn btn-warning btn-sm mr-1" data-bs-toggle="modal"
                                                data-bs-target="#updateSubKriteria-{{ $c->id }}"> <i
                                                    class="fas fa-pen"></i>
                                            </a>
                                            <a href="{{ route('delete-sub-criteria', $c->id) }}"
                                                class="btn btn-danger btn-sm mr-1">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endif
                            @empty
                                <tr>
                                    <td class="text-center" colspan="4">Data Kosong</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Modal Tambah Sub Kriteria -->
    <div class="modal fade" id="addSubKriteria" tabindex="-1" aria-labelledby="addSubKriteriaModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addSubKriteriaModal">Tambah Sub Kriteria</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('tambah-sub-criteria') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="id_kriteria" class="form-label">Pilih Kriteria</label>
                            <select name="id_kriteria" class="form-select" aria-label="Default select example">
                                <option selected>Pilih</option>
                                @foreach ($criteria as $item)
                                    <option value="{{ $item->id }}">{{ $item->kriteria }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="sub_kriteria" class="form-label">Nama Sub Kriteria</label>
                            <input type="text" class="form-control" name="sub_kriteria">
                        </div>
                        <div class="mb-3">
                            <label for="bobot" class="form-label">Bobot</label>
                            <input type="number" class="form-control" name="bobot">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Modal Update Sub Kriteria -->
    @foreach ($subCriteria as $item)
        <div class="modal fade" id="updateSubKriteria-{{ $item->id }}" tabindex="-1"
            aria-labelledby="UpdateSubKriteriaModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="UpdateSubKriteriaModal">Update Kriteria</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('update-sub-criteria', $item->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="id_kriteria" class="form-label">Kriteria</label>
                                <input type="text" value="{{ $item->id_kriteria }}" class="form-control"
                                    name="id_kriteria" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="sub_kriteria" class="form-label">Sub Kriteria</label>
                                <input type="text" value="{{ $item->sub_kriteria }}" class="form-control"
                                    name="sub_kriteria">
                            </div>
                            <div class="mb-3">
                                <label for="bobot" class="form-label">Bobot</label>
                                <input type="number" value="{{ $item->bobot }}" class="form-control" name="bobot">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection
