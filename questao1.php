
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Taiguara Guirado de Araujo">

    <title>Prova Técnica PHP - Questão 1 - Taiguara Guirado de Araujó</title>

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/main.css" />
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="index.php" class="navbar-brand">Taiguara</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="questao1.php">Questão 1</a></li>
            <li><a href="questao2.php">Questão 2</a></li>
            <li><a href="questao3.php">Questão 3</a></li>
            <li><a href="questao4.php">Questão 4</a></li>
          </ul>
        </div>
    </div>
</nav>

    <div class="container">
        <div class="page">
            <h1>Questão 1</h1>
            <p class="lead">
                Escreva um programa que imprima números de 1 a 100. Mas, para múltiplos de 3 imprima
                “Fizz” em vez do número e para múltiplos de 5 imprima “Buzz”. Para números múltiplos
                de ambos (3 e 5), imprima “FizzBuzz”.
            </p>
            <p class="lead">CÓDIGO</p>
            <p align="center">
                <img src="./img/questao1.JPG" alt="Questão 1" class="img-responsive" />
            </p>
            

            <br/>
            <p class="lead">RESULTADO</p>
            <?php
            $print = '';

            for($i=1; $i<=100; $i++):
                $temp = '';

                if( $i%3 == 0 )
                    $temp = 'Fizz';
                if($i%5 == 0 )
                    $temp .= 'Buzz';
                if(empty($temp))
                    $temp = $i;

                $print .= '<li class="list-group-item">'.$temp.'</li>';
            endfor;

            echo "<ul class='list-group'>";

            echo $print;

            echo "</ul>";

            ?>
    	</div>
    </div>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </body>
</html>