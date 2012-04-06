Ext.define('Mather.view.ProjectDetails',{
extend:'Ext.TabPanel',
xtype:'projectdetailscard',
requires:['Mather.store.ProjectDetails'],
config:{
		html:'Mather details panel',
		fullscreen:true,

//		tpl:
		items:[
			   {
			   title:'Details',
			   //itemTpl:'ammeninitr--- {name}'
			   html:'asa'
			   },{
			   title:'aminites',
			   html:'ammeninitr'
			   },
			   {
			   title:'specification',
			   html:'specification'
			   },
			   {
			   title:'Gallery',
			   html:'specification'
			   },
			   {
			   title:'Floor Type',
			   html:'specification'
			   },
			   {
			   title:'Location Map',
			   html:'specification'
			   }
			   ]
		}
	});