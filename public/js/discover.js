$(".discover-item")
	.on("mouseover", function() {
		$(this).css({"border-color":"red", "box-shadow":"0 0 5px"});
	})
	.on("mouseleave", function() {
		$(this).css({"border-color":"", "box-shadow":""});
	});