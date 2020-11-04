@extends('tampilan/index')

@section('judul')
     <center><h2 class="h5 no-margin-bottom">Scan</h2></center>
@endsection

@section('konten')

<div class="col-lg-12" class="form-inline">
<br>
<div class="card" >
<br>
    <center>
    <div>
        <a class="btn btn-primary" id="startButton" >Start</a>
        <a class="btn btn-primary" id="resetButton">Reset</a>
    </div>
    <br>
    <div>
        <video id="video" width="300" height="200" style="border: 1px solid gray"></video>
    </div>

    <div id="sourceSelectPanel" style="display:none">
        <label for="sourceSelect">Change video source:</label>
        <select id="sourceSelect" style="max-width:400px">
        </select>
    </div>
    <div class="col-lg-4">
    <label>Result:</label><br>
    <div class="alert alert-secondary" role="alert" id="result" name="result"></div>
    <label>Nama Barang:</label><br>
    <div class="alert alert-secondary" role="alert" id="nama" name="nama"></div>
    </div>
    </center>
</div>
</div>

<script type="text/javascript" src="https://unpkg.com/@zxing/library@latest"></script>
  <script type="text/javascript">
    window.addEventListener('load', function () {
      let selectedDeviceId;
      const codeReader = new ZXing.BrowserMultiFormatReader()
      console.log('ZXing code reader initialized')
      codeReader.listVideoInputDevices()
        .then((videoInputDevices) => {
          const sourceSelect = document.getElementById('sourceSelect')
          selectedDeviceId = videoInputDevices[0].deviceId
          if (videoInputDevices.length >= 1) {
            videoInputDevices.forEach((element) => {
              const sourceOption = document.createElement('option')
              sourceOption.text = element.label
              sourceOption.value = element.deviceId
              sourceSelect.appendChild(sourceOption)
            })

            sourceSelect.onchange = () => {
              selectedDeviceId = sourceSelect.value;
            };

            const sourceSelectPanel = document.getElementById('sourceSelectPanel')
            sourceSelectPanel.style.display = 'block'
          }

          document.getElementById('startButton').addEventListener('click', () => {
            codeReader.decodeFromVideoDevice(selectedDeviceId, 'video', (result, err) => {
              if (result) {
                console.log(result)
                document.getElementById('result').textContent = result.text
              
                var id = document.getElementById('result').innerHTML;
                alert("ID barang : "+id);
                console.log(id);
                var token = $('meta[name="csrf-token]').attr('content');
                $.ajax({
                  type: 'GET',
                  headers: {
                      'X-CSRF-TOKEN': token
                  },
                  url: '/barang/req-nama-barang/'+id,
                  dataType: 'json',
                  success: function(data){
                    $('#nama').html(data.data[0].nama);
                  } 
                });

              }
              if (err && !(err instanceof ZXing.NotFoundException)) {
                console.error(err)
                document.getElementById('result').textContent = err
              }
            })
            console.log(`Started continous decode from camera with id ${selectedDeviceId}`)
          })

          document.getElementById('resetButton').addEventListener('click', () => {
            codeReader.reset()
            document.getElementById('result').textContent = '';
            console.log('Reset.')
          })

        })
        .catch((err) => {
          console.error(err)
        })
    })
  </script>
@endsection
