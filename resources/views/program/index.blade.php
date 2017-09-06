@extends('layouts.app')
@section('content')


<div class="container">
<div class="row">
    <div class="panel panel-primary">
    <div class="panel-heading">Data Program</div>
                    <div class="panel-body">
                    <div class="form-horizontal">
                    <form action="" method="post" >
                    {{ csrf_field() }}
                      <div class="form-group">
                          <label class="col-sm-2 control-label">Nama :</label> 
                              <div class="col-sm-3">
                                  <select name="nama_program" class="form-control">
                              @foreach($program as $data)
                                <option value="{{$data->id}}">{{$data->nama_program}}</option>
                              @endforeach
                              </select>
                              </div>
                     
                      <div class="col-md-4">
                      <label class="col-sm-2 control-label">Kode </label> 
                        {!! Form::open(['method'=>'GET','url'=>'carim','role'=>'search']) !!}
                        <div class="input-group custom-search-form">
                          <input type="text" class="form-control" name="search" placeholder="search">
                          <span class="input-group-btn">
                              <button class="btn btn-success" type="submit"><i class="fa fa-search"></i> Cari</button>
                          </span>
                        </div>
                        {!! Form::close() !!}
                      </div>
  
                      </div>
                      <br>
                      <br>

                      <td>
                      <a class="btn btn-primary" href="program/create">Create</a>
                      <td>
                      <a class="btn btn-warning" href="javascript:void(0)" onclick="on_update()">Edit</a>
                      <td>      
                      <a class="btn btn-danger" href="javascript:void(0)" onclick="on_delete()">Delete</a>
                      </td>                  
                     
      </form>
          <br>
          <table class="table table-bordered">
        <thead>
       
            <tr>
                <th bgcolor="info">Select </th>
                <th bgcolor="info">Kode Program</th>
                <th bgcolor="info">Nama Program</th>
                <th bgcolor="info">Nama Sub Kejuruan</th>
                <th bgcolor="info">Nama Kejuruan</th>
                <th bgcolor="info">Jumlah Paket</th>
                <th bgcolor="info">Lama Pelatihan</th>
            </tr>
            
        </thead>
        <tbody>
       
        @foreach($program as $data)
            <tr>                   
            <td><input type="checkbox" name="check[{{$data->id}}]" value="{{$data->id}}" 
              onclick="addId(this)"></td>
            <td>{{$data->kd_program}}</td>
            <td>{{$data->nama_program}}</td>
            <td>{{$data->kd_sub_kejuruan}}</td>
            <td>{{$data->kd_kejuruan}}</td>
            <td>{{$data->jumlah_paket}}</td>
            <td>{{$data->lama_pelatihan}}</td>
            </tr>
        </tbody>
       @endforeach
    
    </table>    

          </div>
          </div>
          </div>


<script type="text/javascript">
var ids = [];

function addId(obj) {
  //alert("Kode: "+ obj.value + '; ' + (obj.checked? 'terpilih' : 'tidak dipilih'));
  console.log(obj);

  //checkbox terpilih..
  if(obj.checked) {
    ids.push(obj.value);
  } else {
    //checkbox tidak dipilih
    var index = ids.indexOf(obj.value);
    ids.splice(index, 1);
  }
}

function on_delete()
{
  if(ids.length == 0) {
    alert("silahkan pilih terlebih dahulu datanya !");
  } else {
    var konfirmasi = confirm("Apakan anda yakin akan menghapus ?");
    if( konfirmasi == true ) {
        //alert('Eksekusi delete dilakukan..');
        $.ajax({
            url: "program/destroy",
            type: 'DELETE',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            dataType: 'json',
            data: {"ids": ids},
            success: function(result) {
              ///
            }
        });
        setTimeout(function(){
          window.location = "/program";  
        }, 1000);
        
    } else {
        alert('Eksekusi delete dibatalkan..');
    }
  }
  console.log("data terpilih: " + ids);
}

</script>

<script type="text/javascript">
var ids = [];

function addId(obj) {
  //alert("Kode: "+ obj.value + '; ' + (obj.checked? 'terpilih' : 'tidak dipilih'));
  console.log(obj);

  //checkbox terpilih..
  if(obj.checked) {
    ids.push(obj.value);
  } else {
    //checkbox tidak dipilih
    var index = ids.indexOf(obj.value);
    ids.splice(index, 1);
  }
}

function on_update()
{
  if(ids.length == 0) {
    alert("silahkan pilih terlebih dahulu datanya !");
  } else if(ids.length > 1){
    alert("Pilih salah satu data");
    } else {
    var konfirmasi = confirm("Apakan anda yakin akan mengedit ?");
    if( konfirmasi == true ) {
        //alert('Eksekusi delete dilakukan..');
        $.ajax({
            url: "program/update",
            type: 'UPDATE',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            dataType: 'json',
            data: {"ids": ids},
            success: function(result) {
              ///
            }
        });
        setTimeout(function(){
          window.location = "/program/{{$data->id}}/edit";  
        }, 1000);
        
    } else {
        alert('Eksekusi delete dibatalkan..');
    }
  }
  console.log("data terpilih: " + ids);
}

</script>



@endsection