Ext.define('Mather.view.AllProjects',{
extend:'Ext.List',
xtype:'allprojects',
requires:['Mather.store.AllProjects'],
config:{
	iconCls:'home',
	title:'Projects',	  
   store: 'AllProjects',
   //grouped: true,
   itemTpl: '{name}:{loc}',
   onItemDisclosure: true
	}
	});