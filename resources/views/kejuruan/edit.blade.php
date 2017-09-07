@extends('layouts.app')
@section('content')

<div class="row">
<div class="container">
	<div class="panel panel-primary">
		<div class="panel-heading"><center><b>Edit Data Kejuruan</b></center></div>
			<div class="panel-body">
				<form action="{{route('kejuruan.update',$kejuruan->id)}}" method="post">
					<input type="hidden" name="_method" value="PUT">
					<input type="hidden" name="_token" value="{{csrf_token()}}">

					<div class="form-group">
						<label class="control-lable">Kode kejuruan</label>
						<input type="text" name="kd_kejuruan" value="{{$kejuruan->kd_kejuruan}}" class="form-control" required="">
					</div>

					<div class="form-group">
						<label class="control-lable">Nama Kejuruan</label>
						<input type="text" name="nama_kejuruan" value="{{$kejuruan->nama_kejuruan}}" class="form-control" required="">
					</div>

					<div class="form-group">
						<label class="control-lable">Keterangan</label>
						<input type="text" name="keterangan" value="{{$kejuruan->keterangan}}" class="form-control" required="">
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
@endsection