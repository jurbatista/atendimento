<html>
<?php 
//for ($x = 01; $x <= 23; $x++){    echo "'".$x.":00',";}
?>

<title>ATENDIMENTO INFOLINK</title>
<meta charset="UFT8">

<meta http-equiv="X-UA-Compatible" content="IE=edge">

<link rel="stylesheet" type="text/css" href="view/css/relatorios.css">
<script src="view/js/jquery-3.3.1.min.js"></script>

  <script src="view/js/RGraph/libraries/RGraph.svg.common.core.js"></script>
<script src="view/js/RGraph/libraries/RGraph.svg.bar.js"></script>
<script src="view/js/RGraph/libraries/RGraph.svg.common.tooltips.js"></script>
<script src="view/js/RGraph/libraries/RGraph.common.tooltips.js" ></script>
<script src="view/js/RGraph/libraries/RGraph.svg.pie.js"></script>
<script src="view/js/RGraph/libraries/RGraph.common.dynamic.js" ></script>
<script src="view/js/RGraph/libraries/RGraph.common.core.js" ></script>
<script src="view/js/RGraph/libraries/RGraph.line.js" ></script>
<script src="view/js/RGraph/libraries/RGraph.svg.line.js"></script>

</head>
<body>
	<header>
		<div id="topo">
		<div style="float: left;" id="info"><a href="index.php">&nbsp;voltar</a></div>
			<div style="float: right;" id="info">
				<td><?=strtoupper($dados['atendente'])?></td>
				<td>- <?=$dados['hora']?></td>
				<td>| <a href="index.php?pg=logout">SAIR</a></td>
			</div>
		</div>
	</header>
	<div>
	
    
    <!-- GRÁFICO DE ATENDIMENTO GERAL - DADOS GERAIS -->
    
    
    <div style="height: 450px" id="chart-container">
	<div id="ch_title"><h2>Status geral dos atendimentos</h2></div>    
    </div>
    <script>
    
    
    var data   = [<?php foreach($prcAtdGerais as $chave => $valor){ echo $valor.",";}?>];
    var labels = [<?php foreach($statusAtdGerais as $chave => $valor){ echo "'".$valor['status']."',";}?>];
    
    for (var i=0; i<data.length; ++i) {
        labels[i] = labels[i] + ', ' + data[i] + '%';
    }

    new RGraph.SVG.Pie({
        id: 'chart-container',
        data: data,
        options: {
            labels: labels,
            tooltips: labels,
            colors: ['#EC0033','#A0D300','#FFCD00','#00B869','#009900','#FF7300','#004CB0','#ff0000','#000055','#ff00ff','#0000ff','#ff0000'],
            strokestyle: 'white',
            linewidth: 0.7,
            shadow: true,
            shadowOffsetx: 3,
            shadowOffsety: 3,
            shadowBlur: 3,
            //exploded: 5
        }
    }).draw();
</script>
	<div id="chart-container_expansive">
		<h3>Detalhamento em números</h3>
		<div id="tableAtdGerais">
		<table cellspacing="0" id="table_atendimentos_geral">
			<tr>
				<td>Status do atendimento</td>
				<td>Quantidade</td>
				<td>Status do atendimento</td>
				<td>Quantidade</td>
			</tr>
			<?php foreach($tableAtdGerais as $chave => $valor){ ?>
			<tr>
				<td><?=$valor['status']?></td>
				<td><?=$valor['cstatus']?></td>
				<td><?=$valor['status2']?></td>
				<td><?=$valor['cstatus2']?></td>
				
			</tr>
			<?php }?>
		</table>
		</div>
	</div>


<!-- GRÁFICO DE ATENDIMENTO POR ATENDENTE >
<div style="width: 600px; height: 250px" id="chart-container2"></div>
<script >
 new RGraph.SVG.Bar({
        id: 'chart-container2',
        data: [200,709,200,300,400,500,600],
        options: {
            gutterLeft: 50,
            xaxisLabels: ['Harry','Lucy','Pete','Nick','Al','John','Kevin'],
            title: 'Número de atendimentos por atendente',
            tooltips: [
                '200','709','200','300','400','500','600'
            ],
            hmargin: 8,
            backgroundGridVlines: false,
            backgroundGridBorder: true,
            xaxis: true,
            yaxis: true
        }
    }).draw();
</script-->
	


<!-- GRÁFICO DE ATENDIMENTO POR HORA - GERAL 2 >

<canvas id="cvs" width="1200" height="350">
    [No canvas support]
</canvas>
<script>
    window.onload = function ()
    {
        var line = new RGraph.Line({
            id: 'cvs',
            data: [<?php for ($x = 0; $x<=23; $x++){echo $x.",";}?>],
            options: {
                labels: ['00:00','01:00','02:00','03:00','04:00','05:00','06:00','07:00','08:00','09:00','10:00','11:00','12:00','13:00','14:00','15:00','16:00','17:00','18:00','19:00','20:00','21:00','22:00','23:00'],
                tooltips:  [<?php for ($x = 0; $x<=23; $x++){ echo "'".$x."',";}?>],
                textAccessible: true
            }
        }).draw()
        
        
    };
</script>

	</div>
	<footer>
		<div id="rodape">
			<p style="background: #FF530D">
				<em>INFOLINK TELECOM® - Direitos Autorais Resevados</em>
			</p>
		</div>
	</footer-->
</body>
</html>