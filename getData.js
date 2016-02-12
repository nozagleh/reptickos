$('document').ready(function(){
	var d = new Date();
	var day = d.getDate();
	var month = d.getMonth()+1;
	var today = ((day< 10 ? '0' : '') + day + '.' + (month<10 ? '0' : '') + month + '.' + d.getFullYear());

	$(" #datepicker" ).datepicker();
	$("#datepicker").datepicker("option","dateFormat", "dd.mm.yy");
	$("#datepicker").val(today);


	$("#datepicker").change(function(){
		day = $(this).datepicker( "getDate" ).getDate();
		month = $(this).datepicker( "getDate" ).getMonth() + 1;
		var year = $(this).datepicker( "getDate" ).getFullYear();
		today = ( year + '-' + (month<10 ? '0' : '') + month + '-' + (day< 10 ? '0' : '') + day);
		    	//console.log(today);
		var sum = 0;
		var pickedDate = today;
		var results = new Array();
		$.ajax({
			url: 'callGetDate.php',
			type: 'GET',
			dataType: 'json',
			data: {date: pickedDate},
			})
			.done(function(returnData) {
			    $('.recipe_box table tbody').html('');
			    $('#gen_amount').text('');
			    results = returnData;
			    $.each(results, function(index, el) {
			    	sum += parseFloat(el[0]);
			    	console.log(sum);
			    	$('.recipe_box table tbody').append('<tr><td><h1 class="h1_darkred">' + el[1] + '</h1></td></tr><tr id="' + el[3] + '"><td><h5 class="itemname">' + el[0] + ' SEK</h5></td><td><h3 class="itemname">' + el[2] + '</h3></td><td><img src="edit_pen.png" class="reciept_buttons"/></td><td><img src="edit_trash.png" class="reciept_buttons"/></td></tr>');
			    	//$('.recipe_box table tbody').append('<tr><td><h2 class="itemname">' + el[1] + '</h2></td><td></td><td><h3 class="itemname">' + el[2] + '</h3></td></tr><tr id="' + el[3] + '"><td><h5 class="itemname">' + el[0] + ' SEK</h5></td></tr>');
			    	var sumStart = 0;
			    	$('#gen_amount').text(sum + ' SEK');
			    });
			})
			.fail(function(e) {
			   	console.log("error");
			})
			.always(function() {
			   console.log("complete");
			});
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
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
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
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
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
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
	});

});








