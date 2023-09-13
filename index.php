<?php

$servidor = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'valmir_delivery';
$conn = mysqli_connect($servidor,$usuario,$senha,$banco);

if($conn){
 #echo "tudo certo por aqui parabens";

}else{

   # echo "deu ruim ";

}


###################################
###########################
#VARIAVEIS IMPORTANTES

$numero_telefone = $_GET['telefone'];
$msg = $_GET['msg'];
$usuario = $_GET['usuario'];

#echo "*Telefone* $numero_telefone *MSG* $msg *usuario* $usuario";


########################################
#####################################





$sql = "SELECT * FROM usuario WHERE telefone = '$numero_telefone'";
$query = mysqli_query($conn,$sql);
$total = mysqli_num_rows($query);

while($rows_usuarios = mysqli_fetch_array($query)){

    $status = $rows_usuarios['status'];
}



?>



<?php


$menu2 = 'Bom dia, Deseja fazer um pedido?';




$menu3 = '[1] CARNE ASSADA DE PANELA R$ 20,00
          [2] TOSCANA AO FORNO, R$ 20,00
          [3]COXINHA DA ASA FRITA $ 20,00
          [4]MANIÇOBA R$ 18,00
          [5]ESTROGONOFF DEFRANGO, R$20,00
          [6] ISCA DE CARNE R$20,00';


$menu4 = 'da uma olhada nesse link  https://editacodigo.com.br/index/curso.php ';

$menu5 = "Entao como tinha te falado o link https://editacodigo.com.br/index/curso.php  responde a todas a suas duvidas.";

$menu6 = '';




?>









<?php


if($total == 0){


$sql = "INSERT INTO usuario (telefone,status) VALUES ('$numero_telefone', '1')";
$query = mysqli_query($conn,$sql);
if($query){

echo "Olá me chamo Victor, e trabalho com internet, e hoje estou recrutando pessoas para trabalharem da sua propria casa, gostaria de te explicar como funciona, ok?";    
}


}#if($total == 0){

################################################################################################################


if($total == 1){


if($status == 1){

$resposta = $menu2;

}


if($status == 2){

    $resposta = $menu3; 
}

if($status == 3){

    
    $resposta = $menu4;

}

if($status == 4){

$resposta = $menu5; 


}





    
}#if($total == 1){




    ###################################################################################

if($status < 5){
echo $resposta;

$status2 = $status + 1 ;
$sql = "UPDATE usuario SET status = '$status2' WHERE telefone = '$numero_telefone'";
$query = mysqli_query($conn, $sql);

}
if($status >= 5){

    echo 'Muito obrigado pela sua atenção';
    
    $status2 = $status + 1 ;
    $sql = "UPDATE usuario SET status = '1' WHERE telefone = '$numero_telefone'";
    $query = mysqli_query($conn, $sql);
    
    }



##########################
# HISTÓRICO
$data = date('d-m-Y');
$sql = "INSERT INTO historico (telefone, msg_cliente, msg_bot, data) VALUES ('$numero_telefone', '$msg', '$resposta', '$data')";
$query = mysqli_query($conn, $sql);

?>