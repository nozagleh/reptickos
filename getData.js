$('document').ready(function(){
	var d = new Date();
	var day = d.getDate();
	var month = d.getMonth()+1;
	var year = d.getFullYear();
	var today = ((day< 10 ? '0' : '') + day + '.' + (month<10 ? '0' : '') + month + '.' + d.getFullYear());

	getReciepts((year + '-' + (month<10 ? '0' : '') + month + '-' + (day< 10 ? '0' : '') + day));

	$(" #datepicker" ).datepicker();
	$("#datepicker").datepicker("option","dateFormat", "dd.mm.yy");
	$("#datepicker").val(today);

	$("#btnInsert").click(function(event) {
		var storeName = $("#storeName").val();
		var amount = $("#amount").val();
		var type = $("#type").val();
		var currencyType = $("#curr").val();
		
		/*day = $(this).datepicker( "getDate" ).getDate();
		month = $(this).datepicker( "getDate" ).getMonth() + 1;
		var year = $(this).datepicker( "getDate" ).getFullYear();*/
		today = ( year + '-' + (month<10 ? '0' : '') + month + '-' + (day< 10 ? '0' : '') + day);

		$.ajax({
			url: 'insertReciept.php',
			type: 'POST',
			data: {storeName: storeName, amount: amount, date: today, type: type, currency: curr},
		});
	});


	$("#datepicker").change(function(){
		day = $(this).datepicker( "getDate" ).getDate();
		month = $(this).datepicker( "getDate" ).getMonth() + 1;
		year = $(this).datepicker( "getDate" ).getFullYear();
		today = ( year + '-' + (month<10 ? '0' : '') + month + '-' + (day< 10 ? '0' : '') + day);

		getReciepts(today);
	});

	var currcurr = '';
	$("#curr").keyup(function(event) {
		currcurr = $("#curr").val();
		$.ajax({
			url: 'getCurrency.php',
			type: 'GET',
			dataType: 'json',
			data: {currency: currcurr},
		})
		.done(function(e) {
			$.each(e, function(index, el) {
				//availCurr.push(el[0]);
			});
			$("#curr").autocomplete({
				source:e
			});
			console.log(e);
		});
		
	});

	var storeHint = '';
	$("#storeName").keyup(function(event) {
		storeHint = $("#storeName").val();
		$.ajax({
			url: 'callGetStoreName.php',
			type: 'GET',
			dataType: 'json',
			data: {storeHint: storeHint},
		})
		.done(function(returnData) {
			$("#storeName").autocomplete({
				source:returnData
			});
			console.log(returnData);
		});
		
	});

	var typeName = '';
	$("#type").keyup(function(event) {
		typeName = $("#type").val();
		$.ajax({
			url: 'callGetTypeList.php',
			type: 'GET',
			dataType: 'json',
			data: {typeName: typeName},
		})
		.done(function(returnData) {
			$("#type").autocomplete({
				source:returnData
			});
			console.log(returnData);
		})
		.fail(function(e) {
			console.log(e);
		})
		.always(function() {
			console.log("complete");
		});
		
	});

});

function getReciepts(today){
	var sum = 0;
	var pickedDate = today;
	var results = new Array();

	$.ajax({
	url: 'getDate.php',
	type: 'GET',
	dataType: 'json',
	data: {date: pickedDate},
	})
	.done(function(returnData) {
	    $('.recipe_box table tbody').html('');
	    $('#gen_amount').text('');
	    results = returnData;
	    console.log(results);

	    $.each(results, function(index, el) {
	    	sum += parseFloat(el[0]);
	    	$('.recipe_box table tbody').append('<tr><td><h1 class="h1_darkred"><a href="reciept.php?rid=' + el[3] + '&storeName=' + el[1] + '&rdate=' + el[4] + '">' + el[1] + '</a></h1></td></tr><tr id="' + el[3] + '"><td><h5 class="itemname">' + el[0] + ' SEK</h5></td><td><h3 class="itemname">' + el[2] + '</h3></td></tr>');
	    	//$('.recipe_box table tbody').append('<tr><td><h2 class="itemname">' + el[1] + '</h2></td><td></td><td><h3 class="itemname">' + el[2] + '</h3></td></tr><tr id="' + el[3] + '"><td><h5 class="itemname">' + el[0] + ' SEK</h5></td></tr>');
	    	var sumStart = 0;
	    	$('#gen_amount').text(sum + ' SEK');
	    });

	});
}








