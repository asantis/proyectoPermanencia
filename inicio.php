<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<style type="text/css">
#apDiv1 {
	position: absolute;
	width: 207px;
	height: 126px;
	z-index: 1;
	left: 10px;
	top: 50px;
}
#apDiv2 {
	position: absolute;
	width: 168px;
	height: 43px;
	z-index: 1;
	left: 10px;
	top: 83px;
}
</style>
<script type="text/javascript">
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
</script>
</head>

<body onLoad="MM_preloadImages('img/ingresoboton2.png','img/salidaboton2.png','img/reporteboton2.png')">
<p><img src="img/tcvalLogo.png" width="268" height="86"></p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<table width="200">
  <tr>
    <td><a href="ingreso.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('btningreso','','img/ingresoboton2.png',1)"><img src="img/ingresoboton1.png" width="190" height="50" id="btningreso"></a></td>
    <td><a href="salida.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('btnsalida','','img/salidaboton2.png',1)"><img src="img/salidaboton1.png" width="190" height="50" id="btnsalida"></a></td>
    <td><a href="informes.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('btnreportes','','img/reporteboton2.png',1)"><img src="img/reporteboton1.png" width="190" height="50" id="btnreportes"></a></td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>