@extends('layouts.app')
@section('content')

<div class="row">
<div class="container">
	<center><h1>Edit Data Sub kejuruan</h1></center>
	<div class="panel panel-primary">
		<div class="panel-heading">Data Sub kejuruan</div>

		<div class="panel-body">
			<form action="{{route('sub_kejuruan.update',$sub_kejuruan->id)}}" method="post">
				<input type="hidden" name="_method" value="PUT">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<div class="form-group">
					<label class="control-lable">Kode sub_kejuruan</label>
					<input type="text" name="kd_sub_kejuruan" value="{{$sub_kejuruan->kd_sub_kejuruan}}" class="form-control" required="">
				</div>
				<div class="form-group">
					<label class="control-lable">Nama Sub kejuruan</label>
					<input type="text" name="nama_sub_kejuruan" value="{{$sub_kejuruan->nama_sub_kejuruan}}" class="form-control" required="">
				</div>
				<div class="form-group">
					<label class="control-lable">Nama kejuruan</label>
						<input type="text" name="kd_kejuruan" value="{{$sub_kejuruan->kd_kejuruan}}" class="form-control" required="">
				</
				<br>
				<div class="form-group">
					<label class="control-lable">Keterangan</label>
					<input type="text" name="keterangan" class="form-control" required="">
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