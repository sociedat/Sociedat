$(document).ready(function() {
    showConfirmation_services = false;
    showConfirmation_membership = false;
    $('.service-confirmation').hide();
    $('.service-error').hide();
    $('.service-confirmation-membership').hide();
    $('.service-error-membership').hide();
    

});

//MEMBERSHIP REQUEST
//Validating file extension
$('#membership-payment').change(function(){
    var ext = this.value.match(/\.(.+)$/)[1];
    switch(ext)
    {
        case 'jpeg':
        case 'jpg':
        case 'bmp':
        case 'png':
        case 'pdf':
            break;
        default:
            alert('Por favor selecciona un archivo con las extensiones permitidas');
            this.value='';
    }        
});


//Send form confirmation for service Request
var $serviceForm = $('[name=serviceRequest]');
$serviceForm.submit(function() {
    var paramArr = $(this).serialize() + '&' + $.param({ getInfo:'getInfo'});
    $.post("php/validate_forms.php",
           paramArr,
           function(data, status) {
                if(status == 'success'){
                    $('.service-confirmation').show();
                } else {
                    $('.service-error').show();
                }
                showConfirmation_services = true; 
            }           
    );
    return false;
});

$('#modalInfo').on('hidden.bs.modal', function() {
    if(showConfirmation_services){
        $('.service-confirmation').hide();
        $('.service-error').hide();
    }    
});


//Send form confirmation for Membership Request
var $membershipForm = $('form[name=membershipRequest]');
$membershipForm.submit(function() {
    var form_data = new FormData(this);          
    form_data.append('sendMembership', 'sendMembership');
    $.ajax({
        url: 'php/validate_forms.php', // point to server-side PHP script 
        dataType: 'text',  // what to expect back from the PHP script, if anything
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,                         
        type: 'post',
        success: function(data, status){
            //alert(data); // display response from the PHP script, if any
            console.log(data);
            if(status == 'success'){
                $('.service-confirmation-membership').show();
            } else {
                $('.service-error-membership').show();
            }
            showConfirmation_services = true;
        }
     });
    return false;
});

$('#modalMembership').on('hidden.bs.modal', function() {
    if(showConfirmation_membership){
        $('.service-confirmation-membership').hide();
        $('.service-error-membership').hide();
    }    
});

