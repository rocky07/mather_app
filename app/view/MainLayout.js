Ext.define('Mather.view.MainLayout',{
//extend:'Ext.TabPanel',
extend: 'Ext.navigation.View',
requires:['Mather.view.Main'],
xtype:'mainlayout',
config:{
	//html:'welcome to mather app',
	fullscreen:true,
	//tabBarPosition:'bottom',
	items:[{
		xtype:'mainpanel'		
		}/*,
		{
		xtype:'enquirycard'		
		}*/
		]	
	}	
	});