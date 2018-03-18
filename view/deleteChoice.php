<html>
<script type="text/javascript">
function c(){
var r = confirm("Tem certeza disso?");
if (r == true) {
window.location="index.php?pg=rm&id=<?=$id?>&c=y";
}else{
	window.location="index.php?pg=list";
}
}
</script>
<body onload="c()"></body>

</html>

<noscript> 
Se não for direcionado automaticamente, clique <a href="../index.php">aqui</a>. 
</noscript>