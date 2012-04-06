Ext.define('Mather.view.AllProjects',{
extend:'Ext.List',
xtype:'allprojects',
requires:['Mather.store.AllProjects','Mather.view.ProjectDetails'],
config:{
	iconCls:'home',
	title:'Projects',	  
   store: 'AllProjects',
   //grouped: true,
   itemTpl: '<img src="{imgIcon}" style="float:left" width="50" height="50"> <div> Name: {name} <br/>Location: {loc}</div>',
   onItemDisclosure: true
	}
	});
	/*
	Ext.define('Sencha.view.PresidentList', {
    extend: 'Ext.List',
    xtype: 'presidentlist',
    requires: ['Sencha.store.Presidents'],
    
    config: {
        title: 'American Presidents',
        grouped: true,
        itemTpl: '{firstName} {lastName}',
        store: 'Presidents',
        onItemDisclosure: true
    }
});
*/