//<![CDATA[
	$(document).ready(function () {
		// IMPORTANT: Fill in your client key
		var clientKey = "js-FzTUYYQ0UsBmqQkNfHnIZMDaH304WwPC6Jw5Hm6CPHYgyj4N0rvZe99Wda1aHQMN";
		var cache = {};
		function handleResp(data)
		{
			if ("city" in data)
			{
				$("#city").val(data.city);
				$("#state").val(data.state);
			}
		}
		// Set up event handlers
		$("#zip").on("keyup change", function() {
			// Get zip code
			var zipcode = $(this).val().substring(0, 5);
			if (zipcode.length == 5 && /^[0-9]+$/.test(zipcode))
			{
				// Check cache
				if (zipcode in cache)
				{
					handleResp(cache[zipcode]);
				}
				else
				{
					// Build url
					var url = "https://www.zipcodeapi.com/rest/"+clientKey+"/info.json/" + zipcode + "/radians";
					
					// Make AJAX request
					$.ajax({
						"url": url,
						"dataType": "json"
					}).done(function(data) {
						handleResp(data);
						
						// Store in cache
						cache[zipcode] = data;
					}).fail(function(data) {
						if (data.responseText && (json = $.parseJSON(data.responseText)))
						{
							// Store in cache
							cache[zipcode] = json;
						}
					});
				}
			}
		});
	});
//]]>