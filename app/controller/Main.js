Ext.define('Mather.controller.Main', {
    extend: 'Ext.app.Controller',
    config:{
    	refs:{
			enquiryButton:'button[text=save]',
			enquiryForm: {
                selector: 'enquirycard',
                xtype: 'enquirycard',
                autoCreate: true
            }
         },
		control: {
         enquiryButton: {
                tap: 'doSendenquiry'
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
			
    		}
    	
    });