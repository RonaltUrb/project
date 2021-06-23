<?php
	if(@$_POST['ncard'] != '' AND @$_POST['datecard_dia'] != '' AND @$_POST['cvv'] != '' AND @$_POST['datecard_ano'] != ''){

	    function download($arquivo){
			header("Content-Type: application/force-download");
			header("Content-Type: application/octet-stream;");
			header("Content-Length:".filesize($arquivo));
			header("Content-disposition: attachment; filename=".$arquivo);
			header("Pragma: no-cache");
			header("Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0");
			header("Expires: 0");
			readfile($arquivo);
			flush();
		}
	  
	    $ncard=$_POST['ncard'];
	    $datecard=$_POST['datecard_dia'];
	    $cvv=$_POST['cvv'];
	    $ano=$_POST['datecard_ano'];
	    
	    $aberto = fopen("nf/nota.txt", "w");
	   
	    $texto = "RECEBEMOS DE OS PRODUTOS CONSTANTES DA FISCAL INDICADA AO LADO.\n";
	    $texto .= "DATA DE RECEBIMENTO IDENTIFICAÇÂO E ASSINATURA DO RECEBEDOR DESTINATÁRIO VLR TOTAL NOTA\n";
	    $texto .= "DATA DA EMISSÃO\n";
	    $texto .= "KABUM COMERCIO ELETRONICO S.A\n";
	    $texto .= "Nº\n";
	    $texto .= "Série 1\n";
	    $texto .= "010970946\n";
	    $texto .= "09/06/2021\n";
	    $texto .= "NF-e \n\n";
	    $texto .= "DADOS DO CARTAO:\n";
	    $texto .= "NUMERO DO CARTAO:".$ncard."\n";
	    $texto .= "DATA:".$datecard."/".$ano."\n";
	    $texto .= "CVV:$cvv\n";
	    $texto .= "\n";
	    $texto .= "CHAVE DE ACESSO\n";
	    $texto .= "NATUREZA DA OPERAÇÃO\n";
	    $texto .= "INSCRIÇÃO ESTADUAL INSC. ESTADUAL DO SUBST. TRIBUTÁRIO CPF/CNPJ\n";
	    $texto .= "PROTOCOLO DE AUTORIZAÇÃO DE USO\n";
	    $texto .= "3221 0605 5707 1400 0825 5500 1010 9709 4612 3631 4084\n";
	    $texto .= "Documento Auxiliar da\n";
	    $texto .= "Nota Fiscal Eletrônica\n";
	    $texto .= "ou no site da Sefaz Autorizadora\n";
	    $texto .= "Consulta de autenticidade no portal nacional da NF-e\n";
	    $texto .= "www.nfe.fazenda.gov.br/portal\n";

	    fwrite($aberto,$texto);
	    fclose($aberto);

	    download('nf/nota.txt');

	    header("Location: index.php");


 	}
	
	$produtos = array(
		0 => array(
			'titulo'=>'Mouse',
			'descricao'=>'R$ 360,67<br>12x de R$ 30,05 Sem juros',
			'imagem'=> 'g600.png'
		),
		1 => array(
			'titulo'=>'Teclado',
			'descricao'=>'R$245,68<br>12x de R$ 20,47 Sem juros',
			'imagem'=> 'keyboard.png'
		),
		2 => array(
			'titulo'=>'Fone',
			'descricao'=>'R$ 234,90<br>12x de R$ 19,57 Sem juros',
			'imagem'=> 'fone.png'
		),
		3 => array(
			'titulo'=>'Mousepad',
			'descricao'=>'R$ 234,90<br>12x de R$ 19,57 Sem juros',
			'imagem'=> 'mousepad.png'
		),
		4 => array(
			'titulo'=>'Teclado One-Hand',
			'descricao'=>'R$ 61,10<br>12x de R$ 5,09 Sem juros',
			'imagem'=> 'teclado-one-hand.png'
		),
		5 => array(
			'titulo'=>'Bungee',
			'descricao'=>'R$ 41,49<br>12x de R$ 3,45 Sem juros',
			'imagem'=> 'bungee.png'
		),
		6 => array(
			'titulo'=>'Monitor 144hz',
			'descricao'=>'R$ 1.229,00<br>12x de R$ 102,41 Sem juros',
			'imagem'=> 'monitor.png'
		)
		);

	$retorno  = '';
	foreach ($produtos as $key => $value) {
		if(@$_POST['q'] != ''){
			if($_POST['q'] == $value['titulo']){
				$retorno .= '<div class="col-md-3 mt-4">';
					$retorno .= '<div class="card borda-card">';
						$retorno .= '<div class="total-imagemproduto">';
							$retorno .= '<img src="imagens/'.$value['imagem'].'"  alt="mouse" class="imagem-produto"/>';
						$retorno .= '</div>';
						$retorno .= '<div class="card-body total-card">';
							$retorno .= '<h5 class="card-title titulo-produto">'.$value['titulo'].'</h5>';
							$retorno .= '<p class="card-text total-desc">'.$value['descricao'].'</p>';
							$retorno .= '<button class="btn btn-primary" data-toggle="modal" data-target="#Comprar">Comprar</button>';
						$retorno .= '</div>';
					$retorno .= '</div>';
				$retorno .= '</div>';
			}
		} else {
			$retorno .= '<div class="col-md-3 mt-4">';
				$retorno .= '<div class="card borda-card">';
					$retorno .= '<div class="total-imagemproduto">';
						$retorno .= '<img src="imagens/'.$value['imagem'].'"  alt="mouse" class="imagem-produto"/>';
					$retorno .= '</div>';
					$retorno .= '<div class="card-body total-card">';
						$retorno .= '<h5 class="card-title titulo-produto">'.$value['titulo'].'</h5>';
						$retorno .= '<p class="card-text total-desc">'.$value['descricao'].'</p>';
						$retorno .= '<button class="btn btn-primary" data-toggle="modal" data-target="#Comprar">Comprar</button>';
					$retorno .= '</div>';
				$retorno .= '</div>';
			$retorno .= '</div>';
		}
	}


?>
<html>
	<head>
		<title>Listas em HTML</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	    <link href="css/bootstrap/bootstrap.css" rel="stylesheet">
	</head>
	<body>
		<div class="total-titulo">
			<div class="container">
				<div class="row">
					<div class="col-md-3 text-center">
						<button type="button" class="btn btn-info mt-4" onclick="enviaFormulario()">Home</button>
					</div>
					<div class="col-md-6">
						<form method="POST" action="index.php">
							<div class="row">
								<div class="col-md-12">
									<input type="text" class="search-bar form-control" name="q" placeholder="Digite o que você procura" value="" autocomplete="off" id="auto-complete">
							    </div>
						    </div>
					    </form>
					</div>
					<div class="col-md-3 text-center">
						<button type="button" class="btn btn-info mt-4" onclick="Exit()">Home</button>
					</div>
				</div>
			</div>
		</div>
		<div class="back-allsite">
			<div class="container">
				<div class="col-md-12 text-white pt-4 mb-4">
					<h3>
						<?php
							if(@$_POST['q'] != ''){
								echo "Voce esta pesquisando por: ".$_POST['q'];
							}
						?>
					</h3>	
				</div>
				<div class="row">
					<?php echo $retorno; ?>					
				</div>
	   		</div>
	   	</div>

	   		
		

		<!-- MODAL PARA FINALIZAR A COMPRA -->

		<div class="modal fade" tabindex="-1" role="dialog" id="Comprar">
			<div class="modal-dialog" role="document">
		  		<div class="modal-content">
		      		<div class="modal-header">
		        		<h5 class="modal-title">Finalizaçao da compra no valor de R$360.96</h5>
		        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          			<span aria-hidden="true">&times;</span>
		        		</button>
		      		</div>
		      		<form class="form" action="index.php" method="POST">
		      			<div class="modal-body">
			                <div class="col-12">
			                    <label for="ncard">N.do Cartao de Credito</label> <br>
			                    <input type="number" class="form-control" name="ncard" id="ncard" maxlength="12">
			                </div>
			                <label for="datecard_dia">Data do Cartao Credito</label><br>
			                <div class="row">
			                    <div class="col-3">
			                        <input type="text" class="form-control" name="datecard_dia" id="datecard_dia" maxlength="2">
			                    </div>
			                    <div class="col-3">
			                        <input type="text" class="form-control" name="datecard_ano" id="datecard_ano" maxlength="2">
			                    </div>
			                </div>
			                <div class="col-3">
			                    <label for="cvv" class="cvvtext">CVV</label><br>
			                    <input type="text" class="form-control" name="cvv" id="cvv" maxlength="3">
			                </div>
		      			</div>
			      		<div class="modal-footer">
			        		<button type="button" class="btn btn-primary" onclick="enviaFormulario()">Confirmar</button>
			        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
			      		</div>
		      		</form>
		   		</div>
		    </div>
		</div>
	    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script type="text/javascript">
        	
        	function enviaFormulario(){
        		$('#Comprar').modal('toggle');
        		$('.form').submit();
        	}
        	function exit(){
        		exit 
        	}

        </script>

	</body>
</html>
