@extends('layouts.app')
@section('content')

<div class="row">
<div class="container">
	<div class="panel panel-primary">
		<div class="panel-heading"><center><b>Tambah Data Sub Kejuruan</b></center></div>
			<div class="panel-body">
				<form action="{{route('sub_kejuruan.store')}}" method="post">
				{{csrf_field()}}

					<div class="form-group">
						<label class="control-lable">Kode Sub kejuruan</label>
						<input type="text" name="kd_sub_kejuruan" class="form-control" required="">
						{!! $errors->first('kd_sub_kejuruan', '<p class="help-block">Data Sudah Ada</p>') !!}
					</div>

					<div class="form-group">
						<label class="control-lable">Nama Sub</label>
						<input type="text" name="nama_sub_kejuruan" class="form-control" required="">
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
						<label class="control-lable">Keterangan</label>
						<textarea  name="keterangan"  class="form-control"></textarea>
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