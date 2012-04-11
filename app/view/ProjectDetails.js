Ext.define('Mather.view.ProjectDetails',{
extend:'Ext.TabPanel',
xtype:'projectdetailscard',
requires:['Mather.store.ProjectDetails','Mather.view.Gallery','Mather.view.Carousel'],
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
     					   	obj.getAt(4).setData(textObj);
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
			   tpl:['<img src={imgIcon} width="100" height="100"/><br><p>{description}</p>']
			   },{
			   title:'aminites',
			   tpl:['{description}']
			   },
			   {
			   title:'specification',
			   html:'	<ul><li>Painting : Putty with silk emulsion for interior walls. Premium weathercoat for exterior walls.</li><li>Electricity : Concealed conduits with copper wires and suitable points for power and lighting, provision for split AC/ledge in all bedrooms. Wiring for cable TV will be provided. Television point in living and all bedrooms.</li><li>Telephone : Telephone points in living and bedrooms.</li><li>Generator : Generator back-up will be provided for specific points in all rooms including AC in master bedroom.</li>    <li>Water : Drinking water supply will be provided in the kitchen and ground water supply to the rest of the points.</li></ul>'
			   },			   
			   {
			   xtype:'gallerycard'
			   },
			   {
			   title:'Floor Type',
			   html:'Floor Types'
			   },
			   {
			   	title:'Location Map',
			   	xtype: 'map',
    				useCurrentLocation: true
			   }
			   ]
		}
	});