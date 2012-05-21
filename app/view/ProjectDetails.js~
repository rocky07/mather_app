Ext.define('Mather.view.ProjectDetails',{
extend:'Ext.TabPanel',
xtype:'projectdetailscard',
requires:['Mather.store.ProjectDetails','Mather.view.Gallery','Mather.view.Carousel'],
config:{
		//html:'Mather details panel',
		fullscreen:true,
		tabBarPosition: 'bottom',
/*		 tpl: [
            'Hello {name}!'
        ],*/
        listeners:{        	
				activate:function(record){
					console.log(this);	
					obj=this;
					
					console.log('activated');
					console.log(record);
					Ext.Ajax.request({
  					  url:'projectdetails.php',
    				  params: {
      	  						id: this.title
    								},
    				 success: function(response){
     					   var text = response.responseText;
     					   	console.log(text);
     					   	console.log(obj);
     					   	textObj=eval('('+text+')');
     					   	obj.getActiveItem().setData(textObj[0]);
     					   	obj.getAt(2).setData(textObj[0]);
     					   	obj.getAt(3).setData(textObj[0]);
     					   	//obj.getActiveItem().setHtml(textObj.description);
        							// process server response here
    							}
							});
					}        	
        	},
        

//		tpl:
		items:[
			   {
			   iconCls:'home',
			   title:'Details',
			   scrollable: {
    				direction: 'vertical',
    				directionLock: true
					},
			   //itemTpl:'ammeninitr--- {name}'
			   //html:'asa'
			   tpl:['<img src="uploads/project_images/{project_image}" width="100" height="100"/><br>ProjectName:{name}<br>Location:{location}<br/>Status:{project_status}<br/>Category:{category}<p>{summary}</p>']
			   },{
			   iconCls:'favorites',
			   title:'aminites',
			   tpl:['{amenities}']
			   },
			   {
			   iconCls:'info',
			   title:'specification',
			   scrollable: {
    				direction: 'vertical',
    				directionLock: true
					},
			   layout:'fit',
			   tpl:['No of Floors:{no_of_floors}<br/>Unit Types:{unit_type}<br/>Land Area: {land_area}<br/><p>{specification}</p>']
			   },			   
			   {
			   iconCls:'home',
			   xtype:'gallerycard'
			   },
			   {
			   iconCls:'favorites',
			   title:'Floor Type',
			   html:'Floor Types'
			   },
			   {
			   	iconCls:'info',
			   	title:'Location Map',
			   	xtype: 'map',
    				useCurrentLocation: true
			   }
			   ]
		}
	});