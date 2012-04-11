Ext.define('Mather.controller.Main', {
    extend: 'Ext.app.Controller',
    config:{
    	refs:{
			enquiryButton:'button[text=save]',
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
    			}/*,
    		carouselcard:{
				 activate:'loadGalleryPics'   				
    				}*/
    		}
    	},
    	doSendenquiry:function(){
			alert('send enquiry');    		
		this.getEnquiryForm().submit({
    		url: 'index.html',
    		method: 'POST',
    		success: function() {
        			alert('form submitted successfully!');
    				}
				});			
			
    		},
		showProjectDetails:function(list, record){
			this.getMain().push({
            	xtype: 'projectdetailscard',
            	title: record.data.name,
				//html: record.data.name,
            	//data: record.getData()
        		});
			},
		viewImageGallery:function(list,record){
				//alert('test');				
				this.getMain().push({
					xtype:'carouselcard',
					title:'hello'
					});
				},
		loadGalleryPics:function(){	
		alert("test");
		var obj=this;
		this.getCarouselcard().add({
									xtype:'panel',
									html:'hooea'     					   		
     					   		})
			Ext.Ajax.request({
  					  url: 'data/projectgallery.php',
    				  params: {
      	  						id: 3
    								},
    				 success:function(response){
     					   var text = response.responseText;
     					   	console.log(text);
     					   	textObj=eval('('+text+')');
     					   	//obj.getCarouselcard().setItems(textObj);
     					   	//obj.getCarouselcard().item=textObj;
     					   	obj.getCarouselcard().add({
									xtype:'panel',
									html:'hooea'     					   		
     					   		})
     					   	//obj.getCarouselcard().doLayout();
     					   	/*for(var i=0;i<textObj.length;i++){     					   		
     					   		obj.getCarouselcard().items.push({
     					   			html:textObj[i].name
     					   			})
     					   			obj.getCarouselcard().insert(0, {xtype: 'panel', html: 'new item'});
 		    					   	//obj.getCarouselcard().add({html:'test'});
     					   		}*/
     					   		// process server response here
    							}
						});
			}			
    });
