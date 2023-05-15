$("document").ready(function() {
	$(".supplierAuto").on('click', function() {
		$("#supplierName").val($(this).html());
	});
	$("#searchButton").on("click", function() {
		var val = $("#searchField").val();
		if(val == null || val === "")
			return;
		var records = $("tr");
		console.log(records);
		for(var i = 1; i < records.length; i++) {
			
		}
	});
});