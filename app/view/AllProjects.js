Ext.define('Mather.view.AllProjects',{
extend:'Ext.List',
xtype:'allprojects',
config:{
	iconCls:'home',
	title:'Projects',
	items: [{
            docked: 'top',
            xtype: 'toolbar',
            title: 'All Projects',            
            items:[{
					text:'All Projects'            	
            	},
            	{
					text:'Villas'            	
            	},
            	{
					text:'Appartments'            	
            	}
            	]
        }]
	}
	});