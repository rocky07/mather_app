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
			main:'mainlayout'
         },
		control: {
         enquiryButton: {
                tap: 'doSendenquiry'
            },
		allprojects:{
			disclose:'showProjectDetails'
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
    		},//send enquiry ends here..
		showProjectDetails:function(list, record){
			this.getMain().push({
            	xtype: 'projectdetailscard',
            	title: record.data.name,
				//html: record.data.name,
            	//data: record.getData()
        		});
			}	
    	
    });
