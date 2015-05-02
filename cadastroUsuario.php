<?php

?>

    <div class="main">

      <div>
		 <form method="POST" enctype="multipart/form-data" action="./cadastroNovoUsuario.php">
		 <h3>Cadastro</h3>
			  <div >
				<label for="InputNome">Nome:</label><br/>
				<input type="text" id="nome" name="nome" placeholder="Nome" required autofocus>
			  </div>
                          <div>
                              
				<label for="cidade">Cidade:</label><br/>
                                <input type="text" id="cidade" name="cidade" placeholder="cidade">
                                        
			  </div>
                          <div>
				<label for="InputFoto">Foto:</label><br/>
				<input type="file"  id="InputFoto" name="foto" placeholder="Foto" required autofocus>
			  </div>
                 
                          <div>
				<label for="InputEmail">E-Mail:</label><br/>
				<input type="text" id="email" name="email" placeholder="E-mail" required autofocus>
			  </div>
                          
                          <div>
				<label for="InputDescricao">Descrição:</label><br/>
                                <textarea rows="6" cols="20" id="InputDescricao" name="descricao" placeholder="Descrição" required autofocus></textarea>
                                
			  </div>
                

			  <button type="submit">Cadastrar</button>
		 </form>

	 </div>
  
    </div>

