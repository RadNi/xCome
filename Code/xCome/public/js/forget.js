$(document).ready(function(){
    $('.slectOne').on('change', function() {
        $('.slectOne').not(this).prop('checked', false);
        $('#result').html($(this).data( "id" ));
        if($(this).is(":checked"))
            $('#result').html($(this).data( "id" ));
        else
            $('#result').html('Empty...!');
    });
});