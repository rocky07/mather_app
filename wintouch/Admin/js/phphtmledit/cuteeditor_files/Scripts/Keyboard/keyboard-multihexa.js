var OxO4ddc=["0123456789ABCDEF","0000","all","getElementById","","|","fond","\x3Cimg src=\x22../Images/multiclavier.gif\x22 width=404 height=152 border=\x220\x22\x3E\x3Cbr /\x3E","sign","car","simpledia","simple","majus","\x26nbsp;","double","minus","doubledia","kb-","kb+","Delete","Clear","Back","CapsLock","Enter","Shift","\x3C|\x3C","Space","\x3E|\x3E","clavscroll(-3)","clavscroll(3)","faire(\x22del\x22)","RAZ()","faire(\x22bck\x22)","bloq()","faire(\x22\x5Cn\x22)","haut()","faire(\x22ar\x22)","faire(\x22 \x22)","faire(\x22av\x22)","act","action","clav","clavier","masque","\x3Cimg src=\x22../Images/1x1.gif\x22 width=404 height=152 border=\x220\x22 usemap=\x22#clavier\x22\x3E","\x3Cmap name=\x22clavier\x22\x3E","\x3Carea coords=\x22",",","\x22 href=\x22javascript:void(0)\x22 onClick=\x27javascript:ecrire(",")\x27\x3E","\x22 href=\x22javascript:void(0)\x22 onClick=\x27javascript:","\x27\x3E","\x22 href=\x27javascript:charger(","\x3C/map\x3E","length"," ","%0D%0A","av","ar","bck","del","\x3Cspan class=","\x3E","\x3C/span\x3E","\x3Cdiv id=\x22","\x22 \x3E","\x3C/div\x3E","left","style","px","top","innerHTML","act0","act1","langue=","cookie",";","langue","=","; ","expires="];var caps=0,lock=0,hexchars=OxO4ddc[0],accent=OxO4ddc[1],clavdeb=0;var clav= new Array();j=0;for(i in Maj){clav[j]=i;j++;} ;var ns6=((!document[OxO4ddc[2]])&&(document[OxO4ddc[3]]));var ie=document[OxO4ddc[2]];var langue=getCk();if(langue==OxO4ddc[4]){langue=clav[clavdeb];} ;CarMaj=Maj[langue].split(OxO4ddc[5]);CarMin=Min[langue].split(OxO4ddc[5]);var posClavierLeft=0,posClavierTop=0;if(ns6){posClavierLeft=0;posClavierTop=80;} else {if(ie){posClavierLeft=0;posClavierTop=80;} ;} ;tracer(OxO4ddc[6],posClavierLeft,posClavierTop,OxO4ddc[7],OxO4ddc[8]);var posX= new Array(0,28,56,84,112,140,168,196,224,252,280,308,336,42,70,98,126,154,182,210,238,266,294,322,350,50,78,106,134,162,190,218,246,274,302,330,64,92,120,148,176,204,232,260,288,316,28,56,84,294,322,350);var posY= new Array(14,14,14,14,14,14,14,14,14,14,14,14,14,42,42,42,42,42,42,42,42,42,42,42,42,70,70,70,70,70,70,70,70,70,70,70,98,98,98,98,98,98,98,98,98,98,126,126,126,126,126,126);var nbTouches=52;for(i=0;i<nbTouches;i++){CarMaj[i]=((CarMaj[i]!=OxO4ddc[1])?(fromhexby4tocar(CarMaj[i])):OxO4ddc[4]);CarMin[i]=((CarMin[i]!=OxO4ddc[1])?(fromhexby4tocar(CarMin[i])):OxO4ddc[4]);if(CarMaj[i]==CarMin[i].toUpperCase()){cecar=((lock==0)&&(caps==0)?CarMin[i]:CarMaj[i]);tracer(OxO4ddc[9]+i,posClavierLeft+6+posX[i],posClavierTop+3+posY[i],cecar,((dia[hexa(cecar)]!=null)?OxO4ddc[10]:OxO4ddc[11]));tracer(OxO4ddc[12]+i,posClavierLeft+15+posX[i],posClavierTop+1+posY[i],OxO4ddc[13],OxO4ddc[14]);tracer(OxO4ddc[15]+i,posClavierLeft+3+posX[i],posClavierTop+9+posY[i],OxO4ddc[13],OxO4ddc[14]);} else {tracer(OxO4ddc[9]+i,posClavierLeft+6+posX[i],posClavierTop+3+posY[i],OxO4ddc[13],OxO4ddc[11]);cecar=CarMin[i];tracer(OxO4ddc[15]+i,posClavierLeft+3+posX[i],posClavierTop+9+posY[i],cecar,((dia[hexa(cecar)]!=null)?OxO4ddc[16]:OxO4ddc[14]));cecar=CarMaj[i];tracer(OxO4ddc[12]+i,posClavierLeft+15+posX[i],posClavierTop+1+posY[i],cecar,((dia[hexa(cecar)]!=null)?OxO4ddc[16]:OxO4ddc[14]));} ;} ;var actC1= new Array(0,371,364,0,378,0,358,0,344,0,112,378);var actC2= new Array(0,0,14,42,42,70,70,98,98,126,126,126);var actC3= new Array(32,403,403,39,403,47,403,61,403,25,291,403);var actC4= new Array(11,11,39,67,67,95,95,123,123,151,151,151);var act= new Array(OxO4ddc[17],OxO4ddc[18],OxO4ddc[19],OxO4ddc[20],OxO4ddc[21],OxO4ddc[22],OxO4ddc[23],OxO4ddc[24],OxO4ddc[24],OxO4ddc[25],OxO4ddc[26],OxO4ddc[27]);var effet= new Array(OxO4ddc[28],OxO4ddc[29],OxO4ddc[30],OxO4ddc[31],OxO4ddc[32],OxO4ddc[33],OxO4ddc[34],OxO4ddc[35],OxO4ddc[35],OxO4ddc[36],OxO4ddc[37],OxO4ddc[38]);var nbActions=12;for(i=0;i<nbActions;i++){tracer(OxO4ddc[39]+i,posClavierLeft+1+actC1[i],posClavierTop-1+actC2[i],act[i],OxO4ddc[40]);} ;var clavC1= new Array(35,119,203,287);var clavC2= new Array(0,0,0,0);var clavC3= new Array(116,200,284,368);var clavC4= new Array(11,11,11,11);for(i=0;i<4;i++){tracer(OxO4ddc[41]+i,posClavierLeft+5+clavC1[i],posClavierTop-1+clavC2[i],clav[i],OxO4ddc[42]);} ;tracer(OxO4ddc[43],posClavierLeft,posClavierTop,OxO4ddc[44]);document.write(OxO4ddc[45]);for(i=0;i<nbTouches;i++){document.write(OxO4ddc[46]+posX[i]+OxO4ddc[47]+posY[i]+OxO4ddc[47]+(posX[i]+25)+OxO4ddc[47]+(posY[i]+25)+OxO4ddc[48]+i+OxO4ddc[49]);} ;for(i=0;i<nbActions;i++){document.write(OxO4ddc[46]+actC1[i]+OxO4ddc[47]+actC2[i]+OxO4ddc[47]+actC3[i]+OxO4ddc[47]+actC4[i]+OxO4ddc[50]+effet[i]+OxO4ddc[51]);} ;for(i=0;i<4;i++){document.write(OxO4ddc[46]+clavC1[i]+OxO4ddc[47]+clavC2[i]+OxO4ddc[47]+clavC3[i]+OxO4ddc[47]+clavC4[i]+OxO4ddc[52]+i+OxO4ddc[49]);} ;document.write(OxO4ddc[53]);function ecrire(i){txt=rechercher()+OxO4ddc[5];subtxt=txt.split(OxO4ddc[5]);ceci=(lock==1)?CarMaj[i]:((caps==1)?CarMaj[i]:CarMin[i]);if(test(ceci)){subtxt[0]+=cardia(ceci);distinguer(false);} else {if(dia[accent]!=null&&dia[hexa(ceci)]!=null){distinguer(false);accent=hexa(ceci);distinguer(true);} else {if(dia[accent]!=null){subtxt[0]+=fromhexby4tocar(accent)+ceci;distinguer(false);} else {if(dia[hexa(ceci)]!=null){accent=hexa(ceci);distinguer(true);} else {subtxt[0]+=ceci;} ;} ;} ;} ;txt=subtxt[0]+OxO4ddc[5]+subtxt[1];afficher(txt);if(caps==1){caps=0;MinusMajus();} ;} ;function faire(Oxc6a){txt=rechercher()+OxO4ddc[5];subtxt=txt.split(OxO4ddc[5]);l0=subtxt[0][OxO4ddc[54]];l1=subtxt[1][OxO4ddc[54]];c1=subtxt[0].substring(0,(l0-2));c2=subtxt[0].substring(0,(l0-1));c3=subtxt[1].substring(0,1);c4=subtxt[1].substring(0,2);c5=subtxt[0].substring((l0-2),l0);c6=subtxt[0].substring((l0-1),l0);c7=subtxt[1].substring(1,l1);c8=subtxt[1].substring(2,l1);if(dia[accent]!=null){if(Oxc6a==OxO4ddc[55]){Oxc6a=fromhexby4tocar(accent);} ;distinguer(false);} ;switch(Oxc6a){case (OxO4ddc[57]):if(escape(c4)!=OxO4ddc[56]){txt=subtxt[0]+c3+OxO4ddc[5]+c7;} else {txt=subtxt[0]+c4+OxO4ddc[5]+c8;} ;break ;;case (OxO4ddc[58]):if(escape(c5)!=OxO4ddc[56]){txt=c2+OxO4ddc[5]+c6+subtxt[1];} else {txt=c1+OxO4ddc[5]+c5+subtxt[1];} ;break ;;case (OxO4ddc[59]):if(escape(c5)!=OxO4ddc[56]){txt=c2+OxO4ddc[5]+subtxt[1];} else {txt=c1+OxO4ddc[5]+subtxt[1];} ;break ;;case (OxO4ddc[60]):if(escape(c4)!=OxO4ddc[56]){txt=subtxt[0]+OxO4ddc[5]+c7;} else {txt=subtxt[0]+OxO4ddc[5]+c8;} ;break ;;default:txt=subtxt[0]+Oxc6a+OxO4ddc[5]+subtxt[1];break ;;} ;afficher(txt);} ;function RAZ(){txt=OxO4ddc[4];if(dia[accent]!=null){distinguer(false);} ;afficher(txt);} ;function haut(){caps=1;MinusMajus();} ;function bloq(){lock=(lock==1)?0:1;MinusMajus();} ;function tracer(Oxc6f,Oxc70,haut,Oxc6a,Oxc71){Oxc6a=OxO4ddc[61]+Oxc71+OxO4ddc[62]+Oxc6a+OxO4ddc[63];document.write(OxO4ddc[64]+Oxc6f+OxO4ddc[65]+Oxc6a+OxO4ddc[66]);if(ns6){document.getElementById(Oxc6f)[OxO4ddc[68]][OxO4ddc[67]]=Oxc70+OxO4ddc[69];document.getElementById(Oxc6f)[OxO4ddc[68]][OxO4ddc[70]]=haut+OxO4ddc[69];} else {if(ie){document.all(Oxc6f)[OxO4ddc[68]][OxO4ddc[67]]=Oxc70;document.all(Oxc6f)[OxO4ddc[68]][OxO4ddc[70]]=haut;} ;} ;} ;function retracer(Oxc6f,Oxc6a,Oxc71){Oxc6a=OxO4ddc[61]+Oxc71+OxO4ddc[62]+Oxc6a+OxO4ddc[63];if(ns6){document.getElementById(Oxc6f)[OxO4ddc[71]]=Oxc6a;} else {if(ie){doc=document.all(Oxc6f);doc[OxO4ddc[71]]=Oxc6a;} ;} ;} ;function clavscroll(Ox23a){clavdeb+=Ox23a;if(clavdeb<0){clavdeb=0;} ;if(clavdeb>clav[OxO4ddc[54]]-4){clavdeb=clav[OxO4ddc[54]]-4;} ;for(i=clavdeb;i<clavdeb+4;i++){retracer(OxO4ddc[41]+(i-clavdeb),clav[i],OxO4ddc[42]);} ;if(clavdeb==0){retracer(OxO4ddc[72],OxO4ddc[13],OxO4ddc[40]);} else {retracer(OxO4ddc[72],act[0],OxO4ddc[40]);} ;if(clavdeb==clav[OxO4ddc[54]]-4){retracer(OxO4ddc[73],OxO4ddc[13],OxO4ddc[40]);} else {retracer(OxO4ddc[73],act[1],OxO4ddc[40]);} ;} ;function charger(i){langue=clav[i+clavdeb];setCk(langue);accent=OxO4ddc[1];CarMaj=Maj[langue].split(OxO4ddc[5]);CarMin=Min[langue].split(OxO4ddc[5]);for(i=0;i<nbTouches;i++){CarMaj[i]=((CarMaj[i]!=OxO4ddc[1])?(fromhexby4tocar(CarMaj[i])):OxO4ddc[4]);CarMin[i]=((CarMin[i]!=OxO4ddc[1])?(fromhexby4tocar(CarMin[i])):OxO4ddc[4]);if(CarMaj[i]==CarMin[i].toUpperCase()){cecar=((lock==0)&&(caps==0)?CarMin[i]:CarMaj[i]);retracer(OxO4ddc[9]+i,cecar,((dia[hexa(cecar)]!=null)?OxO4ddc[10]:OxO4ddc[11]));retracer(OxO4ddc[15]+i,OxO4ddc[13]);retracer(OxO4ddc[12]+i,OxO4ddc[13]);} else {retracer(OxO4ddc[9]+i,OxO4ddc[13]);cecar=CarMin[i];retracer(OxO4ddc[15]+i,cecar,((dia[hexa(cecar)]!=null)?OxO4ddc[16]:OxO4ddc[14]));cecar=CarMaj[i];retracer(OxO4ddc[12]+i,cecar,((dia[hexa(cecar)]!=null)?OxO4ddc[16]:OxO4ddc[14]));} ;} ;} ;function distinguer(Oxc76){for(i=0;i<nbTouches;i++){if(CarMaj[i]==CarMin[i].toUpperCase()){cecar=((lock==0)&&(caps==0)?CarMin[i]:CarMaj[i]);if(test(cecar)){retracer(OxO4ddc[9]+i,Oxc76?(cardia(cecar)):cecar,Oxc76?OxO4ddc[10]:OxO4ddc[11]);} ;} else {cecar=CarMin[i];if(test(cecar)){retracer(OxO4ddc[15]+i,Oxc76?(cardia(cecar)):cecar,Oxc76?OxO4ddc[16]:OxO4ddc[14]);} ;cecar=CarMaj[i];if(test(cecar)){retracer(OxO4ddc[12]+i,Oxc76?(cardia(cecar)):cecar,Oxc76?OxO4ddc[16]:OxO4ddc[14]);} ;} ;} ;if(!Oxc76){accent=OxO4ddc[1];} ;} ;function MinusMajus(){for(i=0;i<nbTouches;i++){if(CarMaj[i]==CarMin[i].toUpperCase()){cecar=((lock==0)&&(caps==0)?CarMin[i]:CarMaj[i]);retracer(OxO4ddc[9]+i,(test(cecar)?cardia(cecar):cecar),((dia[hexa(cecar)]!=null||test(cecar))?OxO4ddc[10]:OxO4ddc[11]));} ;} ;} ;function test(Oxc79){return (dia[accent]!=null&&dia[accent][hexa(Oxc79)]!=null);} ;function cardia(Oxc79){return (fromhexby4tocar(dia[accent][hexa(Oxc79)]));} ;function fromhex(Oxc7c){out=0;for(a=Oxc7c[OxO4ddc[54]]-1;a>=0;a--){out+=Math.pow(16,Oxc7c[OxO4ddc[54]]-a-1)*hexchars.indexOf(Oxc7c.charAt(a));} ;return out;} ;function fromhexby4tocar(Oxc6a){out4= new String();for(l=0;l<Oxc6a[OxO4ddc[54]];l+=4){out4+=String.fromCharCode(fromhex(Oxc6a.substring(l,l+4)));} ;return out4;} ;function tohex(Oxc7c){return hexchars.charAt(Oxc7c/16)+hexchars.charAt(Oxc7c%16);} ;function tohex2(Oxc7c){return tohex(Oxc7c/256)+tohex(Oxc7c%256);} ;function hexa(Oxc6a){out=OxO4ddc[4];for(k=0;k<Oxc6a[OxO4ddc[54]];k++){out+=(tohex2(Oxc6a.charCodeAt(k)));} ;return out;} ;function getCk(){fromN=document[OxO4ddc[75]].indexOf(OxO4ddc[74])+0;if((fromN)!=-1){fromN+=7;toN=document[OxO4ddc[75]].indexOf(OxO4ddc[76],fromN)+0;if(toN==-1){toN=document[OxO4ddc[75]][OxO4ddc[54]];} ;return unescape(document[OxO4ddc[75]].substring(fromN,toN));} ;return OxO4ddc[4];} ;function setCk(Oxc7c){if(Oxc7c!=null){exp= new Date();time=365*60*60*24*1000;exp.setTime(exp.getTime()+time);document[OxO4ddc[75]]=escape(OxO4ddc[77])+OxO4ddc[78]+escape(Oxc7c)+OxO4ddc[79]+OxO4ddc[80]+exp.toGMTString();} ;} ;