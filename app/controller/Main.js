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
         main:'mainCard'  
         },
		control: {
         enquiryButton: {
                tap: 'doSendenquiry'
            },
          allProjects:{
          	disclose:'viewProjectDetails'
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
    	viewProjectDetails:function(list,record){
    		this.getMain.push({
    			xtype:'panel',
    			title:record.data
    			});
    		}
    	
    });
