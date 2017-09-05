@extends('layouts.app')
@section('content')

<div class="row">
<div class="container">
	<center><h1>Tambah Data Sub Kejuruan</h1></center>
	<div class="panel panel-primary">
		<div class="panel-heading">Data Sub Kejuruan</div>

		<div class="panel-body">
			<form action="{{route('sub_kejuruan.store')}}" method="post">
				{{csrf_field()}}
				<div class="form-group">
					<label class="control-lable">Kode Sub kejuruan</label>
					<input type="text" name="kd_sub_kejuruan" class="form-control" required="">
				</div>
				<div class="form-group">
					<label class="control-lable">Nama Sub</label>
					<input type="text" name="nama_sub_kejuruan" class="form-control" required="">
				</div>
				<div class="form-group">
					<label class="control-lable">Nama kejuruan</label>
						<input type="text" name="kd_kejuruan" class="form-control" required="">
				</div>
				<br>
				<div class="form-group">
					<label class="control-lable">Keterangan</label>
					<input type="text" name="keterangan" class="form-control" required="">
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Simpan</button>
					<button type="reset" class="btn btn-primary">Batal</button>
				</div>
			</form>
		</div>
	</div>
	</div>
</div>
</div>	
@endsection