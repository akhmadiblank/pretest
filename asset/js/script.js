const flashData = $('.flash-data').data('flashdata');
console.log(flashData);

if (flashData) {
    Swal.fire({
        title: 'Management Menu',
        text: flashData,
        type: 'success'
    });
}
$('.tombol-hapus').on('click', function (e) {
    e.preventDefault();
    const href = $(this).attr('href');
    Swal.fire({
        title: 'apakah kamu yakin?',
        text: "data akan di hapus",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            document.location.href = href;

        }
    })
});
