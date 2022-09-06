@extends('layouts.app')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Penilaian</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Penilaian</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Alternatif</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($alternatif as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->alternatif }}</td>
                                <td>
                                    <a href="" class="btn btn-warning btn-sm mr-1" data-bs-toggle="modal"
                                        data-bs-target="#Penilaian-{{ $item->id }}"> <i class="fas fa-pen"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="3"><b>Data Kosong</b></td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Penilaian -->
    @foreach ($alternatif as $item)
        <div class="modal fade" id="Penilaian-{{ $item->id }}" tabindex="-1" aria-labelledby="PenilaianModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="PenilaianModalLabel">Edit Data Penilaian</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('tambah-penilaian') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3" hidden>
                                <label for="id_alternatif" class="form-label">Id Alternatif</label>
                                <input type="text" class="form-control" name="id_alternatif" value="{{ $item->id }}">
                            </div>
                            <div class="mb-3">
                                <label for="alternatif" class="form-label">Alternatif</label>
                                <input type="text" class="form-control" name="alternatif" value="{{ $item->alternatif }}"
                                    readonly>
                            </div>
                            {{-- <div class="mb-3">
                                @foreach ($detail as $d)
                                    @if ($d->id == $d->id_kriteria)
                                        <label for="alternatif" class="form-label">{{ $d->kriteria }}</label>
                                        <select name="id_kriteria" class="form-select" aria-label="Default select example">
                                            @foreach ($detail as $item)
                                                @if ($d->id == $item->id_kriteria)
                                                    <option value="{{ $item->id }}">{{ $item->sub_kriteria }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    @endif
                                @endforeach
                            </div> --}}
                            @foreach ($criteria as $c)
                                <div class="mb-3">
                                    <label for="alternatif" class="form-label">{{ $c->kriteria }}</label>
                                    <select name="id_kriteria" class="form-select" aria-label="Default select example">
                                        <option selected>Silahkan Pilih Sub Criteria {{ $c->kriteria }}</option>
                                        @foreach ($subCriteria as $sc)
                                            @if ($c->id == $sc->id_kriteria)
                                                <option value="{{ $sc->sub_kriteria }}">{{ $sc->sub_kriteria }}</option>
                                            @endif
                                        @endforeach
                                        @if (Request::get('bobot_sub'))
                                            <input type="text" class="form-control" name="id_alternatif"
                                                value="{{ $sc->bobot_sub }}">
                                        @endif
                                    </select>
                                </div>
                            @endforeach
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
