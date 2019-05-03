    <!DOCTYPE html>
    <html>
    <head>
      <meta charset="utf-8">
      <title>Page Title</title>
      <link rel="stylesheet" type="text/css" media="screen" href="css/estilo2.css">
     </head>
    <body>
        
        <div class="borda">
            <center> <strong>Informe os dados do Autor:</strong>
            <br>
            <br>
            <form action = "controles/controlerAutor.php">
                Nome: <input type="text" name = "nome" size = "36"/><br><br>
                E-mail: <input type="text"  name = "email" size = "27"/><br><br>
                Data de Nascimento: <input type="text"  name = "dataNascimento" size = "15"/><br><br>
                <input type="hidden" name ="opcao" value="1">          
                <center> <button>Cadastrar</button></center>
            </form>
        </div>
     
           
    </body>
    </html>
    
    
