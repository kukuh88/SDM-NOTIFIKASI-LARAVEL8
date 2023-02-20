@extends('layouts.master')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Employee</h1>
        </div>
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <h5 class="card-title">Data Employee</h5>
                                    @if (Session::has('sukses'))
                                        <div class="alert alert-success" role="alert">
                                            {{ Session::get('sukses') }}
                                    @endif
                                </div>
                                <div class="col-6">
                                    <div class="right float-end">
                                        <button type="button" class="btn btn-primary" style="margin-top: 12px;"
                                            data-bs-toggle="modal" data-bs-target="#basicModal">
                                            Add Employee
                                        </button>
                                    </div>
                                    <!-- Basic Modal -->
                                </div>
                            </div>
                            <!-- Table with hoverable rows -->
                            <table class="table table-hover" id="datatable">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>NIK</th>
                                        <th>FULL NAME</th>
                                        <th>JABATAN</th>
                                        <th>GOLONGAN</th>
                                        <th>TMT GOLONGAN</th>
                                        <th>ESELON</th>
                                        <th>TMT ESLON</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                @php
                                    $no = 1;
                                @endphp
                                <tbody>
                                    @foreach ($book as $b)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $b->nik }}</td>
                                            <td>{{ $b->name }}</td>
                                            <td>{{ $b->jabatan }}</td>
                                            <td>{{ $b->golongan }}</td>
                                            <td>{{ $b->tmt_golongan }}</td>
                                            <td>{{ $b->eselon }}</td>
                                            <td>{{ $b->tmt_eselon }}</td>
                                            <td>
                                                <a href="{{ route('book.edit', $b) }}" class="btn btn-warning">Edit</a>
                                                <a href="#" class="btn btn-danger btn-action delete"
                                                    data-url="{{ route('book.destroy', $b) }}"
                                                    data-text="{{ $b->name }}">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- End Table with hoverable rows -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- Modal -->
    <div class="modal fade" id="basicModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Employee</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <!-- General Form Elements -->
                        <form action="{{ route('book.store') }}" method="POST">
                            @csrf
                            <div class="row mb-3{{ $errors->has('nik') ? ' has-error' : '' }}">
                                <label for="inputText" class="col-sm-2 col-form-label">NIK</label>
                                <div class="col-sm-10">
                                    <input name="nik" type="text" id="nik" class="form-control"
                                        placeholder="Masukan Nik Anda" value="{{ old('nik') }}">
                                    @if ($errors->has('nik'))
                                        <span class="help-block" style="color: red;">{{ $errors->first('nik') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-3{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="inputText" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input name="name" type="text" id="name" class="form-control"
                                        placeholder="Masukan Nama Lengkap" value="{{ old('name') }}">
                                    @if ($errors->has('name'))
                                        <span class="help-block" style="color: red;">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-3{{ $errors->has('jabatan') ? ' has-error' : '' }}">
                                <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                                <div class="col-sm-10">
                                    <input name="jabatan" type="text" id="jabatan" class="form-control"
                                        placeholder="Masukan Jabatan Anda" value="{{ old('jabatan') }}">
                                    @if ($errors->has('jabatan'))
                                        <span class="help-block" style="color: red;">{{ $errors->first('jabatan') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-3{{ $errors->has('golongan') ? ' has-error' : '' }}">
                                <label for="golongan" class="col-sm-2 col-form-label">Golongan</label>
                                <div class="col-sm-10">
                                    <input name="golongan" type="text" id="golongan" class="form-control"
                                        placeholder="Masukan Golongan Anda" value="{{ old('golongan') }}">
                                    @if ($errors->has('golongan'))
                                        <span class="help-block"
                                            style="color: red;">{{ $errors->first('golongan') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-3{{ $errors->has('tmt_golongan') ? ' has-error' : '' }}">
                                <label for="tmt_golongan" class="col-sm-2 col-form-label">TMT Golongan</label>
                                <div class="col-sm-10">
                                    <input name="tmt_golongan" type="date" id="tmt_golongan" class="form-control"
                                        value="{{ old('tmt_golongan') }}">
                                    @if ($errors->has('tmt_golongan'))
                                        <span class="help-block"
                                            style="color: red;">{{ $errors->first('tmt_golongan') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-3{{ $errors->has('eselon') ? ' has-error' : '' }}">
                                <label for="eselon" class="col-sm-2 col-form-label">Eselon</label>
                                <div class="col-sm-10">
                                    <input name="eselon" type="text" id="eselon" class="form-control"
                                        placeholder="Masukan Golongan Anda" value="{{ old('eselon') }}">
                                    @if ($errors->has('eselon'))
                                        <span class="help-block"
                                            style="color: red;">{{ $errors->first('eselon') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-3{{ $errors->has('tmt_eselon') ? ' has-error' : '' }}">
                                <label for="tmt_eselon" class="col-sm-2 col-form-label">TMT Eselon</label>
                                <div class="col-sm-10">
                                    <input name="tmt_eselon" type="date" id="tmt_eselon" class="form-control"
                                        value="{{ old('tmt_eselon') }}">
                                    @if ($errors->has('tmt_eselon'))
                                        <span class="help-block"
                                            style="color: red;">{{ $errors->first('tmt_eselon') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-3">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                    </div>
                    </form><!-- End General Form Elements -->
                </div>
            </div>
        </div>
    </div>
@endsection
@section('sweetalert')
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable();
            $('body').on('click', '.delete', function() {
                var book_id = $(this).attr('book-id');
                var book_name = $(this).attr('book_name');

                swal({
                        title: "Are you sure?",
                        text: "The " + book_name + " wants to delete??",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        console.log(willDelete);
                        if (willDelete) {
                            //swal("Data siswa dengan id "+ siswa_id +" telah berhasil dihapus!", {
                            //icon: "success",
                            //});
                            window.location = "/book" + "/delete/" + book_id;

                        } else {
                            swal("Data is not deleted");
                        }
                    });
            });
        });
    </script>
@endsection
