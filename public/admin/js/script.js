// DataTable
$(document).ready(function () {
    $('#dataTable').DataTable();
});

// Tinymce
tinymce.init({
    selector: '#mytextarea'
});

// Sweet Alart
let deleteBtn = document.getElementById('delete');
let deleteForm = document.getElementById('deleteForm');
deleteBtn.addEventListener('click', function (event) {
    event.preventDefault();
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
            Swal.fire({
                title: "Deleted!",
                text: "Your file has been deleted.",
                icon: "success"
            });
            deleteForm.submit();
        }
    });
});