@extends('layouts.app')
@section('content')

<div class="row">
<div class="container">
	<div class="panel panel-primary">
		<div class="panel-heading">Kejuruan</div>
			<div class="panel-body">
				<div class="form-group">
					<div class="col-md-6">
						<label class="col-md-2 control-label">Kode : </label>
						<div class="col-md-8">
						{!! Form::open(['method'=>'GET','url'=>'cari','role'=>'search']) !!}	
						<div class="input-group custom-search-form">
							<input type="text" class="form-control" name="search" placeholder="search">
							<span class="input-group-btn">
								<button class="btn btn-primary" type="submit"><i class="fa fa-search"></i>Cari</button>
							</span>
						</div>
						{!! Form::close() !!}
					</div>
					</div>
					<div class="col-md-6">
						<label class="col-md-2 control-label">Nama : </label>
  							<select name="nama_kejuruan" class="col-md-8 control-label" required="">
								@foreach ($kejuruan as $data)
	  								<option value="{{ $data->id }}">{{ $data->NOPOL }} {{ $data->nama_kejuruan}}</option>
								@endforeach
  							</select>
					</div>


					<br>
					<br>
					<br>
					<br>

				<div class="form-group">
					<td>
						<a class="btn btn-primary" href="kejuruan/create">Tambah</a></td>
					<td>
						<a class="btn btn-primary" href="kejuruan/{{$data->id}}/edit">Ubah</a></td>
					<td>	
						<a class="btn btn-primary">
						<form action="{{route('kejuruan.destroy',$data->id)}}" method="post">
							<input type="hidden" name="_method" value="DELETE">
							<input type="hidden" name="_token">
							<input class="btn btn-primary" type="submit" value="Hapus">
							{{csrf_field()}}
						</form></a></td>
						
				</div>
		

		<br>
		<br>
		<br>

		<td>
			
			<div class="panel panel-primary">
			<div class="panel-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th bgcolor="#1E90FF">Select</th>
							<th bgcolor="#1E90FF">Kode kejuruan</th>
							<th bgcolor="#1E90FF">Nama Kejuruan</th>
							<th bgcolor="#1E90FF">Keterangan</th>
						</tr>
					</thead>
					<tbody>
						@foreach($kejuruan as $data)
							<tr>
								<td><input type="checkbox" name="id" value="$data->id"></td>
								<td>{{$data->kd_kejuruan}}</td>
								<td>{{$data->nama_kejuruan}}</td>
								<td>{{$data->keterangan}}</td>
							</div>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			</div>
			</div>	
			</div>
		</td>
	</div>
</div>
</div>
</div>
</div>
@endsection