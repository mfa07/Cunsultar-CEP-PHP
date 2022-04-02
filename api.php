<?php
ini_set('display_errors', 0 );
error_reporting(0);
?>
<?php
ini_set('display_errors', 0 );
error_reporting(0);
    $cep = str_replace('-', '', $_POST['cep']);

    if ($cep) {
        try {
            $conn = new PDO('mysql:host=127.0.0.1;dbname=php_end', 'root', '0000');

            $stmt = $conn->prepare('SELECT * FROM enderecos WHERE cep = :cep');
            $stmt->execute(['cep' => $cep]);

            $endereco = $stmt->fetch();

            if (empty($endereco)) {
                $result = file_get_contents("https://viacep.com.br/ws/{$cep}/xml");

                if ($result) {
                    $endereco = json_decode(json_encode(simplexml_load_string($result)), true);

                    $data = [
                        'cep'         => $endereco['cep'],
                        'logradouro'  => $endereco['logradouro'],
                        'bairro'      => $endereco['bairro'],
                        'localidade'  => $endereco['localidade'],
                        'complemento' => $endereco['complemento'],
                    ];

                    $sql = 'INSERT INTO enderecos (cep, logradouro, bairro, localidade, complemento) VALUES (:int :varchar :varchar :varchar :varchar)';
                    $conn->prepare($sql)->execute($data);
                } else {
                    echo 'Não encontramos o cep digitado :(';
                }
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }
?>