<?php 
	include('./adm2/conecta.php');
	
?>
<div class="contato">
<?php
	if (($_GET["id"]!=null)){
	$sql = "SELECT imagem.titulo,imagem.id, imagem.obs, imagem.valor, imagem.imagem,imagem.marca,imagem.modelo,imagem.combustivel,imagem.cor,imagem.opcionais,imagem.id_sub_categoria, sub_categoria.titulo AS titulo_sub_categoria
			FROM imagem
			LEFT JOIN sub_categoria ON ( imagem.id_sub_categoria = sub_categoria.id ) 
			where (imagem.id=0".$_GET["id"].") ";
			//echo $sql;
			}
	$result_sub_categoria = mysql_query($sql,$link);
	if (($result_sub_categoria!=null)&&(true)){
		while ($row_sub_categoria = mysql_fetch_assoc($result_sub_categoria)){
			$imagem_id_sub_categoria=$row_sub_categoria ['id_sub_categoria'];
			$imagem_id_produto=$row_sub_categoria ['id'];
			$imagem_titulo=$row_sub_categoria ['titulo'];
			$imagem_obs=$row_sub_categoria ['obs'];
			$imagem_imagem=$row_sub_categoria ['imagem'];
			$imagem_valor=$row_sub_categoria ['valor'];
			$imagem_marca=$row_sub_categoria ['marca'];
			$imagem_modelo=$row_sub_categoria ['modelo'];
			$imagem_combustivel=$row_sub_categoria ['combustivel'];
			$imagem_cor=$row_sub_categoria ['cor'];
			$imagem_opcionais=$row_sub_categoria ['opcionais'];

	?>
	<div class="letra12MyriadPro" style="margin-left:10px; padding-top:10px; margin-bottom:30px;">
	<?php echo $imagem_titulo;?>
	</div>
	
	<div class="produto_grande">
		<div class="imagem_produto_grande">
			<img src="./produtos/g_<?php echo $imagem_imagem;?>" alt="Samukar"  
			title="Samukar" name="Samukar" 
			border="0" width="315" height="279" />
		</div>
		<div class="grande_conteudo_produto">
			<div class="valor">
				<div class="letra_mais" style="margin-left: 15px;">
				A partir de 
				</div>
				<div class="clear" ></div>
				<div class="letra_valor" style="margin-left: 15px;">
				<?php echo $imagem_valor;?>
				</div>
			</div>
			<a href="?pg=contato">
				<div class="letra_mais" style="color:#ff0000; margin-top:15px; margin-right:15px; float:right;">
				Solicite uma proposta
				</div>
			</a>
			<div class="clear" ></div>
						<div class="conteudo_contato1" style="margin-left:10px; margin-right:10px;  color:#333333; padding-top:10px; text-align: justify;">
						<b>Marca:</b><?php echo $imagem_marca;?>
						</div>
						<div class="conteudo_contato1" style="margin-left:10px; margin-right:10px;  color:#333333; padding-top:10px; text-align: justify;">
						<b>Modelo:</b><?php echo $imagem_modelo;?>
						</div>
						<div class="conteudo_contato1" style="margin-left:10px; margin-right:10px;  color:#333333; padding-top:10px; text-align: justify;">
						<b>Combustivel:</b><?php echo $imagem_combustivel;?>
						</div>
						<div class="conteudo_contato1" style="margin-left:10px; margin-right:10px;  color:#333333; padding-top:10px; text-align: justify;">
						<b>Cor:</b><?php echo $imagem_cor;?>
						</div>
						<div class="conteudo_contato1" style="margin-left:10px; margin-right:10px;  color:#333333; padding-top:10px; text-align: justify;">
						<b>Opcionais:</b><?php echo $imagem_opcionais;?>
						</div>
						<div class="conteudo_contato1" style="margin-left:10px; margin-right:10px;  color:#333333; padding-top:10px; margin-bottom:20px; text-align: justify;">
							<b>Obs:</b><?php echo $imagem_obs;?>
						</div>

				</div>
	</div>
	<div class="clear" ></div>
	<div class="letra12MyriadPro" style="margin-left:10px; padding-top:10px;">
	Outras cores
	</div>
	
	<div class="galeia_produto" style="margin-left:10px; padding-top:10px; ">
	<?php
	
	$sql = "SELECT foto.id, foto.titulo, foto.imagem, foto.id_categoria 
			FROM foto
			LEFT JOIN imagem 
			ON ( foto.id_categoria = imagem.id ) 
			where (imagem.id=0".$imagem_id_produto.") order by foto.id desc;";
			//echo $sql;
	$result_sub_categoria = mysql_query($sql,$link);
	if (($result_sub_categoria!=null)&&(true)){
		while ($row_sub_categoria = mysql_fetch_assoc($result_sub_categoria)){
			$foto_id_sub_categoria=$row_sub_categoria ['id_categoria'];
			$foto_id_produto=$row_sub_categoria ['id'];
			$foto_titulo=$row_sub_categoria ['titulo'];
			$foto_imagem=$row_sub_categoria ['imagem'];
			

	?>
		<div class="imagem_produto_pequena" style="margin-left:7px; padding-top:10px; ">
		<a href="./produtos/g_<?php echo $foto_imagem;?>" rel="lightbox[roadtrip]">
				<img src="./produtos/g_<?php echo $foto_imagem;?>" alt="Samukar" title="Samukar" name="Samukar" border="0"  width="101" height="91"  />
			</a>
		
		</div>
		<?php 
		}
	}	
		}}
	?>	
	</div>
</div>