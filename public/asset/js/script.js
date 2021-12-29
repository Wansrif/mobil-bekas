// Event pada saat link di klik
$('.page-scroll').on('click', function (e) {

  var tujuan = $(this).attr('href');
  var elemenTujuan = $(tujuan);

  $('html, body').animate({
    scrollTop: elemenTujuan.offset().top - 50
  }, 1250, 'easeInOutExpo');

  e.preventDefault();

});

// SAVE DATA
$('#send-msg').submit(function (e) {
  e.preventDefault();
  var form = this;
  const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  });
  $.ajax({
    url: $(form).attr('action'),
    method: $(form).attr('method'),
    data: new FormData(form),
    processData: false,
    dataType: 'json',
    contentType: false,
    beforeSend: function () {
      $(form).find('div.error-text').text('');
    },
    success: function (data) {
      if ($.isEmptyObject(data.error)) {
        if (data.code == 1) {
          $(form)[0].reset();
          Toast.fire({
            icon: 'success',
            title: '<div class="text-base font-semibold">' + data.msg + '</div>',
          })
        } else {
          alert(data.msg);
        }
      } else {
        $.each(data.error, function (prefix, val) {
          $(form).find('div.' + prefix + '_error').text(val);
        });
      }
    }
  })
})