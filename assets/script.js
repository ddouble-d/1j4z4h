$(document).ready(function(){
    $('.data').DataTable({
      "order": [[ 0, "desc" ]]
      // language: {
      //   sProcessing: 'Sedang Proses...',
      //   sLengthMenu: "Tampilan _MENU_ entri",
      //   sZeroRecords: "Tidak ditemukan data yang sesuai",
      //   sInfo: "Tampilan _START_ sampai _END_ dari _TOTAL_ entri",
      //   sInfoEmpty: "Tampilan 0 sampai 0 dari 0 entri",
      //   sInfoFiltered: "(disarin dari _MAX_ entri keseluruhan)",
      //   sInfoPosstFix: "",
      //   sSearch: "Cari:",
      //   sUrl: "",
      //   paginate: {
      //     next: '→', //or '<i class="fas fa-chevron-right"></i>'
      //     previous: '←' //'<i class="fas fa-chevron-left"></i>'
      //   }
      // }
    });

    $('#nisn').change(function(){
      var nisn = $('#nisn').val();
      if(nisn != ''){
        $.ajax({
            url:"Userdata/cekNisn",
            method:"POST",
            data:{nisn:nisn},
            success:function(data){
              $('#cekNisn').html(data);
            }
        });
      }
  });

  $('#email').change(function(){
    var email = $('#email').val();
    if(email != ''){
      $.ajax({
          url:"Userdata/cekEmail",
          method:"POST",
          data:{email:email},
          success:function(data){
            $('#cekEmail').html(data);
          }
      });
    }
});

$('#no_hp').change(function(){
  var no_hp = $('#no_hp').val();
  if(no_hp != ''){
    $.ajax({
        url:"Userdata/cekHp",
        method:"POST",
        data:{no_hp:no_hp},
        success:function(data){
          $('#cekHp').html(data);
        }
    });
  }
});
  
  });

const flashData = $('.flash-data').data('flashdata');
const flashGagal = $('.flash-gagal').data('flashgagal');
const flashLogin = $('.flash-login').data('flashlogin');

 
if (flashData) {
  Swal.fire(
    'Sukses',
    'Data Berhasil ' + flashData,
    'success'
  )
} 

if (flashGagal){
  Swal.fire({
  type: 'error',
  title: 'Gagal Ditambahkan',
  text: 'Terjadi Kesalahan'
})
}

// konfirmasi tombol hapus
$('.tombol-hapus').on('click', function(e)
{
  e.preventDefault();
  const href = $(this).attr('href');

  Swal.fire({
    title: 'Apakah anda yakin?',
    text: "Data akan dihapus",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Hapus Data!'
  }).then((result) => {
    if (result.value) {
      document.location.href = href;
    }
  })

});

//konfirmasi form password
const password = document.getElementById('password');
const confirm_password = document.getElementById('password2');

function konfirmasiPassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Password Tidak Sesuai!");
    // document.getElementById('cekPassword').innerHTML="Password Tidak Sesuai!";
  } else {
    confirm_password.setCustomValidity('Password Sesuai');
    // document.getElementById('cekPassword').innerHTML="Password Sesuai!";
  }
}

password.onchange = konfirmasiPassword;
confirm_password.onkeyup = konfirmasiPassword;

