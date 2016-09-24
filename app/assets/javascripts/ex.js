$( document ).ready(function() {
  console.log( "ready!" );

  // Buscar pelo nome e pegar elemento
  $(function() {
    $('input[type=checkbox]').click(function() {
      var id = $(this).attr('id');
      var id_tag = "#" + id;
      var name_tag = id_tag + "[]";
      var name_selector = "input[name='" + id + "[]']";
      // console.log(id);
      // console.log(id_tag);
      // console.log(name_tag);
      // console.log(name_selector);

      // var class_tag =
      if ($(id_tag).is(':checked')) {
        console.log('1');
        $(name_selector).prop('disabled', false);
      } else {
        console.log('2');
        $(name_selector).prop('disabled', true);
      }
      console.log(id);
    });
  });
});

var test = function() {
  console.log('test');
}


// Seletor para pegar elementos por nome como array
// 'input[name="10[]"]'
