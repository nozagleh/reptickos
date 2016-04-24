$('document').ready(function(){

	var dpVal = $("#datepicker").val().split("-");

	var day = dpVal[2];
	var month = dpVal[1];
	var year = dpVal[0];
	var today = ((day< 10 ? '0' : '') + day + '.' + (month<10 ? '0' : '') + month + '.' + year);
	
	$(" #datepicker" ).datepicker();
	$("#datepicker").datepicker("option","dateFormat", "dd.mm.yy");
	$("#datepicker").datepicker("setDate",new Date(today));

	$("#datepicker").change(function(){
		day = $(this).datepicker( "getDate" ).getDate();
		month = $(this).datepicker( "getDate" ).getMonth() + 1;
		year = $(this).datepicker( "getDate" ).getFullYear();
		today = ( year + '-' + (month<10 ? '0' : '') + month + '-' + (day< 10 ? '0' : '') + day);
	});

});






