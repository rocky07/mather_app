Ext.define('Mather.view.Carousel',{
extend:'Ext.Carousel',
xtype:'carouselcard',
requires:['Mather.controller.Main'],
config:{
	//html:'welcome to mather app',
	fullscreen:true,
	//tabBarPosition:'bottom',
	title:'Carousel',
	//tpl:['{html}'],
	 listeners:{
        'activate':function(){
        	me=this;
            Ext.Ajax.request({
  					  url: 'data/projectgallery.php',
    				  params: {
      	  						id: 3
    								},
    				 success:function(response){
     					   var text = response.responseText;
     					   	console.log(text);
     					   	textObj=eval('('+text+')');     					   	
     					   		for(var i=0;i<textObj.length;i++){     					   		
     					   			me.add({
     					   				xtype:'panel',
     					   				html:'<img src='+textObj[i].html+' />'
     					   				})     					   			
     					   			}
     					   		// process server response here
    							}
						});
						
        }
        }/*,
	items:[{
		html:'<img src="images/test.jpg"/>'		
		},
		{
		html:'<img src="images/test.jpg"/>'		
		}]*/	
	}
	});