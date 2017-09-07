@extends('layouts.app')
@section('content')

<div class="row">
<div class="container">
	<center><h1>Tambah Data Program</h1></center>
	<div class="panel panel-primary">
		<div class="panel-heading">Data Program</div>

		<div class="panel-body">
			<form action="{{route('program.store')}}" method="post">
				{{csrf_field()}}

				<div class="form-group">
					<label class="control-lable">Kode program</label>
					<input type="text" name="kd_program" class="form-control" required="">
					{!! $errors->first('kd_program', '<p class="help-block">Data Sudah Ada</p>') !!}
				</div>

				<div class="form-group">
					<label class="control-lable">Nama Program</label>
					<input type="text" name="nama_program" class="form-control" required="">
				</div>

				<div class="form-group">
					<label class="control-lable">Nama Sub kejuruan</label>
						<select class="form-control" name="kd_sub_kejuruan">
							@foreach($sub_kejuruan as $data)
								<option value="{{$data->kd_sub_kejuruan}}">{{$data->nama_sub_kejuruan}}</option>
							@endforeach
						</select>
				</div>

				<div class="form-group">
					<label class="control-lable">Nama kejuruan</label>
					<select class="form-control" name="kd_kejuruan">
							@foreach($kejuruan as $data)
								<option value="{{$data->kd_kejuruan}}">{{$data->nama_kejuruan}}</option>
							@endforeach
						</select>
				</div>

				<div class="form-group">
					<label class="control-lable">Jumlah Paket</label>
					<input type="text" name="jumlah_paket" class="form-control" required="">
				</div>

				<div class="form-group">
					<label class="control-lable">Lama Pelatihan</label>
					<input type="text" name="lama_pelatihan" class="form-control" required="">
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-primary">Simpan</button>
					<a class="btn btn-primary" href="{{ URL::previous()}}">Batal</a>
				</div>
			</form>
		</div>
	</div>
	</div>
</div>
</div>	
@endsection