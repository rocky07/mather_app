Ext.define('Mather.view.Enquiry',{
	extend:'Ext.form.FormPanel',
	xtype:'enquirycard',
	requires:['Ext.form.FieldSet'],
	config:{
		title:'Enquiry',
		iconCls:'mail5',
		//standardSubmit:true,		
		items:[
				 {
                docked: 'top',
                xtype: 'toolbar',
                title: 'Enquiry'
            },
				{
				xtype:'fieldset',
				items:[
					{
					xtype:'textfield',
					name:'name',
					label:'Name',
					required:true
					},
					{
					xtype:'textfield',
					name:'phone',
					label:'Phone',
					required:true
					},
					{
					xtype:'textfield',
					name:'email',
					label:'Email',
					required:true
					},
					{
					xtype:'textareafield',
					name:'comment',
					label:'Comment',
					required:true
					}
				]	
				},
				{
                xtype:  'button',
                text:   'Mail us',
                action:'save',
                ui:'confirm'
            }
			]
		}
	});