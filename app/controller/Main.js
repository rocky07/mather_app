Ext.define('Mather.controller.Main', {
    extend: 'Ext.app.Controller',
    config:{
    	refs:{
			enquiryButton:'button[action=save]',
			enquiryForm: {
                selector: 'enquirycard',
                xtype: 'enquirycard',
                autoCreate: true
            },
			main:'mainlayout',
			carouselcard:'carouselcard'				
         },
		control: {
			
         enquiryButton: {
                tap: 'doSendenquiry'
            },
			allprojects:{
				disclose:'showProjectDetails'
				},
			gallerycard:{
				itemtap:'viewImageGallery'    			
    			},
    		carouselcard:{
				 activate:'loadGalleryPics'   				
    				}
    		}
    	},
    	doSendenquiry:function(){			    		
			Ext.Ajax.request({
  					 url: 'php/sendEnquiry.php',
    				 params: this.getEnquiryForm().getValues(),
    				 success:function(response){
     					   var text = response.responseText;     					   	
     					   	textObj=eval('('+text+')');
     					   		if(textObj.send){
     					   			Ext.Msg.alert("Success",textObj.msg);
     					   		}else{
     					   			Ext.Msg.alert("Failed",textObj.msg);
     					   		}     					   	     					   		
     					   	}
     					   	});			
    		},
		showProjectDetails:function(list, record){			
			this.getMain().push({
            	xtype: 'projectdetailscard',
            	title: record.data.name,
            	id: record.data.id
				//html: record.data.name,
            	//data: record.getData()
        		});
			},
		viewImageGallery:function(record,index){
				//alert('test');								
				this.getMain().push({					
					xtype:'carouselcard',
					data:record.data,
					title:'test'
					//title:record.data[index].caption					
					});
				},
		loadGalleryPics:function(record,index){	
		console.log("data lading -----");
		console.log(record);
		console.log(index);
		var obj=this;
		/*
			Ext.Ajax.request({
  					  url: 'data/projectgallery.php',
    				  params: {
      	  						id: 3
    								},
    				 success:function(response){
     					   var text = response.responseText;
     					   	console.log(text);
     					   	textObj=eval('('+text+')');*/
     					   	//obj.getCarouselcard().setItems(textObj);
     					   	//obj.getCarouselcard().item=textObj;
     					  
     					   	//obj.getCarouselcard().doLayout();
     					   	/*for(var i=0;i<textObj.length;i++){     					   		
     					   		obj.getCarouselcard().items.push({
     					   			html:textObj[i].name
     					   			})
     					   			obj.getCarouselcard().insert(0, {xtype: 'panel', html: 'new item'});
 		    					   	//obj.getCarouselcard().add({html:'test'});
     					   		}*/
     					   		// process server response here
 /*   							}
						});*/
			}			
    });
