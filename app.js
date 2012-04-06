Ext.application({
		name:'Mather',
		//requires:['Mather.view.Main'],
		controllers: ['Main'],
	   views:  ['MainLayout'],
	   models:['AllProjects'],
	   stores:['AllProjects'],
   	
				
		launch:function(){
			//alert("loaded")
			Ext.create('Mather.view.MainLayout');			
			}		
	});