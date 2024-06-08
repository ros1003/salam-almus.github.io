@extends('layouts.master')
@section('content')
            <h1>Edit Data Mahasiswa</h1>
            @if(session('sukses'))
                <div class="alert alert-success" role="alert">
                {{session('sukses')}}
            </div>
            @endif
            <div class ="row">
               <div class= col-lg-12>
            <form action = "/mahasiswa/{{$mahasiswa->id}}/update" method="POST">
                                {{csrf_field()}}
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">NIM</label>
                                        <input name = "nim"type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="NIM" value="{{$mahasiswa->nim}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama Lengkap</label>
                                        <input name="nama_lengkap" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Lengkap" value="{{$mahasiswa->nama_lengkap}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tempat Tanggal lahir</label>
                                        <input name="ttl" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tempat Tanggal Lahir" value="{{$mahasiswa->ttl}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                                        <select name = "jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
                                        <option value= "L" @if($mahasiswa -> jenis_kelamin == 'L') selected @endif>Laki-Laki</option>
                                        <option value="P"@if($mahasiswa -> jenis_kelamin == 'P') selected @endif>Perempuan</option>
                                        </select>
                                     </div>
                                     <div class="form-group">
                                        <label for="exampleFormControlSelect1">Jurusan </label>
                                        <select name ="jurusan" class="form-control" id="exampleFormControlSelect1">
                                        <option value ="PAI"@if($mahasiswa -> jenis_kelamin == 'PAI') selected @endif>Pendidikan Agama Islam</option>
                                        <option Value="HES"@if($mahasiswa -> jenis_kelamin == 'HES') selected @endif>Hukum Ekonomi Syariah</option>
                                        </select>
                                     </div>
                                     <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Alamat</label>
                                        <textarea name = "alamat" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$mahasiswa->alamat}}</textarea>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-warning">Update</button>
                            </form>
                        </div>
                    </div>
@endsection

       
