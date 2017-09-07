@extends('layouts.app')
@section('content')

<div class="row">
<div class="container">
	<div class="panel panel-primary">
		<div class="panel-heading"><center><b>Tambah Data Kejuruan</b></center></div>
			<div class="panel-body">
				<form action="{{route('kejuruan.store')}}" method="post">
				{{csrf_field()}}

					<div class="form-group">
						<label class="control-lable">Kode kejuruan</label>
							<input type="text" name="kd_kejuruan" class="form-control" required="">
							{!! $errors->first('kd_kejuruan', '<p class="help-block">Data Sudah Ada</p>') !!}
					</div>

					<div class="form-group">
						<label class="control-lable">Nama Kejuruan</label>
						<input type="text" name="nama_kejuruan" class="form-control" required="">
					</div>

					<div class="form-group">
						<label class="control-lable">Keterangan</label>
						<input type="text" name="keterangan" class="form-control" required="">
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