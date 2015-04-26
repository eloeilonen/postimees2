	window.onload = function() {
		ajaxCall();
	};

	function ajaxCall() {
		setInterval(function() {
			$.getJSON( "news/json", function( data ) {
				var uued_uudised = [];
				$.each( data, function( key, val ) {
					if(document.getElementById(val.uudise_ID) === null){
						uued_uudised.push(
						'<div id="' + val.uudise_ID + '" class="blog-post">'
						+'<h2 class="blog-post-title"><a href="news/' + val.uudise_ID + '">' + val.uudise_PEALKIRI + '</a></h2>'
						+'<div class="row">'
							+'<div class="col-sm-4">'
								+'<a href="news/' + val.uudise_ID + '"><img src="' + val.uudise_PILT + '" alt="Uudise pilt" class="img-thumbnail" style="min-height:200px;height:200px;"></a>'
							+'</div>'
							+'<p class="text-justify">' + val.uudise_EELVAADE + '</p>'
							+'</div>'
						+'<br><p class="blog-post-meta"><p class="text-right">' + val.uudise_KUUPAEV + '</p></p>'
						+'<hr>'
						+'</div>');
					}
				});
				$.each(uued_uudised, function( index, value ) {
					$( value ).prependTo("#uudised");
				});
			});
		}, 1000 * 60 * 1);
	}
