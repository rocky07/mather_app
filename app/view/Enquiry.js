Ext.define('Mather.view.Enquiry',{
	extend:'Ext.form.FormPanel',
	xtype:'enquirycard',
	requires:['Ext.form.FieldSet'],
	config:{
		title:'Enquiry',
		iconCls:'home',		
		items:[
				 {
                docked: 'top',
                xtype: 'toolbar',
                title: 'Settings'
            },
				{
				xtype:'fieldset',
				items:[
					{
					xtype:'textfield',
					name:'name',
					label:'Name'
					},
					{
					xtype:'textfield',
					name:'phone',
					label:'Phone'
					},
					{
					xtype:'textfield',
					name:'email',
					label:'Email'
					},
					{
					xtype:'textareafield',
					name:'comment',
					label:'Comment'
					}
				]	
				},
				{
                xtype:  'button',
                text:   'save',
                action:'save',
                ui:     'confirm'
            }
			]
		}
	});