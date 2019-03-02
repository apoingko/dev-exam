// $('#addContactField').click(function(){
//     $('#contactGroup').append(
//         '<div class="row">'+
//             '<div class="col-md-10 col-sm-10">'+
//                 '<input type="text" name="contact_info" class="form-control contact_info">'+
//             '</div>'+
//             '<div class="col-md-2 col-sm-2">'+
//                 '<input type="checkbox" class="contact_list" name="contact">'+
//                 '<button class="ml-3 removeContact" style="color: salmon;cursor: pointer;">X</button>'+
//            '</div>'+
//         '</div>'
//     );
// });

// // $('.removeContact').live('click',function(e){
// //     // var row = $(this).closest('.row');
// //     e.preventDefault();
// //      $(this).closest('.row').remove();
// // });



// $('#addAddressField').click(function(){
//     $('#addressGroup').append(
//         '<div class="row">'+
//             '<div class="col-md-10 col-sm-10">'+
//                 '<input type="text" name="address_info" class="form-control address_info">'+
//             '</div>'+
//             '<div class="col-md-2 col-sm-2">'+
//                 '<input type="checkbox" class="address_list" name="address">'+
//                 '<a href="#" class="ml-3 removeAddress">X</a>'+
//            '</div>'+
//         '</div>'
//     );
// });

$('#store').click(function(e){
    e.preventDefault();

    var first_name = $('#first_name').val().trim();
    var last_name = $('#last_name').val().trim();
    var middle_name = $('#middle_name').val().trim();
    var birthday = $('#birthday').val();
    var gender = $('#gender').val();
    var marital_status = $('#marital_status').val();
    var position = $('#position').val();
    var date_hired = $('#date_hired').val();
    var primary_contact = $('.contact_info').val();
    var primary_address = $('.address_info').val();;
    var contact_info = '';
    var address_info = '';

    
    if(first_name == ''){
        swal('First name is required','','error');
    }  
    if(last_name == ''){
        swal('Last name is required','','error');
    }
    $.ajax({
        url: 'store',
        type: 'POST',
        data: {
            '_token' : $('input[name=_token]').val(),
            'first_name' : first_name,
            'last_name' : last_name,
            'middle_name' : middle_name,
            'birthday' : birthday,
            'gender' : gender,
            'marital_status' : marital_status,
            'position' : position,
            'date_hired' : date_hired,
            'primary_contact' : primary_contact,
            'primary_address' : primary_address
        },
        success:function(){
            swal({
                title: 'Employee Added',
                icon: 'success'
            }).then(function(){
                window.location.href="/dashboard";
            });
        }
    });
});

$('#update').click(function(e){
    e.preventDefault();
    var id = $(this).data('id');
    var first_name = $('#first_name').val().trim();
    var last_name = $('#last_name').val().trim();
    var middle_name = $('#middle_name').val().trim();
    var birthday = $('#birthday').val();
    var gender = $('#gender').val();
    var marital_status = $('#marital_status').val();
    var position = $('#position').val();
    var date_hired = $('#date_hired').val();
    var primary_address = $('.address_info').val();
    var primary_contact = $('.contact_info').val();
    //get primary contact
    // $('input:checkbox[name=contact]').each(function() 
    // {    
    //     if($(this).is(':checked'))
    //     primary_contact = $(this).closest('.row').find('.contact_info').val();
    // });

    // //get all contact info
    // $('input:text[name=contact_info]').each(function() 
    // { 
    //     contact_info.push($(this).closest('.row').find('.address_info').val());
    // });

    // //get primary address
    // $('input:checkbox[name=address]').each(function() 
    // {    
    //     if($(this).is(':checked'))
    //     primary_address = $(this).closest('.row').find('.address_info').val();
    // });

    // //get all address info
    // $('input:text[name=address_info]').each(function() 
    // {    
    //     address_info+=(($(this).closest('.row').find('.address_info').val())+',');
    // });

    // if(first_name == ''){
    //     swal('First name is required','','error');
    // }
    // if(last_name == ''){
    //     swal('Last name is required','','error');
    // }

    $.ajax({
        url: '/update',
        type: 'POST',
        data: {
            '_token' : $('input[name=_token]').val(),
            'id' : id,
            'first_name' : first_name,
            'last_name' : last_name,
            'middle_name' : middle_name,
            'birthday' : birthday,
            'gender' : gender,
            'marital_status' : marital_status,
            'position' : position,
            'date_hired' : date_hired,
            'primary_contact' : primary_contact,
            'primary_address' : primary_address
        },
        success:function(){
            swal({
                title: 'Updated',
                icon: 'success'
            }).then(function(){
                window.location.href="/dashboard";
            });
        }
    });
});

$('.btnDelete').click(function(){
    var id = $(this).data('id');
    var row = $(this).closest('.trow');
    swal({
        title: 'Delete post?',
        icon: 'warning',
        buttons: true,
        buttons: ['No','Yes'],
        dangerMode:true
    }).then((willDelete)=>{
        if(willDelete){
            $.ajax({
                url : '/delete',
                type: 'POST',
                data:{
                    '_token' : $('input[name=_token]').val(),
                    'id' : id
                },
                success:function(){
                    row.fadeOut();
                }
            });
        }
        
    });
});

$('.contact_list').on('change', function() {
    $('.contact_list').not(this).prop('checked', false);  
});
var table = $('#employeesTable').DataTable({
    "bProcessing": true,
    "order": [0, 'asc'],
    "columns": [{"orderable": false },{"orderable": false },{"orderable": false },{"orderable": false },{"orderable": false },{"orderable": false }],
});

// $(document).ready( function () {
//     $('#employeesTable').DataTable();
// } );