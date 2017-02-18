
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Taiguara Guirado de Araujo">

    <title>Prova Técnica PHP - Questão 3 - Taiguara Guirado de Araujó</title>

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
            <li><a href="questao1.php">Questão 1</a></li>
            <li><a href="questao2.php">Questão 2</a></li>
            <li class="active"><a href="questao3.php">Questão 3</a></li>
            <li><a href="questao4.php">Questão 4</a></li>
          </ul>
        </div>
    </div>
</nav>

    <div class="container">
        <div class="page">

<h1>Questão 3<br />
    <p class="lead">
    Refatore o código abaixo, fazendo as alterações que julgar necessário.
    </p>
</h1>

<pre align="left" class="code">

    class MyUserClass
    {
        public function getUserList()
        {
            $dbconn = new DatabaseConnection('localhost','user','password');
            $results = $dbconn->query('select name from user');

            sort($results);

            return $results;
        }
    }

</pre>
<br />
<p class="lead">CÓDIGO</p>
<div class="row" align="center">
    <div class="col-xs-6">
        database.php<br />
        <img src="./img/questao3_1.JPG" alt="Questão 3" class="img-responsive" />
    </div>
    <div class="col-xs-6">
        usuario.php<br />
        <img src="./img/questao3_2.JPG" alt="Questão 3" class="img-responsive" />
    </div>
</div>
<br />
<div class="row" align="center">
    <div class="col-xs-6">
        Front-end<br />
        <img src="./img/questao3_3.JPG" alt="Questão 3" class="img-responsive" />
    </div>
    <div class="col-xs-6">
        Arquivo SQL<br />
        <img src="./img/questao3_4.jpg" alt="Questão 3" class="img-responsive" />
    </div>
</div>
<br />
<p class="lead">Solução</p>
<ul class='list-group'>
    <?php
        include("./sistema/usuario.php");

        $MyUserClass = new MyUserClass();
        $result = $MyUserClass->getUserList();

        if(count($result)):
            echo '<pre>';
            print_r($result);
            echo '</pre>';
        else:
            echo '<h1>Nenhum resultado encontrado</h1>';
        endif;
    ?>
</ul>
        </div>
    </div>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </body>
</html>