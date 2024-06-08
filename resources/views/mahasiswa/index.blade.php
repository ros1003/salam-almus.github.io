@extends('layouts.master')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Data Mahasiswa</h1>
           
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        </div>
        @if(session('sukses'))
                <div class="alert alert-success" role="alert">
                {{session('sukses')}}
            </div>
            @endif
            <div class ="row">
            <table class= "table table-hover">
                <div class=col-6>
                <h1></h1>
                </div>
                <div class=col-6>
                <button type="button" class="btn btn-primary btn-sm float-right " data-toggle="modal" data-target="#exampleModal">
                Tambah Data Mahasiswa
                </button>
                </div>
                    <tr>
                        <th>NIM</th>
                        <th>Nama Lengkap</th>
                        <th>Tempat Tanggal Lahir</th>
                        <th> Jenis Kelamin</th>
                        <th>Jurusan</th>
                        <th>alamat</th>
                        <th>Aksi</th>
                    </tr> 
                    @foreach($data_mahasiswa as $mahasiswa)
                    <tr>
                        <td>{{$mahasiswa->nim}} </td>
                        <td>{{$mahasiswa->nama_lengkap}}</td>
                        <td>{{$mahasiswa->ttl}}</td>
                        <td>{{$mahasiswa->jenis_kelamin}}</td>
                        <td>{{$mahasiswa->jurusan}}</td>
                        <td>{{$mahasiswa->alamat}}</td>
                        <td> <a href ="/mahasiswa/{{$mahasiswa->id}}/edit" class="btn btn-warning btn-sm"> Edit</a>
                             <a href ="/mahasiswa/{{$mahasiswa->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm ('Yakin Mau di Hapus?')">Delete</a>
                        </td>

                    </tr>
                    @endforeach
                </table>

            </div>
        </div> 
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <form  method ="POST" action ="/mahasiswa" enctype="multipart/form-data">
    {{csrf_field()}}
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Mahasiswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </div>
        <div class="modal-body">
        <div class="form-group {{$errors->has('nim')? 'has-error' : ''}}">
            <label for="exampleInputEmail1" class="form-label">NIM</label>
            <input name= "nim"type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="NIM" value="{{old('nim')}}">
             @if($errors->has('nim'))
              <span class="help-block">{{$errors->first('nim')}}</span>
             @endif
          </div>
          <div class="form-group {{$errors->has('nama_lengkap')? 'has-error' : ''}}">
            <label for="exampleInputEmail1" class="form-label">NAMA LENGKAP</label>
            <input name="nama_lengkap"type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="NAMA LENGKAP"value =" {{old('nama_lengkap')}}">
            @if($errors->has('nama_lengkap'))
              <span class="help-block">{{$errors->first('nama_lengkap')}}</span>
             @endif
          </div>
          <div class="form-group {{$errors->has('ttl')? 'has-error' : ''}}">
            <label for="exampleInputEmail1" class="form-label">Tempat Tanggal Lahir</label>
            <input name="ttl"type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tempat Tanggal Lahir" value=" {{old('ttl')}}">
            @if($errors->has('ttl'))
              <span class="help-block">{{$errors->first('ttl')}}</span>
             @endif
          </div>
          <div class="form-group {{$errors->has('emaol')? 'has-error' : ''}}">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input name="email"type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="email" value=" {{old('email')}}">
            @if($errors->has('email'))
              <span class="help-block">{{$errors->first('email')}}</span>
             @endif
          </div>
          <div class="form-group {{$errors->has('jenis_kelamin')? 'has-error' : ''}}">
            <select class="form-select" aria-label="Default select example" name="jenis_kelamin">
              <option selected>JENIS KELAMIN</option>
              <option value="LAKI-LAKI"{{(old('jenis_kelamin) == LAKI-LAKI') ? 'selected' : '')}}>LAKI-LAKI</option>
              <option value="PEREMPUAN"{{(old('jenis_kelamin) == PEREMPUAN') ? 'selected' : '')}}>PEREMPUAN</option>
            </select>
            @if($errors->has('jenis_kelamin'))
              <span class="help-block">{{$errors->first('jenis_kelamin')}}</span>
             @endif
          </div>
          <div class="form-group {{$errors->has('jurusan')? 'has-error' : ''}}">
            <select class="form-select" aria-label="Default select example" name="jurusan">
              <option selected>JURUSAN</option>
              <option value="PENDIDIKAN AGAMA ISLAM"{{(old('jurusan) == PENDIDIKAN AGAMA ISLAM') ? 'selected' : '')}}>PENDIDIKAN AGAMA ISLAM</option>
              <option value="HUKUM EKONOMI SYARIAH"{{(old('jurusan) == HUKUM EKONOMI SYARIAH') ? 'selected' : '')}}>HUKUM EKONOMI SYARIAH</option>
            </select>
            @if($errors->has('jurusan'))
              <span class="help-block">{{$errors->first('jurusan')}}</span>
             @endif
          </div>
          <div class="form-group {{$errors->has('alamat')? 'has-error' : ''}}">
            <label for="floatingTextarea2">ALAMAT</label>
            <textarea name="alamat"class="form-control" placeholder="alamat" id="floatingTextarea2" style="height: 100px">{{old('alamat')}}</textarea>
          </div>
          @if($errors->has('alamat'))
              <span class="help-block">{{$errors->first('alamat')}}</span>
             @endif
        </div>
        <div class="form-group {{$errors->has('avatar')? 'has-error' : ''}}">
              <label for="floatingTextarea2">Avatar</label>
                  <input type= "file" name = "avatar" class="form-control">
                  @if($errors->has('avatar'))
              <span class="help-block">{{$errors->first('avatar')}}</span>
             @endif
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>    
      </form>
    </div>
  </div>


















@stop
@section('content1')

 
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Mahasiswa</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <form action = "/mahasiswa/create" method="POST">
                                {{csrf_field()}}
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">NIM</label>
                                        <input name = "nim"type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="NIM">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama Lengkap</label>
                                        <input name="nama_lengkap" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Lengkap">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tempat Tanggal lahir</label>
                                        <input name="ttl" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tempat Tanggal Lahir">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                                        <select name = "jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
                                        <option value= "L">Laki-Laki</option>
                                        <option value="P">Perempuan</option>
                                        </select>
                                     </div>
                                     <div class="form-group">
                                        <label for="exampleFormControlSelect1">Jurusan </label>
                                        <select name ="jurusan" class="form-control" id="exampleFormControlSelect1">
                                        <option value ="PAI">Pendidikan Agama Islam</option>
                                        <option Value="HES">Hukum Ekonomi Syariah</option>
                                        </select>
                                     </div>
                                     <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Alamat</label>
                                        <textarea name = "alamat" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                   
                                </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                        </div>
                            </div>
                        </div>
@endsection
                      
      

       
