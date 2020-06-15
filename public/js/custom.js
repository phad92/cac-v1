$(document).ready(function () {
    $('#edit-btn').on('click', function () {
        $id = $(this).data('id');
        ajax.get()
        console.log($id);

    });
})