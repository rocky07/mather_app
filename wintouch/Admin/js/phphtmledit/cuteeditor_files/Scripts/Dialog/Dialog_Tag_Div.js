var OxO405b=["SetStyle","length","","GetStyle","GetText",":",";","cssText","tblBorderStyle","sel_style","sel_border","sel_part","bordercolor","bordercolor_Preview","inp_color","inp_color_Preview","inp_shade","inp_shade_Preview","inp_MarginLeft","inp_MarginRight","inp_MarginTop","inp_MarginBottom","inp_PaddingLeft","inp_PaddingRight","inp_PaddingTop","inp_PaddingBottom","inp_width","sel_width_unit","inp_height","sel_height_unit","inp_id","inp_class","sel_align","sel_textalign","sel_float","inp_tooltip","value","borderColor","style"," ","backgroundColor","color","id","className","width","height","inp_","sel_","_unit","selectedIndex","options","align","styleFloat","cssFloat","textAlign","title","borderWidth","borderLeftWidth","borderTopWidth","borderRightWidth","borderBottomWidth","borderLeftStyle","borderTopStyle","borderRightStyle","borderBottomStyle","none","border","-","red","paddingLeft","paddingRight","paddingTop","paddingBottom","marginLeft","marginRight","marginTop","marginBottom","ValidID","class","onclick"];function pause(Ox5a1){var Ox51f= new Date();var Ox5a2=Ox51f.getTime()+Ox5a1;while(true){Ox51f= new Date();if(Ox51f.getTime()>Ox5a2){return ;} ;} ;} ;function StyleClass(Ox320){var Ox5a4=[];var Ox5a5={};if(Ox320){Ox5aa();} ;this[OxO405b[0]]=function SetStyle(name,Ox246,Ox5a7){name=name.toLowerCase();for(var i=0;i<Ox5a4[OxO405b[1]];i++){if(Ox5a4[i]==name){break ;} ;} ;Ox5a4[i]=name;Ox5a5[name]=Ox246?(Ox246+(Ox5a7||OxO405b[2])):OxO405b[2];} ;this[OxO405b[3]]=function GetStyle(name){name=name.toLowerCase();return Ox5a5[name]||OxO405b[2];} ;this[OxO405b[4]]=function Ox5a9(){var Ox320=OxO405b[2];for(var i=0;i<Ox5a4[OxO405b[1]];i++){var Ox23a=Ox5a4[i];var p=Ox5a5[Ox23a];if(p){Ox320+=Ox23a+OxO405b[5]+p+OxO405b[6];} ;} ;return Ox320;} ;function Ox5aa(){var arr=Ox320.split(OxO405b[6]);for(var i=0;i<arr[OxO405b[1]];i++){var p=arr[i].split(OxO405b[5]);var Ox23a=p[0].replace(/^\s+/g,OxO405b[2]).replace(/\s+$/g,OxO405b[2]).toLowerCase();Ox5a4[Ox5a4[OxO405b[1]]]=Ox23a;Ox5a5[Ox23a]=p[1];} ;} ;} ;function GetStyle(Ox25d,name){return  new StyleClass(Ox25d.cssText).GetStyle(name);} ;function SetStyle(Ox25d,name,Ox246,Ox5ab){var Ox5ac= new StyleClass(Ox25d.cssText);Ox5ac.SetStyle(name,Ox246,Ox5ab);Ox25d[OxO405b[7]]=Ox5ac.GetText();} ;function ParseFloatToString(Oxe){if(!Oxe){return OxO405b[2];} ;var Ox2bb=parseFloat(Oxe);if(isNaN(Ox2bb)){return OxO405b[2];} ;return Ox2bb+OxO405b[2];} ;var tblBorderStyle=Window_GetElement(window,OxO405b[8],true);var sel_style=Window_GetElement(window,OxO405b[9],true);var sel_border=Window_GetElement(window,OxO405b[10],true);var sel_part=Window_GetElement(window,OxO405b[11],true);var bordercolor=Window_GetElement(window,OxO405b[12],true);var bordercolor_Preview=Window_GetElement(window,OxO405b[13],true);var inp_color=Window_GetElement(window,OxO405b[14],true);var inp_color_Preview=Window_GetElement(window,OxO405b[15],true);var inp_shade=Window_GetElement(window,OxO405b[16],true);var inp_shade_Preview=Window_GetElement(window,OxO405b[17],true);var inp_MarginLeft=Window_GetElement(window,OxO405b[18],true);var inp_MarginRight=Window_GetElement(window,OxO405b[19],true);var inp_MarginTop=Window_GetElement(window,OxO405b[20],true);var inp_MarginBottom=Window_GetElement(window,OxO405b[21],true);var inp_PaddingLeft=Window_GetElement(window,OxO405b[22],true);var inp_PaddingRight=Window_GetElement(window,OxO405b[23],true);var inp_PaddingTop=Window_GetElement(window,OxO405b[24],true);var inp_PaddingBottom=Window_GetElement(window,OxO405b[25],true);var inp_width=Window_GetElement(window,OxO405b[26],true);var sel_width_unit=Window_GetElement(window,OxO405b[27],true);var inp_height=Window_GetElement(window,OxO405b[28],true);var sel_height_unit=Window_GetElement(window,OxO405b[29],true);var inp_id=Window_GetElement(window,OxO405b[30],true);var inp_class=Window_GetElement(window,OxO405b[31],true);var sel_align=Window_GetElement(window,OxO405b[32],true);var sel_textalign=Window_GetElement(window,OxO405b[33],true);var sel_float=Window_GetElement(window,OxO405b[34],true);var inp_tooltip=Window_GetElement(window,OxO405b[35],true);UpdateState=function UpdateState_Div(){} ;function doBorderStyle(Ox1f1){sel_style[OxO405b[36]]=Ox1f1;} ;function doPart(Ox1f1){sel_part[OxO405b[36]]=Ox1f1;} ;function doWidth(Ox1f1){sel_border[OxO405b[36]]=Ox1f1;} ;SyncToView=function SyncToView_Div(){if(Browser_IsWinIE()){bordercolor[OxO405b[36]]=element[OxO405b[38]][OxO405b[37]];} else {var arr=revertColor(element[OxO405b[38]].borderColor).split(OxO405b[39]);bordercolor[OxO405b[36]]=arr[0];} ;bordercolor[OxO405b[38]][OxO405b[40]]=bordercolor[OxO405b[36]];bordercolor_Preview[OxO405b[38]][OxO405b[40]]=bordercolor[OxO405b[36]];inp_color[OxO405b[36]]=revertColor(element[OxO405b[38]].color);inp_color[OxO405b[38]][OxO405b[40]]=element[OxO405b[38]][OxO405b[41]];inp_color_Preview[OxO405b[38]][OxO405b[40]]=element[OxO405b[38]][OxO405b[41]];inp_shade[OxO405b[36]]=revertColor(element[OxO405b[38]].backgroundColor);inp_shade[OxO405b[38]][OxO405b[40]]=element[OxO405b[38]][OxO405b[40]];inp_shade_Preview[OxO405b[38]][OxO405b[40]]=element[OxO405b[38]][OxO405b[40]];inp_id[OxO405b[36]]=element[OxO405b[42]];if(ParseFloatToString(element[OxO405b[38]].marginLeft)){inp_MarginLeft[OxO405b[36]]=ParseFloatToString(element[OxO405b[38]].marginLeft);} ;if(ParseFloatToString(element[OxO405b[38]].marginRight)){inp_MarginRight[OxO405b[36]]=ParseFloatToString(element[OxO405b[38]].marginRight);} ;if(ParseFloatToString(element[OxO405b[38]].marginTop)){inp_MarginTop[OxO405b[36]]=ParseFloatToString(element[OxO405b[38]].marginTop);} ;if(ParseFloatToString(element[OxO405b[38]].marginBottom)){inp_MarginBottom[OxO405b[36]]=ParseFloatToString(element[OxO405b[38]].marginBottom);} ;if(ParseFloatToString(element[OxO405b[38]].paddingLeft)){inp_PaddingLeft[OxO405b[36]]=ParseFloatToString(element[OxO405b[38]].paddingLeft);} ;if(ParseFloatToString(element[OxO405b[38]].paddingRight)){inp_PaddingRight[OxO405b[36]]=ParseFloatToString(element[OxO405b[38]].paddingRight);} ;if(ParseFloatToString(element[OxO405b[38]].paddingTop)){inp_PaddingTop[OxO405b[36]]=ParseFloatToString(element[OxO405b[38]].paddingTop);} ;if(ParseFloatToString(element[OxO405b[38]].paddingBottom)){inp_PaddingBottom[OxO405b[36]]=ParseFloatToString(element[OxO405b[38]].paddingBottom);} ;inp_class[OxO405b[36]]=element[OxO405b[43]];var arr=[OxO405b[44],OxO405b[45]];for(var Ox31c=0;Ox31c<arr[OxO405b[1]];Ox31c++){var Ox23a=arr[Ox31c];var Ox275=Window_GetElement(window,OxO405b[46]+Ox23a,true);var Ox1f1=Window_GetElement(window,OxO405b[47]+Ox23a+OxO405b[48],true);Ox1f1[OxO405b[49]]=0;if(ParseFloatToString(element[OxO405b[38]][Ox23a])){Ox275[OxO405b[36]]=ParseFloatToString(element[OxO405b[38]][Ox23a]);for(var i=0;i<Ox1f1[OxO405b[50]][OxO405b[1]];i++){var Ox267=Ox1f1[OxO405b[50]][i][OxO405b[36]];if(Ox267&&element[OxO405b[38]][Ox23a].indexOf(Ox267)!=-1){Ox1f1[OxO405b[49]]=i;break ;} ;} ;} ;} ;sel_align[OxO405b[36]]=element[OxO405b[51]];if(Browser_IsWinIE()){sel_float[OxO405b[36]]=element[OxO405b[38]][OxO405b[52]];} else {sel_float[OxO405b[36]]=element[OxO405b[38]][OxO405b[53]];} ;sel_textalign[OxO405b[36]]=element[OxO405b[38]][OxO405b[54]];inp_tooltip[OxO405b[36]]=element[OxO405b[55]];try{sel_border[OxO405b[36]]=element[OxO405b[38]][OxO405b[56]];if(element[OxO405b[38]][OxO405b[57]]==element[OxO405b[38]][OxO405b[58]]&&element[OxO405b[38]][OxO405b[57]]==element[OxO405b[38]][OxO405b[59]]&&element[OxO405b[38]][OxO405b[57]]==element[OxO405b[38]][OxO405b[60]]){sel_border[OxO405b[36]]=element[OxO405b[38]][OxO405b[57]];} ;if(element[OxO405b[38]][OxO405b[61]]==element[OxO405b[38]][OxO405b[62]]&&element[OxO405b[38]][OxO405b[61]]==element[OxO405b[38]][OxO405b[63]]&&element[OxO405b[38]][OxO405b[61]]==element[OxO405b[38]][OxO405b[64]]){sel_style[OxO405b[36]]=element[OxO405b[38]][OxO405b[61]];} ;} catch(x){} ;} ;SyncTo=function SyncTo_Div(element){var Ox5c5=sel_part[OxO405b[36]];if(Ox5c5==OxO405b[65]){element[OxO405b[38]][OxO405b[66]]=OxO405b[65];} else {var Ox5c6=Ox5c5?OxO405b[67]+Ox5c5:Ox5c5;var Ox253=OxO405b[68];var Ox25d=sel_style[OxO405b[36]]||OxO405b[2];var Ox5c7=sel_border[OxO405b[36]];element[OxO405b[38]][OxO405b[66]]=OxO405b[65];if(Ox5c7||Ox25d){SetStyle(element.style,OxO405b[66]+Ox5c6,Ox5c7+OxO405b[39]+Ox25d+OxO405b[39]+Ox253);} else {SetStyle(element.style,OxO405b[66]+Ox5c6,OxO405b[2]);} ;SetStyle(element.style,OxO405b[66]+Ox5c6,Ox5c7+OxO405b[39]+Ox25d+OxO405b[39]+Ox253);} ;try{element[OxO405b[38]][OxO405b[41]]=inp_color[OxO405b[36]]||OxO405b[2];} catch(x){element[OxO405b[38]][OxO405b[41]]=OxO405b[2];} ;try{element[OxO405b[38]][OxO405b[40]]=inp_shade[OxO405b[36]]||OxO405b[2];} catch(x){element[OxO405b[38]][OxO405b[40]]=OxO405b[2];} ;try{element[OxO405b[38]][OxO405b[37]]=bordercolor[OxO405b[36]]||OxO405b[2];} catch(x){element[OxO405b[38]][OxO405b[37]]=OxO405b[2];} ;element[OxO405b[38]][OxO405b[69]]=inp_PaddingLeft[OxO405b[36]];element[OxO405b[38]][OxO405b[70]]=inp_PaddingRight[OxO405b[36]];element[OxO405b[38]][OxO405b[71]]=inp_PaddingTop[OxO405b[36]];element[OxO405b[38]][OxO405b[72]]=inp_PaddingBottom[OxO405b[36]];element[OxO405b[38]][OxO405b[73]]=inp_MarginLeft[OxO405b[36]];element[OxO405b[38]][OxO405b[74]]=inp_MarginRight[OxO405b[36]];element[OxO405b[38]][OxO405b[75]]=inp_MarginTop[OxO405b[36]];element[OxO405b[38]][OxO405b[76]]=inp_MarginBottom[OxO405b[36]];element[OxO405b[43]]=inp_class[OxO405b[36]];var arr=[OxO405b[44],OxO405b[45]];for(var Ox31c=0;Ox31c<arr[OxO405b[1]];Ox31c++){var Ox23a=arr[Ox31c];var Ox275=Window_GetElement(window,OxO405b[46]+Ox23a,true);var Ox5c8=Window_GetElement(window,OxO405b[47]+Ox23a+OxO405b[48],true);if(ParseFloatToString(Ox275.value)){element[OxO405b[38]][Ox23a]=ParseFloatToString(Ox275.value)+Ox5c8[OxO405b[36]];} else {element[OxO405b[38]][Ox23a]=OxO405b[2];} ;} ;var Ox499=/[^a-z\d]/i;if(Ox499.test(inp_id.value)){alert(CE_GetStr(OxO405b[77]));return ;} ;element[OxO405b[51]]=sel_align[OxO405b[36]];element[OxO405b[42]]=inp_id[OxO405b[36]];if(Browser_IsWinIE()){element[OxO405b[38]][OxO405b[52]]=sel_float[OxO405b[36]];} else {element[OxO405b[38]][OxO405b[53]]=sel_float[OxO405b[36]];} ;element[OxO405b[38]][OxO405b[54]]=sel_textalign[OxO405b[36]];element[OxO405b[55]]=inp_tooltip[OxO405b[36]];if(element[OxO405b[55]]==OxO405b[2]){element.removeAttribute(OxO405b[55]);} ;if(element[OxO405b[43]]==OxO405b[2]){element.removeAttribute(OxO405b[43]);} ;if(element[OxO405b[43]]==OxO405b[2]){element.removeAttribute(OxO405b[78]);} ;if(element[OxO405b[51]]==OxO405b[2]){element.removeAttribute(OxO405b[51]);} ;if(element[OxO405b[42]]==OxO405b[2]){element.removeAttribute(OxO405b[42]);} ;} ;bordercolor[OxO405b[79]]=bordercolor_Preview[OxO405b[79]]=function bordercolor_onclick(){SelectColor(bordercolor,bordercolor_Preview);} ;inp_color[OxO405b[79]]=inp_color_Preview[OxO405b[79]]=function inp_color_onclick(){SelectColor(inp_color,inp_color_Preview);} ;inp_shade[OxO405b[79]]=inp_shade_Preview[OxO405b[79]]=function inp_shade_onclick(){SelectColor(inp_shade,inp_shade_Preview);} ;