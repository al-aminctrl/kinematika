<?php
use App\PesertaUjian;
use App\PilganJawab;
use App\SoalSatuan;
use App\SoalTk1;
use App\SoalTk2;
use App\SoalTk3;
use App\SoalTk4;
use App\JawabanTk1;
use App\JawabanTk2;
use App\JawabanTk3;
use App\JawabanTk4;

 ?>

<div class="row">
      <div class="col-md-8">
        <div class="card" style=" border-radius: 0px 0px 20px 20px;">
          <div class="card-header" style="background: #FF7F50;">Soal Test</div>
          <div class="card-body " >
            <?php $i=1; ?>
            @foreach($soal_satuan as $item)
                <div class=" container row" >
                    <div class="col-md-4"><h6>Soal No. {{$soal_satuan ->perPage()*($soal_satuan->currentPage()-1)+$i}}   </h6></div>
                    <div class="col-md-8 text-right">
                      <button class="btn btn-info btn-sm text-center">Tier 1</button>
                      <button class="btn btn-info btn-sm text-center">Tier 2</button>
                      <button class="btn btn-info btn-sm text-center">Tier 3</button>
                      <button class="btn btn-info btn-sm text-center">Tier 4</button>
                    </div>
                </div>
                <div class="container" >
                <table >
                  <th>{{$item->indikator}}</th>
                </table>
                </div>
                <hr>

                <div class="row">
                  <div class="container">
                    <table>
                    @if($item->soal_tk1->gambar != null)
                    <tr>
                          <td> <img src="{{url('images/soal/'.$item->soal_tk1->gambar)}}" width="250px"> </td>
                      </tr>
                      @else
                   @endif
                      <tr>
                          <td><b> {{$soal_satuan ->perPage()*($soal_satuan->currentPage()-1)+$i}}.1 </b> :<br/> <p>{{$item->soal_tk1->pertanyaan}} </p> </td>
                      </tr>
                      <tr>
                          <td>
                            <?php
                            $check_jawaban_tk1 = JawabanTk1::where('peserta_ujian_id', $peserta_ujian->id)
                                                        ->where('soal_tk1_id', $item->soal_tk1->id)->first();
                             ?>
                            @if(!$check_jawaban_tk1)
                            <input type="radio" class="pilihan" name="pilihan_tk1" value="A"> A . {{$item->soal_tk1->pil_a}}  <br>
                            <input type="radio" class="pilihan" name="pilihan_tk1" value="B" > B . {{$item->soal_tk1->pil_b}}  <br>
                            <input type="radio" class="pilihan" name="pilihan_tk1" value="C" > C . {{$item->soal_tk1->pil_c}}  <br>
                            <input type="radio" class="pilihan" name="pilihan_tk1" value="D" > D . {{$item->soal_tk1->pil_d}}  <br>
                            @else
                            <input type="radio" class="pilihan" id="jawab_tk1_a" name="pilihan_tk1" value="A"> A . {{$item->soal_tk1->pil_a}}  <br>
                            <input type="radio" class="pilihan" id="jawab_tk1_b" name="pilihan_tk1" value="B" > B . {{$item->soal_tk1->pil_b}}  <br>
                            <input type="radio" class="pilihan" id="jawab_tk1_c" name="pilihan_tk1" value="C"> C . {{$item->soal_tk1->pil_c}}  <br>
                            <input type="radio" class="pilihan" id="jawab_tk1_d" name="pilihan_tk1" value="D" > D . {{$item->soal_tk1->pil_d}}  <br>
                              @if($check_jawaban_tk1->jawaban == 'A')
                                <script>
                                  $('#jawab_tk1_a').prop('checked',true);
                                </script>
                              @elseif($check_jawaban_tk1->jawaban == 'B')
                                <script>
                                  $('#jawab_tk1_b').prop('checked',true);
                                </script>
                              @elseif($check_jawaban_tk1->jawaban == 'C')
                                <script>
                                  $('#jawab_tk1_c').prop('checked',true);
                                </script>
                              @else
                                <script>
                                  $('#jawab_tk1_d').prop('checked',true);
                                </script>
                              @endif
                            @endif
                          </td>
                      </tr>
                      <input type="hidden" id="soal_tk1_id" value="{{$item->soal_tk1->id}}">
                      <input type="hidden" id="kunci1" value="{{$item->soal_tk1->kunci}}">

                    </table>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="container">
                    <table>
                      <tr>
                          <td><b> {{$soal_satuan ->perPage()*($soal_satuan->currentPage()-1)+$i}}.2 </b> :<br/> <p>{{$item->soal_tk2->pertanyaan}} </p> </td>
                      </tr>
                      <tr>
                          <td>
                            <?php
                            $check_jawaban_tk2 = JawabanTk2::where('peserta_ujian_id', $peserta_ujian->id)
                                                        ->where('soal_tk2_id', $item->soal_tk2->id)->first();
                             ?>
                            @if(!$check_jawaban_tk2)
                            <input type="radio" class="pilihan" name="pilihan_tk2" value="A"> A . {{$item->soal_tk2->pil_a}}  <br>
                            <input type="radio" class="pilihan" name="pilihan_tk2" value="B" > B . {{$item->soal_tk2->pil_b}}  <br>
                            @else
                            <input type="radio" class="pilihan" id="jawab_tk2_a" name="pilihan_tk2" value="A"> A . {{$item->soal_tk2->pil_a}}  <br>
                            <input type="radio" class="pilihan" id="jawab_tk2_b" name="pilihan_tk2" value="B" > B . {{$item->soal_tk2->pil_b}}  <br>
                              @if($check_jawaban_tk2->jawaban == 'A')
                                <script>
                                  $('#jawab_tk2_a').prop('checked',true);
                                </script>
                              @else
                                <script>
                                  $('#jawab_tk2_b').prop('checked',true);
                                </script>
                              @endif
                            @endif

                          </td>
                      </tr>
                      <input type="hidden" id="soal_tk2_id" value="{{$item->soal_tk2->id}}">
                      <input type="hidden" id="kunci2" value="{{$item->soal_tk2->kunci}}">
                    </table>
                  </div>
                </div>

                <div class="row mt-3">
                  <div class="container">
                    <table>
                    @if($item->soal_tk3->gambar != null)
                    <tr>
                    <td> <img src="{{url('images/soal/'.$item->soal_tk3->gambar)}}" width="250px"> </td>
                      </tr>
                    @else
                   @endif
                      <tr>
                          <td><b> {{$soal_satuan ->perPage()*($soal_satuan->currentPage()-1)+$i}}.3 </b> :<br/> <p>{{$item->soal_tk3->pertanyaan}} </p> </td>
                      </tr>
                      <tr>
                          <td>
                            <?php
                            $check_jawaban_tk3 = JawabanTk3::where('peserta_ujian_id', $peserta_ujian->id)
                                                        ->where('soal_tk3_id', $item->soal_tk3->id)->first();
                             ?>

                            @if(!$check_jawaban_tk3)
                            <input type="radio" class="pilihan" name="pilihan_tk3" value="A"> A . {{$item->soal_tk3->pil_a}}  <br>
                            <input type="radio" class="pilihan" name="pilihan_tk3" value="B" > B . {{$item->soal_tk3->pil_b}}  <br>
                            <input type="radio" class="pilihan" name="pilihan_tk3" value="C" > C . {{$item->soal_tk3->pil_c}}  <br>
                            <input type="radio" class="pilihan" name="pilihan_tk3" value="D" > D . {{$item->soal_tk3->pil_d}}  <br>
                            @else
                            <input type="radio" class="pilihan" id="jawab_tk3_a" name="pilihan_tk3" value="A"> A . {{$item->soal_tk3->pil_a}}  <br>
                            <input type="radio" class="pilihan" id="jawab_tk3_b" name="pilihan_tk3" value="B" > B . {{$item->soal_tk3->pil_b}}  <br>
                            <input type="radio" class="pilihan" id="jawab_tk3_c" name="pilihan_tk3" value="C" > C . {{$item->soal_tk3->pil_c}}  <br>
                            <input type="radio" class="pilihan" id="jawab_tk3_d" name="pilihan_tk3" value="D" > D . {{$item->soal_tk3->pil_d}}  <br>
                              @if($check_jawaban_tk3->jawaban == 'A')
                                <script>
                                  $('#jawab_tk3_a').prop('checked',true);
                                </script>
                              @elseif($check_jawaban_tk3->jawaban == 'B')
                                <script>
                                  $('#jawab_tk3_b').prop('checked',true);
                                </script>
                              @elseif($check_jawaban_tk3->jawaban == 'C')
                                <script>
                                  $('#jawab_tk3_c').prop('checked',true);
                                </script>
                              @else
                                <script>
                                  $('#jawab_tk3_d').prop('checked',true);
                                </script>
                              @endif
                            @endif
                          </td>
                      </tr>
                      <input type="hidden" id="soal_tk3_id" value="{{$item->soal_tk3->id}}">
                      <input type="hidden" id="kunci3" value="{{$item->soal_tk3->kunci}}">
                    </table>
                  </div>
                </div>

                <div class="row mt-3">
                  <div class="container">
                    <table>
                      <tr>
                          <td><b> {{$soal_satuan->perPage()*($soal_satuan->currentPage()-1)+$i}}.4 </b> :<br/> <p>{{$item->soal_tk4->pertanyaan}} </p> </td>
                      </tr>
                      <tr>
                          <td>
                            <?php
                            $check_jawaban_tk4 = JawabanTk4::where('peserta_ujian_id', $peserta_ujian->id)
                                                        ->where('soal_tk4_id', $item->soal_tk4->id)->first();
                             ?>

                            @if(!$check_jawaban_tk4)
                            <input type="radio" class="pilihan" name="pilihan_tk4" value="A"> A . {{$item->soal_tk4->pil_a}}  <br>
                            <input type="radio" class="pilihan" name="pilihan_tk4" value="B" > B . {{$item->soal_tk4->pil_b}}  <br>
                            @else
                            <input type="radio" class="pilihan" id="jawab_tk4_a" name="pilihan_tk4" value="A"> A . {{$item->soal_tk4->pil_a}}  <br>
                            <input type="radio" class="pilihan" id="jawab_tk4_b" name="pilihan_tk4" value="B" > B . {{$item->soal_tk4->pil_b}}  <br>
                              @if($check_jawaban_tk4->jawaban == 'A')
                                <script>
                                  $('#jawab_tk4_a').prop('checked',true);
                                </script>
                              @else
                                <script>
                                  $('#jawab_tk4_b').prop('checked',true);
                                </script>
                              @endif
                            @endif
                          </td>
                      </tr>
                      <input type="hidden" id="soal_tk4_id" value="{{$item->soal_tk4->id}}">
                      <input type="hidden" id="kunci4" value="{{$item->soal_tk4->kunci}}">
                    </table>
                  </div>
                </div>

                <input type="hidden" value="{{ $item->id }}" id="soal_satuan_id">
            @endforeach

          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card" style=" border-radius: 0px 0px 20px 20px;">
          <div class="card-header"  style="border-radius: 0px 0px 0px 0px;">Navigasi Soal</div>
          <div class="card-body">
            <div class="row ">
              <div class="col-12 text-center " style=" overflow: Auto;">
              {!! $soal_satuan->links() !!}
              </div>
            </div>

          </div>
        </div>
        <div class="row">
          <div class="col-md-8"></div>
          <div class="col-md-4">
            <a href="{{route('finishUjian',$peserta_ujian->id)}}"> <button class="btn btn-danger" > Akhiri Test </button> </a>
          </div>
        </div>
      </div>
    </div>

    <input type="hidden" value="{{ $ujian->id }}" id="ujian_id">
    <input type="hidden" name="peserta_ujian_id" value="{{ $peserta_ujian->id }}" id="peserta_ujian_id">

<script>

var peserta_ujian_id  = $("#peserta_ujian_id").val();
var ujian_id          = $('#ujian_id').val();
var soal_satuan_id      = $('#soal_satuan_id').val();

function hasilUjian() {
    $.ajax({
        url: "{{ url('store/hasil_ujian') }}",
        type: "GET",
        dataType: 'json',
        data: {
            peserta_ujian_id: peserta_ujian_id,
            soal_satuan_id: soal_satuan_id,
        },
        error: function(xhr, status, error) {
          var err = eval("(" + xhr.responseText + ")");
          console.log(err.Message);
        },
        success: function(data) {
					  console.log(data);
				}
    });
}

// Pengaturan JS untuk simpan jawaban soal tingkat 1
$('input[type=radio][name="pilihan_tk1"]').click(function() {
    var jawab_tk1         = document.querySelector('input[name = "pilihan_tk1"]:checked').value;
    var soal_tk1_id       = $("#soal_tk1_id").val();
    var kunci1             = $("#kunci1").val();

    if ( jawab_tk1 == kunci1 ) {
        var kode  = 1;
    } else {
        var kode  = 0;
    }
    console.log(jawab_tk1 + " dan " + kunci1);
    $.ajax({
        url: "{{ url('store/jawaban_tk1') }}",
        type: "GET",
        dataType: 'json',
        data: {
            jawab_tk1: jawab_tk1,
            soal_tk1_id: soal_tk1_id,
            peserta_ujian_id: peserta_ujian_id,
            kode: kode,
            ujian_id: ujian_id
        },
        error: function(xhr, status, error) {
          var err = eval("(" + xhr.responseText + ")");
          console.log(err.Message);
        },
        success: function(data) {
					  console.log(data);
            hasilUjian();
				}
    });
});


// Pengaturan JS untuk simpan jawaban soal tingkat 2
$('input[type=radio][name="pilihan_tk2"]').click(function() {
    var jawab_tk2         = document.querySelector('input[name = "pilihan_tk2"]:checked').value;
    var soal_tk2_id       = $("#soal_tk2_id").val();
    var kunci2             = $("#kunci2").val();

    if ( jawab_tk2 == kunci2 ) {
        var kode  = 1;
    } else {
        var kode  = 0;
    }
    console.log(jawab_tk2 + " dan " + kunci2);
    console.log(kode);
    $.ajax({
        url: "{{ url('store/jawaban_tk2') }}",
        type: "GET",
        dataType: 'json',
        data: {
            jawab_tk2: jawab_tk2,
            soal_tk2_id: soal_tk2_id,
            peserta_ujian_id: peserta_ujian_id,
            kode: kode,
            ujian_id: ujian_id
        },
        error: function(xhr, status, error) {
          var err = eval("(" + xhr.responseText + ")");
          console.log(err.Message);
        },
        success: function(data) {
					  console.log(data);
            hasilUjian();
				}
    });
});


// Pengaturan JS untuk simpan jawaban soal tingkat 3
$('input[type=radio][name="pilihan_tk3"]').click(function() {
    var jawab_tk3         = document.querySelector('input[name = "pilihan_tk3"]:checked').value;
    var soal_tk3_id       = $("#soal_tk3_id").val();
    var kunci3             = $("#kunci3").val();

    if ( jawab_tk3 == kunci3 ) {
        var kode  = 1;
    } else {
        var kode  = 0;
    }
    console.log(jawab_tk3 + " dan " + kunci3);
    console.log(kode);
    $.ajax({
        url: "{{ url('store/jawaban_tk3') }}",
        type: "GET",
        dataType: 'json',
        data: {
            jawab_tk3: jawab_tk3,
            soal_tk3_id: soal_tk3_id,
            peserta_ujian_id: peserta_ujian_id,
            kode: kode,
            ujian_id: ujian_id
        },
        error: function(xhr, status, error) {
          var err = eval("(" + xhr.responseText + ")");
          console.log(err.Message);
        },
        success: function(data) {
					  console.log(data);
            hasilUjian();
				}
    });
});


// Pengaturan JS untuk simpan jawaban soal tingkat 4
$('input[type=radio][name="pilihan_tk4"]').click(function() {
    var jawab_tk4         = document.querySelector('input[name = "pilihan_tk4"]:checked').value;
    var soal_tk4_id       = $("#soal_tk4_id").val();
    var kunci4             = $("#kunci4").val();

    if ( jawab_tk4 == kunci4 ) {
        var kode  = 1;
    } else {
        var kode  = 0;
    }
    console.log(jawab_tk4 + " dan " + kunci4);
    console.log(kode);
    $.ajax({
        url: "{{ url('store/jawaban_tk4') }}",
        type: "GET",
        dataType: 'json',
        data: {
            jawab_tk4: jawab_tk4,
            soal_tk4_id: soal_tk4_id,
            peserta_ujian_id: peserta_ujian_id,
            kode: kode,
            ujian_id: ujian_id
        },
        error: function(xhr, status, error) {
          var err = eval("(" + xhr.responseText + ")");
          console.log(err.Message);
        },
        success: function(data) {
					  console.log(data);
            hasilUjian();
				}
    });
});
</script>
