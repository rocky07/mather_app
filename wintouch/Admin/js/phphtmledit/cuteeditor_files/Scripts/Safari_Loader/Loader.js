var OxOcd59=["ua","userAgent","isOpera","opera","isSafari","safari","isGecko","gecko","isWinIE","msie","compatMode","document","CSS1Compat","head","script","language","javascript","type","text/javascript","src","id","undefined","Microsoft.XMLHTTP","readyState","onreadystatechange","","length","all","childNodes","nodeType","\x0D\x0A","caller","onchange","oninitialized","command","commandui","commandvalue","returnValue","oncommand","string","_fireEventFunction","event","parentNode","_IsCuteEditor","True","readOnly","_IsRichDropDown","null","value","selectedIndex","nodeName","TR","cells","display","style","nextSibling","innerHTML","\x3Cimg src=\x22","/Images/t-minus.gif\x22\x3E","onclick","CuteEditor_CollapseTreeDropDownItem(this,\x22","\x22)","onmousedown","none","/Images/t-plus.gif\x22\x3E","CuteEditor_ExpandTreeDropDownItem(this,\x22","contains","UNSELECTABLE","on","tabIndex","-1","//TODO: event not found? throw error ?","contentWindow","contentDocument","parentWindow","frames","frameElement","//TODO:frame contentWindow not found?","preventDefault","arguments","parent","top","opener","srcElement","target","//TODO: srcElement not found? throw error ?","fromElement","relatedTarget","toElement","keyCode","clientX","clientY","offsetX","offsetY","button","ctrlKey","altKey","shiftKey","cancelBubble","stopPropagation",";CuteEditor_GetEditor(this).ExecImageCommand(this.getAttribute(\x27Command\x27),this.getAttribute(\x27CommandUI\x27),this.getAttribute(\x27CommandArgument\x27))","this.onmouseout();CuteEditor_GetEditor(this).DropMenu(this.getAttribute(\x27Group\x27),this)","ResourceDir","Theme","/Themes/","/Images/all.png","/Images/blank2020.png","IMG","alt","title","Command","Group","ThemeIndex","width","20px","height","backgroundImage","url(",")","backgroundPosition","0 -","px","onload","className","separator","CuteEditorButton","onmouseover","CuteEditor_ButtonCommandOver(this)","onmouseout","CuteEditor_ButtonCommandOut(this)","CuteEditor_ButtonCommandDown(this)","onmouseup","CuteEditor_ButtonCommandUp(this)","oncontextmenu","ondragstart","ondblclick","_ToolBarID","_CodeViewToolBarID","_FrameID"," CuteEditorFrame"," CuteEditorToolbar","cursor","no-drop","ActiveTab","Edit","Code","View","buttonInitialized","isover","CuteEditorButtonOver","CuteEditorButtonDown","CuteEditorDown","border","solid 1px #0A246A","backgroundColor","#b6bdd2","padding","1px","solid 1px #f5f5f4","inset 1px","IsCommandDisabled","CuteEditorButtonDisabled","IsCommandActive","CuteEditorButtonActive","cmd_fromfullpage","(","href","location",",DanaInfo=",",","+","scriptProperties","GetScriptProperty","/Scripts/Safar_Implementation/CuteEditorImplementation.js?i=1","CuteEditorImplementation","function","GET","\x26getModified=1","status","Failed to load impl time!","Failed to load impl code!","body","InitializeCode","block","contentEditable"," \x3Cbr /\x3E ","designMode","/Scripts/resource.php","?type=license\x26_ver=","Failed to load editor license data.","responseText","0","1","2","3","4","5","6","7","8","9","A","B","C","D","E","F","0000000000000840",";","/",":","//",".","www","?type=serverip\x26_ver=","Failed to load editor license info!","You are using an incorrect license file.","Invalid lcparts count:","Invalid product version.","Invalid license type.","(0) license expired!","(0) only localhost!","(1) host not match!","(2) ip not match!","(3) host not match!","(4) license expired!","License Error : ","CuteEditorInitialize"];var _Browser_TypeInfo=null;function Browser__InitType(){if(_Browser_TypeInfo!=null){return ;} ;var Ox34e={};Ox34e[OxOcd59[0]]=navigator[OxOcd59[1]].toLowerCase();Ox34e[OxOcd59[2]]=(Ox34e[OxOcd59[0]].indexOf(OxOcd59[3])>-1);Ox34e[OxOcd59[4]]=(Ox34e[OxOcd59[0]].indexOf(OxOcd59[5])>-1);Ox34e[OxOcd59[6]]=(!Ox34e[OxOcd59[2]]&&!Ox34e[OxOcd59[4]]&&Ox34e[OxOcd59[0]].indexOf(OxOcd59[7])>-1);Ox34e[OxOcd59[8]]=(!Ox34e[OxOcd59[2]]&&Ox34e[OxOcd59[0]].indexOf(OxOcd59[9])>-1);_Browser_TypeInfo=Ox34e;} ;Browser__InitType();function Browser_IsWinIE(){return _Browser_TypeInfo[OxOcd59[8]];} ;function Browser_IsGecko(){return _Browser_TypeInfo[OxOcd59[6]];} ;function Browser_IsOpera(){return _Browser_TypeInfo[OxOcd59[2]];} ;function Browser_IsSafari(){return _Browser_TypeInfo[OxOcd59[4]];} ;function Browser_UseIESelection(){return _Browser_TypeInfo[OxOcd59[8]];} ;function Browser_IsCSS1Compat(){return window[OxOcd59[11]][OxOcd59[10]]==OxOcd59[12];} ;function include(Oxb56,Ox4c1){var Oxb57=document.getElementsByTagName(OxOcd59[13]).item(0);var Oxb58=document.getElementById(Oxb56);if(Oxb58){Oxb57.removeChild(Oxb58);} ;var Oxb59=document.createElement(OxOcd59[14]);Oxb59.setAttribute(OxOcd59[15],OxOcd59[16]);Oxb59.setAttribute(OxOcd59[17],OxOcd59[18]);Oxb59.setAttribute(OxOcd59[19],Ox4c1);Oxb59.setAttribute(OxOcd59[20],Oxb56);Oxb57.appendChild(Oxb59);} ;function CreateXMLHttpRequest(){try{if( typeof (XMLHttpRequest)!=OxOcd59[21]){return  new XMLHttpRequest();} ;if( typeof (ActiveXObject)!=OxOcd59[21]){return  new ActiveXObject(OxOcd59[22]);} ;} catch(x){return null;} ;} ;function LoadXMLAsync(Oxb5b,Ox4c1,Ox35a,Oxb5c){var Ox9c3=CreateXMLHttpRequest();function Oxb5d(){if(Ox9c3[OxOcd59[23]]!=4){return ;} ;Ox9c3[OxOcd59[24]]= new Function();var Ox3ad=Ox9c3;Ox9c3=null;if(Ox35a){Ox35a(Ox3ad);} ;} ;Ox9c3[OxOcd59[24]]=Oxb5d;Ox9c3.open(Oxb5b,Ox4c1,true);Ox9c3.send(Oxb5c||OxOcd59[25]);} ;function Element_GetAllElements(p){var arr=[];if(Browser_IsWinIE()){for(var i=0;i<p[OxOcd59[27]][OxOcd59[26]];i++){arr.push(p[OxOcd59[27]].item(i));} ;return arr;} ;Ox364(p);function Ox364(Oxd){var Ox365=Oxd[OxOcd59[28]];var Ox10=Ox365[OxOcd59[26]];for(var i=0;i<Ox10;i++){var Ox23a=Ox365.item(i);if(Ox23a[OxOcd59[29]]!=1){continue ;} ;arr.push(Ox23a);Ox364(Ox23a);} ;} ;return arr;} ;var __ISDEBUG=false;function Debug_Todo(msg){if(!__ISDEBUG){return ;} ;throw ( new Error(msg+OxOcd59[30]+Debug_Todo[OxOcd59[31]]));} ;function Window_GetElement(Ox2c6,Ox2e0,Ox362){var Oxd=Ox2c6[OxOcd59[11]].getElementById(Ox2e0);if(Oxd){return Oxd;} ;var Ox25b=Ox2c6[OxOcd59[11]].getElementsByName(Ox2e0);if(Ox25b[OxOcd59[26]]>0){return Ox25b.item(0);} ;return null;} ;function CuteEditor_AddMainMenuItems(Ox76c){} ;function CuteEditor_AddDropMenuItems(Ox76c,Ox773){} ;function CuteEditor_AddTagMenuItems(Ox76c,Ox775){} ;function CuteEditor_AddVerbMenuItems(Ox76c,Ox775){} ;function CuteEditor_OnInitialized(editor){} ;function CuteEditor_OnCommand(editor,Ox779,Ox77a,Ox246){} ;function CuteEditor_OnChange(editor){} ;function CuteEditor_FilterCode(editor,Ox38e){return Ox38e;} ;function CuteEditor_FilterHTML(editor,Ox3a4){return Ox3a4;} ;function CuteEditor_FireChange(editor){window.CuteEditor_OnChange(editor);CuteEditor_FireEvent(editor,OxOcd59[32],null);} ;function CuteEditor_FireInitialized(editor){window.CuteEditor_OnInitialized(editor);CuteEditor_FireEvent(editor,OxOcd59[33],null);} ;function CuteEditor_FireCommand(editor,Ox779,Ox77a,Ox246){var Ox263=window.CuteEditor_OnCommand(editor,Ox779,Ox77a,Ox246);if(Ox263==true){return true;} ;var Ox781={};Ox781[OxOcd59[34]]=Ox779;Ox781[OxOcd59[35]]=Ox77a;Ox781[OxOcd59[36]]=Ox246;Ox781[OxOcd59[37]]=true;CuteEditor_FireEvent(editor,OxOcd59[38],Ox781);if(Ox781[OxOcd59[37]]==false){return true;} ;} ;function CuteEditor_FireEvent(editor,Ox783,Ox784){if(Ox784==null){Ox784={};} ;var Ox785=editor.getAttribute(Ox783);if(Ox785){if( typeof (Ox785)==OxOcd59[39]){editor[OxOcd59[40]]= new Function(OxOcd59[41],Ox785);} else {editor[OxOcd59[40]]=Ox785;} ;editor._fireEventFunction(Ox784);} ;} ;function CuteEditor_GetEditor(element){for(var Ox275=element;Ox275!=null;Ox275=Ox275[OxOcd59[42]]){if(Ox275.getAttribute(OxOcd59[43])==OxOcd59[44]){return Ox275;} ;} ;return null;} ;function CuteEditor_DropDownCommand(element,Oxb5f){var editor=CuteEditor_GetEditor(element);if(editor[OxOcd59[45]]){return ;} ;if(element.getAttribute(OxOcd59[46])==OxOcd59[44]){var Ox267=element.GetValue();if(Ox267==OxOcd59[47]){Ox267=OxOcd59[25];} ;var Ox320=element.GetText();if(Ox320==OxOcd59[47]){Ox320=OxOcd59[25];} ;element.SetSelectedIndex(0);editor.ExecCommand(Oxb5f,false,Ox267,Ox320);} else {if(element[OxOcd59[48]]){var Ox267=element[OxOcd59[48]];if(Ox267==OxOcd59[47]){Ox267=OxOcd59[25];} ;element[OxOcd59[49]]=0;editor.ExecCommand(Oxb5f,false,Ox267,Ox320);} else {element[OxOcd59[49]]=0;} ;} ;editor.FocusDocument();} ;function CuteEditor_ExpandTreeDropDownItem(src,Ox858){var Ox304=null;while(src!=null){if(src[OxOcd59[50]]==OxOcd59[51]){Ox304=src;break ;} ;src=src[OxOcd59[42]];} ;var Ox16=Ox304[OxOcd59[52]].item(0);Ox304[OxOcd59[55]][OxOcd59[54]][OxOcd59[53]]=OxOcd59[25];Ox16[OxOcd59[56]]=OxOcd59[57]+Ox858+OxOcd59[58];Ox304[OxOcd59[59]]= new Function(OxOcd59[60]+Ox858+OxOcd59[61]);Ox304[OxOcd59[62]]= new Function(OxOcd59[60]+Ox858+OxOcd59[61]);} ;function CuteEditor_CollapseTreeDropDownItem(src,Ox858){var Ox304=null;while(src!=null){if(src[OxOcd59[50]]==OxOcd59[51]){Ox304=src;break ;} ;src=src[OxOcd59[42]];} ;var Ox16=Ox304[OxOcd59[52]].item(0);Ox304[OxOcd59[55]][OxOcd59[54]][OxOcd59[53]]=OxOcd59[63];Ox16[OxOcd59[56]]=OxOcd59[57]+Ox858+OxOcd59[64];Ox304[OxOcd59[59]]= new Function(OxOcd59[65]+Ox858+OxOcd59[61]);Ox304[OxOcd59[62]]= new Function(OxOcd59[65]+Ox858+OxOcd59[61]);} ;function Element_Contains(element,Ox29f){if(!Browser_IsOpera()){if(element[OxOcd59[66]]){return element.contains(Ox29f);} ;} ;for(;Ox29f!=null;Ox29f=Ox29f[OxOcd59[42]]){if(element==Ox29f){return true;} ;} ;return false;} ;function Element_SetUnselectable(element){element.setAttribute(OxOcd59[67],OxOcd59[68]);element.setAttribute(OxOcd59[69],OxOcd59[70]);var arr=Element_GetAllElements(element);var len=arr[OxOcd59[26]];if(!len){return ;} ;for(var i=0;i<len;i++){arr[i].setAttribute(OxOcd59[67],OxOcd59[68]);arr[i].setAttribute(OxOcd59[69],OxOcd59[70]);} ;} ;function Event_GetEvent(Ox368){Ox368=Event_FindEvent(Ox368);if(Ox368==null){Debug_Todo(OxOcd59[71]);} ;return Ox368;} ;function Frame_GetContentWindow(Ox469){if(Ox469[OxOcd59[72]]){return Ox469[OxOcd59[72]];} ;if(Ox469[OxOcd59[73]]){if(Ox469[OxOcd59[73]][OxOcd59[74]]){return Ox469[OxOcd59[73]][OxOcd59[74]];} ;} ;var Ox2c6;if(Ox469[OxOcd59[20]]){Ox2c6=window[OxOcd59[75]][Ox469[OxOcd59[20]]];if(Ox2c6){return Ox2c6;} ;} ;var len=window[OxOcd59[75]][OxOcd59[26]];for(var i=0;i<len;i++){Ox2c6=window[OxOcd59[75]][i];if(Ox2c6[OxOcd59[76]]==Ox469){return Ox2c6;} ;if(Ox2c6[OxOcd59[11]]==Ox469[OxOcd59[73]]){return Ox2c6;} ;} ;Debug_Todo(OxOcd59[77]);} ;function Array_IndexOf(arr,Ox36a){for(var i=0;i<arr[OxOcd59[26]];i++){if(arr[i]==Ox36a){return i;} ;} ;return -1;} ;function Array_Contains(arr,Ox36a){return Array_IndexOf(arr,Ox36a)!=-1;} ;function Event_FindEvent(Ox368){if(Ox368&&Ox368[OxOcd59[78]]){return Ox368;} ;if(Browser_IsGecko()){return Event_FindEvent_FindEventFromCallers();} else {if(window[OxOcd59[41]]){return window[OxOcd59[41]];} ;return Event_FindEvent_FindEventFromWindows();} ;return null;} ;function Event_FindEvent_FindEventFromCallers(){var Ox2ac=Event_GetEvent[OxOcd59[31]];for(var i=0;i<100;i++){if(!Ox2ac){break ;} ;var Ox368=Ox2ac[OxOcd59[79]][0];if(Ox368&&Ox368[OxOcd59[78]]){return Ox368;} ;Ox2ac=Ox2ac[OxOcd59[31]];} ;} ;function Event_FindEvent_FindEventFromWindows(){var arr=[];return Ox371(window);function Ox371(Ox2c6){if(Ox2c6==null){return null;} ;if(Ox2c6[OxOcd59[41]]){return Ox2c6[OxOcd59[41]];} ;if(Array_Contains(arr,Ox2c6)){return null;} ;arr.push(Ox2c6);var Ox372=[];if(Ox2c6[OxOcd59[80]]!=Ox2c6){Ox372.push(Ox2c6.parent);} ;if(Ox2c6[OxOcd59[81]]!=Ox2c6[OxOcd59[80]]){Ox372.push(Ox2c6.top);} ;if(Ox2c6[OxOcd59[82]]){Ox372.push(Ox2c6.opener);} ;for(var i=0;i<Ox2c6[OxOcd59[75]][OxOcd59[26]];i++){Ox372.push(Ox2c6[OxOcd59[75]][i]);} ;for(var i=0;i<Ox372[OxOcd59[26]];i++){try{var Ox368=Ox371(Ox372[i]);if(Ox368){return Ox368;} ;} catch(x){} ;} ;return null;} ;} ;function Event_GetSrcElement(Ox368){Ox368=Event_GetEvent(Ox368);if(Ox368[OxOcd59[83]]){return Ox368[OxOcd59[83]];} ;if(Ox368[OxOcd59[84]]){return Ox368[OxOcd59[84]];} ;Debug_Todo(OxOcd59[85]);return null;} ;function Event_GetFromElement(Ox368){Ox368=Event_GetEvent(Ox368);if(Ox368[OxOcd59[86]]){return Ox368[OxOcd59[86]];} ;if(Ox368[OxOcd59[87]]){return Ox368[OxOcd59[87]];} ;return null;} ;function Event_GetToElement(Ox368){Ox368=Event_GetEvent(Ox368);if(Ox368[OxOcd59[88]]){return Ox368[OxOcd59[88]];} ;if(Ox368[OxOcd59[87]]){return Ox368[OxOcd59[87]];} ;return null;} ;function Event_GetKeyCode(Ox368){Ox368=Event_GetEvent(Ox368);return Ox368[OxOcd59[89]];} ;function Event_GetClientX(Ox368){Ox368=Event_GetEvent(Ox368);return Ox368[OxOcd59[90]];} ;function Event_GetClientY(Ox368){Ox368=Event_GetEvent(Ox368);return Ox368[OxOcd59[91]];} ;function Event_GetOffsetX(Ox368){Ox368=Event_GetEvent(Ox368);return Ox368[OxOcd59[92]];} ;function Event_GetOffsetY(Ox368){Ox368=Event_GetEvent(Ox368);return Ox368[OxOcd59[93]];} ;function Event_IsLeftButton(Ox368){Ox368=Event_GetEvent(Ox368);if(Browser_IsWinIE()){return Ox368[OxOcd59[94]]==1;} ;if(Browser_IsGecko()){return Ox368[OxOcd59[94]]==0;} ;return Ox368[OxOcd59[94]]==0;} ;function Event_IsCtrlKey(Ox368){Ox368=Event_GetEvent(Ox368);return Ox368[OxOcd59[95]];} ;function Event_IsAltKey(Ox368){Ox368=Event_GetEvent(Ox368);return Ox368[OxOcd59[96]];} ;function Event_IsShiftKey(Ox368){Ox368=Event_GetEvent(Ox368);return Ox368[OxOcd59[97]];} ;function Event_PreventDefault(Ox368){Ox368=Event_GetEvent(Ox368);Ox368[OxOcd59[37]]=false;if(Ox368[OxOcd59[78]]){Ox368.preventDefault();} ;} ;function Event_CancelBubble(Ox368){Ox368=Event_GetEvent(Ox368);Ox368[OxOcd59[98]]=true;if(Ox368[OxOcd59[99]]){Ox368.stopPropagation();} ;return false;} ;function Event_CancelEvent(Ox368){Ox368=Event_GetEvent(Ox368);Event_PreventDefault(Ox368);return Event_CancelBubble(Ox368);} ;function CuteEditor_BasicInitialize(editor){var Ox7e4=Browser_IsOpera();var Ox821= new Function(OxOcd59[100]);var Oxb63= new Function(OxOcd59[101]);var Oxb64=editor.GetScriptProperty(OxOcd59[102]);var Oxb65=editor.GetScriptProperty(OxOcd59[103]);var Oxb66=Oxb64+OxOcd59[104]+Oxb65+OxOcd59[105];var Oxb67=Oxb64+OxOcd59[106];var images=editor.getElementsByTagName(OxOcd59[107]);var len=images[OxOcd59[26]];for(var i=0;i<len;i++){var img=images[i];if(img.getAttribute(OxOcd59[108])&&!img.getAttribute(OxOcd59[109])){img.setAttribute(OxOcd59[109],img.getAttribute(OxOcd59[108]));} ;var Ox25a=img.getAttribute(OxOcd59[110]);var Ox773=img.getAttribute(OxOcd59[111]);if(!(Ox25a||Ox773)){continue ;} ;var Oxb68=img.getAttribute(OxOcd59[112]);if(parseInt(Oxb68)>=0){img[OxOcd59[54]][OxOcd59[113]]=OxOcd59[114];img[OxOcd59[54]][OxOcd59[115]]=OxOcd59[114];img[OxOcd59[19]]=Oxb67;img[OxOcd59[54]][OxOcd59[116]]=OxOcd59[117]+Oxb66+OxOcd59[118];img[OxOcd59[54]][OxOcd59[119]]=OxOcd59[120]+(Oxb68*20)+OxOcd59[121];img[OxOcd59[54]][OxOcd59[53]]=OxOcd59[25];} ;if(!Ox25a&&!Ox773){if(Ox7e4){img[OxOcd59[122]]=CuteEditor_OperaHandleImageLoaded;} ;continue ;} ;if(img[OxOcd59[123]]!=OxOcd59[124]){img[OxOcd59[123]]=OxOcd59[125];img[OxOcd59[126]]= new Function(OxOcd59[127]);img[OxOcd59[128]]= new Function(OxOcd59[129]);img[OxOcd59[62]]= new Function(OxOcd59[130]);img[OxOcd59[131]]= new Function(OxOcd59[132]);} ;if(!img[OxOcd59[133]]){img[OxOcd59[133]]=Event_CancelEvent;} ;if(!img[OxOcd59[134]]){img[OxOcd59[134]]=Event_CancelEvent;} ;if(Ox25a){var Ox2ac=Ox821;if(img[OxOcd59[59]]==null){img[OxOcd59[59]]=Ox2ac;} ;if(img[OxOcd59[135]]==null){img[OxOcd59[135]]=Ox2ac;} ;} else {if(Ox773){if(img[OxOcd59[59]]==null){img[OxOcd59[59]]=Oxb63;} ;} ;} ;} ;var Ox88d=Window_GetElement(window,editor.GetScriptProperty(OxOcd59[136]),true);var Ox88e=Window_GetElement(window,editor.GetScriptProperty(OxOcd59[137]),true);var Ox88a=Window_GetElement(window,editor.GetScriptProperty(OxOcd59[138]),true);Ox88a[OxOcd59[123]]+=OxOcd59[139];Ox88d[OxOcd59[123]]+=OxOcd59[140];Ox88e[OxOcd59[123]]+=OxOcd59[140];Element_SetUnselectable(Ox88d);Element_SetUnselectable(Ox88e);try{editor[OxOcd59[54]][OxOcd59[141]]=OxOcd59[142];} catch(x){} ;var Ox90d=editor.GetScriptProperty(OxOcd59[143]);switch(Ox90d){case OxOcd59[144]:Ox88d[OxOcd59[54]][OxOcd59[53]]=OxOcd59[25];break ;;case OxOcd59[145]:Ox88e[OxOcd59[54]][OxOcd59[53]]=OxOcd59[25];break ;;case OxOcd59[146]:break ;;} ;} ;function CuteEditor_OperaHandleImageLoaded(){var img=this;if(img[OxOcd59[54]][OxOcd59[53]]){img[OxOcd59[54]][OxOcd59[53]]=OxOcd59[63];setTimeout(function Oxb6a(){img[OxOcd59[54]][OxOcd59[53]]=OxOcd59[25];} ,1);} ;} ;function CuteEditor_ButtonOver(element){if(!element[OxOcd59[147]]){element[OxOcd59[133]]=Event_CancelEvent;element[OxOcd59[128]]=CuteEditor_ButtonOut;element[OxOcd59[62]]=CuteEditor_ButtonDown;element[OxOcd59[131]]=CuteEditor_ButtonUp;Element_SetUnselectable(element);element[OxOcd59[147]]=true;} ;element[OxOcd59[148]]=true;element[OxOcd59[123]]=OxOcd59[149];} ;function CuteEditor_ButtonOut(){var element=this;element[OxOcd59[123]]=OxOcd59[125];element[OxOcd59[148]]=false;} ;function CuteEditor_ButtonDown(){if(!Event_IsLeftButton()){return ;} ;var element=this;element[OxOcd59[123]]=OxOcd59[150];} ;function CuteEditor_ButtonUp(){if(!Event_IsLeftButton()){return ;} ;var element=this;if(element[OxOcd59[148]]){element[OxOcd59[123]]=OxOcd59[149];} else {element[OxOcd59[123]]=OxOcd59[151];} ;} ;function CuteEditor_ColorPicker_ButtonOver(element){if(!element[OxOcd59[147]]){element[OxOcd59[133]]=Event_CancelEvent;element[OxOcd59[128]]=CuteEditor_ColorPicker_ButtonOut;element[OxOcd59[62]]=CuteEditor_ColorPicker_ButtonDown;Element_SetUnselectable(element);element[OxOcd59[147]]=true;} ;element[OxOcd59[148]]=true;element[OxOcd59[54]][OxOcd59[152]]=OxOcd59[153];element[OxOcd59[54]][OxOcd59[154]]=OxOcd59[155];element[OxOcd59[54]][OxOcd59[156]]=OxOcd59[157];} ;function CuteEditor_ColorPicker_ButtonOut(){var element=this;element[OxOcd59[148]]=false;element[OxOcd59[54]][OxOcd59[152]]=OxOcd59[158];element[OxOcd59[54]][OxOcd59[154]]=OxOcd59[25];element[OxOcd59[54]][OxOcd59[156]]=OxOcd59[157];} ;function CuteEditor_ColorPicker_ButtonDown(){var element=this;element[OxOcd59[54]][OxOcd59[152]]=OxOcd59[159];element[OxOcd59[54]][OxOcd59[154]]=OxOcd59[25];element[OxOcd59[54]][OxOcd59[156]]=OxOcd59[157];} ;function CuteEditor_ButtonCommandOver(element){element[OxOcd59[148]]=true;if(element[OxOcd59[160]]){element[OxOcd59[123]]=OxOcd59[161];} else {element[OxOcd59[123]]=OxOcd59[149];} ;} ;function CuteEditor_ButtonCommandOut(element){element[OxOcd59[148]]=false;if(element[OxOcd59[162]]){element[OxOcd59[123]]=OxOcd59[163];} else {if(element[OxOcd59[160]]){element[OxOcd59[123]]=OxOcd59[161];} else {if(element[OxOcd59[20]]!=OxOcd59[164]){element[OxOcd59[123]]=OxOcd59[125];} ;} ;} ;} ;function CuteEditor_ButtonCommandDown(element){if(!Event_IsLeftButton()){return ;} ;element[OxOcd59[123]]=OxOcd59[150];} ;function CuteEditor_ButtonCommandUp(element){if(!Event_IsLeftButton()){return ;} ;if(element[OxOcd59[160]]){element[OxOcd59[123]]=OxOcd59[161];return ;} ;if(element[OxOcd59[148]]){element[OxOcd59[123]]=OxOcd59[149];} else {if(element[OxOcd59[162]]){element[OxOcd59[123]]=OxOcd59[163];} else {element[OxOcd59[123]]=OxOcd59[125];} ;} ;} ;var CuteEditorGlobalFunctions=[CuteEditor_GetEditor,CuteEditor_ButtonOver,CuteEditor_ButtonOut,CuteEditor_ButtonDown,CuteEditor_ButtonUp,CuteEditor_ColorPicker_ButtonOver,CuteEditor_ColorPicker_ButtonOut,CuteEditor_ColorPicker_ButtonDown,CuteEditor_ButtonCommandOver,CuteEditor_ButtonCommandOut,CuteEditor_ButtonCommandDown,CuteEditor_ButtonCommandUp,CuteEditor_DropDownCommand,CuteEditor_ExpandTreeDropDownItem,CuteEditor_CollapseTreeDropDownItem,CuteEditor_OnInitialized,CuteEditor_OnCommand,CuteEditor_OnChange,CuteEditor_AddVerbMenuItems,CuteEditor_AddTagMenuItems,CuteEditor_AddMainMenuItems,CuteEditor_AddDropMenuItems,CuteEditor_FilterCode,CuteEditor_FilterHTML];function SetupCuteEditorGlobalFunctions(){for(var i=0;i<CuteEditorGlobalFunctions[OxOcd59[26]];i++){var Ox2ac=CuteEditorGlobalFunctions[i];var name=Ox2ac+OxOcd59[25];name=name.substr(8,name.indexOf(OxOcd59[165])-8).replace(/\s/g,OxOcd59[25]);if(!window[name]){window[name]=Ox2ac;} ;} ;} ;SetupCuteEditorGlobalFunctions();var __danainfo=null;var danaurl=window[OxOcd59[167]][OxOcd59[166]];var danapos=danaurl.indexOf(OxOcd59[168]);if(danapos!=-1){var pluspos1=danaurl.indexOf(OxOcd59[169],danapos+10);var pluspos2=danaurl.indexOf(OxOcd59[170],danapos+10);if(pluspos1!=-1&&pluspos1<pluspos2){pluspos2=pluspos1;} ;__danainfo=danaurl.substring(danapos,pluspos2)+OxOcd59[170];} ;function CuteEditor_GetScriptProperty(name){return this[OxOcd59[171]][name];} ;function CuteEditor_SetScriptProperty(name,Ox267){if(Ox267==null){this[OxOcd59[171]][name]=null;} else {this[OxOcd59[171]][name]=String(Ox267);} ;} ;function CuteEditorInitialize(Oxb75,Oxb76){var editor=Window_GetElement(window,Oxb75,true);editor[OxOcd59[171]]=Oxb76;editor[OxOcd59[172]]=CuteEditor_GetScriptProperty;var Ox88a=Window_GetElement(window,editor.GetScriptProperty(OxOcd59[138]),true);var editwin,editdoc;try{editwin=Frame_GetContentWindow(Ox88a);editdoc=editwin[OxOcd59[11]];} catch(x){} ;var Oxb77=false;var Oxb78;var Oxb79=false;var Oxb7a=editor.GetScriptProperty(OxOcd59[102])+OxOcd59[173];function Oxb7b(){if( typeof (window[OxOcd59[174]])==OxOcd59[175]){return ;} ;LoadXMLAsync(OxOcd59[176],Oxb7a+OxOcd59[177],Oxb7c);} ;function Oxb7c(Ox3ad){if(Ox3ad[OxOcd59[178]]!=200){alert(OxOcd59[179]);return ;} ;CuteEditorInstallScriptCode(Ox3ad.responseText,OxOcd59[174]);if(Oxb77){Oxb7e();} ;} ;function Oxb7d(Ox3ad){if(Ox3ad[OxOcd59[178]]!=200){alert(OxOcd59[180]);return ;} ;CuteEditorInstallScriptCode(Ox3ad.responseText,OxOcd59[174]);if(Oxb77){Oxb7e();} ;} ;function Oxb7e(){if(Oxb79){return ;} ;Oxb79=true;window.CuteEditorImplementation(editor);try{editor[OxOcd59[54]][OxOcd59[141]]=OxOcd59[25];} catch(x){} ;try{editdoc[OxOcd59[181]][OxOcd59[54]][OxOcd59[141]]=OxOcd59[25];} catch(x){} ;var Oxb7f=editor.GetScriptProperty(OxOcd59[182]);if(Oxb7f){editor.Eval(Oxb7f);} ;} ;function Oxb80(){if(!Element_Contains(window[OxOcd59[11]].body,editor)){return ;} ;try{Ox88a=Window_GetElement(window,editor.GetScriptProperty(OxOcd59[138]),true);editwin=Frame_GetContentWindow(Ox88a);editdoc=editwin[OxOcd59[11]];var Ox2f4=editdoc[OxOcd59[181]];} catch(x){setTimeout(Oxb80,100);return ;} ;if(!editdoc[OxOcd59[181]]){setTimeout(Oxb80,100);return ;} ;if(!Oxb77){Ox88a[OxOcd59[54]][OxOcd59[53]]=OxOcd59[183];if(Browser_IsOpera()){editdoc[OxOcd59[181]][OxOcd59[184]]=true;} else {if(Browser_IsGecko()){editdoc[OxOcd59[181]][OxOcd59[56]]=OxOcd59[185];} ;editdoc[OxOcd59[186]]=OxOcd59[68];} ;Oxb77=true;setTimeout(Oxb80,50);return ;} ;if( typeof (window[OxOcd59[174]])==OxOcd59[175]){Oxb7e();} else {try{editdoc[OxOcd59[181]][OxOcd59[54]][OxOcd59[141]]=OxOcd59[142];} catch(x){} ;} ;} ;var Oxb81=0;var Ox275=CuteEditor_Find_DisplayNone(editor);if(Ox275){function Oxb82(){if(Ox275[OxOcd59[54]][OxOcd59[53]]!=OxOcd59[63]){window.clearInterval(Oxb81);Oxb81=OxOcd59[25];CuteEditorInitialize(Oxb75,Oxb76);} ;} ;Oxb81=setInterval(Oxb82,1000);return ;} ;function CuteEditor_Find_DisplayNone(element){var Oxb84;for(var Ox275=element;Ox275!=null;Ox275=Ox275[OxOcd59[42]]){if(Ox275[OxOcd59[54]]&&Ox275[OxOcd59[54]][OxOcd59[53]]==OxOcd59[63]){Oxb84=Ox275;break ;} ;} ;return Oxb84;} ;function Oxb85(Oxb86){function Oxb87(Ox3ed,Oxb88,Oxb89,Ox334,Oxb8a,Oxb8b){var Oxb8c= new Array(0x1010400,0,0x10000,0x1010404,0x1010004,0x10404,0x4,0x10000,0x400,0x1010400,0x1010404,0x400,0x1000404,0x1010004,0x1000000,0x4,0x404,0x1000400,0x1000400,0x10400,0x10400,0x1010000,0x1010000,0x1000404,0x10004,0x1000004,0x1000004,0x10004,0,0x404,0x10404,0x1000000,0x10000,0x1010404,0x4,0x1010000,0x1010400,0x1000000,0x1000000,0x400,0x1010004,0x10000,0x10400,0x1000004,0x400,0x4,0x1000404,0x10404,0x1010404,0x10004,0x1010000,0x1000404,0x1000004,0x404,0x10404,0x1010400,0x404,0x1000400,0x1000400,0,0x10004,0x10400,0,0x1010004);var Oxb8d= new Array(-0x7fef7fe0,-0x7fff8000,0x8000,0x108020,0x100000,0x20,-0x7fefffe0,-0x7fff7fe0,-0x7fffffe0,-0x7fef7fe0,-0x7fef8000,-0x80000000,-0x7fff8000,0x100000,0x20,-0x7fefffe0,0x108000,0x100020,-0x7fff7fe0,0,-0x80000000,0x8000,0x108020,-0x7ff00000,0x100020,-0x7fffffe0,0,0x108000,0x8020,-0x7fef8000,-0x7ff00000,0x8020,0,0x108020,-0x7fefffe0,0x100000,-0x7fff7fe0,-0x7ff00000,-0x7fef8000,0x8000,-0x7ff00000,-0x7fff8000,0x20,-0x7fef7fe0,0x108020,0x20,0x8000,-0x80000000,0x8020,-0x7fef8000,0x100000,-0x7fffffe0,0x100020,-0x7fff7fe0,-0x7fffffe0,0x100020,0x108000,0,-0x7fff8000,0x8020,-0x80000000,-0x7fefffe0,-0x7fef7fe0,0x108000);var Oxb8e= new Array(0x208,0x8020200,0,0x8020008,0x8000200,0,0x20208,0x8000200,0x20008,0x8000008,0x8000008,0x20000,0x8020208,0x20008,0x8020000,0x208,0x8000000,0x8,0x8020200,0x200,0x20200,0x8020000,0x8020008,0x20208,0x8000208,0x20200,0x20000,0x8000208,0x8,0x8020208,0x200,0x8000000,0x8020200,0x8000000,0x20008,0x208,0x20000,0x8020200,0x8000200,0,0x200,0x20008,0x8020208,0x8000200,0x8000008,0x200,0,0x8020008,0x8000208,0x20000,0x8000000,0x8020208,0x8,0x20208,0x20200,0x8000008,0x8020000,0x8000208,0x208,0x8020000,0x20208,0x8,0x8020008,0x20200);var Oxb8f= new Array(0x802001,0x2081,0x2081,0x80,0x802080,0x800081,0x800001,0x2001,0,0x802000,0x802000,0x802081,0x81,0,0x800080,0x800001,0x1,0x2000,0x800000,0x802001,0x80,0x800000,0x2001,0x2080,0x800081,0x1,0x2080,0x800080,0x2000,0x802080,0x802081,0x81,0x800080,0x800001,0x802000,0x802081,0x81,0,0,0x802000,0x2080,0x800080,0x800081,0x1,0x802001,0x2081,0x2081,0x80,0x802081,0x81,0x1,0x2000,0x800001,0x2001,0x802080,0x800081,0x2001,0x2080,0x800000,0x802001,0x80,0x800000,0x2000,0x802080);var Oxb90= new Array(0x100,0x2080100,0x2080000,0x42000100,0x80000,0x100,0x40000000,0x2080000,0x40080100,0x80000,0x2000100,0x40080100,0x42000100,0x42080000,0x80100,0x40000000,0x2000000,0x40080000,0x40080000,0,0x40000100,0x42080100,0x42080100,0x2000100,0x42080000,0x40000100,0,0x42000000,0x2080100,0x2000000,0x42000000,0x80100,0x80000,0x42000100,0x100,0x2000000,0x40000000,0x2080000,0x42000100,0x40080100,0x2000100,0x40000000,0x42080000,0x2080100,0x40080100,0x100,0x2000000,0x42080000,0x42080100,0x80100,0x42000000,0x42080100,0x2080000,0,0x40080000,0x42000000,0x80100,0x2000100,0x40000100,0x80000,0,0x40080000,0x2080100,0x40000100);var Oxb91= new Array(0x20000010,0x20400000,0x4000,0x20404010,0x20400000,0x10,0x20404010,0x400000,0x20004000,0x404010,0x400000,0x20000010,0x400010,0x20004000,0x20000000,0x4010,0,0x400010,0x20004010,0x4000,0x404000,0x20004010,0x10,0x20400010,0x20400010,0,0x404010,0x20404000,0x4010,0x404000,0x20404000,0x20000000,0x20004000,0x10,0x20400010,0x404000,0x20404010,0x400000,0x4010,0x20000010,0x400000,0x20004000,0x20000000,0x4010,0x20000010,0x20404010,0x404000,0x20400000,0x404010,0x20404000,0,0x20400010,0x10,0x4000,0x20400000,0x404010,0x4000,0x400010,0x20004010,0,0x20404000,0x20000000,0x400010,0x20004010);var Oxb92= new Array(0x200000,0x4200002,0x4000802,0,0x800,0x4000802,0x200802,0x4200800,0x4200802,0x200000,0,0x4000002,0x2,0x4000000,0x4200002,0x802,0x4000800,0x200802,0x200002,0x4000800,0x4000002,0x4200000,0x4200800,0x200002,0x4200000,0x800,0x802,0x4200802,0x200800,0x2,0x4000000,0x200800,0x4000000,0x200800,0x200000,0x4000802,0x4000802,0x4200002,0x4200002,0x2,0x200002,0x4000000,0x4000800,0x200000,0x4200800,0x802,0x200802,0x4200800,0x802,0x4000002,0x4200802,0x4200000,0x200800,0,0x2,0x4200802,0,0x200802,0x4200000,0x800,0x4000002,0x4000800,0x800,0x200002);var Oxb93= new Array(0x10001040,0x1000,0x40000,0x10041040,0x10000000,0x10001040,0x40,0x10000000,0x40040,0x10040000,0x10041040,0x41000,0x10041000,0x41040,0x1000,0x40,0x10040000,0x10000040,0x10001000,0x1040,0x41000,0x40040,0x10040040,0x10041000,0x1040,0,0,0x10040040,0x10000040,0x10001000,0x41040,0x40000,0x41040,0x40000,0x10041000,0x1000,0x40,0x10040040,0x1000,0x41040,0x10001000,0x40,0x10000040,0x10040000,0x10040040,0x10000000,0x40000,0x10001040,0,0x10041040,0x40040,0x10000040,0x10040000,0x10001000,0x10001040,0,0x10041040,0x41000,0x41000,0x1040,0x1040,0x40040,0x10000000,0x10041000);var Ox3f0=Oxba2(Ox3ed);var m=0,i,Ox1e9,Ox329,Oxb94,Oxb95,Oxb96,Ox56f,Oxb97,Oxb98;var Oxb99,Oxb9a,Oxb9b,Oxb9c;var Oxb9d,Oxb9e;var len=Oxb88[OxOcd59[26]];var Oxb9f=0;var Oxba0=Ox3f0[OxOcd59[26]]==32?3:9;if(Oxba0==3){Oxb98=Oxb89? new Array(0,32,2): new Array(30,-2,-2);} else {Oxb98=Oxb89? new Array(0,32,2,62,30,-2,64,96,2): new Array(94,62,-2,32,64,2,30,-2,-2);} ;var Ox32a=OxOcd59[25];var Oxba1=OxOcd59[25];if(Ox334==1){Oxb99=(Oxb8a.charCodeAt(m++)<<24)|(Oxb8a.charCodeAt(m++)<<16)|(Oxb8a.charCodeAt(m++)<<8)|Oxb8a.charCodeAt(m++);Oxb9b=(Oxb8a.charCodeAt(m++)<<24)|(Oxb8a.charCodeAt(m++)<<16)|(Oxb8a.charCodeAt(m++)<<8)|Oxb8a.charCodeAt(m++);m=0;} ;while(m<len){Ox56f=(Oxb88.charCodeAt(m++)<<24)|(Oxb88.charCodeAt(m++)<<16)|(Oxb88.charCodeAt(m++)<<8)|Oxb88.charCodeAt(m++);Oxb97=(Oxb88.charCodeAt(m++)<<24)|(Oxb88.charCodeAt(m++)<<16)|(Oxb88.charCodeAt(m++)<<8)|Oxb88.charCodeAt(m++);if(Ox334==1){if(Oxb89){Ox56f^=Oxb99;Oxb97^=Oxb9b;} else {Oxb9a=Oxb99;Oxb9c=Oxb9b;Oxb99=Ox56f;Oxb9b=Oxb97;} ;} ;Ox329=((Ox56f>>>4)^Oxb97)&0x0f0f0f0f;Oxb97^=Ox329;Ox56f^=(Ox329<<4);Ox329=((Ox56f>>>16)^Oxb97)&0x0000ffff;Oxb97^=Ox329;Ox56f^=(Ox329<<16);Ox329=((Oxb97>>>2)^Ox56f)&0x33333333;Ox56f^=Ox329;Oxb97^=(Ox329<<2);Ox329=((Oxb97>>>8)^Ox56f)&0x00ff00ff;Ox56f^=Ox329;Oxb97^=(Ox329<<8);Ox329=((Ox56f>>>1)^Oxb97)&0x55555555;Oxb97^=Ox329;Ox56f^=(Ox329<<1);Ox56f=((Ox56f<<1)|(Ox56f>>>31));Oxb97=((Oxb97<<1)|(Oxb97>>>31));for(Ox1e9=0;Ox1e9<Oxba0;Ox1e9+=3){Oxb9d=Oxb98[Ox1e9+1];Oxb9e=Oxb98[Ox1e9+2];for(i=Oxb98[Ox1e9];i!=Oxb9d;i+=Oxb9e){Oxb95=Oxb97^Ox3f0[i];Oxb96=((Oxb97>>>4)|(Oxb97<<28))^Ox3f0[i+1];Ox329=Ox56f;Ox56f=Oxb97;Oxb97=Ox329^(Oxb8d[(Oxb95>>>24)&0x3f]|Oxb8f[(Oxb95>>>16)&0x3f]|Oxb91[(Oxb95>>>8)&0x3f]|Oxb93[Oxb95&0x3f]|Oxb8c[(Oxb96>>>24)&0x3f]|Oxb8e[(Oxb96>>>16)&0x3f]|Oxb90[(Oxb96>>>8)&0x3f]|Oxb92[Oxb96&0x3f]);} ;Ox329=Ox56f;Ox56f=Oxb97;Oxb97=Ox329;} ;Ox56f=((Ox56f>>>1)|(Ox56f<<31));Oxb97=((Oxb97>>>1)|(Oxb97<<31));Ox329=((Ox56f>>>1)^Oxb97)&0x55555555;Oxb97^=Ox329;Ox56f^=(Ox329<<1);Ox329=((Oxb97>>>8)^Ox56f)&0x00ff00ff;Ox56f^=Ox329;Oxb97^=(Ox329<<8);Ox329=((Oxb97>>>2)^Ox56f)&0x33333333;Ox56f^=Ox329;Oxb97^=(Ox329<<2);Ox329=((Ox56f>>>16)^Oxb97)&0x0000ffff;Oxb97^=Ox329;Ox56f^=(Ox329<<16);Ox329=((Ox56f>>>4)^Oxb97)&0x0f0f0f0f;Oxb97^=Ox329;Ox56f^=(Ox329<<4);if(Ox334==1){if(Oxb89){Oxb99=Ox56f;Oxb9b=Oxb97;} else {Ox56f^=Oxb9a;Oxb97^=Oxb9c;} ;} ;Oxba1+=String.fromCharCode((Ox56f>>>24),((Ox56f>>>16)&0xff),((Ox56f>>>8)&0xff),(Ox56f&0xff),(Oxb97>>>24),((Oxb97>>>16)&0xff),((Oxb97>>>8)&0xff),(Oxb97&0xff));Oxb9f+=8;if(Oxb9f==512){Ox32a+=Oxba1;Oxba1=OxOcd59[25];Oxb9f=0;} ;} ;return Ox32a+Oxba1;} ;function Oxba2(Ox3ed){var Oxba3= new Array(0,0x4,0x20000000,0x20000004,0x10000,0x10004,0x20010000,0x20010004,0x200,0x204,0x20000200,0x20000204,0x10200,0x10204,0x20010200,0x20010204);var Oxba4= new Array(0,0x1,0x100000,0x100001,0x4000000,0x4000001,0x4100000,0x4100001,0x100,0x101,0x100100,0x100101,0x4000100,0x4000101,0x4100100,0x4100101);var Oxba5= new Array(0,0x8,0x800,0x808,0x1000000,0x1000008,0x1000800,0x1000808,0,0x8,0x800,0x808,0x1000000,0x1000008,0x1000800,0x1000808);var Oxba6= new Array(0,0x200000,0x8000000,0x8200000,0x2000,0x202000,0x8002000,0x8202000,0x20000,0x220000,0x8020000,0x8220000,0x22000,0x222000,0x8022000,0x8222000);var Oxba7= new Array(0,0x40000,0x10,0x40010,0,0x40000,0x10,0x40010,0x1000,0x41000,0x1010,0x41010,0x1000,0x41000,0x1010,0x41010);var Oxba8= new Array(0,0x400,0x20,0x420,0,0x400,0x20,0x420,0x2000000,0x2000400,0x2000020,0x2000420,0x2000000,0x2000400,0x2000020,0x2000420);var Oxba9= new Array(0,0x10000000,0x80000,0x10080000,0x2,0x10000002,0x80002,0x10080002,0,0x10000000,0x80000,0x10080000,0x2,0x10000002,0x80002,0x10080002);var Oxbaa= new Array(0,0x10000,0x800,0x10800,0x20000000,0x20010000,0x20000800,0x20010800,0x20000,0x30000,0x20800,0x30800,0x20020000,0x20030000,0x20020800,0x20030800);var Oxbab= new Array(0,0x40000,0,0x40000,0x2,0x40002,0x2,0x40002,0x2000000,0x2040000,0x2000000,0x2040000,0x2000002,0x2040002,0x2000002,0x2040002);var Oxbac= new Array(0,0x10000000,0x8,0x10000008,0,0x10000000,0x8,0x10000008,0x400,0x10000400,0x408,0x10000408,0x400,0x10000400,0x408,0x10000408);var Oxbad= new Array(0,0x20,0,0x20,0x100000,0x100020,0x100000,0x100020,0x2000,0x2020,0x2000,0x2020,0x102000,0x102020,0x102000,0x102020);var Oxbae= new Array(0,0x1000000,0x200,0x1000200,0x200000,0x1200000,0x200200,0x1200200,0x4000000,0x5000000,0x4000200,0x5000200,0x4200000,0x5200000,0x4200200,0x5200200);var Oxbaf= new Array(0,0x1000,0x8000000,0x8001000,0x80000,0x81000,0x8080000,0x8081000,0x10,0x1010,0x8000010,0x8001010,0x80010,0x81010,0x8080010,0x8081010);var Oxbb0= new Array(0,0x4,0x100,0x104,0,0x4,0x100,0x104,0x1,0x5,0x101,0x105,0x1,0x5,0x101,0x105);var Oxba0=Ox3ed[OxOcd59[26]]>8?3:1;var Ox3f0= new Array(32*Oxba0);var Oxbb1= new Array(0,0,1,1,1,1,1,1,0,1,1,1,1,1,1,0);var Oxbb2,Oxbb3,m=0,Ox23a=0,Ox329;var Ox56f,Oxb97;for(var Ox1e9=0;Ox1e9<Oxba0;Ox1e9++){Ox56f=(Ox3ed.charCodeAt(m++)<<24)|(Ox3ed.charCodeAt(m++)<<16)|(Ox3ed.charCodeAt(m++)<<8)|Ox3ed.charCodeAt(m++);Oxb97=(Ox3ed.charCodeAt(m++)<<24)|(Ox3ed.charCodeAt(m++)<<16)|(Ox3ed.charCodeAt(m++)<<8)|Ox3ed.charCodeAt(m++);Ox329=((Ox56f>>>4)^Oxb97)&0x0f0f0f0f;Oxb97^=Ox329;Ox56f^=(Ox329<<4);Ox329=((Oxb97>>>-16)^Ox56f)&0x0000ffff;Ox56f^=Ox329;Oxb97^=(Ox329<<-16);Ox329=((Ox56f>>>2)^Oxb97)&0x33333333;Oxb97^=Ox329;Ox56f^=(Ox329<<2);Ox329=((Oxb97>>>-16)^Ox56f)&0x0000ffff;Ox56f^=Ox329;Oxb97^=(Ox329<<-16);Ox329=((Ox56f>>>1)^Oxb97)&0x55555555;Oxb97^=Ox329;Ox56f^=(Ox329<<1);Ox329=((Oxb97>>>8)^Ox56f)&0x00ff00ff;Ox56f^=Ox329;Oxb97^=(Ox329<<8);Ox329=((Ox56f>>>1)^Oxb97)&0x55555555;Oxb97^=Ox329;Ox56f^=(Ox329<<1);Ox329=(Ox56f<<8)|((Oxb97>>>20)&0x000000f0);Ox56f=(Oxb97<<24)|((Oxb97<<8)&0xff0000)|((Oxb97>>>8)&0xff00)|((Oxb97>>>24)&0xf0);Oxb97=Ox329;for(i=0;i<Oxbb1[OxOcd59[26]];i++){if(Oxbb1[i]){Ox56f=(Ox56f<<2)|(Ox56f>>>26);Oxb97=(Oxb97<<2)|(Oxb97>>>26);} else {Ox56f=(Ox56f<<1)|(Ox56f>>>27);Oxb97=(Oxb97<<1)|(Oxb97>>>27);} ;Ox56f&=-0xf;Oxb97&=-0xf;Oxbb2=Oxba3[Ox56f>>>28]|Oxba4[(Ox56f>>>24)&0xf]|Oxba5[(Ox56f>>>20)&0xf]|Oxba6[(Ox56f>>>16)&0xf]|Oxba7[(Ox56f>>>12)&0xf]|Oxba8[(Ox56f>>>8)&0xf]|Oxba9[(Ox56f>>>4)&0xf];Oxbb3=Oxbaa[Oxb97>>>28]|Oxbab[(Oxb97>>>24)&0xf]|Oxbac[(Oxb97>>>20)&0xf]|Oxbad[(Oxb97>>>16)&0xf]|Oxbae[(Oxb97>>>12)&0xf]|Oxbaf[(Oxb97>>>8)&0xf]|Oxbb0[(Oxb97>>>4)&0xf];Ox329=((Oxbb3>>>16)^Oxbb2)&0x0000ffff;Ox3f0[Ox23a++]=Oxbb2^Ox329;Ox3f0[Ox23a++]=Oxbb3^(Ox329<<16);} ;} ;return Ox3f0;} ;var Oxb88=[];for(var i=0;i<Oxb86[OxOcd59[26]];i++){Oxb88.push(String.fromCharCode(Oxb86[i]));} ;Oxb88=Oxb88.join(OxOcd59[25]);var Oxbb4=[0x46,0x35,0x32,0x42,0x31,0x38,0x36,0x46];var Ox3ed=[];for(var i=0;i<Oxbb4[OxOcd59[26]];i++){Ox3ed.push(String.fromCharCode(Oxbb4[i]));} ;Ox3ed=Ox3ed.join(OxOcd59[25]);var Oxb8a=Ox3ed;return Oxb87(Ox3ed,Oxb88,0,1,Oxb8a);} ;var Oxbb5;var Oxbb6;var Oxbb7;var Oxbb8;function Oxbb9(Oxbba){var Ox3ad=CreateXMLHttpRequest();var Oxbbb=Oxbca;if(!Oxbb5){Ox3ad.open(OxOcd59[176],editor.GetScriptProperty(OxOcd59[102])+OxOcd59[187]+OxOcd59[188]+ new Date().getTime(),false);Ox3ad.send(OxOcd59[25]);if(Ox3ad[OxOcd59[178]]!=200){return Oxbbb(1000,OxOcd59[189]);} ;Oxbb5=Ox3ad[OxOcd59[190]].toUpperCase();} ;if(!Oxbb6){Oxbb6={};var Oxbbc=[OxOcd59[191],OxOcd59[192],OxOcd59[193],OxOcd59[194],OxOcd59[195],OxOcd59[196],OxOcd59[197],OxOcd59[198],OxOcd59[199],OxOcd59[200],OxOcd59[201],OxOcd59[202],OxOcd59[203],OxOcd59[204],OxOcd59[205],OxOcd59[206]];for(var i=0;i<Oxbbc[OxOcd59[26]];i++){Oxbb6[Oxbbc[i]]=i;} ;} ;try{if(!Oxbb7){if(Oxbb5.substring(0,16)!=OxOcd59[207]){return Oxbbb(1001);} ;var Oxbbd=[];for(var i=0;i<Oxbb5[OxOcd59[26]];i+=2){Oxbbd.push(Oxbb6[Oxbb5.charAt(i)]*16+Oxbb6[Oxbb5.charAt(i+1)]);} ;Oxbbd.splice(0,8);Oxbbd.splice(0,123);var Oxbbe=Oxbbd[0]+Oxbbd[1]*256;Oxbbd.splice(0,4);var Oxbbf=Oxbbd.slice(0,Oxbbe);var Oxbc0=Oxb85(Oxbbf);Oxbc0=Oxbc0.replace(/^\xEF\xBB\xBF/,OxOcd59[25]).replace(/[\x00-\x08]*$/,OxOcd59[25]);Oxbb7=Oxbc0.split(OxOcd59[208]);} ;if(Oxbb7[OxOcd59[26]]!=10){return Oxbbb(1002,Oxbb7.length);} ;var Oxbc1=Oxbb7[9].split(OxOcd59[209]);var Oxbc2= new Date(parseFloat(Oxbc1[2]),parseFloat(Oxbc1[1])-1,parseFloat(Oxbc1[0]));var Oxbc3=Oxbc2.getTime();if((Oxbb7[5]<<2)!=1200685124){return Oxbbb(1003,Oxbb7[5]);} ;var Oxbc4=window[OxOcd59[167]][OxOcd59[166]].split(OxOcd59[211])[1].split(OxOcd59[209])[0].split(OxOcd59[210])[0].toLowerCase();var Oxbc5=false;if(Oxbc4==String.fromCharCode(108,111,99,97,108,104,111,115,116)){Oxbc5=true;} ;if(Oxbc4==String.fromCharCode(49,50,55,46,48,46,48,46,49)){Oxbc5=true;} ;function Oxbc6(Oxbc7){var Ox24b=Oxbc7.split(OxOcd59[212]);if(Ox24b[0]==OxOcd59[213]){Ox24b.splice(0,1);} ;return Ox24b.join(OxOcd59[212]);} ;Oxbc4=Oxbc6(Oxbc4);var Oxbc8=Oxbb7[7].toLowerCase();var Oxbc9=Oxbb7[8];switch(parseInt(Oxbb7[6])){case 0:if(Oxbc3< new Date().getTime()){return Oxbbb(20000,Oxbc2);} ;if(Oxbc5){break ;} ;return Oxbbb(20001,Oxbc4);;case 1:if(Oxbc5){break ;} ;if(Oxbc8!=Oxbc4&&Oxbc8.indexOf(Oxbc4)==-1){return Oxbbb(20010,Oxbc4,Oxbc8);} ;break ;;case 2:if(Oxbc5){break ;} ;if(!Oxbb8){Ox3ad.open(OxOcd59[176],editor.GetScriptProperty(OxOcd59[102])+OxOcd59[187]+OxOcd59[214]+ new Date().getTime(),false);Ox3ad.send(OxOcd59[25]);if(Ox3ad[OxOcd59[178]]!=200){return Oxbbb(1000,OxOcd59[215]);} ;Oxbb8=Ox3ad[OxOcd59[190]];} ;if(Oxbc9!=Oxbb8&&Oxbc9.indexOf(Oxbb8)==-1){return Oxbbb(20020,Oxbb8,Oxbc9);} ;break ;;case 3:if(Oxbc5){break ;} ;if(Oxbc8.indexOf(Oxbc4)==-1){return Oxbbb(20030,Oxbc4,Oxbc8);} ;break ;;case 4:if(Oxbc3< new Date().getTime()){return Oxbbb(20040,Oxbc2);} ;break ;;case 5:break ;;default:return Oxbbb(1004,parseInt(Oxbb7[6]));;} ;} catch(x){return Oxbbb(1000,x.message);} ;return Oxbba();} ;function Oxbca(Oxbcb,Ox836){var msg=OxOcd59[25];switch(Oxbcb){case 1000:msg=Ox836;break ;;case 1001:msg=OxOcd59[216];break ;;case 1002:msg=OxOcd59[217]+Ox836;break ;;case 1003:msg=OxOcd59[218];break ;;case 1004:msg=OxOcd59[219];break ;;case 20000:msg=OxOcd59[220];break ;;case 20001:msg=OxOcd59[221];break ;;case 20010:msg=OxOcd59[222];break ;;case 20020:msg=OxOcd59[223];break ;;case 20030:msg=OxOcd59[224];break ;;case 20040:msg=OxOcd59[225];break ;;} ;try{return alert(OxOcd59[226]+msg);} catch(x){} ;} ;CuteEditor_BasicInitialize(editor);Oxb7b();Oxbb9(Oxb80);} ;function CuteEditorInstallScriptCode(Oxac3,Oxac4){eval(Oxac3);window[Oxac4]=eval(Oxac4);} ;window[OxOcd59[227]]=CuteEditorInitialize;