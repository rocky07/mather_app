var OxO8e0b=["","sel_position","sel_display","sel_float","sel_clear","tb_top","sel_top_unit","tb_height","sel_height_unit","tb_left","sel_left_unit","tb_width","sel_width_unit","tb_cliptop","sel_cliptop_unit","tb_clipbottom","sel_clipbottom_unit","tb_clipleft","sel_clipleft_unit","tb_clipright","sel_clipright_unit","sel_overflow","tb_zindex","sel_pagebreakbefore","sel_pagebreakafter","outer","div_demo","cssText","style","value","position","display","styleFloat","cssFloat","clear","left","top","width","height","length","tb_","sel_","_unit","selectedIndex","options","right","bottom","clip","tb_clip","sel_clip","currentStyle","overflow","zIndex","pageBreakBefore","pageBreakAfter"];function ParseFloatToString(Oxe){var Ox2bb=parseFloat(Oxe);if(isNaN(Ox2bb)){return OxO8e0b[0];} ;return Ox2bb+OxO8e0b[0];} ;var sel_position=Window_GetElement(window,OxO8e0b[1],true);var sel_display=Window_GetElement(window,OxO8e0b[2],true);var sel_float=Window_GetElement(window,OxO8e0b[3],true);var sel_clear=Window_GetElement(window,OxO8e0b[4],true);var tb_top=Window_GetElement(window,OxO8e0b[5],true);var sel_top_unit=Window_GetElement(window,OxO8e0b[6],true);var tb_height=Window_GetElement(window,OxO8e0b[7],true);var sel_height_unit=Window_GetElement(window,OxO8e0b[8],true);var tb_left=Window_GetElement(window,OxO8e0b[9],true);var sel_left_unit=Window_GetElement(window,OxO8e0b[10],true);var tb_width=Window_GetElement(window,OxO8e0b[11],true);var sel_width_unit=Window_GetElement(window,OxO8e0b[12],true);var tb_cliptop=Window_GetElement(window,OxO8e0b[13],true);var sel_cliptop_unit=Window_GetElement(window,OxO8e0b[14],true);var tb_clipbottom=Window_GetElement(window,OxO8e0b[15],true);var sel_clipbottom_unit=Window_GetElement(window,OxO8e0b[16],true);var tb_clipleft=Window_GetElement(window,OxO8e0b[17],true);var sel_clipleft_unit=Window_GetElement(window,OxO8e0b[18],true);var tb_clipright=Window_GetElement(window,OxO8e0b[19],true);var sel_clipright_unit=Window_GetElement(window,OxO8e0b[20],true);var sel_overflow=Window_GetElement(window,OxO8e0b[21],true);var tb_zindex=Window_GetElement(window,OxO8e0b[22],true);var sel_pagebreakbefore=Window_GetElement(window,OxO8e0b[23],true);var sel_pagebreakafter=Window_GetElement(window,OxO8e0b[24],true);var outer=Window_GetElement(window,OxO8e0b[25],true);var div_demo=Window_GetElement(window,OxO8e0b[26],true);UpdateState=function UpdateState_Layout(){div_demo[OxO8e0b[28]][OxO8e0b[27]]=element[OxO8e0b[28]][OxO8e0b[27]];} ;SyncToView=function SyncToView_Layout(){sel_position[OxO8e0b[29]]=element[OxO8e0b[28]][OxO8e0b[30]];sel_display[OxO8e0b[29]]=element[OxO8e0b[28]][OxO8e0b[31]];if(Browser_IsWinIE()){sel_float[OxO8e0b[29]]=element[OxO8e0b[28]][OxO8e0b[32]];} else {sel_float[OxO8e0b[29]]=element[OxO8e0b[28]][OxO8e0b[33]];} ;sel_clear[OxO8e0b[29]]=element[OxO8e0b[28]][OxO8e0b[34]];var arr=[OxO8e0b[35],OxO8e0b[36],OxO8e0b[37],OxO8e0b[38]];for(var Ox31c=0;Ox31c<arr[OxO8e0b[39]];Ox31c++){var Ox23a=arr[Ox31c];var Ox275=document.getElementById(OxO8e0b[40]+Ox23a);var Ox1f1=document.getElementById(OxO8e0b[41]+Ox23a+OxO8e0b[42]);Ox1f1[OxO8e0b[43]]=0;if(ParseFloatToString(element[OxO8e0b[28]][Ox23a])){Ox275[OxO8e0b[29]]=ParseFloatToString(element[OxO8e0b[28]][Ox23a]);for(var i=0;i<Ox1f1[OxO8e0b[44]][OxO8e0b[39]];i++){var Ox267=Ox1f1[OxO8e0b[44]][i][OxO8e0b[29]];if(Ox267&&element[OxO8e0b[28]][Ox23a].indexOf(Ox267)!=-1){Ox1f1[OxO8e0b[43]]=i;break ;} ;} ;} ;} ;var arr=[OxO8e0b[35],OxO8e0b[36],OxO8e0b[45],OxO8e0b[46]];for(var Ox31c=0;Ox31c<arr[OxO8e0b[39]];Ox31c++){var Ox23a=arr[Ox31c];var Ox703=OxO8e0b[47]+Ox23a.charAt(0).toUpperCase()+Ox23a.substring(1);var Ox275=document.getElementById(OxO8e0b[48]+Ox23a);var Ox1f1=document.getElementById(OxO8e0b[49]+Ox23a+OxO8e0b[42]);Ox1f1[OxO8e0b[43]]=0;var Ox704;if(Browser_IsWinIE()){Ox704=element[OxO8e0b[50]][Ox703];} else {Ox704=element[OxO8e0b[28]][Ox703];} ;if(ParseFloatToString(Ox704)){Ox275[OxO8e0b[29]]=ParseFloatToString(Ox704);for(var i=0;i<Ox1f1[OxO8e0b[44]][OxO8e0b[39]];i++){var Ox267=Ox1f1[OxO8e0b[44]][i][OxO8e0b[29]];if(Ox267&&Ox704.indexOf(Ox267)!=-1){Ox1f1[OxO8e0b[43]]=i;break ;} ;} ;} ;} ;sel_overflow[OxO8e0b[29]]=element[OxO8e0b[28]][OxO8e0b[51]];tb_zindex[OxO8e0b[29]]=element[OxO8e0b[28]][OxO8e0b[52]];sel_pagebreakbefore[OxO8e0b[29]]=element[OxO8e0b[28]][OxO8e0b[53]];sel_pagebreakafter[OxO8e0b[29]]=element[OxO8e0b[28]][OxO8e0b[54]];} ;SyncTo=function SyncTo_Layout(element){element[OxO8e0b[28]][OxO8e0b[30]]=sel_position[OxO8e0b[29]];element[OxO8e0b[28]][OxO8e0b[31]]=sel_display[OxO8e0b[29]];if(Browser_IsWinIE()){element[OxO8e0b[28]][OxO8e0b[32]]=sel_float[OxO8e0b[29]];} else {element[OxO8e0b[28]][OxO8e0b[33]]=sel_float[OxO8e0b[29]];} ;element[OxO8e0b[28]][OxO8e0b[34]]=sel_clear[OxO8e0b[29]];var arr=[OxO8e0b[35],OxO8e0b[36],OxO8e0b[37],OxO8e0b[38]];for(var Ox31c=0;Ox31c<arr[OxO8e0b[39]];Ox31c++){var Ox23a=arr[Ox31c];var Ox275=document.getElementById(OxO8e0b[40]+Ox23a);if(ParseFloatToString(Ox275.value)){element[OxO8e0b[28]][Ox23a]=ParseFloatToString(Ox275.value)+document.all(OxO8e0b[41]+Ox23a+OxO8e0b[42])[OxO8e0b[29]];} else {element[OxO8e0b[28]][Ox23a]=OxO8e0b[0];} ;} ;var arr=[OxO8e0b[35],OxO8e0b[36],OxO8e0b[45],OxO8e0b[46]];for(var Ox31c=0;Ox31c<arr[OxO8e0b[39]];Ox31c++){var Ox23a=arr[Ox31c];var Ox703=OxO8e0b[47]+Ox23a.charAt(0).toUpperCase()+Ox23a.substring(1);var Ox275=document.getElementById(OxO8e0b[48]+Ox23a);if(ParseFloatToString(Ox275.value)){element[OxO8e0b[28]][Ox703]=ParseFloatToString(Ox275.value)+document.all(OxO8e0b[49]+Ox23a+OxO8e0b[42])[OxO8e0b[29]];} else {element[OxO8e0b[28]][Ox703]=OxO8e0b[0];} ;} ;element[OxO8e0b[28]][OxO8e0b[51]]=sel_overflow[OxO8e0b[29]];element[OxO8e0b[28]][OxO8e0b[52]]=ParseFloatToString(tb_zindex.value);element[OxO8e0b[28]][OxO8e0b[53]]=sel_pagebreakbefore[OxO8e0b[29]];element[OxO8e0b[28]][OxO8e0b[54]]=sel_pagebreakafter[OxO8e0b[29]];} ;