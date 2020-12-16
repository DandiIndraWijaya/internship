@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    
    
    <div class="container-fluid mt--7">
        {{-- notifikasi form validasi --}}
		@if ($errors->has('file'))
		<span class="invalid-feedback" role="alert">
			<strong>{{ $errors->first('file') }}</strong>
		</span>
		@endif
 
		{{-- notifikasi sukses --}}
		@if ($sukses = Session::get('sukses'))
		<div class="alert alert-success alert-block">
			<button type="button" class="close" data-dismiss="alert">×</button> 
			<strong>{{ $sukses }}</strong>
		</div>
		@endif
        <!-- Buat Pemilihan -->
		<div class="modal fade" id="buatpemilihan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<form method="post" action="/admin/input_calon" enctype="multipart/form-data">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Buat Calon</h5>
						</div>
						<div class="modal-body">
 
							{{ csrf_field() }}
							
                            <label>Nomor Calon</label>
                            <div class="form-group">
                                <input type="number" class="form-control" style="color: gray;" placeholder="contoh: 1" name="nomor_calon" autocomplete="off" required="required">
                            </div>

                            <label>Nama Calon</label>
                            <div class="form-group">
                                <input type="text" class="form-control" style="color: gray;" placeholder="Ketikan nama calon" name="nama_calon" autocomplete="off" required="required">
							</div>
							
							<label>Foto Calon</label>
							<div class="form-group">
								<input type="file" name="foto_calon" required="required">
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
							<button type="submit" class="btn btn-warning">Simpan</button>
						</div>
					</div>
				</form>
			</div>
        </div>
        
        <button type="button" class="btn btn-warning mr-5" data-toggle="modal" data-target="#buatpemilihan">
			Buat Calon
        </button>

        <div class="row mt-1">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Calon Pemilihan</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row m-1" style="width: 100%">
						
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush