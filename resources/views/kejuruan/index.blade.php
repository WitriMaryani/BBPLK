@extends('layouts.app')
@section('content')


<div class="container">
<div class="row">
    <div class="panel panel-primary">
    <div class="panel-heading">Data Kejuruan</div>
                    <div class="panel-body">
                    <div class="form-horizontal">
                    <form action="" method="post" >
                    {{ csrf_field() }}
                      <div class="form-group">
                          <label class="col-sm-2 control-label">Nama :</label> 
                              <div class="col-sm-3">
                                  <select name="nama_kejuruan" class="form-control">
                              @foreach($kejuruan as $data)
                                <option value="{{$data->id}}">{{$data->nama_kejuruan}}</option>
                              @endforeach
                              </select>
                              </div>
                     
                      <div class="col-md-4">
                      <label class="col-sm-2 control-label">Kode </label> 
                        {!! Form::open(['method'=>'GET','url'=>'cari','role'=>'search']) !!}
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
                      <a class="btn btn-primary" href="kejuruan/create">Create</a>
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
                <th bgcolor="info">Kode Kejuruan</th>
                <th bgcolor="info">Nama Kejuruan</th>
                <th bgcolor="info">Keterangan</th>
            </tr>
            
        </thead>
        <tbody>
       
        @foreach($kejuruan as $data)
            <tr>                   
            <td><input type="checkbox" name="check[{{$data->id}}]" value="{{$data->id}}" 
              onclick="addId(this)"></td>
            <td>{{$data->kd_kejuruan}}</td>
            <td>{{$data->nama_kejuruan}}</td>
            <td>{{$data->keterangan}}</td>
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
            url: "kejuruan/destroy",
            type: 'DELETE',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            dataType: 'json',
            data: {"ids": ids},
            success: function(result) {
              ///
            }
        });
        setTimeout(function(){
          window.location = "/kejuruan";  
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
    var konfirmasi = confirm("Apakan anda yakin akan mengedit data ini ?");
    if( konfirmasi == true ) {
        //alert('Eksekusi delete dilakukan..');
        $.ajax({
            url: "kejuruan/update",
            type: 'UPDATE',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            dataType: 'json',
            data: {"ids": ids},
            success: function(result) {
              ///
            }
        });
        setTimeout(function(){
          window.location = "/kejuruan/{{$data->id}}/edit";  
        }, 1000);
        
    } else {
        alert('Eksekusi update dibatalkan..');
    }
  }
  console.log("data terpilih: " + ids);
}

</script>



@endsection