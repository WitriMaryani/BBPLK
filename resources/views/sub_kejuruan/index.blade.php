@extends('layouts.app')
@section('content')


<div class="container">
<div class="row">
  <div class="panel panel-primary">
    <div class="panel-heading"><center><b>Data Sub Kejuruan</b></center></div>
      <div class="panel-body">
        <div class="form-horizontal">
          <form action="" method="post" >
            {{ csrf_field() }}
            </form>
              <div class="form-group">
                <div class="col-md-6">
                  <label class="col-sm-2 control-label">Nama :</label> 
                  {!! Form::open(['method'=>'GET','url'=>'caril','role'=>'search']) !!}
                    <div class="input-group custom-search-form">
                      <input type="text" class="form-control" name="search" placeholder="search">
                        <span class="input-group-btn">
                          <button class="btn btn-success" type="submit"><i class="fa fa-search"></i> Cari</button>
                        </span>
                    </div>
                  {!! Form::close() !!}
                </div>

                <div class="col-md-6">
                  <label class="col-sm-2 control-label">Kode :</label> 
                  <div class="col-sm-9">
                    <select name="nama_sub_kejuruan" class="form-control">
                      @foreach($sub_kejuruan as $data)
                        <option value="{{$data->id}}">{{$data->nama_sub_kejuruan}}</option>
                      @endforeach
                    </select>
                  </div>
              </div>

              <form>
              <br>
              <br>
              <br>
              </form>

              <div class="col-md-6">
                <td>
                  <a class="btn btn-primary" href="sub_kejuruan/create">Tambah</a>
                </td>
                <td>
                  <a class="btn btn-warning" href="javascript:void(0)" onclick="on_update()">Ubah</a>
                </td>
                <td>      
                  <a class="btn btn-danger" href="javascript:void(0)" onclick="on_delete()">Hapus</a>
                </td>                  
              </div>
          <br>
          <br>

          <div class="panel-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th bgcolor="info">Select </th>
                <th bgcolor="info">Kode Sub Kejuruan</th>
                <th bgcolor="info">Nama Sub</th>
                <th bgcolor="info">Nama Kejuruan</th>
                <th bgcolor="info">Keterangan</th>
              </tr>
            </thead>
            
            <tbody>
              @foreach($sub_kejuruan as $data)
                <tr>                   
                  <td><input type="checkbox" name="check[{{$data->id}}]" value="{{$data->id}}" onclick="addId(this)"></td>
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
      alert("Silahkan Pilih Terlebih Dahulu Datanya !");
    } else {
      var konfirmasi = confirm("Apakah Anda Yakin Akan Menghapus Data Ini ?");
        if( konfirmasi == true ) {
          //alert('Eksekusi delete dilakukan..');
          $.ajax({
              url: "sub_kejuruan/destroy",
              type: 'DELETE',
              headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
              dataType: 'json',
              data: {"ids": ids},
             success: function(result) {
                ///
              }
          });
          setTimeout(function(){
            window.location = "/sub_kejuruan";  
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
      alert("Silahkan Pilih Terlebih Dahulu Datanya !");
    } else if(ids.length > 1){
      alert("Pilih salah satu data");
      } else {
        var konfirmasi = confirm("Apakah Anda Yakin Akan Mengedit Data Ini ?");
        if( konfirmasi == true ) {
          //alert('Eksekusi delete dilakukan..');
          $.ajax({
            url: "sub_kejuruan/update",
            type: 'UPDATE',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            dataType: 'json',
            data: {"ids": ids},
            success: function(result) {
              ///
            }
          });
          setTimeout(function(){
            window.location = "/sub_kejuruan/"+ids+"/edit";  
          }, 1000);
        
      } else {
        alert('Eksekusi update dibatalkan..');
      }
    }
    console.log("data terpilih: " + ids);
  }

</script>
@endsection