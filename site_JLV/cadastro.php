
		<?php

			//isset determina que o botao foi ativado.
			if(isset($_POST['btn_Send'])){

				//inicializando array de erros
				$erros = array();

				//obtendo os valores dos formularios via post
				$matricula = $_POST['matricula'];
				$nome=$_POST['nome'];
				$email=$_POST['email'];
				$senha = $_POST['senha'];

				//preenchendo o array de erros
				if(empty($nome)){
					$erros[] = "<li>O campo nome precisa ser preenchido</li>";
				}

				if(empty($email)){
					$erros[] = "<li>O campo email precisa ser preenchido</li>";
				}
				else{
					//usando filtros de validacao
					if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
						$erros[] = "<li>O campo email precisa ser preenchido corretamente</li>";
					}
				}
				
				if(empty($matricula)){
					$erros[] = "<li>O campo matricula precisa ser preenchido</li>";
				}

				if(empty($senha)){
					$erros[] = "<li>O campo senha precisa ser preenchido</li>";
				}

				if(isset($_POST['etnia'])){
					$etnia = $_POST['etnia'];
				}
				else{
					$erros[] = "<li>O campo etnia precisa ser preenchido</li>";
				}

				if(empty($erros)){
					
					//usando filtros
					$nome=filter_var($nome, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);

					//criptografando a senha
					$senha=md5($senha);

					//Sql query para inserir os valores obtidos na tabela 
					$sql="INSERT INTO aluno(matricula, nome, email, senha, FK_ETNIA_id_etnia) VALUES('$matricula', '$nome', '$email', '$senha', '$etnia');";

		
					/*Msqli_query aplica a string "$sql"
					e se o insert for devidamente realizado header direciona o usuario para a pagina de login.
					*/ 
					if (mysqli_query($connect, $sql)){
						header('location: cadastro.php');
					}
					else{
						header('location: cadastro.php');
					}
				}
			}

			//chamando o header na pagina	
			include_once 'header.php';

		?>	

		<br><br>
        <h3>Cadastro</h3>
		<br><br>

        <section>
			<!-- a tag <form> possibilita o uso de formularios -->
			<form class="col s12" method="post">

				<!-- <div> é a tag usada para dividir e organizar o documento -->
				<div class="row">
					<div class="input-field col s10 pull-s1">

						  <input id="matricula" type="text" class="validate" name="matricula">
						  <label for="matricula">Matricula</label>
					</div>
				</div>

				<div class="row">
					
					<div class="input-field col s5">
						<input id="nome" type="text" class="validate" name="nome">
						<label for="nome">Nome</label>
					</div>

					<div class="input-field col s5 pull-s1">
						<input id="email" type="text" class="validate" name="email">
						<label for="email">E-Mail</label>
					</div>
				</div>

				<br>
				<br>
				<h6 class="centerp"><b>Possui assistência?&nbsp;</b></h6>
				<br>
				<div class="input-field col s4">
					

					<br>
	
					<p class="centerp">
						<label>
						  <input class="with-gap" name="assist" type="radio" value="1"/>
						  <span>Sim</span>
						</label>
					</p>
	
					<p class="centerp">
						<label>
						  <input class="with-gap pull-s1" name="assist" type="radio" value="2" />
						  <span>Não</span>
						</label>
					</p>

				</div>
				<br>
				<br>
				<br>
				<h6 class="centerp"><b>Etnia&nbsp;</b></h6>
				<br>
				<div class="input-field col s4">
					

					<br>
	
					<p class="centerp">
						<label>
						  <input class="with-gap" name="etnia" type="radio" value="1"/>
						  <span>Preto</span>
						</label>
					</p>
	
					<p class="centerp">
						<label>
						  <input class="with-gap pull-s1" name="etnia" type="radio" value="2" />
						  <span>Pardo</span>
						</label>
					</p>
	
					<p class="centerp">
						<label>
						  <input class="with-gap" name="etnia" type="radio" value="3" />
						  <span>Branco</span>
						</label>
					</p>

                    <p class="centerp">
						<label>
						  <input class="with-gap" name="etnia" type="radio" value="4" />
						  <span>Indígena</span>
						</label>
					</p>
	
					<p class="centerp">
						<label>
						  <input class="with-gap" name="etnia" type="radio" value="5"/>
						  <span>Outro</span>
						</label>
					</p>
				</div>

				<br>
				<br>
				<br>
				<h6 class="centerp"><b>Tipo de cota&nbsp;</b></h6>
				<br>
				<div class="input-field col s4">
					
					<br>
	
					<p class="centerp">
						<label>
						  <input class="with-gap" name="statmatricula" type="radio" value="1"/>
						  <span>Ampla Concorrência</span>
						</label>
					</p>
	
					<p class="centerp">
						<label>
						  <input class="with-gap pull-s1" name="statmatricula" type="radio" value="2" />
						  <span>Racial</span>
						</label>
					</p>
	
					<p class="centerp">
						<label>
						  <input class="with-gap" name="statmatricula" type="radio" value="3" />
						  <span>Econômica</span>
						</label>
					</p>

					<p class="centerp">
						<label>
						  <input class="with-gap" name="statmatricula" type="radio" value="4" />
						  <span>Necessidade Especial</span>
						</label>
					</p>

					<p class="centerp">
						<label>
						  <input class="with-gap" name="statmatricula" type="radio" value="5" />
						  <span>Escolaridade</span>
						</label>
					</p>
				</div>

				<br>
				<br>
				<br>
				<h6 class="centerp"><b>Curso&nbsp;</b></h6>
				<br>
				<div class="input-field col s4">
					
					<br>
	
					<p class="centerp">
						<label>
						  <input class="with-gap" name="curso" type="radio" value="1"/>
						  <span>Informática para Internet</span>
						</label>
					</p>
	
					<p class="centerp">
						<label>
						  <input class="with-gap pull-s1" name="curso" type="radio" value="2" />
						  <span>Mecatrônica</span>
						</label>
					</p>
	
					<p class="centerp">
						<label>
						  <input class="with-gap" name="curso" type="radio" value="3" />
						  <span>IOT</span>
						</label>
					</p>

					<p class="centerp">
						<label>
						  <input class="with-gap" name="curso" type="radio" value="4" />
						  <span>Automação</span>
						</label>
					</p>

					<p class="centerp">
						<label>
						  <input class="with-gap" name="curso" type="radio" value="5" />
						  <span>Sistemas de Informação</span>
						</label>
					</p>
				</div>

				<br>
				<br>
				<br>
				<h6 class="centerp"><b>Valor de renda&nbsp;</b></h6>
				<br>
				<div class="input-field col s4">
					

					<br>
	
					<p class="centerp">
						<label>
						  <input class="with-gap" name="renda" type="radio" value="1"/>
						  <span>De 0 a 2 salarios minimos</span>
						</label>
					</p>
	
					<p class="centerp">
						<label>
						  <input class="with-gap pull-s1" name="renda" type="radio" value="2" />
						  <span>De 2 a 5 salarios minimos</span>
						</label>
					</p>
	
					<p class="centerp">
						<label>
						  <input class="with-gap" name="renda" type="radio" value="3" />
						  <span>De 5 a 8 salarios minimos</span>
						</label>
					</p>

                    <p class="centerp">
						<label>
						  <input class="with-gap" name="renda" type="radio" value="4" />
						  <span>8 a 10 salarios minimos</span>
						</label>
					</p>
	
					<p class="centerp">
						<label>
						  <input class="with-gap" name="renda" type="radio" value="5"/>
						  <span>Mais de 10 salarios minimos</span>
						</label>
					</p>
				</div>
				
				<br>
				<br>
				<br>

				<div class="btnSubmit">
					<button class="btn waves-effect waves-light" type="submit" name="btn_Send"> Enviar</button>
				</div>

				<br>

				<div>
					<ul>
						<?php
							//imprimindo os erros
							if(!empty($erros)){
								foreach($erros as $erro){
									echo $erro;

								}
							}
						?>
					</ul>
				</div>

				<br>

			</form>


		</section>

		<!-- chamando o footer na pagina -->	
		<?php include_once 'footer.php';?>
