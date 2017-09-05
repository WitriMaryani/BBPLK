@extends('layouts.app')
@section('content')

<div class="row">
<div class="container">
	<center><h1>Edit Data Program</h1></center>
	<div class="panel panel-primary">
		<div class="panel-heading">Data Program</div>

		<div class="panel-body">
			<form action="{{route('program.update',$program->id)}}" method="post">
				<input type="hidden" name="_method" value="PUT">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<div class="form-group">
					<label class="control-lable">Kode program</label>
					<input type="text" name="kd_program" value="{{$program->kd_program}}" class="form-control" required="">
				</div>
				<div class="form-group">
					<label class="control-lable">Nama Program</label>
					<input type="text" name="nama_program" value="{{$program->nama_program}}" class="form-control" required="">
				</div>
				<div class="form-group">
					<label class="control-lable">Nama Sub kejuruan</label>
						<input type="text" name="kd_sub_kejuruan" value="{{$program->kd_sub_kejuruan}}" class="form-control" required="">
				</div>
				<div class="form-group">
					<label class="control-lable">Nama kejuruan</label>
					<input type="text" name="kd_kejuruan" value="{{$program->kd_kejuruan}}" class="form-control" required="">
				</div>
				<div class="form-group">
					<label class="control-lable">Jumlah Paket</label>
					<input type="text" name="jumlah_paket" value="{{$program->jumlah_paket}}" class="form-control" required="">
				</div>
				<div class="form-group">
					<label class="control-lable">Lama Pelatihan</label>
					<input type="text" name="lama_pelatihan" value="{{$program->lama_pelatihan}}" class="form-control" required="">
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</form>
		</div>
	</div>
	</div>
</div>
</div>	
@endsection