<?php
    function CallAPi($method, $data = false, $url = "https://taiguara.000webhostapp.com/sistema/api.php")
    {
        $curl = curl_init();

        if($method == "POST" || $method == "GET")
        {
            curl_setopt($curl, CURLOPT_POST, 1);

            if($data)
            {
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            }
        }

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($curl);

        curl_close($curl);

        return $result;
    }

    //chamar API ao postar
    if($_POST && isset($_POST['action']))
    {
        $taskApi = CallApi($_POST['action'], $_POST);

        if($taskApi)
        {
            $mensagem = "Cadastro efetuado com sucesso.";
        }
    }

    if($_GET && isset($_GET['action']) && isset($_GET['id']))
    {
        $taskApi = CallAPI("GET", $_GET);

        if($taskApi && $_GET['action']=="DEL")
        {
            $mensagem = "Cadastro excluído com sucesso.";
        }
        else if($_GET['action']=="GET"){
            $editTask = json_decode($taskApi);
        }

        $taskApi = json_decode($taskApi);
    }

    $list = json_decode(CallApi(''));

?>
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
            <li><a href="questao1.php">Questão 1</a></li>
            <li><a href="questao2.php">Questão 2</a></li>
            <li><a href="questao3.php">Questão 3</a></li>
            <li class="active"><a href="questao4.php">Questão 4</a></li>
          </ul>
        </div>
    </div>
</nav>

    <div class="container">
        <div class="page">
<h1>Questão 4<br />
    <p class="lead">
    Desenvolva uma API Rest para um sistema gerenciador de 
    (inclusão/alteração/exclusão). As tarefas consistem em título e descrição, ordenadas por
    prioridade.<br />
    Desenvolver utilizando:<br />
    • Linguagem PHP (ou framework CakePHP);<br />
    • Banco de dados MySQL;<br />
    Diferenciais:<br />
    • Criação de interface para visualização da lista de tarefas;<br />
    • Interface com drag and drop;<br />
    • Interface responsiva (desktop e mobile);<br />
    </p>
</h1>

<br />

<p class="lead">CÓDIGO</p>
<div class="row" align="center">
    <div class="col-xs-6">
        Chamada API<br />
        <img src="./img/questao4_1.JPG" alt="Questão 4" class="img-responsive" />
    </div>
    <div class="col-xs-6">
        Arquivo SQL<br />
        <img src="./img/questao4_2.JPG" alt="Questão 4" class="img-responsive" />
    </div>
</div>
<br />
<div class="row" align="center">
    <div class="col-xs-6">
        api.php<br />
        <img src="./img/questao4_3.JPG" alt="Questão 4" class="img-responsive" />
    </div>
    <div class="col-xs-6">
        task.php<br />
        <img src="./img/questao4_4.JPG" alt="Questão 4" class="img-responsive" />
    </div>
</div>
<br />

<p class="lead">Resultado</p>

<?php if(isset($mensagem) && !empty($mensagem)){ ?>
<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
    <strong>Atenção!</strong> <?php echo $mensagem; ?>
</div>
<?php } ?>

<div class="row" align="left">
    <div class="col-xs-5">
        <form name="task" class="form" method="POST">
        <div class="form-group">
            <label for="titulo">Título</label>
            <input type="text" name="titulo" class="form-control" id="titulo" value="<?php echo (isset($taskApi->titulo))? $taskApi->titulo : ''; ?>" required autofocus />
        </div>
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea name="descricao" id="descricao" class="form-control" required><?php echo (isset($taskApi->descricao))? $taskApi->descricao : ''; ?> </textarea>
        </div>
        <div class="form-group">
            <label for="prioridade">Prioridade</label>
            <select name="prioridade" id="prioridade" class="form-control">
                <?php for ($i=0; $i <= 10 ; $i++){ ?>
                <option <?php echo (isset($taskApi->prioridade) && $taskApi->prioridade == $i)? 'selected="selected"' : ''; ?> ><?php echo $i; ?></option>
                <?php } ?>
            </select>
        </div>
        <input type="hidden" name="action" id="action" value="POST" />

        <input type="hidden" name="id" id="id" value="9" />
        <button type="submit" class="btn btn-success">Enviar</button>
        <a href="questao4.php" class="btn btn-warning">Cancelar</a>
        </form>
        <br />
       
    </div>
    <div class="col-xs-7">
        <table class="table table-striped">
        <thead>
            <tr>
                <th width="10%">Id</th>
                <th width="65%">Título</th>
                <th width="10%" class='text-center'>Prioridade</th>
                <th width="15%" class='text-center'>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php if(count($list)){ ?>
            <?php foreach ($list as $item){ ?>
                    <tr>
                        <td><?php echo $item->id; ?></td>
                        <td><?php echo $item->titulo; ?></td>
                        <td class="text-center"><?php echo $item->prioridade; ?></td>
                        <td class="text-center">
                            <a href="questao4.php?action=GET&amp;id=<?php echo $item->id; ?>" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                            <a href="questao4.php?action=DEL&amp;id=<?php echo $item->id; ?>" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                        </td>
                    </tr>
                <?php } ?>
            <?php } ?>
        </tbody>
        </table>
    </div>
</div>

        </div>
    </div>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </body>
</html>