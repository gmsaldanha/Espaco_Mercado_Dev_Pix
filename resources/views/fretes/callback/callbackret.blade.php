@section('content')
<?php
use Illuminate\Http\Request;
use Illuminate\Http\Response;

echo "ok";
$input = explode("=", $_SERVER["REQUEST_URI"]);
$token = $input['1'];


$tokencadastrado ='eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImNmZTI0MWIwNjk4ZDk5NTExNDc3ODgyMGE2MDQ3NzhjNzMwODQ0MDlhOGZkNGZjMGZjZDkzYjJkY2ExYzMyM2I0MDg0NDc2ZDAyZDM0MzFmIn0.eyJhdWQiOiI5NTYiLCJqdGkiOiJjZmUyNDFiMDY5OGQ5OTUxMTQ3Nzg4MjBhNjA0Nzc4YzczMDg0NDA5YThmZDRmYzBmY2Q5M2IyZGNhMWMzMjNiNDA4NDQ3NmQwMmQzNDMxZiIsImlhdCI6MTYyNzY2MjAzNSwibmJmIjoxNjI3NjYyMDM1LCJleHAiOjE2NTkxOTgwMzUsInN1YiI6IjQwZDA3ZTllLTAwMjktNDRmYy04ZWZiLTNkNWRiMGRiOThjZCIsInNjb3BlcyI6WyJjYXJ0LXJlYWQiLCJjYXJ0LXdyaXRlIiwiY29tcGFuaWVzLXJlYWQiLCJjb21wYW5pZXMtd3JpdGUiLCJjb3Vwb25zLXJlYWQiLCJjb3Vwb25zLXdyaXRlIiwibm90aWZpY2F0aW9ucy1yZWFkIiwib3JkZXJzLXJlYWQiLCJwcm9kdWN0cy1yZWFkIiwicHJvZHVjdHMtZGVzdHJveSIsInByb2R1Y3RzLXdyaXRlIiwicHVyY2hhc2VzLXJlYWQiLCJzaGlwcGluZy1jYWxjdWxhdGUiLCJzaGlwcGluZy1jYW5jZWwiLCJzaGlwcGluZy1jaGVja291dCIsInNoaXBwaW5nLWNvbXBhbmllcyIsInNoaXBwaW5nLWdlbmVyYXRlIiwic2hpcHBpbmctcHJldmlldyIsInNoaXBwaW5nLXByaW50Iiwic2hpcHBpbmctc2hhcmUiLCJzaGlwcGluZy10cmFja2luZyIsImVjb21tZXJjZS1zaGlwcGluZyIsInRyYW5zYWN0aW9ucy1yZWFkIiwidXNlcnMtcmVhZCIsInVzZXJzLXdyaXRlIiwid2ViaG9va3MtcmVhZCIsIndlYmhvb2tzLXdyaXRlIl19.QiqBKyiz0ztKjRPFcRuMeNPDK1hEX2uHzJk-FcL8heNsCbaI46_zXD9y__HDp5-RsDBD2vLqGlhzhlsIuuS6RgKRiCgtXVCnUIA3iKzRx7BDgkAckcOcngBOirG7CZdHsGSN06QciJeK5DFV6cnOo9Zq5jw8sssS3Udo4xkNvgDOQZ2PgEz8UurNWSctRMj0wMjZjOtkB605xRyR_yPOirmU69EFn6froyB2ocP4mJF6CAfqU4cgHr3TnzmMUt7EJF8ec4b94LfhiysXVJRbQH_WqINeCnG-VRGWzo1s-n4GxAtJDYVa9yYx2FeyQ31ma0V1ysuv2SWa2YUR4jQ7jJKzWEYBo61NgMj5OScxXOcM8YBfLClZB3XS_ypb60nmwCHAS2ZE2d9YMoEoUMn80ki55udPv2qqY4BgxTBxT-E4XNRuIoLzjFt3rYscssqln9HEhnS5yxqCP5Vp81kDHsgEYdDNz0lc3q7D0FmlMzZ1VpybbY-wz56azV2TeYhZDor6Tb6XQ7lEKjL0oGq-qVGMRc6ZbLXYtOHet_oQgUmv_HiGsgNlNoV1IHXQO2dZudXo3NRH2q7zlYrEiknf7COkvdlAczces7wdmUBz8lbRGETGFBQo_FFultp7koIJxJ9s4AngP3ldFAxzEwSkUMYTVu2CHOwl9WOKTAlHZTQ';
$endApi = 'https://sandbox.melhorenvio.com.br';
$userAgent = 'Teste_de_envio (gmscomputadores@bol.com.br)';


echo "*****************GETListar informações de aplicativo************************";

$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => $endApi.'/api/v2/me/shipment/app-settings',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Accept: application/json',
    'Authorization: Bearer '.$tokencadastrado,
    'User-Agent: '.$userAgent
  ),
));

$response = curl_exec($curl);
curl_close($curl);
echo $response;

echo "*******************POSTCalculo de fretes (Produtos)***********************";


$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => $endApi.'/api/v2/me/shipment/calculate',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "from": {
        "postal_code": "96020360"
    },
    "to": {
        "postal_code": "01018020"
    },
    "products": [
        {
            "id": "x",
            "width": 11,
            "height": 17,
            "length": 11,
            "weight": 0.3,
            "insurance_value": 10.1,
            "quantity": 1
        },
        {
            "id": "y",
            "width": 16,
            "height": 25,
            "length": 11,
            "weight": 0.3,
            "insurance_value": 55.05,
            "quantity": 2
        },
        {
            "id": "z",
            "width": 22,
            "height": 30,
            "length": 11,
            "weight": 1,
            "insurance_value": 30,
            "quantity": 1
        }
    ]
}',
  CURLOPT_HTTPHEADER => array(
    'Accept: application/json',
    'Content-Type: application/json',
    'Authorization: Bearer '.$tokencadastrado,
    'User-Agent: '.$userAgent
  ),
));

$response = curl_exec($curl);
$data = json_decode(curl_exec($curl)); 
curl_close($curl);
//echo $response;
?>
<h3>Envios disponíveis</h3>

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Transportadora</th>
            <th scope="col">Modalidade</th>
            <th scope="col">Prazo</th>
            <th scope="col">Economia</th>
            <th scope="col">Preço</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $item)
            @if( !isset($item->error))
                <tr>
                    <th scope="row"><img src="{{ $item->company->picture }}" alt="{{ $item->company->name }}" style="width: 120px;"></th>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->delivery_range->min or '' }} - {{ $item->delivery_range->max or '' }} dias úteis</td>
                    <td>{{ $item->currency }}{{ number_format($item->discount, 2, ',', '.') }}</td>
                    <td>{{ $item->currency }}{{ number_format($item->price, 2, ',', '.') }}</td>
                </tr>
            @endif
        @endforeach
    </tbody>
</table>

<?php

















echo "***************POSTCalculo de fretes (Pacote)*********************";

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => $endApi.'/api/v2/me/shipment/calculate',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "from": {
        "postal_code": "01002001"
    },
    "to": {
        "postal_code": "90570020"
    },
    "package": {
        "height": 4,
        "width": 12,
        "length": 17,
        "weight": 0.3
    }
}',
  CURLOPT_HTTPHEADER => array(
    'Accept: application/json',
    'Content-Type: application/json',
    'Authorization: Bearer '.$tokencadastrado,
    'User-Agent: '.$userAgent
  ),
));

$response = curl_exec($curl);

curl_close($curl);
//echo $response;

?>
$data = json_decode(curl_exec($curl)); 
curl_close($curl);
//echo $response;
?>
<h3>Envios disponíveis</h3>

<table class="table table-striped">
    <thead>
        <tr>

            <th scope="col">Name</th>
            <th scope="col">price</th>
            <th scope="col">custom_price</th>
            <th scope="col">discount</th>
            <th scope="col">currency</th>
            <th scope="col">delivery_time</th>


        </tr>
    </thead>
    <tbody>
        @foreach($data as $item)
            @if( !isset($item->error))
                <tr>
                    <th scope="row"><img src="{{ $item->company->picture }}" alt="{{ $item->company->name }}" style="width: 120px;"></th>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->custom_price }}</td>
                    <td>{{ $item->discount }}</td>  
                    <td>{{ $item->currency }}</td>     
                    <td>{{ $item->delivery_time }}</td>                                       
</tr>
            @endif
        @endforeach
    </tbody>
</table>

<?php

echo '*******************POSTInserir fretes no carrinho***************************';

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => $endApi.'/api/v2/me/cart',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "service": 3,
    "agency": 49,
    "from": {
        "name": "Nome do remetente",
        "phone": "53984470102",
        "email": "contato@melhorenvio.com.br",
        "document": "16571478358",
        "company_document": "89794131000100",
        "state_register": "123456",
        "address": "Endereço do remetente",
        "complement": "Complemento",
        "number": "1",
        "district": "Bairro",
        "city": "São Paulo",
        "country_id": "BR",
        "postal_code": "01002001",
        "note": "observação"
    },
    "to": {
        "name": "Nome do destinatário",
        "phone": "53984470102",
        "email": "contato@melhorenvio.com.br",
        "document": "25404918047",
        "company_document": "89794131000101",
        "state_register": "123456",
        "address": "Endereço do destinatário",
        "complement": "Complemento",
        "number": "2",
        "district": "Bairro",
        "city": "Porto Alegre",
        "state_abbr": "RS",
        "country_id": "BR",
        "postal_code": "90570020",
        "note": "observação"
    },
    "products": [
        {
            "name": "Papel adesivo para etiquetas 1",
            "quantity": 3,
            "unitary_value": 100.00
        },
        {
            "name": "Papel adesivo para etiquetas 2",
            "quantity": 1,
            "unitary_value": 700.00
        }
    ],
    "volumes": [
        {
            "height": 15,
            "width": 20,
            "length": 10,
            "weight": 3.5
        }
    ],
    "options": {
        "insurance_value": 1000.00,
        "receipt": false,
        "own_hand": false,
        "reverse": false,
        "non_commercial": false,
        "invoice": {
            "key": "31190307586261000184550010000092481404848162"
        },
        "platform": "Nome da Plataforma",
        "tags": [
            {
                "tag": "Identificação do pedido na plataforma, exemplo: 1000007",
                "url": "Link direto para o pedido na plataforma, se possível, caso contrário pode ser passado o valor null"
            }
        ]
    }
}',
  CURLOPT_HTTPHEADER => array(
    'Accept: application/json',
    'Content-Type: application/json',
    'Authorization: Bearer '.$tokencadastrado,
    'User-Agent: '.$userAgent
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;



echo '****************GETListar carrinho de compras**********************';

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => $endApi.'/api/v2/me/cart',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Accept: application/json',
    'Authorization: Bearer '.$tokencadastrado,
    'User-Agent: '.$userAgent
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;

echo '**************GETExibir informações de um item do carrinho*****************';




$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => $endApi.'/api/v2/me/cart/',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Accept: application/json',
    'Authorization: Bearer '.$tokencadastrado,
    'User-Agent: '.$userAgent
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;



echo '******************DELRemoção de items do carrinho*******************';


$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => $endApi.'/api/v2/me/cart/',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'DELETE',
  CURLOPT_HTTPHEADER => array(
    'Accept: application/json',
    'Content-Type: application/json',
    'Authorization: Bearer '.$tokencadastrado,
    'User-Agent: '.$userAgent
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;


echo '******************POSTCompra de fretes (Checkout) (Ordens)*********************';


$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => $endApi.'/api/v2/me/shipment/checkout',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "orders": [
        "{{order_id}}"
    ]
}',
  CURLOPT_HTTPHEADER => array(
    'Accept: application/json',
    'Content-Type: application/json',
    'Authorization: Bearer '.$tokencadastrado,
    'User-Agent: '.$userAgent
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;


echo '******************POSTPré visualização de etiquetas******************';

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => $endApi.'/api/v2/me/shipment/preview',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "orders": [
        "{{order_id}}"
    ]
}',
  CURLOPT_HTTPHEADER => array(
    'Accept: application/json',
    'Content-Type: application/json',
    'Authorization: Bearer '.$tokencadastrado,
    'User-Agent: '.$userAgent
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;


echo '****************POSTRastreio de envios*****************';


$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => $endApi.'/api/v2/me/shipment/tracking',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "orders": [
        "{{order_id}}"
    ]
}',
  CURLOPT_HTTPHEADER => array(
    'Accept: application/json',
    'Content-Type: application/json',
    'Authorization: Bearer '.$tokencadastrado,
    'User-Agent: '.$userAgent
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;


echo '****************GETListar transportadoras********************';

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => $endApi.'/api/v2/me/shipment/companies',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'User-Agent: '.$userAgent
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;



echo '********************GETListar informações de uma transportadora********************';

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => $endApi.'/api/v2/me/shipment/companies/{{company_id}}',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'User-Agent: '.$userAgent
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;


echo '*****************GETListar serviços******************';

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => $endApi.'/api/v2/me/shipment/services',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'User-Agent: '.$userAgent
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
?>

