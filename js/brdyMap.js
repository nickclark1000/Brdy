//on page load, get the hole attributes and list them in the table
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

//when user selects a different hole from the drop down, update the attribute table
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