Ext.define('Mather.view.Carousel',{
extend:'Ext.Carousel',
xtype:'carouselcard',
requires:['Mather.controller.Main'],
config:{
	//html:'welcome to mather app',
	fullscreen:true,
	//tpl:['<p>{name}sasa</p>']
	//tabBarPosition:'bottom',
	//title:'Carousel'
	
	 listeners:{
        'activate':function(record,index){        	        	        	
        	me=this;
        	var dataObj=record.getData();        	
        	for(var i=0;i<dataObj.length;i++){        		
        		me.add({
     				xtype:'panel',
     				html:'<img src="uploads/'+dataObj[i].name+'" width="200" height="150" />'
     				})  
     			}      						
        }
     }	
	}
	});