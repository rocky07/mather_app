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
            {name: 'images/test.jpg',   age: 100},
            {name: 'images/test.jpg',   age: 21},
            {name: 'images/test.jpg', 	 age: 24},
            {name: 'images/test.jpg', 	 age: 24},
            {name: 'images/test.jpg',   age: 26},
            {name: 'images/test.jpg',   age: 26},
            {name: 'images/test.jpg',   age: 26},
            {name: 'images/test.jpg',   age: 26},
            {name: 'images/test.jpg',   age: 26},
            {name: 'images/test.jpg',   age: 26}
        ]
    },
	itemTpl:new Ext.XTemplate(
	//'<div style="padding:10px 5px 5px 5px;">',
            //'<tpl for=".">',
                '<div class="node" style="background:url({name});">zxz',
                '</div>'
           // '</tpl>',
  //          '</div>'
            )
	}
	});