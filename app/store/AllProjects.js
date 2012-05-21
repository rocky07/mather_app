Ext.define('Mather.store.AllProjects',{
	extend:'Ext.data.Store',
	config:{		
	autoLoad: true,
		model:'Mather.model.AllProjects',
		proxy:{			
			url:'allProjects.php',
			type:'ajax',
			reader:{
				//rootProperty:'data',
				type:'json'				
				}
			}				
		}
	});