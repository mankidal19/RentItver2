$('.formLinks').click(function(){
var formid =$(this).data('form-id');
$('#'+formid).show();
});

$('#confirm_password_div1').on('keyup', function(){
    var pass1=$('#confirm_password_div1').val();
    var pass2=$('#password_div1').val();
    
    if(pass1.equals (pass2)){
        $('#message_div1').html("matching");
    }
    
});