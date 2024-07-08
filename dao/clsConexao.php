<?php
class Conexao {
    private static function abrir(){
        $banco = "gestaoatendimentos_2";
        $local = "localhost";
        $user = "root";
        $senha = "";
        $conn = mysqli_connect($local, $user, $senha, $banco);
        if (!$conn) {
            die("Erro na conexão: " . mysqli_connect_error());
        }
        return $conn;
    }

    private static function fechar($conn){
        if ($conn) {
            mysqli_close($conn);
        }
    }

    public static function consultar($sql){
        $conn = self::abrir();
        if ($conn){
            $result = mysqli_query($conn, $sql);
            // Não feche a conexão aqui; retorne o resultado diretamente
            return $result;
        }
        return NULL;
    }

    public static function executar($sql){
        $conn = self::abrir();
        if ($conn){
            mysqli_query($conn, $sql);
            // Não feche a conexão aqui
        }
    }

    public static function executarComRetornoId($sql){
        $conn = self::abrir();
        $id = 0;
        if ($conn){
            mysqli_query($conn, $sql);
            $id = mysqli_insert_id($conn);
            // Não feche a conexão aqui
        }
        return $id;
    }
}
