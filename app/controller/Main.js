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
			caroselGallery:'caroselgallery'				
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
				 initilize:'loadGalleryPics'   				
    				}	
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
			Ext.Ajax.request({
  					  url: 'data/projectgallery.php',
    				  params: {
      	  						id: 3
    								},
    				 success:function(response){
     					   var text = response.responseText;
     					   	console.log(text);
     					   	textObj=eval('('+text+')');
     					   	for(vari=0;i<textObj.length;i++){
     					   		this.getCaroselGallery().items.push({
     					   			html:textObj.name
     					   			})
     					   		}
     					   		// process server response here
    							}
						});
			}			
    });
