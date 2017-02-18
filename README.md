#Teste de Conhecimentos – Analista Desenvolvedor - vaga de Desenvolvedor PHP Pleno.

###Todos os requisitos do escopo dos testes foram implementados inclusive os considerados diferenciais

### Requisitos
* PHP 5.3 ou superior.
* MySQL


### Instalação
Clonar o repositório na raiz de um servidor apache.
```
git clone https://github.com/taiguara/technicalproof.git
```

Acessar o seguinte endereços do seu navegador:

```
http://localhost/
```



## Questão 1

Escreva um programa que imprima números de 1 a 100. Mas, para múltiplos de 3 imprima
“Fizz” em vez do número e para múltiplos de 5 imprima “Buzz”. Para números múltiplos
de ambos (3 e 5), imprima “FizzBuzz”.

### Solução:
```php
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
```

## Questão 2
Refatore o código abaixo, fazendo as alterações que julgar necessário.
```php
<?
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
header("Location: http://www.google.com");
exit();
} elseif (isset($_COOKIE['Loggedin']) && $_COOKIE['Loggedin'] == true) {
header("Location: http://www.google.com");
exit();
}
```
### Solução:
```php
<?php
function redirect($url='')
{
    if(!empty($url)):
        header('Location: '.$url);
        exit();
    endif;
}

$_COOKIE['Loggedin'] = false;

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true)
    redirect('http://google.com');
elseif(isset($_COOKIE['Loggedin']) && $_COOKIE['Loggedin'] === true)
    redirect('http://google.com');

echo '<h3>Loggedin</h3>';
?>

```



## Questão 3
Refatore o código abaixo, fazendo as alterações que julgar necessário.
```php
<?php
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
```

### Solução:
```php
<?php

/**
 * Database
 */
<?php

  class Config
{
    const HOST = 'localhost'; 
    const USER = 'root';
    const PORT = '3306';
    const PASS = '';
    const BASE = 'test';
}


class Database extends Config
{
    private $usr;
    private $pws;
    private $drv;
	private $opt;

	private static $instance = NULL;

    public static function singleton($drv, $usr, $pws, array $opt = NULL) {
		try
		{
	    	$opt = ( !is_null($opt) ) ? $opt : array( PDO::ATTR_PERSISTENT => true, PDO::ATTR_CASE => PDO::CASE_LOWER );
			self::$instance = new PDO($drv, $usr, $pws, $opt);
			self::$instance->setAttribute(PDO::ATTR_ERRMODE, ($_SERVER['SERVER_ADDR'] == '127.0.0.1') ? PDO::ERRMODE_EXCEPTION : PDO::ERRMODE_SILENT);
		}
		catch( PDOException $e )
		{
			exit( $e->getMessage() );
		}
	}

	public static function getInstance()
	{
		if( !self::$instance )
		{
			self::singleton('mysql:host='.self::HOST.';port='.self::PORT.';dbname='.self::BASE, self::USER, self::PASS);
			self::$instance->exec( 'SET CHARACTER SET utf8' );
		}
		
		return self::$instance;
 	}
}

?>


/**
 * Usuario
 */
 
 <?php
require_once "database.php";

class MyUserClass
{
	function __construct()
	{
		$this->pdo = Database::getInstance();
		$this->pdo->exec( 'SET CHARACTER SET utf8' );
	}

	public function getUserList()
	{
		$sql = "SELECT name FROM user  ORDER BY name ASC";
		$pre 	= $this->pdo->prepare($sql);
		$pre->execute();
		return $pre->fetchAll(PDO::FETCH_OBJ);
	}
}
?>



```


## Questão 4
Desenvolva uma API Rest para um sistema gerenciador de tarefas

(inclusão/alteração/exclusão). As tarefas consistem em título e descrição, ordenadas por

prioridade.

Desenvolver utilizando:

• Linguagem PHP (ou framework CakePHP);

• Banco de dados MySQL;

Diferenciais:

• Criação de interface para visualização da lista de tarefas;

• Interface com drag and drop;

• Interface responsiva (desktop e mobile);

### Solução:

Para o exercício 4 é necessário a inclusão do banco de dados que se encontra na raiz do projeto

```
test.sql
```

Acessar o seguinte endereços do seu navegador :

```
http://localhost/
```

Outra opção é acessar o sistema já hospedado em:
[http://https://taiguara.000webhostapp.com)








--------------------------------------
