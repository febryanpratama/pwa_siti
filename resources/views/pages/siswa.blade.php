<!DOCTYPE html>
<html lang="en">
   <!-- Mirrored from admin.pixelstrap.com/cuba/theme/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 06 Aug 2021 16:46:57 GMT -->
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
      <meta name="keywords" content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
      <meta name="author" content="pixelstrap">
      <link rel="icon" href="http://alamandadevelopment.com/assets/images/favicon.png" type="image/x-icon">
      <link rel="shortcut icon" href="http://alamandadevelopment.com/assets/images/favicon.png" type="image/x-icon">
      <title>Cuba - Premium Admin Template</title>
      <!-- Google font-->
      <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="http://alamandadevelopment.com/assets/css/font-awesome.css">
      <link rel="stylesheet" href="http://alamandadevelopment.com/assets/css/sweetalert.css">
      <!-- ico-font-->
      <link rel="stylesheet" type="text/css" href="http://alamandadevelopment.com/assets/css/vendors/icofont.css">
      <link rel="stylesheet" type="text/css" href="http://alamandadevelopment.com/assets/css/vendors/flag-icon.css">
      <link href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
      <link href="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js" rel="stylesheet">
      <!-- Plugins css Ends-->
      <!-- Bootstrap css-->
      <link rel="stylesheet" type="text/css" href="http://alamandadevelopment.com/assets/css/vendors/bootstrap.css">
      <!-- App css-->
      <link rel="stylesheet" type="text/css" href="http://alamandadevelopment.com/assets/css/style.css">
      <link id="color" rel="stylesheet" href="http://alamandadevelopment.com/assets/css/color-1.css" media="screen">
      <!-- Responsive css-->
      <link rel="stylesheet" type="text/css" href="http://alamandadevelopment.com/assets/css/responsive.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.4/sweetalert2.min.css" integrity="sha512-y4S4cBeErz9ykN3iwUC4kmP/Ca+zd8n8FDzlVbq5Nr73gn1VBXZhpriQ7avR+8fQLpyq4izWm0b8s6q4Vedb9w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   </head>
   <body>
      <div class="container-fluid p-0 m-0">
      <div class="comingsoon comingsoon-bgimg">
         <div class="col-md-8 p-4">
            <form action="http://alamandadevelopment.com/cek-angsuran" method="POST">
               <input type="hidden" name="_token" value="emZBgyLuCXquSSIHen4dN2q2vWjlpdNb12jeQFlz">                    
               <div class="row">
                  <div class="col-md-8">
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <input type="number" class="form-control" id="nik" name="nik" value="" placeholder="Masukkan NIK Anda" required>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <input type="number" class="form-control" name="no_otp" id="no_otp" placeholder="Masukan Kode OTP" required>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="row">
                        <div class="col-md-12">
                           <button class="form-control btn btn-primary" id="kirim_otp">Kirim OTP</button>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row mt-2">
                  <div class="col-md-12">
                     <div class="row">
                        <div class="col-md-4">
                           <select name="tipe" class="form-control" required>
                              <option value=""> == Pilih Tipe ==</option>
                              <option value="Downpayment">Downpayment</option>
                              <option value="Plafon">Plafon</option>
                           </select>
                        </div>
                        <div class="col-md-8">
                           <button class="btn btn-primary form-control" id="cari_data"> Cari Data </button>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </body>
   <script src="http://alamandadevelopment.com/assets/js/jquery-3.5.1.min.js"></script>
   <!-- Bootstrap js-->
   <script src="http://alamandadevelopment.com/assets/js/bootstrap/bootstrap.bundle.min.js"></script>
   <script src="http://alamandadevelopment.com/assets/js/datatable/datatables/datatable.custom.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.4/sweetalert2.min.js" integrity="sha512-vDRRSInpSrdiN5LfDsexCr56x9mAO3WrKn8ZpIM77alA24mAH3DYkGVSIq0mT5coyfgOlTbFyBSUG7tjqdNkNw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <!-- Plugins JS Ends-->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
   <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
   <!-- Theme js-->
   <script src="http://alamandadevelopment.com/assets/js/script.js"></script>
   <script src="http://alamandadevelopment.com/assets/js/sweetalert.min.js"></script>
   <script>
      function SetDisabled(){
      
          // console.log('disabled')
          var counter = 60;
          setInterval(function() {
          counter--;
          if (counter >= 0) {
              span = document.getElementById("kirim_otp");
              $('#kirim_otp').addClass('disabled')
              span.innerHTML = counter;
          }
          if (counter === 0) {
              $('#kirim_otp').html('Kirim OTP');
              $('#kirim_otp').removeClass('disabled')
              // alert('sorry, out of time');
              clearInterval(counter);
          }
          }, 1000);
      }
      
      $('#cari_data').on('click', function(){
          let data = $('#nik').val();
          let otp = $('#no_otp').val();
          // console.log(data)
          if (otp == '') {
              Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: 'OTP Tidak Boleh Kosong',
                  // footer: '<a href="">Why do I have this issue?</a>'
              })
          }
          if (data == '') {
              Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: 'NIK Tidak Boleh Kosong',
                  // footer: '<a href="">Why do I have this issue?</a>'
              })
          }else{
              // console.log('benar')
      
      
          }
          // if(data == ''){
          //     Swal.fire({
          //         icon: 'error',
          //         title: 'Oops...',
          //         text: 'x',
          //         footer: '<a href="">Why do I have this issue?</a>'
          //     })
          // }
      })
      
      $('#kirim_otp').on('click', function(){
          let nik = $('#nik').val()
          SetDisabled()
          if (nik == '') {
              Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: 'Harap Masukkan NIK Terlebih Dahulu',
              })
          }else{
              // console.log('kirim')
              $.ajax({
              url: 'http://alamandadevelopment.com/api/otp_token',
              type: 'post',
              dataType: 'json',
              headers: {
                  'X-CSRF-TOKEN': "emZBgyLuCXquSSIHen4dN2q2vWjlpdNb12jeQFlz"
              },
              data: {
                  'nik': nik,
              },
              success: (data)=>{
                  // console.log(data.status)
                  if (data.status == 200) {
                      if (data.message == 'error') {
                          Swal.fire({
                              icon: 'error',
                              title: 'Oops...',
                              text: data.data,
                          })
                          // Harap Masukkan NIK Terlebih Dahulu
                      }else{
                          Swal.fire({
                              icon: 'success',
                              title: 'Berhasil',
                              text: data.data,
                          })
                          // SetDisabled()
                      }
                  }else{
                      Swal.fire({
                          icon: 'error',
                          title: 'Oops...',
                          text: 'Silahkan Hubungi Admin Website',
                      })
                  }
              }
          })
          }
      })
   </script>
   <script>
      function handleInput(e) {
          var ss = e.target.selectionStart;
          var se = e.target.selectionEnd;
          e.target.value = e.target.value.toUpperCase();
          e.target.selectionStart = ss;
          e.target.selectionEnd = se;
      }
   </script>
</html>