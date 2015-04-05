Event.observe(window, 'load', function() {

	Event.observe( 'btnSubmit', 'click', purchaseCD);
	
	connectToServer();
});

function connectToServer()
{
	new Ajax.Updater(  
		{ success: 'CD Count', failure: 'errors' },
		'LongPolling.php', 
		{
			method:     'get',
			onSuccess:  function(transport)
			{
				if (parseInt(transport.responseText)) connectToServer();
			}
	});
}

function purchaseCD()
{
    new Ajax.Updater(
    	{ success: 'CD Count', failure: 'errors' },
		'LongPolling.php', 
		{
			method:     'get',
			parameters: { num: $('txtQty').getValue() }
	});
} 
