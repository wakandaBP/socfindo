function showTable()
{ 
	$('#example3 thead tr').clone(true).appendTo( '#example3 thead' );
		$('#example3 thead tr:eq(1) th').each( function (i) {
			var title = $(this).text();
			$(this).html( '<input type="text" class="form-control2" placeholder="'+title+'" />' );
	 
			$( 'input', this ).on( 'keyup change', function () {
				if ( table.column(i).search() !== this.value ) {
					table
						.column(i)
						.search( this.value )
						.draw();
				}
			} );
		} );
	 
		var table = $('#example3').DataTable( {
			orderCellsTop: true,
			fixedHeader: true,
			lengthChange: false,
			pageLength:50,
			buttons: [
				{
					extend: 'copyHtml5',
					exportOptions: {
						columns: ':visible'
					}
				},
				{
					extend: 'excelHtml5',
					exportOptions: {
						columns: ':visible'
					}
				},
				{
					extend: 'pdfHtml5',
					exportOptions: {
						columns: ':visible'
					}
				},
				'colvis'
			]
		} );
		
		table.buttons().container()
			.appendTo( '#example3_wrapper .col-sm-6:eq(0)' );
		
}


$(function () {
    /*$('.js-basic-example').DataTable({
        "scrollX": true,
		"scrollY": "200px"
    });
	*/

    //Exportable table
    $('.js-exportable').DataTable({
        dom: 'Bfrtip',
        responsive: true,
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
	
	var table2 = $('#example2').DataTable( {
        lengthChange: false,
		pageLength:50,
       buttons: [
			{
				extend: 'copyHtml5',
				exportOptions: {
					columns: ':visible'
				}
			},
			{
				extend: 'excelHtml5',
				exportOptions: {
					columns: ':visible'
				}
			},
			{
				extend: 'pdfHtml5',
				exportOptions: {
					columns: ':visible'
				}
			},
			'colvis'
		]
    } );
 
    table2.buttons().container()
        .appendTo( '#example2_wrapper .col-sm-6:eq(0)' );
		
	var table = $('#example').DataTable( {
        lengthChange: false,
		"scrollX": true,
		"scrollY": "200px",
		buttons: [
			{
				extend: 'copyHtml5',
				exportOptions: {
					columns: ':visible'
				}
			},
			{
				extend: 'excelHtml5',
				exportOptions: {
					columns: ':visible'
				}
			},
			{
				extend: 'pdfHtml5',
				exportOptions: {
					columns: ':visible'
				}
			},
			'colvis'
		]
    } );
 
    table.buttons().container()
        .appendTo( '#example_wrapper .col-sm-6:eq(0)' );
	

	//DATABLE BREEDING
	$('#example3 thead tr').clone(true).appendTo( '#example3 thead' );
    $('#example3 thead tr:eq(1) th').each( function (i) {
        var title = $(this).text();
        $(this).html( '<input type="text" class="form-control2" placeholder="'+title+'" />' );
 
        $( 'input', this ).on( 'keyup change', function () {
            if ( table.column(i).search() !== this.value ) {
                table
                    .column(i)
                    .search( this.value )
                    .draw();
            }
        } );
    } );
 
    var table = $('#example3').DataTable( {
        orderCellsTop: true,
        fixedHeader: true,
		lengthChange: false,
		pageLength:50,
        buttons: [
			{
				extend: 'copyHtml5',
				exportOptions: {
					columns: ':visible'
				}
			},
			{
				extend: 'excelHtml5',
				exportOptions: {
					columns: ':visible'
				}
			},
			{
				extend: 'pdfHtml5',
				exportOptions: {
					columns: ':visible'
				}
			},
			'colvis'
		]
    } );
	
	table.buttons().container()
        .appendTo( '#example3_wrapper .col-sm-6:eq(0)' );
	
});