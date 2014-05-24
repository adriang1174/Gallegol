$(document).ready(function () {

	
	$("#addSticker").click(function() {
		   
		   var postData = $('#ajaxform').serializeArray();
		   $.ajax({
				 type: "POST",
				 url: 'http://192.232.253.116/~uv9032/gallegol/addSticker.php',
				 data : postData,
				 dataType: "json",
				 success: function(data) {
					   // data is ur summary
					 //console.log(data);
					 //console.log(JSON.stringify(data.bench));
					 $("#txtRes").html("");
   					$.each(data.bench, function(idx, item){
     						$("#txtRes").html($("#txtRes").html()+"Userid: "+item.userid+" Team: " +item.national_team+" Rank:"+item.rank+" Forecast:"+item.forecast+"<BR>");
				   });
			         //$('#txtRes').html($.parseJSON(data));
					 //$('#ajaxform').clear();
 				 }
			   });
	});	
//
//
	$("#delSticker").click(function() {
		   
		   var postData = $('#ajaxform2').serializeArray();
		   $.ajax({
				 type: "POST",
				 url: 'http://192.232.253.116/~uv9032/gallegol/delStickerFromBench.php',
				 data : postData,
				 dataType: "json",
				 success: function(data) {
					   // data is ur summary
					 //console.log(data);
					 //console.log(JSON.stringify(data.bench));
					 $("#txtRes2").html("");
   					$.each(data.bench, function(idx, item){
     						$("#txtRes2").html($("#txtRes2").html()+"Userid: "+item.userid+" Team: " +item.national_team+" Rank:"+item.rank+" Forecast:"+item.forecast+"<BR>");
				   });
			         //$('#txtRes').html($.parseJSON(data));
					 //$('#ajaxform').clear();
 				 }
			   });
	});	
	
	$("#setForecast").click(function() {
		   
		   var postData = $('#ajaxform3').serializeArray();
		   $.ajax({
				 type: "POST",
				 url: 'http://192.232.253.116/~uv9032/gallegol/setForecast.php',
				 data : postData,
				 dataType: "json",
				 success: function(data) {
					 $("#txtRes3").html("");
   					$.each(data.bench, function(idx, item){
     						$("#txtRes3").html($("#txtRes3").html()+"Userid: "+item.userid+" Team: " +item.national_team+" Rank:"+item.rank+" Forecast:"+item.forecast+"<BR>");
				   });
 				 }
			   });
	});		

	$("#getForecast").click(function() {
		   
		   var postData = $('#ajaxform4').serializeArray();
		   $.ajax({
				 type: "POST",
				 url: 'http://192.232.253.116/~uv9032/gallegol/getForecast.php',
				 data : postData,
				 dataType: "json",
				 success: function(data) {
					 $("#txtRes4").html("");
   					$.each(data.bench, function(idx, item){
     						$("#txtRes4").html($("#txtRes4").html()+"Userid: "+item.userid+" Team: " +item.national_team+" Rank:"+item.rank+" Forecast:"+item.forecast+"<BR>");
				   });
 				 }
			   });
	});		

});
