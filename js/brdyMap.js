window.onload = function(){
	var holeNum = document.getElementById('CourseHoleNum').value;
	$.ajax({
		type: "POST",
		url: "../getHoleInfo.php",
		data: { 'dataString': holeNum },                           
		success: function(holeNum){                    
			$("#holeAttributes").html(holeNum);
		}
	});
}

document.getElementById("CourseHoleNum").addEventListener("change",function() {
	var holeNum= $('option:selected', this).val();
    $.ajax({    
        type: "POST",
        url: "../getHoleInfo.php",
        data: { 'dataString': holeNum },                           
        success: function(holeNum){                    
            $("#holeAttributes").html(holeNum);
        }
	
    });
});