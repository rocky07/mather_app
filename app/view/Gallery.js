Ext.define('Mather.view.Gallery',{
extend:'Ext.DataView',
xtype:'gallerycard',
requires:['Mather.controller.Main'],
config:{
	//html:'welcome to mather app',
	fullscreen:true,
	tabBarPosition:'bottom',
	title:'Gallery',
	listeners:{        	
				activate:function(){
					console.log(this.title);	
					obj=this;	
					//alert('activated');
					Ext.Ajax.request({
  					  url: 'imagegallery.php',
    				  params: {
      	  						id: this.title
    								},
    				 success: function(response){
     					   var text = response.responseText;
     					   	console.log(text);
     					   	console.log(obj);
     					   	textObj=eval('('+text+')');
     					   	obj.setData(textObj);
     					   	
     					   	//obj.getActiveItem().setHtml(textObj.description);
        							// process server response here
    							}
							});
					}        	
        	},
        	store:{
        		fields:['name','caption']
        		},
        	/*,
 	store: {
        fields: ['name', 'age'],
        data: [
            {name: 'http://src.sencha.io/http://localhost:82/mather_app/images/1.jpg',   age: 100},
            {name: 'images/2.jpg',   age: 21},
            {name: 'images/3.jpg', 	 age: 24},
            {name: 'images/4.jpg', 	 age: 24},
            {name: 'images/5.jpg',   age: 26},
            {name: 'images/1.jpg',   age: 26}
            
        ]
    },*/
	itemTpl:new Ext.XTemplate(
	//'<div style="padding:10px 5px 5px 5px;">',
            //'<tpl for=".">',
                '<div class="node" style="background:url(uploads/gallery/{name});">',
                '</div>'
           // '</tpl>',
  //          '</div>'
            )
	}
	});