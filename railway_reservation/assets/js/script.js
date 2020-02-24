$(document).ready(function(){
    $('#gender').change(function(){
        var val = $(this).val();
        if(val == 'Female-with-child') {
            $('.child-form').show(); 
        } else {
            $('.child-form').hide(); 
        } 
    });
  });