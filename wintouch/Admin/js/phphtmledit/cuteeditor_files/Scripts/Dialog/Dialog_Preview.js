var OxO66cb=["formSearch","idSource","inc_width","inc_height","W640","W800","W1024","onload","availWidth","screen","window","availHeight","contentWindow","outerHTML","documentElement","text/html","replace","onresize","value","dialogWidth","dialogHeight","innerWidth","innerHeight","px","dialogTop","dialogLeft","screenY","screenX","checked","contentDocument","document"];var formSearch=Window_GetElement(window,OxO66cb[0],true);var idSource=Window_GetElement(window,OxO66cb[1],true);var inc_width=Window_GetElement(window,OxO66cb[2],true);var inc_height=Window_GetElement(window,OxO66cb[3],true);var W640=Window_GetElement(window,OxO66cb[4],true);var W800=Window_GetElement(window,OxO66cb[5],true);var W1024=Window_GetElement(window,OxO66cb[6],true);var ParentW;var ParentH;window[OxO66cb[7]]=function window_onload(){ParentW=top[OxO66cb[10]][OxO66cb[9]][OxO66cb[8]];ParentH=top[OxO66cb[10]][OxO66cb[9]][OxO66cb[11]];var iframe=idSource[OxO66cb[12]];var editdoc=Window_GetDialogArguments(window);var Ox56b;if(Browser_IsWinIE()){Ox56b=editdoc[OxO66cb[14]][OxO66cb[13]];} else {Ox56b=outerHTML(editdoc.documentElement);} ;var Ox56c=Frame_GetContentDocument(iframe);Ox56c.open(OxO66cb[15],OxO66cb[16]);Ox56c.write(Ox56b);Ox56c.close();ShowSizeInfo();} ;window[OxO66cb[17]]=ShowSizeInfo;function ShowSizeInfo(){if(Browser_IsWinIE()){inc_width[OxO66cb[18]]=self[OxO66cb[19]];inc_height[OxO66cb[18]]=self[OxO66cb[20]];} else {inc_width[OxO66cb[18]]=self[OxO66cb[21]];inc_height[OxO66cb[18]]=self[OxO66cb[22]];} ;} ;function do_Close(){Window_CloseDialog(window);} ;function ResizeThis(Ox487,Ox45b){if(Browser_IsWinIE()){self[OxO66cb[19]]=Ox487+OxO66cb[23];self[OxO66cb[20]]=Ox45b+OxO66cb[23];var Ox56f=ParentW/2-Ox487/2;var Ox348=ParentH/2-Ox45b/2;self[OxO66cb[24]]=Ox348+OxO66cb[23];self[OxO66cb[25]]=Ox56f+OxO66cb[23];} else {if(Browser_IsGecko()){self[OxO66cb[21]]=Ox487;self[OxO66cb[22]]=Ox45b;var Ox56f=ParentW/2-Ox487/2;var Ox348=ParentH/2-Ox45b/2;self[OxO66cb[26]]=Ox348;self[OxO66cb[27]]=Ox56f;} else {window.resizeTo(Ox487,Ox45b);if((screen[OxO66cb[8]]-Ox487>0)&&(screen[OxO66cb[11]]-Ox45b>0)){window.moveTo((screen[OxO66cb[8]]-Ox487)/2,(screen[OxO66cb[11]]-Ox45b)/2);} ;} ;} ;switch(Ox487){case 640:W640[OxO66cb[28]]=true;break ;;case 800:W800[OxO66cb[28]]=true;break ;;case 1024:W1024[OxO66cb[28]]=true;break ;;} ;} ;function Frame_GetContentDocument(Ox469){if(Ox469[OxO66cb[29]]){return Ox469[OxO66cb[29]];} ;return Ox469[OxO66cb[30]];} ;