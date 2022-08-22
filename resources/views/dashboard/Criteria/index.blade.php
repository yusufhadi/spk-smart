@extends('layouts.app')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kriteria</h1>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addKriteria">
            Tambah Data
        </button>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Kriteria</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama Kriteria</th>
                            <th>Jenis</th>
                            <th>Bobot</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($criteria as $c)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $c->kode_kriteria }}</td>
                                <td>{{ $c->kriteria }}</td>
                                <td>{{ $c->jenis }}</td>
                                <td>{{ $c->bobot }}</td>
                                <td>
                                    <a href="" class="btn btn-warning btn-sm mr-1" data-bs-toggle="modal"
                                        data-bs-target="#updateKriteria-{{ $c->id }}"> <i class="fas fa-pen"></i>
                                    </a>
                                    <a href="{{ route('delete-criteria', $c->id) }}" class="btn btn-danger btn-sm mr-1"> <i
                                            class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">Data Kosong</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Kriteria -->
    <div class="modal fade" id="addKriteria" tabindex="-1" aria-labelledby="addKriteriaModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addKriteriaModal">Tambah Kriteria</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('tambah-criteria') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="kode_kriteria" class="form-label">Kode Kriteria</label>
                            <input type="text" class="form-control" name="kode_kriteria">
                        </div>
                        <div class="mb-3">
                            <label for="kriteria" class="form-label">Kriteria</label>
                            <input type="text" class="form-control" name="kriteria">
                        </div>
                        <div class="mb-3">
                            <label for="jenis" class="form-label">Jenis Kriteria</label>
                            <select name="jenis" class="form-select" aria-label="Default select example">
                                <option selected>Pilih</option>
                                <option value="Cost">Cost</option>
                                <option value="Benefit">Benefit</option>
                            </select>
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


    <!-- Modal Update Kriteria -->
    @foreach ($criteria as $item)
        <div class="modal fade" id="updateKriteria-{{ $item->id }}" tabindex="-1" aria-labelledby="UpdateKriteriaModal"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="UpdateKriteriaModal">Update Kriteria</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('update-criteria', $item->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="kode_kriteria" class="form-label">Kode Kriteria</label>
                                <input type="text" value="{{ $item->kode_kriteria }}" class="form-control"
                                    name="kode_kriteria">
                            </div>
                            <div class="mb-3">
                                <label for="kriteria" class="form-label">Kriteria</label>
                                <input type="text" value="{{ $item->kriteria }}" class="form-control"
                                    name="kriteria">
                            </div>
                            <div class="mb-3">
                                <label for="jenis" class="form-label">Jenis Kriteria</label>
                                <select name="jenis" value="{{ $item->jenis }}" class="form-select"
                                    aria-label="Default select example">
                                    <option selected>{{ $item->jenis }}</option>
                                    <option value="Cost">Cost</option>
                                    <option value="Benefit">Benefit</option>
                                </select>
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
