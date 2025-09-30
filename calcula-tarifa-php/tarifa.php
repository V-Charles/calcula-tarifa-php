<?php

/**
 * Definição da tarifa base
 * 
 * $_POST['tarifa'] → pega o valor digitado no campo tarifa do formulário enviado via POST.
 * 
 * Esse valor é armazenado na variável $tarifaBase.
 * 
 */
$tarifaBase = $_POST['tarifa'];


/**
 * Lê do formulário a opção escolhida no <select name="passageiro">.
 * 
 * Armazena na variável $tipoPassageiro.
 */
$tipoPassageiro = $_POST['passageiro'];


/**
 * Captura a distância digitada no campo distância.
 * 
 * Guarda em $distanciaPercorrida.
 */
$distanciaPercorrida = $_POST['distancia'];


/**
 * Convertendo o tipo de passageiro para minúsculas para evitar problemas de case-sensitive
 * 
 * strtolower() → converte uma string para minúsculas.
 * 
 * Isso garante que, se o usuário enviar "Estudante" ou "ESTUDANTE", será tratado como "estudante".
 */
$tipoPassageiro = strtolower($tipoPassageiro);


/**
 * Inicializa a variável do valor total
 * 
 * Cria a variável $total e inicializa com 0.
 * 
 * Assim, caso nenhuma condição do switch seja satisfeita, a variável já existe.
 */
$total = 0;


/**
 * Inicia uma estrutura de seleção múltipla (switch).
 * 
 * Vai comparar o valor de $tipoPassageiro com os diferentes case.
 */
switch ($tipoPassageiro) {


    /**
     * Se $tipoPassageiro for "estudante", aplica 50% de desconto.
     * 
     * Cálculo: tarifa base × 0.5 × distância.
     */
    case "estudante":
        $total = ($tarifaBase * 0.5) * $distanciaPercorrida;
        break; // break; → encerra esse caso e sai do switch.


    /**
     * Se for "idoso", aplica 30% de desconto (paga 70%).
     * 
     * Fórmula: tarifa base × 0.7 × distância.
     */
    case "idoso":
        $total = ($tarifaBase * 0.7) * $distanciaPercorrida;
        break;


    /**
     * Para "trabalhador", paga tarifa cheia.
     * 
     * Fórmula: tarifa base × distância.
     */
    case "trabalhador":
        $total = ($tarifaBase * $distanciaPercorrida);
        break;


    /**
     * Para "turista", paga 20% a mais.
     * 
     * Fórmula: tarifa base × 1.2 × distância.
     */
    case "turista":
        $total = ($tarifaBase * 1.2) * $distanciaPercorrida;
        break;


    /**
     * Passageiro "pessoa com deficiência" não paga nada.
     * 
     * Define $total = 0.
     */
    case "pessoa com deficiência":
        $total = 0;
        break;

        
    /**
     * default: → executado se nenhum case for verdadeiro.
     * 
     * Exibe mensagem de erro.
     * 
     * exit; → interrompe a execução do script imediatamente.
     */
    default:
        echo "Erro: Tipo de passagem inválido!";
        exit;
}


/**
 * echo → exibe o resultado na tela.
 * 
 * number_format($total, 2, ',', '.') → formata o número:
 * 2 → duas casas decimais.
 * ',' → vírgula como separador decimal.
 * '.' → ponto como separador de milhar.
 * 
 * Exemplo: 25 vira 25,00.
 */
echo "O valor total da tarifa para um passageiro do tipo '$tipoPassageiro' é: R$ " . number_format($total, 2, ',', '.');

?>