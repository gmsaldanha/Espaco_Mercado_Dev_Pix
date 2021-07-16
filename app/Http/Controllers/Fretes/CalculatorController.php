<?php

namespace App\Http\Controllers\Fretes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\QuotationFormRequest;
use App\Models\Fretes\Quotation;

class CalculatorController extends Controller
{
    private $quotation;

    public function __construct(Quotation $quotation)
    {
        $this->quotation = $quotation;
    }

    public function index()
    {
        $last_quotations = $this->quotation->orderBy('id', 'desc')->take(5)->get();

        return view('calculator.calculator')->with(compact('last_quotations'));
    }

    public function result(QuotationFormRequest $request)
    {
        $dataForm = $request->except('_token');

        $dataForm['from_cep'] = preg_replace("/[.-]/", "", $dataForm['from_cep']);
        $dataForm['to_cep'] = preg_replace("/[.-]/", "", $dataForm['to_cep']);
        $dataForm['weight'] = str_replace(",", ".", $dataForm['weight']);
        $dataForm['value'] = isset($dataForm['value']) ? str_replace(',','.',str_replace('.','',$dataForm['value'])) : 0;
        $dataForm['ar'] = !isset($dataForm['ar']) ? 0 : 1;
        $dataForm['mp'] = !isset($dataForm['mp']) ? 0 : 1;

        $insert = $this->quotation->create($dataForm);

        if($insert)
        {

            $client = new \GuzzleHttp\Client();
            $response = $client->request(
                'POST',
                'https://www.sandbox.melhorenvio.com.br/api/v2/me/shipment/calculate',
                [
                    'json' => [
                        'from' => [
                            "postal_code" => $dataForm['from_cep'],
                            "address" => '',
                            "number" => ''
                        ],
                        'to' => [
                            "postal_code" => $dataForm['to_cep'],
                            "address" => '',
                            "number" => ''
                        ],
                        'package' => [
                            "weight" => $dataForm['weight'],
                            "width" => $dataForm['width'],
                            "height" => $dataForm['height'],
                            "length" => $dataForm['length']
                        ],
                        'options' => [
                            "insurance_value" => $dataForm['value'],
                            "receipt" => $dataForm['ar'] == 1 ? true : false,
                            "own_hand" => $dataForm['mp'] == 1 ? true : false,
                            "collect" => false
                        ],
                        "services" => "1,2"
                    ],
                    'headers' => [
                        "accept" => "application/json",
                        "authorization" =>  "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjNiNTJmY2VlNzYzMjg3MzFiMDM0N2QwMDc1OTE4M2FhNTE1NTk1NTEzN2ZkZDI4OWNkNDA3YzBjY2QyYzkyMTc2MWNhZDM3NzgyMmZjMjBkIn0.eyJhdWQiOiI5NTYiLCJqdGkiOiIzYjUyZmNlZTc2MzI4NzMxYjAzNDdkMDA3NTkxODNhYTUxNTU5NTUxMzdmZGQyODljZDQwN2MwY2NkMmM5MjE3NjFjYWQzNzc4MjJmYzIwZCIsImlhdCI6MTYyNjQzNzIzMywibmJmIjoxNjI2NDM3MjMzLCJleHAiOjE2NTc5NzMyMzMsInN1YiI6IjQwZDA3ZTllLTAwMjktNDRmYy04ZWZiLTNkNWRiMGRiOThjZCIsInNjb3BlcyI6WyJjYXJ0LXJlYWQiLCJjYXJ0LXdyaXRlIiwiY29tcGFuaWVzLXJlYWQiLCJjb21wYW5pZXMtd3JpdGUiLCJjb3Vwb25zLXJlYWQiLCJjb3Vwb25zLXdyaXRlIiwibm90aWZpY2F0aW9ucy1yZWFkIiwib3JkZXJzLXJlYWQiLCJwcm9kdWN0cy1yZWFkIiwicHJvZHVjdHMtZGVzdHJveSIsInByb2R1Y3RzLXdyaXRlIiwicHVyY2hhc2VzLXJlYWQiLCJzaGlwcGluZy1jYWxjdWxhdGUiLCJzaGlwcGluZy1jYW5jZWwiLCJzaGlwcGluZy1jaGVja291dCIsInNoaXBwaW5nLWNvbXBhbmllcyIsInNoaXBwaW5nLWdlbmVyYXRlIiwic2hpcHBpbmctcHJldmlldyIsInNoaXBwaW5nLXByaW50Iiwic2hpcHBpbmctc2hhcmUiLCJzaGlwcGluZy10cmFja2luZyIsImVjb21tZXJjZS1zaGlwcGluZyIsInRyYW5zYWN0aW9ucy1yZWFkIiwidXNlcnMtcmVhZCIsInVzZXJzLXdyaXRlIiwid2ViaG9va3MtcmVhZCIsIndlYmhvb2tzLXdyaXRlIl19.uJ-SG-A9COduyWbFecXMdOZlNNyzxgaFG_Tj94Cp4A_PjRoQHwz4Xk13H0OwntFVXrW8XtMC-AOvLOhM5CGld6ocL5dpFHZ84m-3xb0dNpyFDn1KNH9WP1230qhhzkmg21MfqhrMPbtIFa7d40rboMyv9oBXmX9Rso4pZkCptPQzvoQ-kMGuSUxpYL--yD1_Bs-GHdPLhVvzNWorrOqiOvkBG1hXsYqanKfDBkw2VNZHSYsU7D4ngcV6u0URoOniTS9w4MrCmGVIPmbs6DU1ZbP44Uutxv6slpRfWSS7r46-6eZhhg4UfvJBwTYOi1Fnj49rMgwoGI1c_-HMTbVcePzdbe7oysDUV3xgwii2lVYv1ydnf89ms8ePBzbimmZL5Rxf-RrPhg9p4hrReNgNO1DHu1OdepVXi45qoZPAGhOcOd_wEEvSgnhUj_ZMedO0kJVqK4NJ34kzH7B6h1xyox_L0WjApACNrsBvXwvVtzQ2F09vVdb8vwIcafEtYVeXRhEPaN1mU4l7pqOZkCURW0EhlkFysY5wXQj3ArAw_2f9ma0vsSL79uijkHvEAdM6K0VWjSYsndNwLv1rdJEx5sA4AEs59WY2VoS40H94b4HNhregUovRrG3Ss5awqjqHoR-oqHankd_KbMJNJq60xtVG8aLVSQHCON6Ln_TiR9M",
                        "content-type" => "application/json"
                    ]
                ]
            );

            $response = json_decode($response->getBody());

            return view('calculator.result')->with(compact('response'));
        }
        else
            return redirect()->route('calculator');

    }
}
