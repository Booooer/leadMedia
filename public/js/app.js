let isConfirm = false
let isPassword = false

$("#validationCustom03").keyup(function(){
    if (this.value === $("#validationCustom02").val()) {
        isConfirm = true
        $(this).removeClass('is-invalid')
    }
    else{
        $(this).addClass('is-invalid')
        isConfirm = false
    }
    checkPassword()
})

$("#validationCustom02").keyup(function(){
    if (this.value.length >= 8) {
        isPassword = true
        $(this).removeClass('is-invalid')
    }
    else{
        $(this).addClass('is-invalid')
        isPassword = false
    }

    if (this.value != $("#validationCustom03").val()) {
        $("#validationCustom03").addClass('is-invalid')
        isConfirm = false
    }
    checkPassword()
})

function checkPassword(){
    if (isConfirm && isPassword && $("#validationCustom02").val() === $("#validationCustom03").val()) {
        console.log('cc11')
        $("#reg-btn").prop('disabled',false)
    }
    else{
        $("#reg-btn").prop('disabled',true)
    }
}

$("#auth-pass").keyup(function () {
    if (this.value.length >= 8) {
        $(this).removeClass('is-invalid')
        $("#auth-btn").prop('disabled',false)
        return
    }
    $(this).addClass('is-invalid')
    $("#auth-btn").prop('disabled',true)
})


// delete

$(".btn-delete").click(function(){
    $.ajax({
        headers: {
            'X-Csrf-Token': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'DELETE',
        cache: false,
        url: `/posts/${this.value}`,
        dataType: 'json',
        success: () =>{
            location.reload()
        },
        error: (data) =>{
            if (data.status === 200) {
                location.reload();
            }
            console.log(data.status)
        }
    })
})
