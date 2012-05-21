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
        	for(var i=0;i<record.getData().length;i++){
        		me.add({
     				xtype:'panel',
     				html:'<img src="uploads/gallery/'+textObj[i].name+'" width="200" height="150" />'
     				})  
     			}      						
        }
     }	
	}
	});