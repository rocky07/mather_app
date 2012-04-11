Ext.define('Mather.view.Gallery',{
extend:'Ext.DataView',
xtype:'gallerycard',
requires:['Mather.controller.Main'],
config:{
	//html:'welcome to mather app',
	fullscreen:true,
	tabBarPosition:'bottom',
	title:'Gallery',
 	store: {
        fields: ['name', 'age'],
        data: [
            {name: 'images/1.jpg',   age: 100},
            {name: 'images/2.jpg',   age: 21},
            {name: 'images/3.jpg', 	 age: 24},
            {name: 'images/4.jpg', 	 age: 24},
            {name: 'images/5.jpg',   age: 26},
            {name: 'images/1.jpg',   age: 26}
            
        ]
    },
	itemTpl:new Ext.XTemplate(
	//'<div style="padding:10px 5px 5px 5px;">',
            //'<tpl for=".">',
                '<div class="node" style="background:url({name});">',
                '</div>'
           // '</tpl>',
  //          '</div>'
            )
	}
	});