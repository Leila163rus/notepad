$('#add').click(function() {
  $('#contact').css('display', 'none');
  $('#search').css('display', 'none');
  $('#form').css('display', 'inline');
});

$('#contacts').click(function() {
  $('#form').css('display', 'none');
  $('#search').css('display', 'none');
  $('#contact').css('display', 'block');
});

$('#find').click(function() {
  $('#form').css('display', 'none');
  $('#search').css('display', 'flex');
  $('#contact').css('display', 'block');
});

$('.fio').click(function() {
  $(this).nextAll('.info').each(function () {
    if($(this).css('display') == 'none') {
      $(this).css('display', 'block');
    } else {
      $(this).css('display', 'none');
    }
  });
});

$('.search').on('keyup', function() {
  let value = $(this).val().toLowerCase();
    $('.fio').parent().filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
    });
});
 

