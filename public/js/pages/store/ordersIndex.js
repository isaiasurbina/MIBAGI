jQuery(function($){
    var element = $(document).find('.datatable');
    
    element.DataTable({
        "pageLength" : 25,
        "bLengthChange" : false,
        "bInfo":false,
        "order": [[ 0, "desc" ]],
        /* "searching":false, */
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
        }
    });

    $('#bystatus').on( 'change', function (e) {
        var table = $('.datatable').DataTable();
        
            table
            .search( $(this).val() )
            .draw();
    } );
});