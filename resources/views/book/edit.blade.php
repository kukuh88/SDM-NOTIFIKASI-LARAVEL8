@extends('layouts.master')
@section('content')
    @if (session('sukses'))
        <div class="alert alert-success" role="alert">
            {{ session('sukses') }}
        </div>
    @endif
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Edit Book Data</h1>
        </div>
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-body">
                        <h5 class="card-title">Edit Book Data</h5>

                        <form action="{{ route('book.update', $book) }}" method="POST">
                            {{ csrf_field() }}
                            @method('PUT')
                            <div class="form-group">
                                <label for="nik">NIK</label>
                                <input name="nik" type="text" class="form-control" id="nik"
                                    aria-describedby="emailHelp" placeholder="Nama book" value="{{ $book->nik }}">
                            </div>
                            {{-- <div class="form-group">
							<label for="exampleFormControlSelect1">Type</label>
							<select name="type" class="form-control" id="exampleFormControlSelect1">
								<option value="Novel" @if ($book->type == 'Novel') selected @endif>Novel</option>
								<option value="Comic" @if ($book->type == 'Comic') selected @endif>Comic</option>
								<option value="Biography" @if ($book->type == 'Biography') selected @endif>Biography
								</option>
								<option value="Dictionary" @if ($book->type == 'Dictionary') selected @endif>Dictionary
								</option>
								<option value="Magazine" @if ($book->type == 'Magazine') selected @endif>Magazine
								</option>
							</select>
						</div> --}}
                            <div class="form-group">
                                <label for="name">Full Name</label>
                                <input name="name" type="text" class="form-control" id="name"
                                    placeholder="FUll Name" value="{{ $book->name }}">
                            </div>
                            <div class="form-group">
                                <label for="jabatan">Jabatan</label>
                                <input name="jabatan" type="text" id="jabatan" class="form-control" id="jabatan"
                                    placeholder="jabatan" value="{{ $book->jabatan }}">
                            </div>
                            <div class="form-group">
                                <label for="golongan">Golongan</label>
                                <input name="golongan" type="text" id="golongan" class="form-control" id="golongan"
                                    placeholder="golongan" value="{{ $book->golongan }}">
                            </div>
                            <div class="form-group">
                                <label for="tmt_golongan">TMT GOLONGAN</label>
                                <input name="tmt_golongan" type="date" id="tmt_golongan" class="form-control"
                                    id="tmt_golongan" placeholder="tmt_golongan" value="{{ $book->tmt_golongan }}">
                            </div>
                            <div class="form-group">
                                <label for="eselon">Eselon</label>
                                <input name="eselon" type="text" id="eselon" class="form-control" id="eselon"
                                    placeholder="eselon" value="{{ $book->eselon }}">
                            </div>
                            <div class="form-group">
                                <label for="tmt_eselon">TMT Eselon</label>
                                <input name="tmt_eselon" type="date" id="tmt_eselon" class="form-control" id="tmt_eselon"
                                    placeholder="tmt_eselon" value="{{ $book->tmt_eselon }}">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <a href="/book" class="btn btn-secondary" data-dismiss="modal">Close</a>&nbsp;&nbsp;&nbsp;
                        <button type="submit" class="btn btn-warning">Update</button>
                        </form>

                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
