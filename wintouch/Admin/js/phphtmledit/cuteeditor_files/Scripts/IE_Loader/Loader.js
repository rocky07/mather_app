var OxO2acc=["head","script","language","javascript","type","text/javascript","src","id","undefined","Microsoft.XMLHTTP","readyState","onreadystatechange","","document","length","element \x27","\x27 not found","returnValue","preventDefault","cancelBubble","stopPropagation","onchange","oninitialized","command","commandui","commandvalue","oncommand","string","_fireEventFunction","event","parentNode","_IsCuteEditor","True","readOnly","_IsRichDropDown","null","value","selectedIndex","nodeName","TR","cells","display","style","nextSibling","innerHTML","\x3Cimg src=\x22","/Images/t-minus.gif\x22\x3E","onclick","CuteEditor_CollapseTreeDropDownItem(this,\x22","\x22)","none","/Images/t-plus.gif\x22\x3E","CuteEditor_ExpandTreeDropDownItem(this,\x22","//TODO: event not found? throw error ?","all","UNSELECTABLE","on","tabIndex","-1","contentWindow","contentDocument","parentWindow","frames","frameElement","//TODO:frame contentWindow not found?","caller","arguments","parent","top","opener","srcElement","target","//TODO: srcElement not found? throw error ?","fromElement","relatedTarget","toElement","keyCode","clientX","clientY","offsetX","offsetY","button","ctrlKey","altKey","shiftKey","CuteEditor_GetEditor(this).ExecImageCommand(this.getAttribute(\x27Command\x27),this.getAttribute(\x27CommandUI\x27),this.getAttribute(\x27CommandArgument\x27),this)","CuteEditor_GetEditor(this).PostBack(this.getAttribute(\x27Command\x27))","this.onmouseout();CuteEditor_GetEditor(this).DropMenu(this.getAttribute(\x27Group\x27),this)","ResourceDir","Theme","/Themes/","/Images/all.png","/Images/blank2020.gif","IMG","alt","title","Command","Group","ThemeIndex","width","20px","height","backgroundImage","url(",")","backgroundPosition","0 -","px","className","separator","CuteEditorButton","onmouseover","CuteEditor_ButtonCommandOver(this)","onmouseout","CuteEditor_ButtonCommandOut(this)","onmousedown","CuteEditor_ButtonCommandDown(this)","onmouseup","CuteEditor_ButtonCommandUp(this)","oncontextmenu","ondragstart","PostBack","ondblclick","_ToolBarID","_CodeViewToolBarID","_FrameID"," CuteEditorFrame"," CuteEditorToolbar","buttonInitialized","isover","CuteEditorButtonOver","CuteEditorButtonDown","CuteEditorDown","border","solid 1px #0A246A","backgroundColor","#b6bdd2","padding","1px","solid 1px #f5f5f4","inset 1px","IsCommandDisabled","CuteEditorButtonDisabled","IsCommandActive","CuteEditorButtonActive","(","href","location",",DanaInfo=",",","+","scriptProperties","GetScriptProperty","/Scripts/IE_Implementation/CuteEditorImplementation.js?i=1","CuteEditorImplementation","function","GET","\x26getModified=1","loadScript","status","Failed to load impl time!","cursor","body","InitializeCode","block","contentEditable","no-drop","/Scripts/resource.php","?type=license\x26_ver=","Failed to load editor license data.","responseText","0","1","2","3","4","5","6","7","8","9","A","B","C","D","E","F","0000000000000840",";","/",":","//",".","www","?type=serverip\x26_ver=","Failed to load editor license info!","You are using an incorrect license file.","Invalid lcparts count:","Invalid product version.","Invalid license type.","(0) license expired!","(0) only localhost!","(1) host not match!","(2) ip not match!","(3) host not match!","(4) license expired!","License Error : "];function include(Oxb56,Ox4c1){var Oxb57=document.getElementsByTagName(OxO2acc[0]).item(0);var Oxb58=document.getElementById(Oxb56);if(Oxb58){Oxb57.removeChild(Oxb58);} ;var Oxb59=document.createElement(OxO2acc[1]);Oxb59.setAttribute(OxO2acc[2],OxO2acc[3]);Oxb59.setAttribute(OxO2acc[4],OxO2acc[5]);Oxb59.setAttribute(OxO2acc[6],Ox4c1);Oxb59.setAttribute(OxO2acc[7],Oxb56);Oxb57.appendChild(Oxb59);} ;function CreateXMLHttpRequest(){try{if( typeof (XMLHttpRequest)!=OxO2acc[8]){return  new XMLHttpRequest();} ;if( typeof (ActiveXObject)!=OxO2acc[8]){return  new ActiveXObject(OxO2acc[9]);} ;} catch(x){return null;} ;} ;function LoadXMLAsync(Oxb5b,Ox4c1,Ox35a,Oxb5c){var Ox9c3=CreateXMLHttpRequest();function Oxb5d(){if(Ox9c3[OxO2acc[10]]!=4){return ;} ;Ox9c3[OxO2acc[11]]= new Function();var Ox3ad=Ox9c3;Ox9c3=null;Ox35a(Ox3ad);} ;Ox9c3[OxO2acc[11]]=Oxb5d;Ox9c3.open(Oxb5b,Ox4c1,true);Ox9c3.send(Oxb5c||OxO2acc[12]);} ;function Window_GetElement(Ox2c6,Ox2e0,Ox362){var Oxd=Ox2c6[OxO2acc[13]].getElementById(Ox2e0);if(Oxd){return Oxd;} ;var Ox25b=Ox2c6[OxO2acc[13]].getElementsByName(Ox2e0);if(Ox25b[OxO2acc[14]]>0){return Ox25b.item(0);} ;if(Ox362){throw ( new Error(OxO2acc[15]+Ox2e0+OxO2acc[16]));} ;return null;} ;function Event_PreventDefault(Ox368){Ox368=Event_GetEvent(Ox368);Ox368[OxO2acc[17]]=false;if(Ox368[OxO2acc[18]]){Ox368.preventDefault();} ;} ;function Event_CancelBubble(Ox368){Ox368=Event_GetEvent(Ox368);Ox368[OxO2acc[19]]=true;if(Ox368[OxO2acc[20]]){Ox368.stopPropagation();} ;return false;} ;function Event_CancelEvent(Ox368){Ox368=Event_GetEvent(Ox368);Event_PreventDefault(Ox368);return Event_CancelBubble(Ox368);} ;function CuteEditor_AddMainMenuItems(Ox76c){} ;function CuteEditor_AddDropMenuItems(Ox76c,Ox773){} ;function CuteEditor_AddTagMenuItems(Ox76c,Ox775){} ;function CuteEditor_AddVerbMenuItems(Ox76c,Ox775){} ;function CuteEditor_OnInitialized(editor){} ;function CuteEditor_OnCommand(editor,Ox779,Ox77a,Ox246){} ;function CuteEditor_OnChange(editor){} ;function CuteEditor_FilterCode(editor,Ox38e){return Ox38e;} ;function CuteEditor_FilterHTML(editor,Ox3a4){return Ox3a4;} ;function CuteEditor_FireChange(editor){window.CuteEditor_OnChange(editor);CuteEditor_FireEvent(editor,OxO2acc[21],null);} ;function CuteEditor_FireInitialized(editor){window.CuteEditor_OnInitialized(editor);CuteEditor_FireEvent(editor,OxO2acc[22],null);} ;function CuteEditor_FireCommand(editor,Ox779,Ox77a,Ox246){var Ox263=window.CuteEditor_OnCommand(editor,Ox779,Ox77a,Ox246);if(Ox263==true){return true;} ;var Ox781={};Ox781[OxO2acc[23]]=Ox779;Ox781[OxO2acc[24]]=Ox77a;Ox781[OxO2acc[25]]=Ox246;Ox781[OxO2acc[17]]=true;CuteEditor_FireEvent(editor,OxO2acc[26],Ox781);if(Ox781[OxO2acc[17]]==false){return true;} ;} ;function CuteEditor_FireEvent(editor,Ox783,Ox784){if(Ox784==null){Ox784={};} ;var Ox785=editor.getAttribute(Ox783);if(Ox785){if( typeof (Ox785)==OxO2acc[27]){editor[OxO2acc[28]]= new Function(OxO2acc[29],Ox785);} else {editor[OxO2acc[28]]=Ox785;} ;editor._fireEventFunction(Ox784);} ;} ;function CuteEditor_GetEditor(element){for(var Ox275=element;Ox275!=null;Ox275=Ox275[OxO2acc[30]]){if(Ox275.getAttribute(OxO2acc[31])==OxO2acc[32]){return Ox275;} ;} ;return null;} ;function CuteEditor_DropDownCommand(element,Oxb5f){var editor=CuteEditor_GetEditor(element);if(editor[OxO2acc[33]]){return ;} ;if(element.getAttribute(OxO2acc[34])==OxO2acc[32]){var Ox267=element.GetValue();if(Ox267==OxO2acc[35]){Ox267=OxO2acc[12];} ;var Ox320=element.GetText();if(Ox320==OxO2acc[35]){Ox320=OxO2acc[12];} ;element.SetSelectedIndex(0);editor.ExecCommand(Oxb5f,false,Ox267,Ox320);} else {if(!editor[OxO2acc[33]]&&element[OxO2acc[36]]){var Ox267=element[OxO2acc[36]];if(Ox267==OxO2acc[35]){Ox267=OxO2acc[12];} ;element[OxO2acc[37]]=0;editor.ExecCommand(Oxb5f,false,Ox267,Ox320);} else {element[OxO2acc[37]]=0;} ;} ;editor.FocusDocument();} ;function CuteEditor_ExpandTreeDropDownItem(src,Ox858){var Ox304=null;while(src!=null){if(src[OxO2acc[38]]==OxO2acc[39]){Ox304=src;break ;} ;src=src[OxO2acc[30]];} ;var Ox16=Ox304[OxO2acc[40]].item(0);Ox304[OxO2acc[43]][OxO2acc[42]][OxO2acc[41]]=OxO2acc[12];Ox16[OxO2acc[44]]=OxO2acc[45]+Ox858+OxO2acc[46];Ox304[OxO2acc[47]]= new Function(OxO2acc[48]+Ox858+OxO2acc[49]);} ;function CuteEditor_CollapseTreeDropDownItem(src,Ox858){var Ox304=null;while(src!=null){if(src[OxO2acc[38]]==OxO2acc[39]){Ox304=src;break ;} ;src=src[OxO2acc[30]];} ;var Ox16=Ox304[OxO2acc[40]].item(0);Ox304[OxO2acc[43]][OxO2acc[42]][OxO2acc[41]]=OxO2acc[50];Ox16[OxO2acc[44]]=OxO2acc[45]+Ox858+OxO2acc[51];Ox304[OxO2acc[47]]= new Function(OxO2acc[52]+Ox858+OxO2acc[49]);} ;function Event_GetEvent(Ox368){Ox368=Event_FindEvent(Ox368);if(Ox368==null){Debug_Todo(OxO2acc[53]);} ;return Ox368;} ;function Element_GetAllElements(p){var arr=[];for(var i=0;i<p[OxO2acc[54]][OxO2acc[14]];i++){arr.push(p[OxO2acc[54]].item(i));} ;return arr;} ;function Element_SetUnselectable(element){element.setAttribute(OxO2acc[55],OxO2acc[56]);element.setAttribute(OxO2acc[57],OxO2acc[58]);var arr=Element_GetAllElements(element);var len=arr[OxO2acc[14]];if(!len){return ;} ;for(var i=0;i<len;i++){arr[i].setAttribute(OxO2acc[55],OxO2acc[56]);arr[i].setAttribute(OxO2acc[57],OxO2acc[58]);} ;} ;function Frame_GetContentWindow(Ox469){if(Ox469[OxO2acc[59]]){return Ox469[OxO2acc[59]];} ;if(Ox469[OxO2acc[60]]){if(Ox469[OxO2acc[60]][OxO2acc[61]]){return Ox469[OxO2acc[60]][OxO2acc[61]];} ;} ;var Ox2c6;if(Ox469[OxO2acc[7]]){Ox2c6=window[OxO2acc[62]][Ox469[OxO2acc[7]]];if(Ox2c6){return Ox2c6;} ;} ;var len=window[OxO2acc[62]][OxO2acc[14]];for(var i=0;i<len;i++){Ox2c6=window[OxO2acc[62]][i];if(Ox2c6[OxO2acc[63]]==Ox469){return Ox2c6;} ;if(Ox2c6[OxO2acc[13]]==Ox469[OxO2acc[60]]){return Ox2c6;} ;} ;Debug_Todo(OxO2acc[64]);} ;function Array_IndexOf(arr,Ox36a){for(var i=0;i<arr[OxO2acc[14]];i++){if(arr[i]==Ox36a){return i;} ;} ;return -1;} ;function Array_Contains(arr,Ox36a){return Array_IndexOf(arr,Ox36a)!=-1;} ;function clearArray(Ox36d){for(var i=0;i<Ox36d[OxO2acc[14]];i++){Ox36d[i]=null;} ;} ;function Event_FindEvent(Ox368){if(Ox368&&Ox368[OxO2acc[18]]){return Ox368;} ;if(window[OxO2acc[29]]){return window[OxO2acc[29]];} ;return Event_FindEvent_FindEventFromWindows();} ;function Event_FindEvent_FindEventFromCallers(){var Ox2ac=Event_GetEvent[OxO2acc[65]];for(var i=0;i<100;i++){if(!Ox2ac){break ;} ;var Ox368=Ox2ac[OxO2acc[66]][0];if(Ox368&&Ox368[OxO2acc[18]]){return Ox368;} ;Ox2ac=Ox2ac[OxO2acc[65]];} ;} ;function Event_FindEvent_FindEventFromWindows(){var arr=[];return Ox371(window);function Ox371(Ox2c6){if(Ox2c6==null){return null;} ;if(Ox2c6[OxO2acc[29]]){return Ox2c6[OxO2acc[29]];} ;if(Array_Contains(arr,Ox2c6)){return null;} ;arr.push(Ox2c6);var Ox372=[];if(Ox2c6[OxO2acc[67]]!=Ox2c6){Ox372.push(Ox2c6.parent);} ;if(Ox2c6[OxO2acc[68]]!=Ox2c6[OxO2acc[67]]){Ox372.push(Ox2c6.top);} ;if(Ox2c6[OxO2acc[69]]){Ox372.push(Ox2c6.opener);} ;for(var i=0;i<Ox2c6[OxO2acc[62]][OxO2acc[14]];i++){Ox372.push(Ox2c6[OxO2acc[62]][i]);} ;for(var i=0;i<Ox372[OxO2acc[14]];i++){try{var Ox368=Ox371(Ox372[i]);if(Ox368){return Ox368;} ;} catch(x){} ;} ;return null;} ;} ;function Event_GetSrcElement(Ox368){Ox368=Event_GetEvent(Ox368);if(Ox368[OxO2acc[70]]){return Ox368[OxO2acc[70]];} ;if(Ox368[OxO2acc[71]]){return Ox368[OxO2acc[71]];} ;Debug_Todo(OxO2acc[72]);return null;} ;function Event_GetFromElement(Ox368){Ox368=Event_GetEvent(Ox368);if(Ox368[OxO2acc[73]]){return Ox368[OxO2acc[73]];} ;if(Ox368[OxO2acc[74]]){return Ox368[OxO2acc[74]];} ;return null;} ;function Event_GetToElement(Ox368){Ox368=Event_GetEvent(Ox368);if(Ox368[OxO2acc[75]]){return Ox368[OxO2acc[75]];} ;if(Ox368[OxO2acc[74]]){return Ox368[OxO2acc[74]];} ;return null;} ;function Event_GetKeyCode(Ox368){Ox368=Event_GetEvent(Ox368);return Ox368[OxO2acc[76]];} ;function Event_GetClientX(Ox368){Ox368=Event_GetEvent(Ox368);return Ox368[OxO2acc[77]];} ;function Event_GetClientY(Ox368){Ox368=Event_GetEvent(Ox368);return Ox368[OxO2acc[78]];} ;function Event_GetOffsetX(Ox368){Ox368=Event_GetEvent(Ox368);return Ox368[OxO2acc[79]];} ;function Event_GetOffsetY(Ox368){Ox368=Event_GetEvent(Ox368);return Ox368[OxO2acc[80]];} ;function Event_IsLeftButton(Ox368){Ox368=Event_GetEvent(Ox368);return Ox368[OxO2acc[81]]==1;} ;function Event_IsCtrlKey(Ox368){Ox368=Event_GetEvent(Ox368);return Ox368[OxO2acc[82]];} ;function Event_IsAltKey(Ox368){Ox368=Event_GetEvent(Ox368);return Ox368[OxO2acc[83]];} ;function Event_IsShiftKey(Ox368){Ox368=Event_GetEvent(Ox368);return Ox368[OxO2acc[84]];} ;function CuteEditor_BasicInitialize(editor){var Ox821= new Function(OxO2acc[85]);var Oxc45= new Function(OxO2acc[86]);var Oxb63= new Function(OxO2acc[87]);var Oxb64=editor.GetScriptProperty(OxO2acc[88]);var Oxb65=editor.GetScriptProperty(OxO2acc[89]);var Oxb66=Oxb64+OxO2acc[90]+Oxb65+OxO2acc[91];var Oxb67=Oxb64+OxO2acc[92];var images=editor.getElementsByTagName(OxO2acc[93]);var len=images[OxO2acc[14]];for(var i=0;i<len;i++){var img=images[i];if(img.getAttribute(OxO2acc[94])&&!img.getAttribute(OxO2acc[95])){img.setAttribute(OxO2acc[95],img.getAttribute(OxO2acc[94]));} ;var Ox25a=img.getAttribute(OxO2acc[96]);var Ox773=img.getAttribute(OxO2acc[97]);if(!(Ox25a||Ox773)){continue ;} ;var Oxb68=img.getAttribute(OxO2acc[98]);if(parseInt(Oxb68)>=0){img[OxO2acc[42]][OxO2acc[99]]=OxO2acc[100];img[OxO2acc[42]][OxO2acc[101]]=OxO2acc[100];img[OxO2acc[6]]=Oxb67;img[OxO2acc[42]][OxO2acc[102]]=OxO2acc[103]+Oxb66+OxO2acc[104];img[OxO2acc[42]][OxO2acc[105]]=OxO2acc[106]+(Oxb68*20)+OxO2acc[107];img[OxO2acc[42]][OxO2acc[41]]=OxO2acc[12];} ;if(img[OxO2acc[108]]!=OxO2acc[109]){img[OxO2acc[108]]=OxO2acc[110];img[OxO2acc[111]]= new Function(OxO2acc[112]);img[OxO2acc[113]]= new Function(OxO2acc[114]);img[OxO2acc[115]]= new Function(OxO2acc[116]);img[OxO2acc[117]]= new Function(OxO2acc[118]);} ;if(!img[OxO2acc[119]]){img[OxO2acc[119]]=Event_CancelEvent;} ;if(!img[OxO2acc[120]]){img[OxO2acc[120]]=Event_CancelEvent;} ;if(Ox25a){var Ox2ac=img.getAttribute(OxO2acc[121])==OxO2acc[32]?Oxc45:Ox821;if(img[OxO2acc[47]]==null){img[OxO2acc[47]]=Ox2ac;} ;if(img[OxO2acc[122]]==null){img[OxO2acc[122]]=Ox2ac;} ;} else {if(Ox773){if(img[OxO2acc[47]]==null){img[OxO2acc[47]]=Oxb63;} ;} ;} ;} ;var Ox88d=Window_GetElement(window,editor.GetScriptProperty(OxO2acc[123]),true);var Ox88e=Window_GetElement(window,editor.GetScriptProperty(OxO2acc[124]),true);var Ox88a=Window_GetElement(window,editor.GetScriptProperty(OxO2acc[125]),true);Ox88a[OxO2acc[108]]+=OxO2acc[126];Ox88d[OxO2acc[108]]+=OxO2acc[127];Ox88e[OxO2acc[108]]+=OxO2acc[127];Element_SetUnselectable(Ox88d);Element_SetUnselectable(Ox88e);} ;function CuteEditor_ButtonOver(element){if(!element[OxO2acc[128]]){element[OxO2acc[119]]=Event_CancelEvent;element[OxO2acc[113]]=CuteEditor_ButtonOut;element[OxO2acc[115]]=CuteEditor_ButtonDown;element[OxO2acc[117]]=CuteEditor_ButtonUp;Element_SetUnselectable(element);element[OxO2acc[128]]=true;} ;element[OxO2acc[129]]=true;element[OxO2acc[108]]=OxO2acc[130];} ;function CuteEditor_ButtonOut(){var element=this;element[OxO2acc[108]]=OxO2acc[110];element[OxO2acc[129]]=false;} ;function CuteEditor_ButtonDown(){if(!Event_IsLeftButton()){return ;} ;var element=this;element[OxO2acc[108]]=OxO2acc[131];} ;function CuteEditor_ButtonUp(){if(!Event_IsLeftButton()){return ;} ;var element=this;if(element[OxO2acc[129]]){element[OxO2acc[108]]=OxO2acc[130];} else {element[OxO2acc[108]]=OxO2acc[132];} ;} ;function CuteEditor_ColorPicker_ButtonOver(element){if(!element[OxO2acc[128]]){element[OxO2acc[119]]=Event_CancelEvent;element[OxO2acc[113]]=CuteEditor_ColorPicker_ButtonOut;element[OxO2acc[115]]=CuteEditor_ColorPicker_ButtonDown;Element_SetUnselectable(element);element[OxO2acc[128]]=true;} ;element[OxO2acc[129]]=true;element[OxO2acc[42]][OxO2acc[133]]=OxO2acc[134];element[OxO2acc[42]][OxO2acc[135]]=OxO2acc[136];element[OxO2acc[42]][OxO2acc[137]]=OxO2acc[138];} ;function CuteEditor_ColorPicker_ButtonOut(){var element=this;element[OxO2acc[129]]=false;element[OxO2acc[42]][OxO2acc[133]]=OxO2acc[139];element[OxO2acc[42]][OxO2acc[135]]=OxO2acc[12];element[OxO2acc[42]][OxO2acc[137]]=OxO2acc[138];} ;function CuteEditor_ColorPicker_ButtonDown(){var element=this;element[OxO2acc[42]][OxO2acc[133]]=OxO2acc[140];element[OxO2acc[42]][OxO2acc[135]]=OxO2acc[12];element[OxO2acc[42]][OxO2acc[137]]=OxO2acc[138];} ;function CuteEditor_ButtonCommandOver(element){element[OxO2acc[129]]=true;if(element[OxO2acc[141]]){element[OxO2acc[108]]=OxO2acc[142];} else {element[OxO2acc[108]]=OxO2acc[130];} ;} ;function CuteEditor_ButtonCommandOut(element){element[OxO2acc[129]]=false;if(element[OxO2acc[143]]){element[OxO2acc[108]]=OxO2acc[144];} else {if(element[OxO2acc[141]]){element[OxO2acc[108]]=OxO2acc[142];} else {element[OxO2acc[108]]=OxO2acc[110];} ;} ;} ;function CuteEditor_ButtonCommandDown(element){if(!Event_IsLeftButton()){return ;} ;element[OxO2acc[108]]=OxO2acc[131];} ;function CuteEditor_ButtonCommandUp(element){if(!Event_IsLeftButton()){return ;} ;if(element[OxO2acc[141]]){element[OxO2acc[108]]=OxO2acc[142];return ;} ;if(element[OxO2acc[129]]){element[OxO2acc[108]]=OxO2acc[130];} else {if(element[OxO2acc[143]]){element[OxO2acc[108]]=OxO2acc[144];} else {element[OxO2acc[108]]=OxO2acc[110];} ;} ;} ;var CuteEditorGlobalFunctions=[CuteEditor_GetEditor,CuteEditor_ButtonOver,CuteEditor_ButtonOut,CuteEditor_ButtonDown,CuteEditor_ButtonUp,CuteEditor_ColorPicker_ButtonOver,CuteEditor_ColorPicker_ButtonOut,CuteEditor_ColorPicker_ButtonDown,CuteEditor_ButtonCommandOver,CuteEditor_ButtonCommandOut,CuteEditor_ButtonCommandDown,CuteEditor_ButtonCommandUp,CuteEditor_DropDownCommand,CuteEditor_ExpandTreeDropDownItem,CuteEditor_CollapseTreeDropDownItem,CuteEditor_OnInitialized,CuteEditor_OnCommand,CuteEditor_OnChange,CuteEditor_AddVerbMenuItems,CuteEditor_AddTagMenuItems,CuteEditor_AddMainMenuItems,CuteEditor_AddDropMenuItems,CuteEditor_FilterCode,CuteEditor_FilterHTML];function SetupCuteEditorGlobalFunctions(){for(var i=0;i<CuteEditorGlobalFunctions[OxO2acc[14]];i++){var Ox2ac=CuteEditorGlobalFunctions[i];var name=Ox2ac+OxO2acc[12];name=name.substr(8,name.indexOf(OxO2acc[145])-8).replace(/\s/g,OxO2acc[12]);if(!window[name]){window[name]=Ox2ac;} ;} ;} ;SetupCuteEditorGlobalFunctions();var __danainfo=null;var danaurl=window[OxO2acc[147]][OxO2acc[146]];var danapos=danaurl.indexOf(OxO2acc[148]);if(danapos!=-1){var pluspos1=danaurl.indexOf(OxO2acc[149],danapos+10);var pluspos2=danaurl.indexOf(OxO2acc[150],danapos+10);if(pluspos1!=-1&&pluspos1<pluspos2){pluspos2=pluspos1;} ;__danainfo=danaurl.substring(danapos,pluspos2)+OxO2acc[150];} ;function CuteEditor_GetScriptProperty(name){var Ox267=this[OxO2acc[151]][name];if(Ox267&&__danainfo){if(name==OxO2acc[88]){return Ox267+__danainfo;} ;var Ox953=this[OxO2acc[151]][OxO2acc[88]];if(Ox267.substr(0,Ox953.length)==Ox953){return Ox953+__danainfo+Ox267.substring(Ox953.length);} ;} ;return Ox267;} ;function CuteEditor_SetScriptProperty(name,Ox267){if(Ox267==null){this[OxO2acc[151]][name]=null;} else {this[OxO2acc[151]][name]=String(Ox267);} ;} ;function CuteEditorInitialize(Oxb75,Oxb76){var editor=Window_GetElement(window,Oxb75,true);editor[OxO2acc[151]]=Oxb76;editor[OxO2acc[152]]=CuteEditor_GetScriptProperty;var Ox88a=Window_GetElement(window,editor.GetScriptProperty(OxO2acc[125]),true);var editwin=Frame_GetContentWindow(Ox88a);var editdoc=editwin[OxO2acc[13]];var Oxb77=false;var Oxb78;var Oxb79=false;var Oxb7a=editor.GetScriptProperty(OxO2acc[88])+OxO2acc[153];function Oxb7b(){if( typeof (window[OxO2acc[154]])==OxO2acc[155]){return ;} ;try{LoadXMLAsync(OxO2acc[156],Oxb7a+OxO2acc[157],Oxb7c);} catch(x){include(OxO2acc[158],Oxb7a);var Oxc46=setInterval(function (){if(window[OxO2acc[154]]){clearInterval(Oxc46);if(Oxb77){Oxb7e();} ;} ;} ,100);} ;} ;function Oxb7c(Ox3ad){if(Ox3ad[OxO2acc[159]]!=200){alert(OxO2acc[160]);return ;} ;CuteEditorInstallScriptCode(Ox3ad.responseText,OxO2acc[154]);if(Oxb77){Oxb7e();} ;} ;function Oxb7e(){if(Oxb79){return ;} ;Oxb79=true;window.CuteEditorImplementation(editor);try{editor[OxO2acc[42]][OxO2acc[161]]=OxO2acc[12];} catch(x){} ;try{editdoc[OxO2acc[162]][OxO2acc[42]][OxO2acc[161]]=OxO2acc[12];} catch(x){} ;var Oxb7f=editor.GetScriptProperty(OxO2acc[163]);if(Oxb7f){editor.Eval(Oxb7f);} ;} ;function Oxb80(){if(!window[OxO2acc[13]][OxO2acc[162]].contains(editor)){return ;} ;try{Ox88a=Window_GetElement(window,editor.GetScriptProperty(OxO2acc[125]),true);editwin=Frame_GetContentWindow(Ox88a);editdoc=editwin[OxO2acc[13]];x=editdoc[OxO2acc[162]];} catch(x){setTimeout(Oxb80,100);return ;} ;if(!editdoc[OxO2acc[162]]){setTimeout(Oxb80,100);return ;} ;if(!Oxb77){Ox88a[OxO2acc[42]][OxO2acc[41]]=OxO2acc[164];editdoc[OxO2acc[162]][OxO2acc[165]]=true;Oxb77=true;setTimeout(Oxb80,100);return ;} ;if( typeof (window[OxO2acc[154]])==OxO2acc[155]){Oxb7e();} else {try{editdoc[OxO2acc[162]][OxO2acc[42]][OxO2acc[161]]=OxO2acc[166];} catch(x){} ;} ;} ;function Oxb85(Oxb86){function Oxb87(Ox3ed,Oxb88,Oxb89,Ox334,Oxb8a,Oxb8b){var Oxb8c= new Array(0x1010400,0,0x10000,0x1010404,0x1010004,0x10404,0x4,0x10000,0x400,0x1010400,0x1010404,0x400,0x1000404,0x1010004,0x1000000,0x4,0x404,0x1000400,0x1000400,0x10400,0x10400,0x1010000,0x1010000,0x1000404,0x10004,0x1000004,0x1000004,0x10004,0,0x404,0x10404,0x1000000,0x10000,0x1010404,0x4,0x1010000,0x1010400,0x1000000,0x1000000,0x400,0x1010004,0x10000,0x10400,0x1000004,0x400,0x4,0x1000404,0x10404,0x1010404,0x10004,0x1010000,0x1000404,0x1000004,0x404,0x10404,0x1010400,0x404,0x1000400,0x1000400,0,0x10004,0x10400,0,0x1010004);var Oxb8d= new Array(-0x7fef7fe0,-0x7fff8000,0x8000,0x108020,0x100000,0x20,-0x7fefffe0,-0x7fff7fe0,-0x7fffffe0,-0x7fef7fe0,-0x7fef8000,-0x80000000,-0x7fff8000,0x100000,0x20,-0x7fefffe0,0x108000,0x100020,-0x7fff7fe0,0,-0x80000000,0x8000,0x108020,-0x7ff00000,0x100020,-0x7fffffe0,0,0x108000,0x8020,-0x7fef8000,-0x7ff00000,0x8020,0,0x108020,-0x7fefffe0,0x100000,-0x7fff7fe0,-0x7ff00000,-0x7fef8000,0x8000,-0x7ff00000,-0x7fff8000,0x20,-0x7fef7fe0,0x108020,0x20,0x8000,-0x80000000,0x8020,-0x7fef8000,0x100000,-0x7fffffe0,0x100020,-0x7fff7fe0,-0x7fffffe0,0x100020,0x108000,0,-0x7fff8000,0x8020,-0x80000000,-0x7fefffe0,-0x7fef7fe0,0x108000);var Oxb8e= new Array(0x208,0x8020200,0,0x8020008,0x8000200,0,0x20208,0x8000200,0x20008,0x8000008,0x8000008,0x20000,0x8020208,0x20008,0x8020000,0x208,0x8000000,0x8,0x8020200,0x200,0x20200,0x8020000,0x8020008,0x20208,0x8000208,0x20200,0x20000,0x8000208,0x8,0x8020208,0x200,0x8000000,0x8020200,0x8000000,0x20008,0x208,0x20000,0x8020200,0x8000200,0,0x200,0x20008,0x8020208,0x8000200,0x8000008,0x200,0,0x8020008,0x8000208,0x20000,0x8000000,0x8020208,0x8,0x20208,0x20200,0x8000008,0x8020000,0x8000208,0x208,0x8020000,0x20208,0x8,0x8020008,0x20200);var Oxb8f= new Array(0x802001,0x2081,0x2081,0x80,0x802080,0x800081,0x800001,0x2001,0,0x802000,0x802000,0x802081,0x81,0,0x800080,0x800001,0x1,0x2000,0x800000,0x802001,0x80,0x800000,0x2001,0x2080,0x800081,0x1,0x2080,0x800080,0x2000,0x802080,0x802081,0x81,0x800080,0x800001,0x802000,0x802081,0x81,0,0,0x802000,0x2080,0x800080,0x800081,0x1,0x802001,0x2081,0x2081,0x80,0x802081,0x81,0x1,0x2000,0x800001,0x2001,0x802080,0x800081,0x2001,0x2080,0x800000,0x802001,0x80,0x800000,0x2000,0x802080);var Oxb90= new Array(0x100,0x2080100,0x2080000,0x42000100,0x80000,0x100,0x40000000,0x2080000,0x40080100,0x80000,0x2000100,0x40080100,0x42000100,0x42080000,0x80100,0x40000000,0x2000000,0x40080000,0x40080000,0,0x40000100,0x42080100,0x42080100,0x2000100,0x42080000,0x40000100,0,0x42000000,0x2080100,0x2000000,0x42000000,0x80100,0x80000,0x42000100,0x100,0x2000000,0x40000000,0x2080000,0x42000100,0x40080100,0x2000100,0x40000000,0x42080000,0x2080100,0x40080100,0x100,0x2000000,0x42080000,0x42080100,0x80100,0x42000000,0x42080100,0x2080000,0,0x40080000,0x42000000,0x80100,0x2000100,0x40000100,0x80000,0,0x40080000,0x2080100,0x40000100);var Oxb91= new Array(0x20000010,0x20400000,0x4000,0x20404010,0x20400000,0x10,0x20404010,0x400000,0x20004000,0x404010,0x400000,0x20000010,0x400010,0x20004000,0x20000000,0x4010,0,0x400010,0x20004010,0x4000,0x404000,0x20004010,0x10,0x20400010,0x20400010,0,0x404010,0x20404000,0x4010,0x404000,0x20404000,0x20000000,0x20004000,0x10,0x20400010,0x404000,0x20404010,0x400000,0x4010,0x20000010,0x400000,0x20004000,0x20000000,0x4010,0x20000010,0x20404010,0x404000,0x20400000,0x404010,0x20404000,0,0x20400010,0x10,0x4000,0x20400000,0x404010,0x4000,0x400010,0x20004010,0,0x20404000,0x20000000,0x400010,0x20004010);var Oxb92= new Array(0x200000,0x4200002,0x4000802,0,0x800,0x4000802,0x200802,0x4200800,0x4200802,0x200000,0,0x4000002,0x2,0x4000000,0x4200002,0x802,0x4000800,0x200802,0x200002,0x4000800,0x4000002,0x4200000,0x4200800,0x200002,0x4200000,0x800,0x802,0x4200802,0x200800,0x2,0x4000000,0x200800,0x4000000,0x200800,0x200000,0x4000802,0x4000802,0x4200002,0x4200002,0x2,0x200002,0x4000000,0x4000800,0x200000,0x4200800,0x802,0x200802,0x4200800,0x802,0x4000002,0x4200802,0x4200000,0x200800,0,0x2,0x4200802,0,0x200802,0x4200000,0x800,0x4000002,0x4000800,0x800,0x200002);var Oxb93= new Array(0x10001040,0x1000,0x40000,0x10041040,0x10000000,0x10001040,0x40,0x10000000,0x40040,0x10040000,0x10041040,0x41000,0x10041000,0x41040,0x1000,0x40,0x10040000,0x10000040,0x10001000,0x1040,0x41000,0x40040,0x10040040,0x10041000,0x1040,0,0,0x10040040,0x10000040,0x10001000,0x41040,0x40000,0x41040,0x40000,0x10041000,0x1000,0x40,0x10040040,0x1000,0x41040,0x10001000,0x40,0x10000040,0x10040000,0x10040040,0x10000000,0x40000,0x10001040,0,0x10041040,0x40040,0x10000040,0x10040000,0x10001000,0x10001040,0,0x10041040,0x41000,0x41000,0x1040,0x1040,0x40040,0x10000000,0x10041000);var Ox3f0=Oxba2(Ox3ed);var m=0,i,Ox1e9,Ox329,Oxb94,Oxb95,Oxb96,Ox56f,Oxb97,Oxb98;var Oxb99,Oxb9a,Oxb9b,Oxb9c;var Oxb9d,Oxb9e;var len=Oxb88[OxO2acc[14]];var Oxb9f=0;var Oxba0=Ox3f0[OxO2acc[14]]==32?3:9;if(Oxba0==3){Oxb98=Oxb89? new Array(0,32,2): new Array(30,-2,-2);} else {Oxb98=Oxb89? new Array(0,32,2,62,30,-2,64,96,2): new Array(94,62,-2,32,64,2,30,-2,-2);} ;var Ox32a=OxO2acc[12];var Oxba1=OxO2acc[12];if(Ox334==1){Oxb99=(Oxb8a.charCodeAt(m++)<<24)|(Oxb8a.charCodeAt(m++)<<16)|(Oxb8a.charCodeAt(m++)<<8)|Oxb8a.charCodeAt(m++);Oxb9b=(Oxb8a.charCodeAt(m++)<<24)|(Oxb8a.charCodeAt(m++)<<16)|(Oxb8a.charCodeAt(m++)<<8)|Oxb8a.charCodeAt(m++);m=0;} ;while(m<len){Ox56f=(Oxb88.charCodeAt(m++)<<24)|(Oxb88.charCodeAt(m++)<<16)|(Oxb88.charCodeAt(m++)<<8)|Oxb88.charCodeAt(m++);Oxb97=(Oxb88.charCodeAt(m++)<<24)|(Oxb88.charCodeAt(m++)<<16)|(Oxb88.charCodeAt(m++)<<8)|Oxb88.charCodeAt(m++);if(Ox334==1){if(Oxb89){Ox56f^=Oxb99;Oxb97^=Oxb9b;} else {Oxb9a=Oxb99;Oxb9c=Oxb9b;Oxb99=Ox56f;Oxb9b=Oxb97;} ;} ;Ox329=((Ox56f>>>4)^Oxb97)&0x0f0f0f0f;Oxb97^=Ox329;Ox56f^=(Ox329<<4);Ox329=((Ox56f>>>16)^Oxb97)&0x0000ffff;Oxb97^=Ox329;Ox56f^=(Ox329<<16);Ox329=((Oxb97>>>2)^Ox56f)&0x33333333;Ox56f^=Ox329;Oxb97^=(Ox329<<2);Ox329=((Oxb97>>>8)^Ox56f)&0x00ff00ff;Ox56f^=Ox329;Oxb97^=(Ox329<<8);Ox329=((Ox56f>>>1)^Oxb97)&0x55555555;Oxb97^=Ox329;Ox56f^=(Ox329<<1);Ox56f=((Ox56f<<1)|(Ox56f>>>31));Oxb97=((Oxb97<<1)|(Oxb97>>>31));for(Ox1e9=0;Ox1e9<Oxba0;Ox1e9+=3){Oxb9d=Oxb98[Ox1e9+1];Oxb9e=Oxb98[Ox1e9+2];for(i=Oxb98[Ox1e9];i!=Oxb9d;i+=Oxb9e){Oxb95=Oxb97^Ox3f0[i];Oxb96=((Oxb97>>>4)|(Oxb97<<28))^Ox3f0[i+1];Ox329=Ox56f;Ox56f=Oxb97;Oxb97=Ox329^(Oxb8d[(Oxb95>>>24)&0x3f]|Oxb8f[(Oxb95>>>16)&0x3f]|Oxb91[(Oxb95>>>8)&0x3f]|Oxb93[Oxb95&0x3f]|Oxb8c[(Oxb96>>>24)&0x3f]|Oxb8e[(Oxb96>>>16)&0x3f]|Oxb90[(Oxb96>>>8)&0x3f]|Oxb92[Oxb96&0x3f]);} ;Ox329=Ox56f;Ox56f=Oxb97;Oxb97=Ox329;} ;Ox56f=((Ox56f>>>1)|(Ox56f<<31));Oxb97=((Oxb97>>>1)|(Oxb97<<31));Ox329=((Ox56f>>>1)^Oxb97)&0x55555555;Oxb97^=Ox329;Ox56f^=(Ox329<<1);Ox329=((Oxb97>>>8)^Ox56f)&0x00ff00ff;Ox56f^=Ox329;Oxb97^=(Ox329<<8);Ox329=((Oxb97>>>2)^Ox56f)&0x33333333;Ox56f^=Ox329;Oxb97^=(Ox329<<2);Ox329=((Ox56f>>>16)^Oxb97)&0x0000ffff;Oxb97^=Ox329;Ox56f^=(Ox329<<16);Ox329=((Ox56f>>>4)^Oxb97)&0x0f0f0f0f;Oxb97^=Ox329;Ox56f^=(Ox329<<4);if(Ox334==1){if(Oxb89){Oxb99=Ox56f;Oxb9b=Oxb97;} else {Ox56f^=Oxb9a;Oxb97^=Oxb9c;} ;} ;Oxba1+=String.fromCharCode((Ox56f>>>24),((Ox56f>>>16)&0xff),((Ox56f>>>8)&0xff),(Ox56f&0xff),(Oxb97>>>24),((Oxb97>>>16)&0xff),((Oxb97>>>8)&0xff),(Oxb97&0xff));Oxb9f+=8;if(Oxb9f==512){Ox32a+=Oxba1;Oxba1=OxO2acc[12];Oxb9f=0;} ;} ;return Ox32a+Oxba1;} ;function Oxba2(Ox3ed){var Oxba3= new Array(0,0x4,0x20000000,0x20000004,0x10000,0x10004,0x20010000,0x20010004,0x200,0x204,0x20000200,0x20000204,0x10200,0x10204,0x20010200,0x20010204);var Oxba4= new Array(0,0x1,0x100000,0x100001,0x4000000,0x4000001,0x4100000,0x4100001,0x100,0x101,0x100100,0x100101,0x4000100,0x4000101,0x4100100,0x4100101);var Oxba5= new Array(0,0x8,0x800,0x808,0x1000000,0x1000008,0x1000800,0x1000808,0,0x8,0x800,0x808,0x1000000,0x1000008,0x1000800,0x1000808);var Oxba6= new Array(0,0x200000,0x8000000,0x8200000,0x2000,0x202000,0x8002000,0x8202000,0x20000,0x220000,0x8020000,0x8220000,0x22000,0x222000,0x8022000,0x8222000);var Oxba7= new Array(0,0x40000,0x10,0x40010,0,0x40000,0x10,0x40010,0x1000,0x41000,0x1010,0x41010,0x1000,0x41000,0x1010,0x41010);var Oxba8= new Array(0,0x400,0x20,0x420,0,0x400,0x20,0x420,0x2000000,0x2000400,0x2000020,0x2000420,0x2000000,0x2000400,0x2000020,0x2000420);var Oxba9= new Array(0,0x10000000,0x80000,0x10080000,0x2,0x10000002,0x80002,0x10080002,0,0x10000000,0x80000,0x10080000,0x2,0x10000002,0x80002,0x10080002);var Oxbaa= new Array(0,0x10000,0x800,0x10800,0x20000000,0x20010000,0x20000800,0x20010800,0x20000,0x30000,0x20800,0x30800,0x20020000,0x20030000,0x20020800,0x20030800);var Oxbab= new Array(0,0x40000,0,0x40000,0x2,0x40002,0x2,0x40002,0x2000000,0x2040000,0x2000000,0x2040000,0x2000002,0x2040002,0x2000002,0x2040002);var Oxbac= new Array(0,0x10000000,0x8,0x10000008,0,0x10000000,0x8,0x10000008,0x400,0x10000400,0x408,0x10000408,0x400,0x10000400,0x408,0x10000408);var Oxbad= new Array(0,0x20,0,0x20,0x100000,0x100020,0x100000,0x100020,0x2000,0x2020,0x2000,0x2020,0x102000,0x102020,0x102000,0x102020);var Oxbae= new Array(0,0x1000000,0x200,0x1000200,0x200000,0x1200000,0x200200,0x1200200,0x4000000,0x5000000,0x4000200,0x5000200,0x4200000,0x5200000,0x4200200,0x5200200);var Oxbaf= new Array(0,0x1000,0x8000000,0x8001000,0x80000,0x81000,0x8080000,0x8081000,0x10,0x1010,0x8000010,0x8001010,0x80010,0x81010,0x8080010,0x8081010);var Oxbb0= new Array(0,0x4,0x100,0x104,0,0x4,0x100,0x104,0x1,0x5,0x101,0x105,0x1,0x5,0x101,0x105);var Oxba0=Ox3ed[OxO2acc[14]]>8?3:1;var Ox3f0= new Array(32*Oxba0);var Oxbb1= new Array(0,0,1,1,1,1,1,1,0,1,1,1,1,1,1,0);var Oxbb2,Oxbb3,m=0,Ox23a=0,Ox329;var Ox56f,Oxb97;for(var Ox1e9=0;Ox1e9<Oxba0;Ox1e9++){Ox56f=(Ox3ed.charCodeAt(m++)<<24)|(Ox3ed.charCodeAt(m++)<<16)|(Ox3ed.charCodeAt(m++)<<8)|Ox3ed.charCodeAt(m++);Oxb97=(Ox3ed.charCodeAt(m++)<<24)|(Ox3ed.charCodeAt(m++)<<16)|(Ox3ed.charCodeAt(m++)<<8)|Ox3ed.charCodeAt(m++);Ox329=((Ox56f>>>4)^Oxb97)&0x0f0f0f0f;Oxb97^=Ox329;Ox56f^=(Ox329<<4);Ox329=((Oxb97>>>-16)^Ox56f)&0x0000ffff;Ox56f^=Ox329;Oxb97^=(Ox329<<-16);Ox329=((Ox56f>>>2)^Oxb97)&0x33333333;Oxb97^=Ox329;Ox56f^=(Ox329<<2);Ox329=((Oxb97>>>-16)^Ox56f)&0x0000ffff;Ox56f^=Ox329;Oxb97^=(Ox329<<-16);Ox329=((Ox56f>>>1)^Oxb97)&0x55555555;Oxb97^=Ox329;Ox56f^=(Ox329<<1);Ox329=((Oxb97>>>8)^Ox56f)&0x00ff00ff;Ox56f^=Ox329;Oxb97^=(Ox329<<8);Ox329=((Ox56f>>>1)^Oxb97)&0x55555555;Oxb97^=Ox329;Ox56f^=(Ox329<<1);Ox329=(Ox56f<<8)|((Oxb97>>>20)&0x000000f0);Ox56f=(Oxb97<<24)|((Oxb97<<8)&0xff0000)|((Oxb97>>>8)&0xff00)|((Oxb97>>>24)&0xf0);Oxb97=Ox329;for(i=0;i<Oxbb1[OxO2acc[14]];i++){if(Oxbb1[i]){Ox56f=(Ox56f<<2)|(Ox56f>>>26);Oxb97=(Oxb97<<2)|(Oxb97>>>26);} else {Ox56f=(Ox56f<<1)|(Ox56f>>>27);Oxb97=(Oxb97<<1)|(Oxb97>>>27);} ;Ox56f&=-0xf;Oxb97&=-0xf;Oxbb2=Oxba3[Ox56f>>>28]|Oxba4[(Ox56f>>>24)&0xf]|Oxba5[(Ox56f>>>20)&0xf]|Oxba6[(Ox56f>>>16)&0xf]|Oxba7[(Ox56f>>>12)&0xf]|Oxba8[(Ox56f>>>8)&0xf]|Oxba9[(Ox56f>>>4)&0xf];Oxbb3=Oxbaa[Oxb97>>>28]|Oxbab[(Oxb97>>>24)&0xf]|Oxbac[(Oxb97>>>20)&0xf]|Oxbad[(Oxb97>>>16)&0xf]|Oxbae[(Oxb97>>>12)&0xf]|Oxbaf[(Oxb97>>>8)&0xf]|Oxbb0[(Oxb97>>>4)&0xf];Ox329=((Oxbb3>>>16)^Oxbb2)&0x0000ffff;Ox3f0[Ox23a++]=Oxbb2^Ox329;Ox3f0[Ox23a++]=Oxbb3^(Ox329<<16);} ;} ;return Ox3f0;} ;var Oxb88=[];for(var i=0;i<Oxb86[OxO2acc[14]];i++){Oxb88.push(String.fromCharCode(Oxb86[i]));} ;Oxb88=Oxb88.join(OxO2acc[12]);var Oxbb4=[0x46,0x35,0x32,0x42,0x31,0x38,0x36,0x46];var Ox3ed=[];for(var i=0;i<Oxbb4[OxO2acc[14]];i++){Ox3ed.push(String.fromCharCode(Oxbb4[i]));} ;Ox3ed=Ox3ed.join(OxO2acc[12]);var Oxb8a=Ox3ed;return Oxb87(Ox3ed,Oxb88,0,1,Oxb8a);} ;var Oxbb5;var Oxbb6;var Oxbb7;var Oxbb8;function Oxbb9(Oxbba){var Ox3ad=CreateXMLHttpRequest();var Oxbbb=Oxbca;if(!Oxbb5){Ox3ad.open(OxO2acc[156],editor.GetScriptProperty(OxO2acc[88])+OxO2acc[167]+OxO2acc[168]+ new Date().getTime(),false);Ox3ad.send(OxO2acc[12]);if(Ox3ad[OxO2acc[159]]!=200){return Oxbbb(1000,OxO2acc[169]);} ;Oxbb5=Ox3ad[OxO2acc[170]].toUpperCase();} ;if(!Oxbb6){Oxbb6={};var Oxbbc=[OxO2acc[171],OxO2acc[172],OxO2acc[173],OxO2acc[174],OxO2acc[175],OxO2acc[176],OxO2acc[177],OxO2acc[178],OxO2acc[179],OxO2acc[180],OxO2acc[181],OxO2acc[182],OxO2acc[183],OxO2acc[184],OxO2acc[185],OxO2acc[186]];for(var i=0;i<Oxbbc[OxO2acc[14]];i++){Oxbb6[Oxbbc[i]]=i;} ;} ;try{if(!Oxbb7){if(Oxbb5.substring(0,16)!=OxO2acc[187]){return Oxbbb(1001);} ;var Oxbbd=[];for(var i=0;i<Oxbb5[OxO2acc[14]];i+=2){Oxbbd.push(Oxbb6[Oxbb5.charAt(i)]*16+Oxbb6[Oxbb5.charAt(i+1)]);} ;Oxbbd.splice(0,8);Oxbbd.splice(0,123);var Oxbbe=Oxbbd[0]+Oxbbd[1]*256;Oxbbd.splice(0,4);var Oxbbf=Oxbbd.slice(0,Oxbbe);var Oxbc0=Oxb85(Oxbbf);Oxbc0=Oxbc0.replace(/^\xEF\xBB\xBF/,OxO2acc[12]).replace(/[\x00-\x08]*$/,OxO2acc[12]);Oxbb7=Oxbc0.split(OxO2acc[188]);} ;if(Oxbb7[OxO2acc[14]]!=10){return Oxbbb(1002,Oxbb7.length);} ;var Oxbc1=Oxbb7[9].split(OxO2acc[189]);var Oxbc2= new Date(parseFloat(Oxbc1[2]),parseFloat(Oxbc1[1])-1,parseFloat(Oxbc1[0]));var Oxbc3=Oxbc2.getTime();if((Oxbb7[5]<<2)!=1200685124){return Oxbbb(1003,Oxbb7[5]);} ;var Oxbc4=window[OxO2acc[147]][OxO2acc[146]].split(OxO2acc[191])[1].split(OxO2acc[189])[0].split(OxO2acc[190])[0].toLowerCase();var Oxbc5=false;if(Oxbc4==String.fromCharCode(108,111,99,97,108,104,111,115,116)){Oxbc5=true;} ;if(Oxbc4==String.fromCharCode(49,50,55,46,48,46,48,46,49)){Oxbc5=true;} ;function Oxbc6(Oxbc7){var Ox24b=Oxbc7.split(OxO2acc[192]);if(Ox24b[0]==OxO2acc[193]){Ox24b.splice(0,1);} ;return Ox24b.join(OxO2acc[192]);} ;Oxbc4=Oxbc6(Oxbc4);var Oxbc8=Oxbb7[7].toLowerCase();var Oxbc9=Oxbb7[8];switch(parseInt(Oxbb7[6])){case 0:if(Oxbc3< new Date().getTime()){return Oxbbb(20000,Oxbc2);} ;if(Oxbc5){break ;} ;return Oxbbb(20001,Oxbc4);;case 1:if(Oxbc5){break ;} ;if(Oxbc8!=Oxbc4&&Oxbc8.indexOf(Oxbc4)==-1){return Oxbbb(20010,Oxbc4);} ;break ;;case 2:if(Oxbc5){break ;} ;if(!Oxbb8){Ox3ad.open(OxO2acc[156],editor.GetScriptProperty(OxO2acc[88])+OxO2acc[167]+OxO2acc[194]+ new Date().getTime(),false);Ox3ad.send(OxO2acc[12]);if(Ox3ad[OxO2acc[159]]!=200){return Oxbbb(1000,OxO2acc[195]);} ;Oxbb8=Ox3ad[OxO2acc[170]];} ;if(Oxbc9!=Oxbb8&&Oxbc9.indexOf(Oxbb8)==-1){return Oxbbb(20020,Oxbb8);} ;break ;;case 3:if(Oxbc5){break ;} ;if(Oxbc8.indexOf(Oxbc4)==-1){return Oxbbb(20030,Oxbc4);} ;break ;;case 4:if(Oxbc3< new Date().getTime()){return Oxbbb(20040,Oxbc2);} ;break ;;case 5:break ;;default:return Oxbbb(1004,parseInt(Oxbb7[6]));;} ;} catch(x){return Oxbbb(1000,x.message);} ;return Oxbba();} ;function Oxbca(Oxbcb,Ox836){var msg=OxO2acc[12];switch(Oxbcb){case 1000:msg=Ox836;break ;;case 1001:msg=OxO2acc[196];break ;;case 1002:msg=OxO2acc[197]+Ox836;break ;;case 1003:msg=OxO2acc[198];break ;;case 1004:msg=OxO2acc[199];break ;;case 20000:msg=OxO2acc[200];break ;;case 20001:msg=OxO2acc[201]+Ox836;break ;;case 20010:msg=OxO2acc[202]+Ox836;break ;;case 20020:msg=OxO2acc[203]+Ox836;break ;;case 20030:msg=OxO2acc[204]+Ox836;break ;;case 20040:msg=OxO2acc[205];break ;;} ;try{return alert(OxO2acc[206]+msg);} catch(x){} ;} ;CuteEditor_BasicInitialize(editor);Oxb7b();Oxbb9(Oxb80);} ;function CuteEditorInstallScriptCode(Oxac3,Oxac4){eval(Oxac3);window[Oxac4]=eval(Oxac4);} ;