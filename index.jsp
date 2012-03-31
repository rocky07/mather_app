<html>
<head>
    <title>Ext JS Calendar Sample</title>
    <!-- Ext includes -->
    <link rel="stylesheet" type="text/css" href="js/lib/ext/resources/css/ext-all.css" />
    <script type="text/javascript" src="js/lib/ext/adapter/ext/ext-base-debug.js"></script>
    <script type="text/javascript" src="js/lib/ext/ext-all-debug.js"></script>
    <script type="text/javascript" src="js/lib/DwrProxy.js"></script>
      <script type='text/javascript' src='/dwr/dwr/engine.js'></script>
   <script type='text/javascript' src='/dwr/dwr/interface/Test.js'></script>
   <script language="javascript" >
var combo = new Ext.form.ComboBox({
    typeAhead: true,
renderTo:Ext.getBody(),
    triggerAction: 'all',
    lazyRender:true,
    mode: 'local',
displayField:'displayField',
valueField:'displayField',
    store: new Ext.data.ArrayStore({


        id: 0,
        fields: [
            'myId',
            'displayText'
        ]
,
    proxy:new Ext.ux.data.DwrProxy({

apiActionToHandlerMap : {
        read : {
            dwrFunction : Test.getResult,
            getDwrArgsFunction: function(request, newData, oldData) {
               // return [request.params.myId];
                    }
                }
            }

             }),


        }),
    valueField: 'myId',
    displayField: 'displayText',
initComponent:function(){
me=this;
store=this.store;
 this.store.on('load',function(store) {
     me.setValue( store.getAt(0).get('myId'));
    });
this.store.load();

},
listeners:{
select:function(a,b,c){
console.log(b)
}
}

});


   new Ext.Window({
                                    	title:'custome window',
                                    	id:'calWin',
                                    	items:[{
                                    		
                                    		xtype:'calendarpicker',
                                    		anchor:'100%',
                                    		initComponent:function(){
						me=this;
						store=this.store;
						 this.store.on('load',function(store) {
						     me.setValue( store.getAt(0).get('myId'));
						    });
						//this.store.load();

						},
						store:new Ext.data.ArrayStore({
        						id: 0,
        						autoLoad:true,
       							fields: [
      								'CalendarId',
       								'Title'
       								]
								,
							proxy:new Ext.ux.data.DwrProxy({

							apiActionToHandlerMap : {
								read : {
									dwrFunction : Test.getResult,
    									        getDwrArgsFunction: function(request, newData, oldData) {
        							       // return [request.params.myId];
        		  								          }
       					      				   }
       					   			  }

             							}),


       					 })
                                    		}]
                                    		
                                    	}).show();      


</script>   
</head>
<body>
test
</body>
</html>
