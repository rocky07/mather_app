Ext.define('Mather.view.Main',{
extend:'Ext.TabPanel',
requires:['Mather.view.AllProjects','Mather.view.Enquiry'],
config:{
	html:'welcome to mather app',
	fullscreen:true,
	tabBarPosition:'bottom',
	items:[{
		xtype:'allprojects'		
		},
		{
		xtype:'enquirycard'		
		}
		]	
	}	
	});