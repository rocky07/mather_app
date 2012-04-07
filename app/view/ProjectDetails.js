Ext.define('Mather.view.ProjectDetails',{
extend:'Ext.TabPanel',
xtype:'projectdetailscard',
requires:['Mather.store.ProjectDetails'],
config:{
		//html:'Mather details panel',
		fullscreen:true,
/*		 tpl: [
            'Hello {name}!'
        ],*/
        listeners:{        	
				activate:function(){
					console.log(this.title);	
					obj=this;	
					//alert('activated');
					Ext.Ajax.request({
  					  url: 'data/projectdetails.php',
    				  params: {
      	  						id: this.title
    								},
    				 success: function(response){
     					   var text = response.responseText;
     					   	console.log(text);
     					   	console.log(obj);
     					   	textObj=eval('('+text+')');
     					   	obj.getActiveItem().setData(textObj);
     					   	obj.getAt(2).setData(textObj);
     					   	//obj.getActiveItem().setHtml(textObj.description);
        							// process server response here
    							}
							});
					}        	
        	},
        

//		tpl:
		items:[
			   {
			   title:'Details',
			   //itemTpl:'ammeninitr--- {name}'
			   //html:'asa'
			   tpl:['{name}---{loc}--{description}']
			   },{
			   title:'aminites',
			   tpl:['{description}----']
			   },
			   {
			   title:'specification',
			   html:'specification'
			   },			   
			   {
			   title:'Gallery',
			   html:'specification'
			   },
			   {
			   title:'Floor Type',
			   html:'specification'
			   },
			   {
			   	title:'Location Map',
			   	xtype: 'map',
    				useCurrentLocation: true
			   }
			   ]
		}
	});