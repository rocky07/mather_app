var OxOa231=["SetStyle","length","","GetStyle","GetText",":",";","cssText","sel_font","div_font_detail","sel_fontfamily","cb_decoration_under","cb_decoration_over","cb_decoration_through","cb_style_bold","cb_style_italic","sel_fontTransform","sel_fontsize","inp_fontsize","sel_fontsize_unit","inp_color","inp_color_Preview","outer","div_demo","disabled","selectedIndex","style","value","font","fontFamily","color","backgroundColor","textDecoration","checked","overline","underline","line-through","fontWeight","bold","fontStyle","italic","fontSize","options","textTransform","font-family","overline ","underline ","line-through ","onclick"];function pause(Ox5a1){var Ox51f= new Date();var Ox5a2=Ox51f.getTime()+Ox5a1;while(true){Ox51f= new Date();if(Ox51f.getTime()>Ox5a2){return ;} ;} ;} ;function StyleClass(Ox320){var Ox5a4=[];var Ox5a5={};if(Ox320){Ox5aa();} ;this[OxOa231[0]]=function SetStyle(name,Ox246,Ox5a7){name=name.toLowerCase();for(var i=0;i<Ox5a4[OxOa231[1]];i++){if(Ox5a4[i]==name){break ;} ;} ;Ox5a4[i]=name;Ox5a5[name]=Ox246?(Ox246+(Ox5a7||OxOa231[2])):OxOa231[2];} ;this[OxOa231[3]]=function GetStyle(name){name=name.toLowerCase();return Ox5a5[name]||OxOa231[2];} ;this[OxOa231[4]]=function Ox5a9(){var Ox320=OxOa231[2];for(var i=0;i<Ox5a4[OxOa231[1]];i++){var Ox23a=Ox5a4[i];var p=Ox5a5[Ox23a];if(p){Ox320+=Ox23a+OxOa231[5]+p+OxOa231[6];} ;} ;return Ox320;} ;function Ox5aa(){var arr=Ox320.split(OxOa231[6]);for(var i=0;i<arr[OxOa231[1]];i++){var p=arr[i].split(OxOa231[5]);var Ox23a=p[0].replace(/^\s+/g,OxOa231[2]).replace(/\s+$/g,OxOa231[2]).toLowerCase();Ox5a4[Ox5a4[OxOa231[1]]]=Ox23a;Ox5a5[Ox23a]=p[1];} ;} ;} ;function GetStyle(Ox25d,name){return  new StyleClass(Ox25d.cssText).GetStyle(name);} ;function SetStyle(Ox25d,name,Ox246,Ox5ab){var Ox5ac= new StyleClass(Ox25d.cssText);Ox5ac.SetStyle(name,Ox246,Ox5ab);Ox25d[OxOa231[7]]=Ox5ac.GetText();} ;function ParseFloatToString(Oxe){var Ox2bb=parseFloat(Oxe);if(isNaN(Ox2bb)){return OxOa231[2];} ;return Ox2bb+OxOa231[2];} ;var sel_font=Window_GetElement(window,OxOa231[8],true);var div_font_detail=Window_GetElement(window,OxOa231[9],true);var sel_fontfamily=Window_GetElement(window,OxOa231[10],true);var cb_decoration_under=Window_GetElement(window,OxOa231[11],true);var cb_decoration_over=Window_GetElement(window,OxOa231[12],true);var cb_decoration_through=Window_GetElement(window,OxOa231[13],true);var cb_style_bold=Window_GetElement(window,OxOa231[14],true);var cb_style_italic=Window_GetElement(window,OxOa231[15],true);var sel_fontTransform=Window_GetElement(window,OxOa231[16],true);var sel_fontsize=Window_GetElement(window,OxOa231[17],true);var inp_fontsize=Window_GetElement(window,OxOa231[18],true);var sel_fontsize_unit=Window_GetElement(window,OxOa231[19],true);var inp_color=Window_GetElement(window,OxOa231[20],true);var inp_color_Preview=Window_GetElement(window,OxOa231[21],true);var outer=Window_GetElement(window,OxOa231[22],true);var div_demo=Window_GetElement(window,OxOa231[23],true);UpdateState=function UpdateState_Font(){inp_fontsize[OxOa231[24]]=sel_fontsize_unit[OxOa231[24]]=(sel_fontsize[OxOa231[25]]>0);div_font_detail[OxOa231[24]]=sel_font[OxOa231[25]]>0;div_demo[OxOa231[26]][OxOa231[7]]=element[OxOa231[26]][OxOa231[7]];} ;SyncToView=function SyncToView_Font(){sel_font[OxOa231[27]]=element[OxOa231[26]][OxOa231[28]].toLowerCase()||null;sel_fontfamily[OxOa231[27]]=element[OxOa231[26]][OxOa231[29]];inp_color[OxOa231[27]]=element[OxOa231[26]][OxOa231[30]];inp_color[OxOa231[26]][OxOa231[31]]=inp_color[OxOa231[27]];var Ox6e6=element[OxOa231[26]][OxOa231[32]].toLowerCase();cb_decoration_over[OxOa231[33]]=Ox6e6.indexOf(OxOa231[34])!=-1;cb_decoration_under[OxOa231[33]]=Ox6e6.indexOf(OxOa231[35])!=-1;cb_decoration_through[OxOa231[33]]=Ox6e6.indexOf(OxOa231[36])!=-1;cb_style_bold[OxOa231[33]]=element[OxOa231[26]][OxOa231[37]]==OxOa231[38];cb_style_italic[OxOa231[33]]=element[OxOa231[26]][OxOa231[39]]==OxOa231[40];sel_fontsize[OxOa231[27]]=element[OxOa231[26]][OxOa231[41]];sel_fontsize_unit[OxOa231[25]]=0;if(sel_fontsize[OxOa231[25]]==-1){if(ParseFloatToString(element[OxOa231[26]].fontSize)){sel_fontsize[OxOa231[27]]=ParseFloatToString(element[OxOa231[26]].fontSize);for(var i=0;i<sel_fontsize_unit[OxOa231[42]][OxOa231[1]];i++){var Ox267=sel_fontsize_unit.options(i)[OxOa231[27]];if(Ox267&&element[OxOa231[26]][OxOa231[41]].indexOf(Ox267)!=-1){sel_fontsize_unit[OxOa231[25]]=i;break ;} ;} ;} ;} ;sel_fontTransform[OxOa231[27]]=element[OxOa231[26]][OxOa231[43]];} ;SyncTo=function SyncTo_Font(element){SetStyle(element.style,OxOa231[28],sel_font.value);if(sel_fontfamily[OxOa231[27]]){element[OxOa231[26]][OxOa231[29]]=sel_fontfamily[OxOa231[27]];} else {SetStyle(element.style,OxOa231[44],OxOa231[2]);} ;try{element[OxOa231[26]][OxOa231[30]]=inp_color[OxOa231[27]]||OxOa231[2];} catch(x){element[OxOa231[26]][OxOa231[30]]=OxOa231[2];} ;var Ox6e8=cb_decoration_over[OxOa231[33]];var Ox6e9=cb_decoration_under[OxOa231[33]];var Ox6ea=cb_decoration_through[OxOa231[33]];if(!Ox6e8&&!Ox6e9&&!Ox6ea){element[OxOa231[26]][OxOa231[32]]=OxOa231[2];} else {var Ox22f=OxOa231[2];if(Ox6e8){Ox22f+=OxOa231[45];} ;if(Ox6e9){Ox22f+=OxOa231[46];} ;if(Ox6ea){Ox22f+=OxOa231[47];} ;element[OxOa231[26]][OxOa231[32]]=Ox22f.substr(0,Ox22f[OxOa231[1]]-1);} ;element[OxOa231[26]][OxOa231[37]]=cb_style_bold[OxOa231[33]]?OxOa231[38]:OxOa231[2];element[OxOa231[26]][OxOa231[39]]=cb_style_italic[OxOa231[33]]?OxOa231[40]:OxOa231[2];element[OxOa231[26]][OxOa231[43]]=sel_fontTransform[OxOa231[27]]||OxOa231[2];if(sel_fontsize[OxOa231[25]]>0){element[OxOa231[26]][OxOa231[41]]=sel_fontsize[OxOa231[27]];} else {if(ParseFloatToString(inp_fontsize.value)){element[OxOa231[26]][OxOa231[41]]=ParseFloatToString(inp_fontsize.value)+sel_fontsize_unit[OxOa231[27]];} else {element[OxOa231[26]][OxOa231[41]]=OxOa231[2];} ;} ;} ;inp_color[OxOa231[48]]=inp_color_Preview[OxOa231[48]]=function inp_color_onclick(){SelectColor(inp_color,inp_color_Preview);} ;