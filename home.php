
<?php 
	include('./adm2/conecta.php');
	
?>

<link rel="stylesheet" type="text/css" href="css/style_home.css">
<link rel="stylesheet" type="text/css" href="css/stilo.css">
<div class="contato">

	<div id="meio2">
							<?php		
							$sql = "SELECT id,titulo,imagem,id_categoria,id_sub_categoria,obs,valor FROM imagem order by id desc limit 0,1"; //altere (clientes) para o nome de sua tabela.
							$result = mysql_query($sql) or die ("N?o foi poss?vel realizar a consulta!!!");
							while ($row = mysql_fetch_assoc($result)){	
						?>
							<div class="conteudo_home">
								<div class="home1">
						
									<div class="home_pro">
										<div id="texthome">
										Encontre aqui o veículo que você procura!
										</div>								
										<div id="texthome1">
										O nosso principal objetivo é oferecer automoveis de qualidade e com procedência.
										<br />
										<br />
										<br />
										Acreditamos que a qualidade a procedência e o bom atendimento são essenciais<br />
										para a satisfação de nosso clientes.
										<br />
										<br />
										<br />
										"Não fale em crise,trabalhe."
										</div>
										<div class="oul">	
																				<!--UOL Widgets - widgets.uol.com.br -->
										<div class="UOLWidgetsStyle">
										<script src="http://widgets.uol.com.br/uolwidgetstools.js?estacao=carros&tema=fotos&skin=3" type="text/javascript"></script>
										<a href="http://carros.uol.com.br" target="_blank">http://carros.uol.com.br</a>
										</div>
										<!--//UOL Widgets-->
										
										
										</div>
										</div>
										</div>
									
										<div class="home2">
												<div id="text_produtohome">
													
												</div>
											 <div class="produto_home">
												
												
												<div class="Imagen_produtohome">
													
													<img src="./produtos/g_<?php echo $row['imagem'];?>" border="0" width="227px" height="197px" >
										
												</div>
												
												<div class="conteudo_produtoh">
													<div class="titulo_produto">
														<?php echo $row['titulo'];?>
														</div>
														<div class="subtitulo_produto">
														A partir de <?php echo $row['valor'];?>
														</div>
														<div class="mais">
															<div class="letra_mais">
															
															<img src="./imagens/layout/mais.png" alt="Lucilene"  
															title="Lucilene" name="Lucilene" 
															border="0" width="7" height="30" />
															</div>
															<a href="?pg=produto&id=<?php echo $row['id'];?>">
															<div class="letra_mais">
															Saiba mais.
															</div>
															</a>
														</div>
													</div>
											</div>
											
										</div>	
											
												<?php
												}
											?>
											
										</div>
											
											
											</div>
										
										
										</div>
									
</div>