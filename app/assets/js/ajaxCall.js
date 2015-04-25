	window.onload = function() {
		ajaxCall();
	};

	function ajaxCall() {
		setInterval(function() {
			$.ajax({
			type: "POST",
			url: "/postimees2",
			success: function(response) { $("#postimees2").html(response); },
			error: function(xhr, ajaxOptions, thrownError) { alert(xhr.responseText); }
			});
		}, 1000 * 60 * 3);
	}
