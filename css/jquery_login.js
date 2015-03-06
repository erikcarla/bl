	$(document).ready(function(){
		$("#login").hide();
		$("#logo").click(function(){
			$("#login").show("slow");
			$("h1").hide();
			$("#logo").hide();
		});
		$('#logo').cycle({
			fx:     'turnLeft',
			speed:   'fast',
			timeout: 2000,
		});
	});		   