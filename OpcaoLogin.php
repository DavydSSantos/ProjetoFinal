<?php 

    include 'Include/Cabecalho.php';

?>

  		<section class = "titulo">

			<h1 class = "titulo">ESCOLHA COMO DESEJA ENTRAR</h1>
      		<br>

  		</section>   

  		<div class = "container">
  			
			<div class = "row">

    			<div class = "col s12 m6">

    				<a href = "LoginUsuario.php">

						<div class = "card hoverable" id = "b_color">

							<div class = "card-content">

								<span class = "card-title black-text">Entrar como pessoa física</span>
								<p class = "black-text">Selecione esta opção para entrar como pessoa física</p>
							
							</div>
						
						</div>
     				
					</a>

    			</div>
    
    			<div class = "col s12 m6">

    				<a href = "LoginEmpresa.php">
      					
						<div class = "card hoverable" id = "b_color">

        					<div class = "card-content">
                            
                                <span class = "card-title black-text">Entrar como pessoa jurídica</span>
                                <p class = "black-text">Selecione esta opção para entrar como pessoa jurídica</p>
                            
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