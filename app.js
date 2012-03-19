Ext.application({
		name:'Mather',
		//requires:['Mather.view.Main'],
		controllers: ['Main'],
	   views:  ['Main'],
   	
				
		launch:function(){
			//alert("loaded")
			Ext.create('Mather.view.Main');			
			}		
	});