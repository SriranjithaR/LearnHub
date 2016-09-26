var arr;
$(document).ready(function(){
  	function fetch_word(){
		var title = $("#search-bar").val();
		$.ajax({
				type: "POST",
				url: "php/search.php",
				async : "true",
				data: { 'title' : title },
				dataType : 'json',
				success: function(result) {
						$(".container").empty();
						$(".container").append("<p id='res'>Search Results...</p><br><br><br><br>");
						 $.each(result, function(index, element) {
							
							$(".container").append("<div class='course'><p id='course_title'>"+element.title+"&nbsp;&nbsp;&nbsp;&nbsp;<span id='rating'>"+element.rating+"</span><span id='type'>"+element.type+"</span></p><p id='desc'>"+element.description+"</p><img src="+element.image+" width='55px' height='55px'/>&nbsp;&nbsp;<span id='price'>"+element.price+"</span></div><br>");
						});
						$("#res").fadeIn(500);
						$(".course").fadeIn(500);
				  }
		});
	}
	$(".check").click(function(){
    
		fetch_word1();
	});
 
	function fetch_word1(){
		var ios = $("#io").is(':checked') ? 1 : 0;
		var and = $("#an").is(':checked') ? 1 : 0;
		var wd = $("#wd").is(':checked') ? 1 : 0;
		var se = $("#se").is(':checked') ? 1 : 0;
   
		$.ajax({
				type: "POST",
				url: "php/category.php",
				async : "true",
				data: { 'ios' : ios,'android' : and, 'wd' : wd ,'se':se },
				dataType : 'json',
				success: function(result) {
                    alert(result);
						$(".container").empty();
						$(".container").append("<p id='res'>Search Results...</p><br><br><br><br>");
						 $.each(result, function(index, element) {
							
							$(".container").append("<div class='course'><p id='course_title'>"+element.title+"&nbsp;&nbsp;&nbsp;&nbsp;<span id='rating'>"+element.rating+"</span><span id='type'>"+element.type+"</span></p><p id='desc'>"+element.description+"</p><img src="+element.image+" width='55px' height='55px'/>&nbsp;&nbsp;<span id='price'>"+element.price+"</span></div><br>");
						});
						$("#res").fadeIn(500);
						$(".course").fadeIn(500);
				  }
		});
	}
	$("#search-bar").keyup(function(){
		
		if($("#search-bar").val() == ""){
			$("#res").fadeOut(500);
			$(".course").fadeOut(500);
			
		}
		else{
			fetch_word();
		}
	});
});