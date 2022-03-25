$(document).ready(function () {
    console.log("ready!");
    $('#save').on('click', function () {

        var formData = {
            name: $("#names").val(),
            last_name: $("#last_names").val(),
        };

        $.ajax({
            type: 'post',
            url: 'controllers/userCtrl.php',
            dataType: 'json',
            data: {method: 'newUser', data: formData},
            success: function (data) {
                console.log(data)
                if (data.state === 1) {
                    $('#formSave').trigger("reset");
                    alert(data.msg);
                } else if(data.state === 0) {
                    alert(data.msg);
                }
            },
            error: function (jqXhr, textStatus, errorMessage) {
                console.log(errorMessage);
            }

        });

    });
})
