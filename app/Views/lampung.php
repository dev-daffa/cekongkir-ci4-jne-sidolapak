<!doctype html>
<html lang="en">
  <head>
    <title>LAMPUNG</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://vtracks.co.id/assets/select2-4.0.6-rc.1/dist/js/i18n/id.js"></script>
  </head>
  <body>
  <div class="col-lg-8 mx-auto p-3 py-md-5">
  <header class="d-flex align-items-center pb-3 mb-5 border-bottom">
    <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
      <span class="fs-4">SUMATERA</span>
    </a>
  </header>

  <main>
    <h1>Gudang Lampung</h1>
    <p class="fs-5 col-md-8">

    <div class="container">
    <div class="row">
    <div class="col-md-5">
      <div class="panel panel-default">
        <div class="panel-body">
          <form class="form-horizontal" id="ongkir" method="POST">
            <div class="form-group">
              <label class="control-label col-sm-3">Kota Tujuan</label>
              <div class="col-sm-9">          
                <select class="form-control" id="kota_tujuan" name="kota_tujuan" required="">
                  <option></option>
                </select>
              </div>
            </div>
            <div class="form-group">        
              <div class="col-sm-offset-3 col-sm-8 pt-3">
                <button type="submit" class="btn btn-sm btn-primary ">Cek</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="col-md-7" id="cekongkir">      
    </div>
  </div>

  <hr class="col-3 col-md-2 mb-5">


    
    <div class="mb-5 mb-3 py-3">
      <a href="home" class="btn btn-secondary btn-md">Home</a>
      <a href="bandung" class="btn btn-secondary btn-md">Bandung</a>
      <a href="lampung" class="btn btn-secondary btn-md">Sumatera</a>


    </div>
</div>
</p>
</div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>



    <script>
      $( document ).ready(function() {

      $('#kota_tujuan').select2({
       placeholder: 'Pilih kota/kabupaten tujuan',
       language: "id"
      });

      $.ajax({
        type: "get",
        dataType: "html",
        url: "home/listlampung",
        // headers: {
        //   "Content-Type": "application/json",
        //   "X-Requested-With": "XMLHttpRequest"
        //   },
        success: function(msg){
        $("select#kota_tujuan").html(msg);                                                     
        }
     });
  
     $("#ongkir").submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: 'home/tariflampung',
            type: 'post',
            data: $( this ).serialize(),
            success: function(data) {
              console.log(data);
              document.getElementById("cekongkir").innerHTML = data;
            }
        });
    });
  
  });

</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>