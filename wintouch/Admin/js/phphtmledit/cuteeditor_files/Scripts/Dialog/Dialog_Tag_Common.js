var OxO36d2=["inp_class","inp_width","inp_height","sel_align","sel_textalign","sel_float","inp_forecolor","img_forecolor","inp_backcolor","img_backcolor","inp_tooltip","value","className","width","style","height","align","styleFloat","cssFloat","textAlign","title","backgroundColor","color","","class","onclick"];var inp_class=Window_GetElement(window,OxO36d2[0],true);var inp_width=Window_GetElement(window,OxO36d2[1],true);var inp_height=Window_GetElement(window,OxO36d2[2],true);var sel_align=Window_GetElement(window,OxO36d2[3],true);var sel_textalign=Window_GetElement(window,OxO36d2[4],true);var sel_float=Window_GetElement(window,OxO36d2[5],true);var inp_forecolor=Window_GetElement(window,OxO36d2[6],true);var img_forecolor=Window_GetElement(window,OxO36d2[7],true);var inp_backcolor=Window_GetElement(window,OxO36d2[8],true);var img_backcolor=Window_GetElement(window,OxO36d2[9],true);var inp_tooltip=Window_GetElement(window,OxO36d2[10],true);UpdateState=function UpdateState_Common(){} ;SyncToView=function SyncToView_Common(){inp_class[OxO36d2[11]]=element[OxO36d2[12]];inp_width[OxO36d2[11]]=element[OxO36d2[14]][OxO36d2[13]];inp_height[OxO36d2[11]]=element[OxO36d2[14]][OxO36d2[15]];sel_align[OxO36d2[11]]=element[OxO36d2[16]];if(Browser_IsWinIE()){sel_float[OxO36d2[11]]=element[OxO36d2[14]][OxO36d2[17]];} else {sel_float[OxO36d2[11]]=element[OxO36d2[14]][OxO36d2[18]];} ;sel_textalign[OxO36d2[11]]=element[OxO36d2[14]][OxO36d2[19]];inp_tooltip[OxO36d2[11]]=element[OxO36d2[20]];inp_forecolor[OxO36d2[11]]=revertColor(element[OxO36d2[14]].color);inp_forecolor[OxO36d2[14]][OxO36d2[21]]=inp_forecolor[OxO36d2[11]];img_forecolor[OxO36d2[14]][OxO36d2[21]]=inp_forecolor[OxO36d2[11]];inp_backcolor[OxO36d2[11]]=revertColor(element[OxO36d2[14]].backgroundColor);inp_backcolor[OxO36d2[14]][OxO36d2[21]]=inp_backcolor[OxO36d2[11]];img_backcolor[OxO36d2[14]][OxO36d2[21]]=inp_backcolor[OxO36d2[11]];} ;SyncTo=function SyncTo_Common(element){element[OxO36d2[12]]=inp_class[OxO36d2[11]];try{element[OxO36d2[14]][OxO36d2[13]]=inp_width[OxO36d2[11]];element[OxO36d2[14]][OxO36d2[15]]=inp_height[OxO36d2[11]];} catch(x){} ;element[OxO36d2[16]]=sel_align[OxO36d2[11]];if(Browser_IsWinIE()){element[OxO36d2[14]][OxO36d2[17]]=sel_float[OxO36d2[11]];} else {element[OxO36d2[14]][OxO36d2[18]]=sel_float[OxO36d2[11]];} ;element[OxO36d2[14]][OxO36d2[19]]=sel_textalign[OxO36d2[11]];element[OxO36d2[20]]=inp_tooltip[OxO36d2[11]];element[OxO36d2[14]][OxO36d2[22]]=inp_forecolor[OxO36d2[11]];element[OxO36d2[14]][OxO36d2[21]]=inp_backcolor[OxO36d2[11]];if(element[OxO36d2[12]]==OxO36d2[23]){element.removeAttribute(OxO36d2[12]);} ;if(element[OxO36d2[12]]==OxO36d2[23]){element.removeAttribute(OxO36d2[24]);} ;if(element[OxO36d2[20]]==OxO36d2[23]){element.removeAttribute(OxO36d2[20]);} ;if(element[OxO36d2[16]]==OxO36d2[23]){element.removeAttribute(OxO36d2[16]);} ;} ;img_forecolor[OxO36d2[25]]=inp_forecolor[OxO36d2[25]]=function inp_forecolor_onclick(){SelectColor(inp_forecolor,img_forecolor);} ;img_backcolor[OxO36d2[25]]=inp_backcolor[OxO36d2[25]]=function inp_backcolor_onclick(){SelectColor(inp_backcolor,img_backcolor);} ;