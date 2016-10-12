$=jQuery.noConflict();
$(document).ready(function(){
  toggle_checkboxes_on_load_page();
  toggle_checkbox_on_click();


  function toggle_checkboxes_on_load_page() {
    $('input[id]').each(function(i) {
      toggle_checkbox($(this));
    });
  }

  function toggle_checkbox_on_click() {
    $('input[type=checkbox]').click(function() {
      toggle_checkbox($(this));
    });
  }

  function toggle_checkbox(element) {
    var id = element.attr('id');
    var id_tag = "#" + id;
    var name_tag = id_tag + "[]";
    var name_selector = "input[name='" + id + "[]']";

    if ($(id_tag).is(':checked')) {
      $(name_selector).prop('disabled', false);
    } else {
      $(name_selector).prop('disabled', true);
    }
  }
});
