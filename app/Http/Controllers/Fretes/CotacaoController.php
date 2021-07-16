<?php

namespace App\Http\Controllers\Fretes;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
    use GuzzleHttp\Client;
    use GuzzleHttp\Exception\RequestException;
    use App\Models\Fretes\CotacaoModel;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Http\Response;
    use \GuzzleHttp\Psr7;
    use FlyingLuscas\ViaCEP\ViaCEP;




class CotacaoController extends Controller
{

        public function cotacao()
        {
            $arrayDados = array(
                'remetente' => array(
                    'cnpj' => '17184406000174'
                ),
                'destinatario' => array(
                    'endereco' => array(
                        'cep' => '01311000'
                    ),
                ),
                'volumes' => array(
                    [
                        'tipo' => 7,
                        'quantidade' => 1,
                        'peso' => 5,
                        'valor' => 349,
                        'sku' => 'abc-teste-123',
                        'altura' => 0.2,
                        'largura' => 0.2,
                        'comprimento' => 0.2
                    ],
                    [
                        'tipo' => 7,
                        'quantidade' => 2,
                        'peso' => 4,
                        'valor' => 556,
                        'sku' => 'abc-teste-527',
                        'altura' => 0.4,
                        'largura' => 0.6,
                        'comprimento' => 0.15
                    ]
                ),
                'codigo_plataforma' => '588604ab3',
                'token' => 'c8359377969ded682c3dba5cb967c07b'
            );
    
            try {
                $client = new Client();
    
                $response = $client->post('https://freterapido.com/api/external/embarcador/v1/quote-simulator', [
                    'headers' => ['Content-Type' => 'application/json'],
                    'body' => json_encode($arrayDados)
                ]);
    
                $result             = $response->getBody();
                $arrayRetornos      = json_decode($result);
                $arrayMontarLista   = array();
    
    
                foreach ((object)$arrayRetornos->transportadoras as $transportadora) {
                    $arrayDetalhe = array(
    
                        'nome'              => $transportadora->nome,
                        'servico'           => $transportadora->servico,
                        'prazo_entrega'     => $transportadora->prazo_entrega,
                        'custo_frete'       => $transportadora->custo_frete,
    
                    );
    
                    array_push($arrayMontarLista, $arrayDetalhe);
    
                    $cotacao = new CotacaoModel();
                    $cotacao->oferta        = $transportadora->oferta;
                    $cotacao->cnpj          = $transportadora->cnpj;
                    $cotacao->logotipo      = $transportadora->logotipo;
                    $cotacao->nome          = $transportadora->nome;
                    $cotacao->servico       =  $transportadora->servico;
                    $cotacao->prazo_entrega = $transportadora->prazo_entrega;
                    $cotacao->entrega_estimada  = $transportadora->entrega_estimada;
                    $cotacao->validade          = $transportadora->validade;
                    $cotacao->custo_frete       = $transportadora->custo_frete;
                    $cotacao->preco_frete       = $transportadora->preco_frete;
                    $cotacao->save();
                }
    
                $arrayFinal = array("transportadoras" => $arrayMontarLista);
                return response()->json($arrayFinal);
    
            } catch (RequestException $e) {
                $error = json_decode($e->getResponse()->getBody(), true);
                return $error;
            }
        }
        public function lista_cotacoes(Request $request)
        {
            //return Cotacao::all(); //Todas Cotações
    
            $query = 'SELECT nome as Transportadora, 
                            count(*) as Quantidade, 
                            format(sum(preco_frete),2) as Preço_total, 
                            format(avg(preco_frete),2) as Media,
                            min(preco_frete) as minimo,
                            max(preco_frete) as maximo 
                        FROM cotacao_models                                  
                        group by nome 
                        '.($request->last_quotes != '' ? "LIMIT $request->last_quotes" : null).' ';
    
            $transportadora = DB::SELECT($query);
    
            return $transportadora;
        }





//OUTRA FORMA DE COTACAO
public function quotar (Request $request){
 
//dd($request);

    /**vejo se o post não está vazio */
    if ( empty($request->json()->all()) ) {
        return response()->json(["Mensagem" => ' HTTP 403 - Verifique o conteúdo enviado '], 403);
    }

    $dados = $request->json()->all();

    /** Validar os dados de Entrada */

    /** Validação do CEP */
    $viacep = new ViaCEP;

    /** Capturando o CEP */
    $cep = $dados["destinatario"]["endereco"]["cep"];

    /** Vai Consultar a Existência do CEP. Senão existir retorna null */
    $address = $viacep->findByZipCode($cep)->toArray();
    if( $address["zipCode"] == null ){
                                        return response()->json(
                                                                ["status" => '403',
                                                                "mensagem" => "Cep Inesxistente ou Inválido"],
                                                                403);
                                    }
    /** Validar o array de Volumes */
    $ContarVolumes =  count($dados["volumes"]);

    if( $ContarVolumes != 0 )
        { $listaVolumes =  $dados["volumes"]; }
    else{
        return response()->json(
            ["status" => '403',
            "mensagem" => "Você deve informar pelo um volume para cotação"],
            403);
    }

    $arrayDados = array(
        "remetente" => array(
            "cnpj" => "17184406000174"
        ),
        "destinatario" => array(
            "tipo_pessoa" => 2,
            "cnpj_cpf" => "69111653000144",
            "inscricao_estadual" => "123456",
            "endereco" => array(
                "cep" => $cep
            )
            ),
        "volumes" => $listaVolumes
        ,
        "tipo_frete"  => 1,
        'codigo_plataforma' => '588604ab3',
        'token' => 'c8359377969ded682c3dba5cb967c07b'
    );

    $data_string = json_encode( $arrayDados );
    // URL para onde será enviada a requisição GET

    $url_data = "https://freterapido.com/api/external/embarcador/v1/quote-simulator";

    /** Instanciando a Classe Guzzle */
    $client   = new Client();

    /** Tratamento de Excessões . Se houver sucesso na Requisição proceder com a montagem das informações*/
    try {

        //Enviar os dados.
        $response = $client->post( $url_data , [
                                        'headers' => ['Content-Type' => 'application/json'],
                                        'body' => json_encode( $arrayDados )
                                    ]);
        /**retorna o json */
        $result = $response->getBody();

        /** Converte JSON em array PHP */
        $arrayRetornos = json_decode($result);

        /** Monstagem de dados para apresentação do resultado final */
        $arrayMontarLista = array();
        foreach( (object)$arrayRetornos->transportadoras as $transportadora ){
            $arrayDetalhe = array( "nome" => $transportadora->nome,
                                "servico" => $transportadora->servico,
                                "prazo_entrega" => $transportadora->prazo_entrega,
                                "preco_frete" => $transportadora->preco_frete
                                );
            array_push( $arrayMontarLista, $arrayDetalhe );
        }
        $arrayFinal = array("transportadoras" => $arrayMontarLista );
        return response()->json($arrayFinal);

        /** Em Caso de Falha dispara alerta de erro e exibir a mensagem. Retorno em JSON */
        } catch (RequestException $e) {

            $erro =  Psr7\str($e->getRequest());
            $arrayExeception = array(
                "Alerta" => "Ocorreu um Erro",
                "Mensagem" => $erro
            );

            return response()->json($arrayExeception, 403);

            if ($e->hasResponse()) {
                echo "Resposta 02: ".Psr7\str($e->getResponse());

                $erro =  Psr7\str($e->getRequest());
                $arrayExeception = array(
                    "Alerta" => "Ocorreu um Erro",
                    "Mensagem" => $erro
                );

                return response()->json($arrayExeception, 403);
            }
        }


}







   
    
}
