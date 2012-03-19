

function checkFloor(key){
	
	if(isNaN(key)){
			 alert('Enter Number');
			 exit;
			 }
		new Ajax.Request('ajax_projects.php',
	{
					method:'get',	
					parameters: {no:key},	
					onSuccess: function(transport){		 
	
							var response	=	transport.responseText;				
							document.getElementById('NoStages') .innerHTML	=	response;
	
				},
	
				onFailure: function(){ alert('Browser Not Compatible..') }
	
	 });
		return false;

}


