Ext.define('Mather.view.AllProjects',{
extend:'Ext.List',
xtype:'allprojects',
requires:['Mather.store.AllProjects','Mather.view.ProjectDetails'],
config:{
	iconCls:'home',
	title:'Projects',	  
   store: 'AllProjects',
   //grouped: true,
   itemTpl: '<img src="uploads/project_images/{project_images}" style="float:left" width="50" height="50"> <div> Name: {name}{id}{project_images} <br/>Location: {loc}</div>',
   onItemDisclosure: true
	}
	});
