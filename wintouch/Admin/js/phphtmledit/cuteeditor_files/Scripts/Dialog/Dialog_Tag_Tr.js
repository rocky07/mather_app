var OxO18c9=["inp_width","inp_height","sel_align","sel_valign","inp_bgColor","inp_borderColor","inp_borderColorLight","inp_borderColorDark","inp_class","inp_id","inp_tooltip","value","bgColor","backgroundColor","style","","id","borderColor","borderColorLight","borderColorDark","className","width","height","align","vAlign","title","ValidNumber","ValidID","class","valign","onclick"];var inp_width=Window_GetElement(window,OxO18c9[0],true);var inp_height=Window_GetElement(window,OxO18c9[1],true);var sel_align=Window_GetElement(window,OxO18c9[2],true);var sel_valign=Window_GetElement(window,OxO18c9[3],true);var inp_bgColor=Window_GetElement(window,OxO18c9[4],true);var inp_borderColor=Window_GetElement(window,OxO18c9[5],true);var inp_borderColorLight=Window_GetElement(window,OxO18c9[6],true);var inp_borderColorDark=Window_GetElement(window,OxO18c9[7],true);var inp_class=Window_GetElement(window,OxO18c9[8],true);var inp_id=Window_GetElement(window,OxO18c9[9],true);var inp_tooltip=Window_GetElement(window,OxO18c9[10],true);SyncToView=function SyncToView_Tr(){inp_bgColor[OxO18c9[11]]=element.getAttribute(OxO18c9[12])||element[OxO18c9[14]][OxO18c9[13]]||OxO18c9[15];inp_id[OxO18c9[11]]=element.getAttribute(OxO18c9[16])||OxO18c9[15];inp_bgColor[OxO18c9[14]][OxO18c9[13]]=inp_bgColor[OxO18c9[11]];inp_borderColor[OxO18c9[11]]=element.getAttribute(OxO18c9[17])||OxO18c9[15];inp_borderColor[OxO18c9[14]][OxO18c9[13]]=inp_borderColor[OxO18c9[11]];inp_borderColorLight[OxO18c9[11]]=element.getAttribute(OxO18c9[18])||OxO18c9[15];inp_borderColorLight[OxO18c9[14]][OxO18c9[13]]=inp_borderColorLight[OxO18c9[11]];inp_borderColorDark[OxO18c9[11]]=element.getAttribute(OxO18c9[19])||OxO18c9[15];inp_borderColorDark[OxO18c9[14]][OxO18c9[13]]=inp_borderColorDark[OxO18c9[11]];inp_class[OxO18c9[11]]=element[OxO18c9[20]];inp_width[OxO18c9[11]]=element.getAttribute(OxO18c9[21])||element[OxO18c9[14]][OxO18c9[21]]||OxO18c9[15];inp_height[OxO18c9[11]]=element.getAttribute(OxO18c9[22])||element[OxO18c9[14]][OxO18c9[22]]||OxO18c9[15];sel_align[OxO18c9[11]]=element.getAttribute(OxO18c9[23])||OxO18c9[15];sel_valign[OxO18c9[11]]=element.getAttribute(OxO18c9[24])||OxO18c9[15];inp_tooltip[OxO18c9[11]]=element.getAttribute(OxO18c9[25])||OxO18c9[15];} ;SyncTo=function SyncTo_Tr(element){if(inp_bgColor[OxO18c9[11]]){if(element[OxO18c9[14]][OxO18c9[13]]){element[OxO18c9[14]][OxO18c9[13]]=inp_bgColor[OxO18c9[11]];} else {element[OxO18c9[12]]=inp_bgColor[OxO18c9[11]];} ;} else {element.removeAttribute(OxO18c9[12]);} ;element[OxO18c9[17]]=inp_borderColor[OxO18c9[11]];element[OxO18c9[18]]=inp_borderColorLight[OxO18c9[11]];element[OxO18c9[19]]=inp_borderColorDark[OxO18c9[11]];element[OxO18c9[20]]=inp_class[OxO18c9[11]];if(element[OxO18c9[14]][OxO18c9[21]]||element[OxO18c9[14]][OxO18c9[22]]){try{element[OxO18c9[14]][OxO18c9[21]]=inp_width[OxO18c9[11]];element[OxO18c9[14]][OxO18c9[22]]=inp_height[OxO18c9[11]];} catch(er){alert(CE_GetStr(OxO18c9[26]));} ;} else {try{element[OxO18c9[21]]=inp_width[OxO18c9[11]];element[OxO18c9[22]]=inp_height[OxO18c9[11]];} catch(er){alert(CE_GetStr(OxO18c9[26]));} ;} ;var Ox499=/[^a-z\d]/i;if(Ox499.test(inp_id.value)){alert(CE_GetStr(OxO18c9[27]));return ;} ;element[OxO18c9[23]]=sel_align[OxO18c9[11]];element[OxO18c9[16]]=inp_id[OxO18c9[11]];element[OxO18c9[24]]=sel_valign[OxO18c9[11]];element[OxO18c9[25]]=inp_tooltip[OxO18c9[11]];if(element[OxO18c9[16]]==OxO18c9[15]){element.removeAttribute(OxO18c9[16]);} ;if(element[OxO18c9[12]]==OxO18c9[15]){element.removeAttribute(OxO18c9[12]);} ;if(element[OxO18c9[17]]==OxO18c9[15]){element.removeAttribute(OxO18c9[17]);} ;if(element[OxO18c9[18]]==OxO18c9[15]){element.removeAttribute(OxO18c9[18]);} ;if(element[OxO18c9[7]]==OxO18c9[15]){element.removeAttribute(OxO18c9[7]);} ;if(element[OxO18c9[20]]==OxO18c9[15]){element.removeAttribute(OxO18c9[20]);} ;if(element[OxO18c9[20]]==OxO18c9[15]){element.removeAttribute(OxO18c9[28]);} ;if(element[OxO18c9[23]]==OxO18c9[15]){element.removeAttribute(OxO18c9[23]);} ;if(element[OxO18c9[24]]==OxO18c9[15]){element.removeAttribute(OxO18c9[29]);} ;if(element[OxO18c9[25]]==OxO18c9[15]){element.removeAttribute(OxO18c9[25]);} ;if(element[OxO18c9[21]]==OxO18c9[15]){element.removeAttribute(OxO18c9[21]);} ;if(element[OxO18c9[22]]==OxO18c9[15]){element.removeAttribute(OxO18c9[22]);} ;} ;inp_borderColor[OxO18c9[30]]=function inp_borderColor_onclick(){SelectColor(inp_borderColor);} ;inp_bgColor[OxO18c9[30]]=function inp_bgColor_onclick(){SelectColor(inp_bgColor);} ;inp_borderColorLight[OxO18c9[30]]=function inp_borderColorLight_onclick(){SelectColor(inp_borderColorLight);} ;inp_borderColorDark[OxO18c9[30]]=function inp_borderColorDark_onclick(){SelectColor(inp_borderColorDark);} ;