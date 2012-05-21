Ext.define('Mather.store.ProjectDetails',{
	extend:'Ext.data.Store',
	xtype:'projectDetailsStore',
	config:{		
	autoLoad: true,
		model:'Mather.model.ProjectDetails',
		proxy:{			
			url:'projectdetails.php',
			type:'ajax',
			reader:{
				rootProperty:'data',
				type:'json'				
				}
			}		
		}
	});