@extends('layouts.layout_guru')

@section('title')
    <title>PhyDiags | Education</title>
@endsection

@section('content')
<?php use App\Guru ;
?>
<main class="main">
    <div class="container-fluid">
        <div class="animated fadeIn">
            <form action="{{route('updateProfilGuru')}}" method="post" enctype="multipart/form-data" >
            @csrf
            @method('PATCH')
                <div class="row">
                    <div class="col-md-4">
                        <div class="card"  style="box-shadow: 5px 5px 10px rgba(48, 10, 64, 0.5);">
                            <div class="card-header  pt-3 pb-2 text-center" style="background: #FF7F50;"
                             >
                                <strong style="font-size:18px"> Foto Profil </strong>
                            </div>
                            <div class="card-body">
                                <div class="form-group text-center">
                                    <label for="foto"> <b> Foto :  </b></label> <br>
                                    <img src="{{ url('images/' . $guru->foto) }}" width="150px"  alt="{{ $guru->foto }}">
                                    <hr>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile"  name="foto">
                                        <label class="custom-file-label" for="customFile">Pilih File Foto ..</label>
                                    </div>
                                    @if($errors->has('foto'))
                                                <span class="help-block">{{$errors->first('foto')}}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="card"  style="box-shadow: 5px 5px 10px rgba(48, 10, 64, 0.5);">
                            <div class="card-header  pt-3 pb-2  text-center" style="background: #FF7F50;"  >
                                <strong style="font-size:18px"> Profil </strong>
                            </div>
                            <div class="card-body">
                                @if (session('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                @endif

                                @if (session('error'))
                                    <div class="alert alert-danger">{{ session('error') }}</div>
                                @endif

                                <div class="container">

                                    <fieldset disabled>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="disabledTextInput"> <b> User Name </b> </label>
                                                <div class="input-group mb-0">
                                                <div class="input-group-prepend" style="border-radius:10px; border-color:#c4cdcf; box-shadow: 3px 3px 5px grey;">
                                                    <span class="input-group-text" id="basic-addon1"> <span class="fa fa-user"></span> </span>
                                                </div>
                                                <input type="text" id="disabledTextInput" class="form-control" placeholder="{{ Auth::user()->name }}" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="disabledTextInput"> <b> Email </b> </label>
                                                <div class="input-group mb-0">
                                                <div class="input-group-prepend" style="border-radius:10px; border-color:#c4cdcf; box-shadow: 3px 3px 5px grey;">
                                                    <span class="input-group-text" id="basic-addon1"> <span class="fa fa-envelope"></span> </span>
                                                </div>
                                                <input type="text" id="disabledTextInput" class="form-control" placeholder="{{ Auth::user()->email }}" readonly >
                                            </div>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }} ">
                                    <div class="form-row mb-0 mt-0 pt-0">
                                        <div class="form-group col-md-12">
                                            <label for="nama_lengkap"> <b>Nama Lengkap: </b> </label>
                                            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="{{$guru->nama_lengkap}}"  style="border-radius:10px; box-shadow: 3px 0px 5px grey;">
                                            @if($errors->has('nama_lengkap'))
                                            <span class="help-block">{{$errors->first('nama_lengkap')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-row mb-0 mt-0 pt-0">
                                        <div class="form-group col-md-6">
                                            <label for="nomor_induk"><b> Nomor Induk  : </b></label>
                                            <input type="text" class="form-control" id="nomor_induk" name="nomor_induk" value="{{$guru->nomor_induk}}" style="border-radius:10px;  box-shadow: 3px 0px 5px grey;">
                                            @if($errors->has('nip'))
                                            <span class="help-block">{{$errors->first('nomor_induk')}}</span>
                                            @endif
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="jk"> <b> Jenis Kelamin : </b> </label>
                                            <select class="form-control" name="jk" id="jk"  value="{{$guru->jk}}" style="border-radius:10px; border-color:#c4cdcf; box-shadow: 3px 3px 5px grey;" >
                                                <option selected >{{$guru->jk}}</option>
                                                <option value="Laki-laki">Laki-laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </div> 
                                    </div>
                                    <div class="form-row mb-0 mt-0 pt-0">
                                        <div class="form-group col-md-6">
                                            <label for="asal_sekolah"><b> Asal Sekolah : </b></label>
                                            <input type="text" class="form-control" id="asal_sekolah" name="asal_sekolah" value="{{$guru->asal_sekolah}}" style="border-radius:10px;  box-shadow: 3px 0px 5px grey;">
                                            @if($errors->has('asal_sekolah'))
                                            <span class="help-block">{{$errors->first('asal_sekolah')}}</span>
                                            @endif
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="bidang_studi"> <b> Bidang Studi : </b> </label>
                                            <input type="text" class="form-control" id="bidang_studi" name="bidang_studi" value="{{$guru->bidang_studi}}" style="border-radius:10px;  box-shadow: 3px 0px 5px grey;">
                                            @if($errors->has('bidang_studi'))
                                            <span class="help-block">{{$errors->first('bidang_studi')}}</span>
                                            @endif
                                        </div> 
                                    </div>
                                    <div class="form-row mb-0 mt-0 pt-0">
                                        <div class="form-group col-md-12">
                                            <label for="alamat"> <b>Alamat: </b> </label>
                                            <input type="text" class="form-control" id="alamat" name="alamat" value="{{$guru->alamat}}"  style="border-radius:10px; box-shadow: 3px 0px 5px grey;">
                                            @if($errors->has('alamat'))
                                            <span class="help-block">{{$errors->first('alamat')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="text-right"> <button type="submit" onclick="alertUpdate()" class="btn btn-info" style="box-shadow: 3px 2px 5px grey;"> Update Profil </button> </div>

                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </form>

        </div>
    </div>
</main>
@endsection

@section('js')
<script>
function alertUpdate() {
    swal({
        title: "Data profil berhasil di update !",
        icon: "success",
    });
}
</script>
@endsection
