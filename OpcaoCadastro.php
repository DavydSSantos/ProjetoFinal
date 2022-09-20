<?php 

    include 'Include/Cabecalho.php';

?>
  
  		<section class = "titulo">

			<h1 class = "titulo">ESCOLHA COMO DESEJA SE CADASTRAR</h1>
      		<br>

  		</section>   

  		<div class = "container">
  			
			<div class = "row">

    			<div class = "col s12 m6">

    				<a href = "CadastroUsuario.php">

						<div class = "card hoverable" id = "b_color">

							<div class = "card-content">

								<span class = "card-title black-text">Cadastrar como pessoa física</span>
								<p class = "black-text">Selecione esta opção para se cadastrar como pessoa física</p>
							
							</div>
						
						</div>
     				
					</a>

    			</div>
    
    			<div class = "col s12 m6">

    				<a href = "CadastroEmpresa.php">
      					
						<div class = "card hoverable" id = "b_color">

        					<div class = "card-content">
                            
                                <span class = "card-title black-text">Cadastrar como pessoa jurídica</span>
                                <p class = "black-text">Selecione esta opção para se cadastrar como pessoa jurídica</p>
                            
                            </div>
                        
                        </div>
                    
                    </a>
                
                </div>
            
            </div>
        
        </div>

        <br>
  
        <?php 

            include 'Include/Rodape.php';

        ?>
    
    </body>
    
</html>