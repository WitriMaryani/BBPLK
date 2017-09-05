@extends('layouts.app')
@section('content')


<div class="container">
<div class="row">
	<div class="panel panel-primary">
		<div class="panel-heading">Program</div>
			<div class="panel-body">
				<div class="form-group">
					<div class="col-md-6">
						<label class="col-md-2 control-label">Kode : </label>
						<div class="col-md-8">
						{!! Form::open(['method'=>'GET','url'=>'carim','role'=>'search']) !!}	
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
  							<select name="nama_program" class="col-md-8 control-label" required="">
								@foreach ($program as $data)
	  								<option value="{{ $data->id }}">{{ $data->NOPOL }} {{ $data->nama_program}}</option>
								@endforeach
  							</select>
					</div>
					

					<br>
					<br>
					<br>
					<br>

				<div class="form-group">
					<td>
						<a class="btn btn-primary" href="program/create">Tambah</a></td>
					<td>
						<a class="btn btn-primary" href="program/{{$data->id}}/edit">Ubah</a></td>
					<td>	
						<a class="btn btn-primary">
							<form action="{{route('program.destroy',$data->id)}}" method="post">
							<input type="hidden" name="_method" value="DELETE">
							<input type="hidden" name="_token">
							<input class="btn btn-primary" type="submit" value="Hapus">
							{{csrf_field()}}
						</form>
						</a></td>
						
				</div>
		

		<br>


		<td>
			<div class="row">
			<div class="container">
			<div class="panel panel-primary">
			<div class="panel-body">
				<table class="table table-bordered" bgcolor="#1E90FF">
					<thead>
						<tr>
							<th bgcolor="#1E90FF">Select</th>
							<th bgcolor="#1E90FF">Kode Program</th>
							<th bgcolor="#1E90FF">Nama Program</th>
							<th bgcolor="#1E90FF">Nama Sub Kejuruan</th>
							<th bgcolor="#1E90FF">Nama Kejuruan</th>
							<th bgcolor="#1E90FF">Jumlah paket</th>
							<th bgcolor="#1E90FF">Lama Pelatihan</th>
						</tr>
					</thead>
					<tbody>
						@foreach($program as $data)
							<tr>
								<td><input type="checkbox" class="pilih" name="id"></td>
								<td>{{$data->kd_program}}</td>
								<td>{{$data->nama_program}}</td>
								<td>{{$data->kd_sub_kejuruan}}</td>
								<td>{{$data->kd_kejuruan}}</td>
								<td>{{$data->jumlah_paket}}</td>
								<td>{{$data->lama_pelatihan}}</td>
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