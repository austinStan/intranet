/*
*
* Backpack Crud / Form
*
*/

jQuery(function($){

    'use strict';
});
$("#maritalstatus").change(function() { 
  if (($(this).val().split('1').pop()) === 'single') {
      $('form input[name="spousename"]').val('');
      $('form input[name="childname"]').val('');
      $("#childdate").val('');
      $('form input[name="spousename"]').prop("disabled", true);
      $('form input[name="childname"]').prop("disabled", true);
      $("#childdate").attr("disabled", true);
  } else {
      $('form input[name="spousename"]').prop("disabled", false);
      $('form input[name="childname"]').prop("disabled", false);
      $("#childdate").attr("disabled", false);  
  }
}).trigger("change");
