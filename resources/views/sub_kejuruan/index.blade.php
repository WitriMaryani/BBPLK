@extends('layouts.app')
@section('content')


<div class="container">
<div class="row">
	<div class="panel panel-primary">
		<div class="panel-heading">Sub Kejuruan</div>
			<div class="panel-body">

				<div class="form-group">
					<div class="col-md-6">
						<label class="col-md-2 control-label">Kode : </label>
						{!! Form::open(['method'=>'GET','url'=>'caril','role'=>'search']) !!}	
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
  							<select name="nama_sub_kejuruan" class="col-md-8 control-label" required="">
								@foreach ($sub_kejuruan as $data)
	  								<option value="{{ $data->id }}">{{ $data->NOPOL }} {{ $data->nama_sub_kejuruan}}</option>
								@endforeach
  							</select>
					</div>

					
					<br>
					<br>

				<div class="form-group">
					<td>
						<button class="btn btn-primary" type="submit"><i class="fa fa-search"></i>Cari</button>
  					<td>
				</td>		
					<div class="col-md-11">
						
						<a class="btn btn-primary" href="sub_kejuruan/create">Tambah</a></td>
					<td>
						<a class="btn btn-primary" href="sub_kejuruan/{{$data->id}}/edit">Ubah</a></td>
					<td>	
						<a class="btn btn-primary">
						<form action="{{route('sub_kejuruan.destroy',$data->id)}}" method="post">
							<input type="hidden" name="_method" value="DELETE">
							<input type="hidden" name="_token">
							<input class="btn btn-primary" type="submit" value="Hapus">
							{{csrf_field()}}
						</form></a>
					</div>
				</div>
		

		<br>

		<td>
			<div class="row">
			<div class="container">
			<div class="panel panel-primary">
			<div class="panel-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th bgcolor="#1E90FF">Select</th>
							<th bgcolor="#1E90FF">Kode sub kejuruan</th>
							<th bgcolor="#1E90FF">Nama sub</th>
							<th bgcolor="#1E90FF">Nama Kejuruan</th>
							<th bgcolor="#1E90FF">Keterangan</th>
						</tr>
					</thead>
					<tbody>
						@foreach($sub_kejuruan as $data)
							<tr>
								<td><input type="checkbox" class="pilih" name="id"></td>
								<td>{{$data->kd_sub_kejuruan}}</td>
								<td>{{$data->nama_sub_kejuruan}}</td>
								<td>{{$data->kd_kejuruan}}</td>
								<td>{{$data->keterangan}}</td>
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