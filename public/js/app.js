$(document).ready(function() {
     $('#shorten-form').submit(function(e) {
         e.preventDefault();

         $('#shorten-form input').removeClass('is-invalid');
         $('.invalid-feedback').remove();
         
         $.ajax({
             type: 'POST',
             url: $(this)[0].action,
             data: $(this).serialize(),
             success: function(response) {
                 $('#shortened-url').html('<a target="_blank" href="' + response.shortened_url + '">' + response.shortened_url + '</a>');
             },
             error: function (xhr) {
                $.each(xhr.responseJSON.errors, function(key, value) {
                   $('#' + key).addClass('is-invalid');
                   $('#' + key).after('<span class="invalid-feedback" role="alert"><strong>' + value + '</strong></span>');
                });
             }
        });
     });
});
