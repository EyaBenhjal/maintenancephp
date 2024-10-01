$(document).ready(function () {
    $('.delete_fich_btn').click(function (e) {
        e.preventDefault();

        var id = $(this).val();

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    method: "POST",
                    url: "code.php",
                    data: {
                        'fich_id': id,
                        'delete_fich_btn': true
                    },
                    success: function (response) {
                        if (response.trim() == "200") { // Utilisez trim pour supprimer les espaces blancs
                            swal("Success!", "Fiche deleted Successfully!", "success");
                            $('#fich_table').load(location.href + " #fich_table");
                        } else if (response.trim() == "500") { // Utilisez trim pour supprimer les espaces blancs
                            swal("Error!", "Something went wrong!", "error");
                        }
                    }
                });
            } 
        });
    });
});