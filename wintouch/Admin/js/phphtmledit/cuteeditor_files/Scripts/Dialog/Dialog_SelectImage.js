var OxO3197=["top","dialogArguments","opener","_dialog_arguments","document","value","","uploader1","browse_Frame","height","style","250px","contentWindow","btn_CreateDir","btn_zoom_in","btn_zoom_out","btn_bestfit","btn_Actualsize","divpreview","img_demo","TargetUrl","Button1","Button2","editor","window","src",".aspx","inp","zoom","width","display","none","wrapupPrompt","iepromptfield","body","div","id","IEPromptBox","promptBlackout","border","1px solid #b0bec7","backgroundColor","#f0f0f0","position","absolute","330px","zIndex","100","\x3Cdiv style=\x22width: 100%; padding-top:3px;background-color: #DCE7EB; font-family: verdana; font-size: 10pt; font-weight: bold; height: 22px; text-align:center; background:url(../Images/formbg2.gif) repeat-x left top;\x22\x3E","\x3C/div\x3E","\x3Cdiv style=\x22padding: 10px\x22\x3E","\x3CBR\x3E\x3CBR\x3E","\x3Cform action=\x22\x22 onsubmit=\x22return wrapupPrompt()\x22\x3E","\x3Cinput id=\x22iepromptfield\x22 name=\x22iepromptdata\x22 type=text size=46 value=\x22","\x22\x3E","\x3Cbr\x3E\x3Cbr\x3E\x3Ccenter\x3E","\x3Cinput type=\x22submit\x22 value=\x22\x26nbsp;\x26nbsp;\x26nbsp;","\x26nbsp;\x26nbsp;\x26nbsp;\x22\x3E","\x26nbsp;\x26nbsp;\x26nbsp;\x26nbsp;\x26nbsp;\x26nbsp;","\x3Cinput type=\x22button\x22 onclick=\x22wrapupPrompt(true)\x22 value=\x22\x26nbsp;","\x26nbsp;\x22\x3E","\x3C/form\x3E\x3C/div\x3E","innerHTML","100px","left","offsetWidth","px","block"];function Window_FindDialogArguments(Ox2c6){var Ox348=Ox2c6[OxO3197[0]];if(Ox348[OxO3197[1]]){return Ox348[OxO3197[1]];} ;var Ox349=Ox348[OxO3197[2]];if(Ox349==null){return Ox348[OxO3197[4]][OxO3197[3]];} ;var Ox34a=Ox349[OxO3197[4]][OxO3197[3]];if(Ox34a==null){return Window_FindDialogArguments(Ox349);} ;return Ox34a;} ;setMouseOver();function setMouseOver(){} ;function row_click(Ox4cb){TargetUrl[OxO3197[5]]=Ox4cb;Actualsize();} ;function reset_hiddens(){if(TargetUrl[OxO3197[5]]!=OxO3197[6]&&TargetUrl[OxO3197[5]]!=null){do_preview();} ;} ;function ResetFields(){TargetUrl[OxO3197[5]]=OxO3197[6];} ;function RequireFileBrowseScript(){} ;RequireFileBrowseScript();var uploader1=Window_GetElement(window,OxO3197[7],true);var browse_Frame=Window_GetElement(window,OxO3197[8],true);if(!Browser_IsWinIE()){browse_Frame[OxO3197[10]][OxO3197[9]]=OxO3197[11];} ;browse_Frame=browse_Frame[OxO3197[12]];var btn_CreateDir=Window_GetElement(window,OxO3197[13],true);var btn_zoom_in=Window_GetElement(window,OxO3197[14],true);var btn_zoom_out=Window_GetElement(window,OxO3197[15],true);var btn_bestfit=Window_GetElement(window,OxO3197[16],true);var btn_Actualsize=Window_GetElement(window,OxO3197[17],true);var divpreview=Window_GetElement(window,OxO3197[18],true);var img_demo=Window_GetElement(window,OxO3197[19],true);var TargetUrl=Window_GetElement(window,OxO3197[20],true);var Button1=Window_GetElement(window,OxO3197[21],true);var Button2=Window_GetElement(window,OxO3197[22],true);var arg=Window_FindDialogArguments(window);var editor=arg[OxO3197[23]];var editwin=arg[OxO3197[24]];var editdoc=arg[OxO3197[4]];do_preview();function do_preview(){var Ox4c1=TargetUrl[OxO3197[5]];if(Ox4c1==OxO3197[6]){return ;} ;img_demo[OxO3197[25]]=Ox4c1;Ox4c1=Ox4c1.toLowerCase();if(Ox4c1.indexOf(OxO3197[26])!=-1){} ;} ;function do_insert(){var Ox572=arg[OxO3197[27]];if(Ox572){try{Ox572[OxO3197[5]]=TargetUrl[OxO3197[5]];} catch(x){} ;} ;Window_SetDialogReturnValue(window,TargetUrl.value);Window_CloseDialog(window);} ;function do_Close(){Window_SetDialogReturnValue(window,null);Window_CloseDialog(window);} ;function Zoom_In(){if(divpreview[OxO3197[10]][OxO3197[28]]!=0){divpreview[OxO3197[10]][OxO3197[28]]*=1.2;} else {divpreview[OxO3197[10]][OxO3197[28]]=1.2;} ;} ;function Zoom_Out(){if(divpreview[OxO3197[10]][OxO3197[28]]!=0){divpreview[OxO3197[10]][OxO3197[28]]*=0.8;} else {divpreview[OxO3197[10]][OxO3197[28]]=0.8;} ;} ;function BestFit(){var Ox484=280;var Ox26f=290;divpreview[OxO3197[10]][OxO3197[28]]=1/Math.max(img_demo[OxO3197[29]]/Ox26f,img_demo[OxO3197[9]]/Ox484);} ;function Actualsize(){divpreview[OxO3197[10]][OxO3197[28]]=1;do_preview();} ;if(!Browser_IsWinIE()){} ;if(!Browser_IsWinIE()){btn_zoom_in[OxO3197[10]][OxO3197[30]]=btn_zoom_out[OxO3197[10]][OxO3197[30]]=btn_bestfit[OxO3197[10]][OxO3197[30]]=btn_Actualsize[OxO3197[10]][OxO3197[30]]=OxO3197[31];} ;if(Browser_IsIE7()){var _dialogPromptID=null;function IEprompt(Ox33e,Ox33f,Ox340){that=this;this[OxO3197[32]]=function (Ox341){val=document.getElementById(OxO3197[33])[OxO3197[5]];_dialogPromptID[OxO3197[10]][OxO3197[30]]=OxO3197[31];document.getElementById(OxO3197[33])[OxO3197[5]]=OxO3197[6];if(Ox341){val=OxO3197[6];} ;Ox33e(val);return false;} ;if(Ox340==undefined){Ox340=OxO3197[6];} ;if(_dialogPromptID==null){var Ox342=document.getElementsByTagName(OxO3197[34])[0];tnode=document.createElement(OxO3197[35]);tnode[OxO3197[36]]=OxO3197[37];Ox342.appendChild(tnode);_dialogPromptID=document.getElementById(OxO3197[37]);tnode=document.createElement(OxO3197[35]);tnode[OxO3197[36]]=OxO3197[38];Ox342.appendChild(tnode);_dialogPromptID[OxO3197[10]][OxO3197[39]]=OxO3197[40];_dialogPromptID[OxO3197[10]][OxO3197[41]]=OxO3197[42];_dialogPromptID[OxO3197[10]][OxO3197[43]]=OxO3197[44];_dialogPromptID[OxO3197[10]][OxO3197[29]]=OxO3197[45];_dialogPromptID[OxO3197[10]][OxO3197[46]]=OxO3197[47];} ;var Ox343=OxO3197[48]+InputRequired+OxO3197[49];Ox343+=OxO3197[50]+Ox33f+OxO3197[51];Ox343+=OxO3197[52];Ox343+=OxO3197[53]+Ox340+OxO3197[54];Ox343+=OxO3197[55];Ox343+=OxO3197[56]+OK+OxO3197[57];Ox343+=OxO3197[58];Ox343+=OxO3197[59]+Cancel+OxO3197[60];Ox343+=OxO3197[61];_dialogPromptID[OxO3197[62]]=Ox343;_dialogPromptID[OxO3197[10]][OxO3197[0]]=OxO3197[63];_dialogPromptID[OxO3197[10]][OxO3197[64]]=parseInt((document[OxO3197[34]][OxO3197[65]]-315)/2)+OxO3197[66];_dialogPromptID[OxO3197[10]][OxO3197[30]]=OxO3197[67];var Ox344=document.getElementById(OxO3197[33]);try{var Ox345=Ox344.createTextRange();Ox345.collapse(false);Ox345.select();} catch(x){Ox344.focus();} ;} ;} ;