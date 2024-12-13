$(document).ready(function () {
    $('input[type="file"]').change(function (event) { // cek perubahan
        var reader = new FileReader(); // buat object untuk membaca file gambar
        reader.onload = function () {
            $('#preview, #foto-profil').attr('src', reader.result).show(); // tampilkan preview foto
            $('#icon, #file-title').hide(); // hilangkan icond an text pada inputan
        };
        reader.readAsDataURL(event.target.files[0]);
    });

    $(document).on('click', '.ajax-delete', function () {
        let data = $(this)
        let url = data.data('url')
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                })
                $.ajax({
                    url: url,
                    method: 'DELETE',
                    success: function(response){
                        Swal.fire({
                            title: "Deleted!",
                            text: response.message,
                            icon: "success",
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            showCancelButton: false,
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        });
                    },
                    error: function(e){
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "Something went wrong!",
                        });
                    }
                })
            }
        });
    });

    // cek submit form
    $('.ajax-form').submit(function (event) {
        event.preventDefault(); // cegah reload
        let form = $(this) // deklarasi form
        let submitButton = form.find('button[type="submit"]'); // temukan button submit
        submitButton.prop('disabled', true); // buat dia disable
        $('.spinner-border').removeClass('d-none') // tampilkan animasi loading
        let url = form.data('url') // ambil data url
        let formData = new FormData(form[0]); // ambil data inputan yang ada didalam form
        form.find('.is-invalid').removeClass('is-invalid'); // Menghapus semua kelas is-invalid dari inputdalam form
        form.find('.invalid-feedback').remove(); // Menghapus semua elemen invalid-feedback dalam form
        $.ajax({
            url: url,
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                console.log(response);
                submitButton.prop('disabled', false); // buat dia aktif kembali
                $('.spinner-border').addClass('d-none') // hilangkan kembali animasi loading
                Swal.fire({
                    title: "Good job!",
                    text: response.message,
                    icon: "success",
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    showCancelButton: false,
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.reload();
                    }
                });
                
            },
            error: function (e) {
                console.log(e);
                if (e.status === 422) {
                    let errors = e.responseJSON.errors // tampung error dalam variable errors
                    for (const key in errors) { // looping errors
                        if (errors.hasOwnProperty.call(errors, key)) {
                            let input = form.find(`[name="${key}"]`); // temukan inputan sesuai name dari key
                            input.addClass('is-invalid'); // tambahkan class is-invalid dalam inputan
                            errors[key].forEach(function (message) { // ambil pesan error
                                $('#' + key).after(`<div class="invalid-feedback">${message}</div>`) // tampilkan pesan error
                            });
                        }
                    }
                    submitButton.prop('disabled', false); // buat dia aktif kembali
                    $('.spinner-border').addClass('d-none') // hilangkan kembali animasi loading
                } else {
                    console.log(e);
                    submitButton.prop('disabled', false); // buat dia aktif kembali
                    $('.spinner-border').addClass('d-none') // hilangkan kembali animasi loading
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Something went wrong!",
                    });
                }
            }
        })
    });

});
