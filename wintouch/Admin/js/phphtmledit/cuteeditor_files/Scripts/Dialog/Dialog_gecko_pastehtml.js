var OxOc7ef=["onload","contentWindow","idSource","innerHTML","body","document","","designMode","on","contentEditable","fontFamily","style","Tahoma","fontSize","11px","color","black","background","white","length","\x3C$1$3","\x26nbsp;","\x22","\x27","$1","\x26amp;","\x26lt;","\x26gt;","\x26#39;","\x26quot;"];var editor=Window_GetDialogArguments(window);function cancel(){Window_CloseDialog(window);} ;window[OxOc7ef[0]]=function (){var iframe=document.getElementById(OxOc7ef[2])[OxOc7ef[1]];iframe[OxOc7ef[5]][OxOc7ef[4]][OxOc7ef[3]]=OxOc7ef[6];iframe[OxOc7ef[5]][OxOc7ef[7]]=OxOc7ef[8];iframe[OxOc7ef[5]][OxOc7ef[4]][OxOc7ef[9]]=true;iframe[OxOc7ef[5]][OxOc7ef[4]][OxOc7ef[11]][OxOc7ef[10]]=OxOc7ef[12];iframe[OxOc7ef[5]][OxOc7ef[4]][OxOc7ef[11]][OxOc7ef[13]]=OxOc7ef[14];iframe[OxOc7ef[5]][OxOc7ef[4]][OxOc7ef[11]][OxOc7ef[15]]=OxOc7ef[16];iframe[OxOc7ef[5]][OxOc7ef[4]][OxOc7ef[11]][OxOc7ef[17]]=OxOc7ef[18];iframe.focus();} ;function insertContent(){var iframe=document.getElementById(OxOc7ef[2])[OxOc7ef[1]];var Ox3b5=iframe[OxOc7ef[5]][OxOc7ef[4]][OxOc7ef[3]];if(Ox3b5&&Ox3b5[OxOc7ef[19]]>0){Ox3b5=_CleanCode(Ox3b5);if(Ox3b5.match(/<*>/g)){Ox3b5=String_HtmlEncode(Ox3b5);} ;editor.PasteHTML(Ox3b5);Window_CloseDialog(window);} ;} ;function _CleanCode(Ox45b){Ox45b=Ox45b.replace(/<\\?\??xml[^>]>/gi,OxOc7ef[6]);Ox45b=Ox45b.replace(/<([\w]+) class=([^ |>]*)([^>]*)/gi,OxOc7ef[20]);Ox45b=Ox45b.replace(/<(\w[^>]*) lang=([^ |>]*)([^>]*)/gi,OxOc7ef[20]);Ox45b=Ox45b.replace(/\s*mso-[^:]+:[^;"]+;?/gi,OxOc7ef[6]);Ox45b=Ox45b.replace(/<o:p>\s*<\/o:p>/g,OxOc7ef[6]);Ox45b=Ox45b.replace(/<o:p>.*?<\/o:p>/g,OxOc7ef[21]);Ox45b=Ox45b.replace(/<\/?\w+:[^>]*>/gi,OxOc7ef[6]);Ox45b=Ox45b.replace(/<\!--.*-->/g,OxOc7ef[6]);Ox45b=Ox45b.replace(/[\\]/gi,OxOc7ef[22]);Ox45b=Ox45b.replace(/[\\]/gi,OxOc7ef[23]);Ox45b=Ox45b.replace(/<\\?\?xml[^>]*>/gi,OxOc7ef[6]);Ox45b=Ox45b.replace(/<(\w+)[^>]*\sstyle="[^"]*DISPLAY\s?:\s?none(.*?)<\/\1>/ig,OxOc7ef[6]);Ox45b=Ox45b.replace(/<span\s*[^>]*>\s*&nbsp;\s*<\/span>/gi,OxOc7ef[21]);Ox45b=Ox45b.replace(/<span\s*[^>]*><\/span>/gi,OxOc7ef[6]);Ox45b=Ox45b.replace(/\s*style="\s*"/gi,OxOc7ef[6]);Ox45b=Ox45b.replace(/<([^\s>]+)[^>]*>\s*<\/\1>/g,OxOc7ef[6]);Ox45b=Ox45b.replace(/<([^\s>]+)[^>]*>\s*<\/\1>/g,OxOc7ef[6]);Ox45b=Ox45b.replace(/<([^\s>]+)[^>]*>\s*<\/\1>/g,OxOc7ef[6]);while(Ox45b.match(/<span\s*>(.*?)<\/span>/gi)){Ox45b=Ox45b.replace(/<span\s*>(.*?)<\/span>/gi,OxOc7ef[24]);} ;while(Ox45b.match(/<font\s*>(.*?)<\/font>/gi)){Ox45b=Ox45b.replace(/<font\s*>(.*?)<\/font>/gi,OxOc7ef[24]);} ;Ox45b=Ox45b.replace(/<a name="?OLE_LINK\d+"?>((.|[\r\n])*?)<\/a>/gi,OxOc7ef[24]);Ox45b=Ox45b.replace(/<a name="?_Hlt\d+"?>((.|[\r\n])*?)<\/a>/gi,OxOc7ef[24]);Ox45b=Ox45b.replace(/<a name="?_Toc\d+"?>((.|[\r\n])*?)<\/a>/gi,OxOc7ef[24]);Ox45b=Ox45b.replace(/<p([^>])*>(&nbsp;)*\s*<\/p>/gi,OxOc7ef[6]);Ox45b=Ox45b.replace(/<p([^>])*>(&nbsp;)<\/p>/gi,OxOc7ef[6]);return Ox45b;} ;function String_HtmlEncode(Ox3a4){if(Ox3a4==null){return OxOc7ef[6];} ;Ox3a4=Ox3a4.replace(/&/g,OxOc7ef[25]);Ox3a4=Ox3a4.replace(/</g,OxOc7ef[26]);Ox3a4=Ox3a4.replace(/>/g,OxOc7ef[27]);Ox3a4=Ox3a4.replace(/'/g,OxOc7ef[28]);Ox3a4=Ox3a4.replace(/\x22/g,OxOc7ef[29]);return Ox3a4;} ;