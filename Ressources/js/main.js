$(document).ready(function () {

    $('.deleteConducteur').on('click', function () {
        if (confirm("Êtes-vous sûr de vouloir supprimer cet conducteur ?")) {
            var bookId = $(this).attr('href');
            console.log(bookId);
            bookId = bookId.split("#delete")[1];
            $.get({
                url:"./index.php?action=delete&conducteurId="+bookId
            });
            window.location = "./index.php";
        }
    });

    $('.deleteVehicule').on('click', function () {
        if (confirm("Êtes-vous sûr de vouloir supprimer cet vehicule ?")) {
            var bookId = $(this).attr('href');
            console.log(bookId);
            bookId = bookId.split("#deleteV")[1];
            $.get({
                url:"./index.php?action=deleteV&vehiculeId="+bookId
            });
            window.location = "./index.php";
        }
    });

    $('.deleteAssociation').on('click', function () {
        if (confirm("Êtes-vous sûr de vouloir supprimer cet association ?")) {
            var bookId = $(this).attr('href');
            console.log(bookId);
            bookId = bookId.split("#deleteA")[1];
            $.get({
                url:"./index.php?action=deleteA&associationId="+bookId
            });
            window.location = "./index.php";
        }
    });

});