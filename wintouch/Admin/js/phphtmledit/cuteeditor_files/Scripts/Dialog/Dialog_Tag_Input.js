var OxO18ef=["inp_type","inp_name","inp_value","row_txt1","inp_Size","row_txt2","inp_MaxLength","row_img","inp_src","btnbrowse","row_img2","sel_Align","optNotSet","optLeft","optRight","optTexttop","optAbsMiddle","optBaseline","optAbsBottom","optBottom","optMiddle","optTop","inp_Border","row_img3","inp_width","inp_height","row_img4","inp_HSpace","inp_VSpace","row_img5","AlternateText","inp_id","row_txt3","inp_access","row_txt4","inp_index","row_chk","inp_checked","row_txt5","inp_Disabled","row_txt6","inp_Readonly","onclick","value","Name","name","id","src","type","checked","disabled","readOnly","tabIndex","","accessKey","size","maxLength","width","height","vspace","hspace","border","align","alt","text","display","style","none","password","hidden","radio","checkbox","submit","reset","button","image","className","class"];var inp_type=Window_GetElement(window,OxO18ef[0],true);var inp_name=Window_GetElement(window,OxO18ef[1],true);var inp_value=Window_GetElement(window,OxO18ef[2],true);var row_txt1=Window_GetElement(window,OxO18ef[3],true);var inp_Size=Window_GetElement(window,OxO18ef[4],true);var row_txt2=Window_GetElement(window,OxO18ef[5],true);var inp_MaxLength=Window_GetElement(window,OxO18ef[6],true);var row_img=Window_GetElement(window,OxO18ef[7],true);var inp_src=Window_GetElement(window,OxO18ef[8],true);var btnbrowse=Window_GetElement(window,OxO18ef[9],true);var row_img2=Window_GetElement(window,OxO18ef[10],true);var sel_Align=Window_GetElement(window,OxO18ef[11],true);var optNotSet=Window_GetElement(window,OxO18ef[12],true);var optLeft=Window_GetElement(window,OxO18ef[13],true);var optRight=Window_GetElement(window,OxO18ef[14],true);var optTexttop=Window_GetElement(window,OxO18ef[15],true);var optAbsMiddle=Window_GetElement(window,OxO18ef[16],true);var optBaseline=Window_GetElement(window,OxO18ef[17],true);var optAbsBottom=Window_GetElement(window,OxO18ef[18],true);var optBottom=Window_GetElement(window,OxO18ef[19],true);var optMiddle=Window_GetElement(window,OxO18ef[20],true);var optTop=Window_GetElement(window,OxO18ef[21],true);var inp_Border=Window_GetElement(window,OxO18ef[22],true);var row_img3=Window_GetElement(window,OxO18ef[23],true);var inp_width=Window_GetElement(window,OxO18ef[24],true);var inp_height=Window_GetElement(window,OxO18ef[25],true);var row_img4=Window_GetElement(window,OxO18ef[26],true);var inp_HSpace=Window_GetElement(window,OxO18ef[27],true);var inp_VSpace=Window_GetElement(window,OxO18ef[28],true);var row_img5=Window_GetElement(window,OxO18ef[29],true);var AlternateText=Window_GetElement(window,OxO18ef[30],true);var inp_id=Window_GetElement(window,OxO18ef[31],true);var row_txt3=Window_GetElement(window,OxO18ef[32],true);var inp_access=Window_GetElement(window,OxO18ef[33],true);var row_txt4=Window_GetElement(window,OxO18ef[34],true);var inp_index=Window_GetElement(window,OxO18ef[35],true);var row_chk=Window_GetElement(window,OxO18ef[36],true);var inp_checked=Window_GetElement(window,OxO18ef[37],true);var row_txt5=Window_GetElement(window,OxO18ef[38],true);var inp_Disabled=Window_GetElement(window,OxO18ef[39],true);var row_txt6=Window_GetElement(window,OxO18ef[40],true);var inp_Readonly=Window_GetElement(window,OxO18ef[41],true);btnbrowse[OxO18ef[42]]=function btnbrowse_onclick(){function Ox47e(Ox263){if(Ox263){inp_src[OxO18ef[43]]=Ox263;SyncTo(element);} ;} ;editor.SetNextDialogWindow(window);if(Browser_IsSafari()){editor.ShowSelectImageDialog(Ox47e,inp_src.value,inp_src);} else {editor.ShowSelectImageDialog(Ox47e,inp_src.value);} ;} ;UpdateState=function UpdateState_Input(){} ;SyncToView=function SyncToView_Input(){if(element[OxO18ef[44]]){inp_name[OxO18ef[43]]=element[OxO18ef[44]];} ;if(element[OxO18ef[45]]){inp_name[OxO18ef[43]]=element[OxO18ef[45]];} ;inp_id[OxO18ef[43]]=element[OxO18ef[46]];inp_value[OxO18ef[43]]=(element[OxO18ef[43]]).trim();inp_src[OxO18ef[43]]=element[OxO18ef[47]];inp_type[OxO18ef[43]]=element[OxO18ef[48]];inp_checked[OxO18ef[49]]=element[OxO18ef[49]];inp_Disabled[OxO18ef[49]]=element[OxO18ef[50]];inp_Readonly[OxO18ef[49]]=element[OxO18ef[51]];if(element[OxO18ef[52]]==0){inp_index[OxO18ef[43]]=OxO18ef[53];} else {inp_index[OxO18ef[43]]=element[OxO18ef[52]];} ;if(element[OxO18ef[54]]){inp_access[OxO18ef[43]]=element[OxO18ef[54]];} ;if(element[OxO18ef[55]]){if(element[OxO18ef[55]]==20){inp_Size[OxO18ef[43]]=OxO18ef[53];} else {inp_Size[OxO18ef[43]]=element[OxO18ef[55]];} ;} ;if(element[OxO18ef[56]]){if(element[OxO18ef[56]]==2147483647||element[OxO18ef[56]]<=0){inp_MaxLength[OxO18ef[43]]=OxO18ef[53];} else {inp_MaxLength[OxO18ef[43]]=element[OxO18ef[56]];} ;} ;if(element[OxO18ef[57]]){inp_width[OxO18ef[43]]=element[OxO18ef[57]];} ;if(element[OxO18ef[58]]){inp_height[OxO18ef[43]]=element[OxO18ef[58]];} ;if(element[OxO18ef[59]]){inp_HSpace[OxO18ef[43]]=element[OxO18ef[59]];} ;if(element[OxO18ef[60]]){inp_VSpace[OxO18ef[43]]=element[OxO18ef[60]];} ;if(element[OxO18ef[61]]){inp_Border[OxO18ef[43]]=element[OxO18ef[61]];} ;if(element[OxO18ef[62]]){sel_Align[OxO18ef[43]]=element[OxO18ef[62]];} ;if(element[OxO18ef[63]]){alt[OxO18ef[43]]=element[OxO18ef[63]];} ;switch((element[OxO18ef[48]]).toLowerCase()){case OxO18ef[64]:;case OxO18ef[68]:row_img[OxO18ef[66]][OxO18ef[65]]=OxO18ef[67];row_img2[OxO18ef[66]][OxO18ef[65]]=OxO18ef[67];row_img3[OxO18ef[66]][OxO18ef[65]]=OxO18ef[67];row_img4[OxO18ef[66]][OxO18ef[65]]=OxO18ef[67];row_img5[OxO18ef[66]][OxO18ef[65]]=OxO18ef[67];row_chk[OxO18ef[66]][OxO18ef[65]]=OxO18ef[67];break ;;case OxO18ef[69]:row_img[OxO18ef[66]][OxO18ef[65]]=OxO18ef[67];row_img2[OxO18ef[66]][OxO18ef[65]]=OxO18ef[67];row_img3[OxO18ef[66]][OxO18ef[65]]=OxO18ef[67];row_img4[OxO18ef[66]][OxO18ef[65]]=OxO18ef[67];row_img5[OxO18ef[66]][OxO18ef[65]]=OxO18ef[67];row_chk[OxO18ef[66]][OxO18ef[65]]=OxO18ef[67];row_txt1[OxO18ef[66]][OxO18ef[65]]=OxO18ef[67];row_txt2[OxO18ef[66]][OxO18ef[65]]=OxO18ef[67];row_txt3[OxO18ef[66]][OxO18ef[65]]=OxO18ef[67];row_txt4[OxO18ef[66]][OxO18ef[65]]=OxO18ef[67];row_txt5[OxO18ef[66]][OxO18ef[65]]=OxO18ef[67];row_txt6[OxO18ef[66]][OxO18ef[65]]=OxO18ef[67];break ;;case OxO18ef[70]:;case OxO18ef[71]:row_img[OxO18ef[66]][OxO18ef[65]]=OxO18ef[67];row_img2[OxO18ef[66]][OxO18ef[65]]=OxO18ef[67];row_img3[OxO18ef[66]][OxO18ef[65]]=OxO18ef[67];row_img4[OxO18ef[66]][OxO18ef[65]]=OxO18ef[67];row_img5[OxO18ef[66]][OxO18ef[65]]=OxO18ef[67];row_txt1[OxO18ef[66]][OxO18ef[65]]=OxO18ef[67];row_txt2[OxO18ef[66]][OxO18ef[65]]=OxO18ef[67];row_txt6[OxO18ef[66]][OxO18ef[65]]=OxO18ef[67];break ;;case OxO18ef[72]:;case OxO18ef[73]:;case OxO18ef[74]:row_chk[OxO18ef[66]][OxO18ef[65]]=OxO18ef[67];row_img[OxO18ef[66]][OxO18ef[65]]=OxO18ef[67];row_img2[OxO18ef[66]][OxO18ef[65]]=OxO18ef[67];row_img3[OxO18ef[66]][OxO18ef[65]]=OxO18ef[67];row_img4[OxO18ef[66]][OxO18ef[65]]=OxO18ef[67];row_img5[OxO18ef[66]][OxO18ef[65]]=OxO18ef[67];row_txt1[OxO18ef[66]][OxO18ef[65]]=OxO18ef[67];row_txt2[OxO18ef[66]][OxO18ef[65]]=OxO18ef[67];row_txt6[OxO18ef[66]][OxO18ef[65]]=OxO18ef[67];break ;;case OxO18ef[75]:row_chk[OxO18ef[66]][OxO18ef[65]]=OxO18ef[67];row_txt1[OxO18ef[66]][OxO18ef[65]]=OxO18ef[67];row_txt2[OxO18ef[66]][OxO18ef[65]]=OxO18ef[67];row_txt6[OxO18ef[66]][OxO18ef[65]]=OxO18ef[67];break ;;} ;} ;SyncTo=function SyncTo_Input(element){element[OxO18ef[45]]=inp_name[OxO18ef[43]];if(element[OxO18ef[44]]){element[OxO18ef[44]]=inp_name[OxO18ef[43]];} else {if(element[OxO18ef[45]]){element.removeAttribute(OxO18ef[45],0);element[OxO18ef[44]]=inp_name[OxO18ef[43]];} else {element[OxO18ef[44]]=inp_name[OxO18ef[43]];} ;} ;element[OxO18ef[46]]=inp_id[OxO18ef[43]];if(inp_src[OxO18ef[43]]){element[OxO18ef[47]]=inp_src[OxO18ef[43]];} ;element[OxO18ef[49]]=inp_checked[OxO18ef[49]];element[OxO18ef[43]]=inp_value[OxO18ef[43]];element[OxO18ef[50]]=inp_Disabled[OxO18ef[49]];element[OxO18ef[51]]=inp_Readonly[OxO18ef[49]];element[OxO18ef[54]]=inp_access[OxO18ef[43]];element[OxO18ef[52]]=inp_index[OxO18ef[43]];element[OxO18ef[56]]=inp_MaxLength[OxO18ef[43]];element[OxO18ef[57]]=inp_width[OxO18ef[43]];element[OxO18ef[58]]=inp_height[OxO18ef[43]];element[OxO18ef[59]]=inp_HSpace[OxO18ef[43]];element[OxO18ef[60]]=inp_VSpace[OxO18ef[43]];element[OxO18ef[61]]=inp_Border[OxO18ef[43]];element[OxO18ef[62]]=sel_Align[OxO18ef[43]];element[OxO18ef[63]]=AlternateText[OxO18ef[43]];try{element[OxO18ef[55]]=inp_Size[OxO18ef[43]];} catch(e){element[OxO18ef[55]]=20;} ;if(element[OxO18ef[52]]==OxO18ef[53]){element.removeAttribute(OxO18ef[52]);} ;if(element[OxO18ef[54]]==OxO18ef[53]){element.removeAttribute(OxO18ef[54]);} ;if(element[OxO18ef[56]]==OxO18ef[53]){element.removeAttribute(OxO18ef[56]);} ;if(element[OxO18ef[55]]==0){element.removeAttribute(OxO18ef[55]);} ;if(element[OxO18ef[57]]==0){element.removeAttribute(OxO18ef[57]);} ;if(element[OxO18ef[58]]==0){element.removeAttribute(OxO18ef[58]);} ;if(element[OxO18ef[60]]==OxO18ef[53]){element.removeAttribute(OxO18ef[60]);} ;if(element[OxO18ef[59]]==OxO18ef[53]){element.removeAttribute(OxO18ef[59]);} ;if(element[OxO18ef[46]]==OxO18ef[53]){element.removeAttribute(OxO18ef[46]);} ;if(element[OxO18ef[44]]==OxO18ef[53]){element.removeAttribute(OxO18ef[44]);} ;if(element[OxO18ef[63]]==OxO18ef[53]){element.removeAttribute(OxO18ef[63]);} ;if(element[OxO18ef[62]]==OxO18ef[53]){element.removeAttribute(OxO18ef[62]);} ;if(element[OxO18ef[76]]==OxO18ef[53]){element.removeAttribute(OxO18ef[77]);} ;if(element[OxO18ef[76]]==OxO18ef[53]){element.removeAttribute(OxO18ef[76]);} ;switch((element[OxO18ef[48]]).toLowerCase()){case OxO18ef[64]:;case OxO18ef[68]:;case OxO18ef[69]:;case OxO18ef[70]:;case OxO18ef[71]:;case OxO18ef[72]:;case OxO18ef[73]:;case OxO18ef[74]:element.removeAttribute(OxO18ef[58]);element.removeAttribute(OxO18ef[61]);element.removeAttribute(OxO18ef[47]);break ;;case OxO18ef[75]:break ;;} ;} ;