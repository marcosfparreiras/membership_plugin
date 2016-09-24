$( document ).ready(function() {
  console.log( "ready!" );

  toggle_checkboxes_on_load_page();
  toggle_checkbox_on_click();
});

var toggle_checkboxes_on_load_page = function() {
  $('input[id]').each(function(i) {
    toggle_checkbox($(this));
  });
}

var toggle_checkbox_on_click = function() {
  $('input[type=checkbox]').click(function() {
    toggle_checkbox($(this));
  });
}

var toggle_checkbox = function($this) {
  var id = $this.attr('id');
  var id_tag = "#" + id;
  var name_tag = id_tag + "[]";
  var name_selector = "input[name='" + id + "[]']";

  if ($(id_tag).is(':checked')) {
    $(name_selector).prop('disabled', false);
  } else {
    $(name_selector).prop('disabled', true);
  }
}

