@extends('template.template')

@section('content')


<?php
$token ='eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjNiNTJmY2VlNzYzMjg3MzFiMDM0N2QwMDc1OTE4M2FhNTE1NTk1NTEzN2ZkZDI4OWNkNDA3YzBjY2QyYzkyMTc2MWNhZDM3NzgyMmZjMjBkIn0.eyJhdWQiOiI5NTYiLCJqdGkiOiIzYjUyZmNlZTc2MzI4NzMxYjAzNDdkMDA3NTkxODNhYTUxNTU5NTUxMzdmZGQyODljZDQwN2MwY2NkMmM5MjE3NjFjYWQzNzc4MjJmYzIwZCIsImlhdCI6MTYyNjQzNzIzMywibmJmIjoxNjI2NDM3MjMzLCJleHAiOjE2NTc5NzMyMzMsInN1YiI6IjQwZDA3ZTllLTAwMjktNDRmYy04ZWZiLTNkNWRiMGRiOThjZCIsInNjb3BlcyI6WyJjYXJ0LXJlYWQiLCJjYXJ0LXdyaXRlIiwiY29tcGFuaWVzLXJlYWQiLCJjb21wYW5pZXMtd3JpdGUiLCJjb3Vwb25zLXJlYWQiLCJjb3Vwb25zLXdyaXRlIiwibm90aWZpY2F0aW9ucy1yZWFkIiwib3JkZXJzLXJlYWQiLCJwcm9kdWN0cy1yZWFkIiwicHJvZHVjdHMtZGVzdHJveSIsInByb2R1Y3RzLXdyaXRlIiwicHVyY2hhc2VzLXJlYWQiLCJzaGlwcGluZy1jYWxjdWxhdGUiLCJzaGlwcGluZy1jYW5jZWwiLCJzaGlwcGluZy1jaGVja291dCIsInNoaXBwaW5nLWNvbXBhbmllcyIsInNoaXBwaW5nLWdlbmVyYXRlIiwic2hpcHBpbmctcHJldmlldyIsInNoaXBwaW5nLXByaW50Iiwic2hpcHBpbmctc2hhcmUiLCJzaGlwcGluZy10cmFja2luZyIsImVjb21tZXJjZS1zaGlwcGluZyIsInRyYW5zYWN0aW9ucy1yZWFkIiwidXNlcnMtcmVhZCIsInVzZXJzLXdyaXRlIiwid2ViaG9va3MtcmVhZCIsIndlYmhvb2tzLXdyaXRlIl19.uJ-SG-A9COduyWbFecXMdOZlNNyzxgaFG_Tj94Cp4A_PjRoQHwz4Xk13H0OwntFVXrW8XtMC-AOvLOhM5CGld6ocL5dpFHZ84m-3xb0dNpyFDn1KNH9WP1230qhhzkmg21MfqhrMPbtIFa7d40rboMyv9oBXmX9Rso4pZkCptPQzvoQ-kMGuSUxpYL--yD1_Bs-GHdPLhVvzNWorrOqiOvkBG1hXsYqanKfDBkw2VNZHSYsU7D4ngcV6u0URoOniTS9w4MrCmGVIPmbs6DU1ZbP44Uutxv6slpRfWSS7r46-6eZhhg4UfvJBwTYOi1Fnj49rMgwoGI1c_-HMTbVcePzdbe7oysDUV3xgwii2lVYv1ydnf89ms8ePBzbimmZL5Rxf-RrPhg9p4hrReNgNO1DHu1OdepVXi45qoZPAGhOcOd_wEEvSgnhUj_ZMedO0kJVqK4NJ34kzH7B6h1xyox_L0WjApACNrsBvXwvVtzQ2F09vVdb8vwIcafEtYVeXRhEPaN1mU4l7pqOZkCURW0EhlkFysY5wXQj3ArAw_2f9ma0vsSL79uijkHvEAdM6K0VWjSYsndNwLv1rdJEx5sA4AEs59WY2VoS40H94b4HNhregUovRrG3Ss5awqjqHoR-oqHankd_KbMJNJq60xtVG8aLVSQHCON6Ln_TiR9M';
$tokenParts = explode('.', $token);

$tokenHeader = json_decode(base64_decode($tokenParts[0]));
$tokenPayload = json_decode(base64_decode($tokenParts[1]));
$tokenSignature = $tokenParts[2];
$tokenExpirationDate = date('l jS \of F Y h:i:s A', $tokenPayload->exp);
echo "Vencimento do Token $tokenExpirationDate";

?>
    <h2>Calculadora de fretes Melhor Envio</h2>

    @if(isset($errors) && count($errors) > 0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <h4>Últimas cotações</h4>

    <select name="last_quotations" id="last_quotations" onchange="fillQuotation(this)" class="form-control my-3">
        <option value="">Selecione</option>
        @foreach($last_quotations as $lc)
            <option
                    value="{{ $lc->id }}"
                    data-from-cep="{{ $lc->from_cep }}"
                    data-to-cep="{{ $lc->to_cep }}"
                    data-height="{{ $lc->height }}"
                    data-width="{{ $lc->width }}"
                    data-length="{{ $lc->length }}"
                    data-weight="{{ $lc->weight }}"
                    data-value="{{ $lc->value }}"
                    data-ar="{{ $lc->ar }}"
                    data-mp="{{ $lc->mp }}"
            >
                CEP Origem: {{ $lc->from_cep }} |
                CEP Destino: {{ $lc->to_cep }} |
                Altura: {{ $lc->height }}cm |
                Largura: {{ $lc->width }}cm |
                Comprimento: {{ $lc->length }}cm |
                Peso: {{ $lc->weight }}kg |
                Valor: R${{ number_format($lc->price, 2, ',', '.') }} |
                AR: {{ ($lc->ar == 1) ? 'Sim' : 'Não' }} |
                MP: {{ ($lc->mp == 1) ? 'Sim' : 'Não' }}
            </option>
        @endforeach
    </select>

    <h4>Nova cotação</h4>

    <form onsubmit="cleanMask()" action="{{ route('result') }}" method="post">
        @csrf
        <div class="row my-3">
            <div class="form-group col-md-4 offset-2">
                <label for="from_cep">CEP Origem</label>
                <input type="text" id="from_cep" name="from_cep" class="form-control" data-mask="00.000-000" value="{{ old('from_cep') }}">
            </div>

            <div class="form-group col-md-4">
                <label for="to_cep">CEP Destino</label>
                <input type="text" id="to_cep" name="to_cep" class="form-control" data-mask="00.000-000" value="{{ old('to_cep') }}">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-4">
                <label for="">Altura(cm)</label>
                <input type="text" class="form-control" name="height" id="height" data-mask="999" maxlength="3" value="{{ old('height') }}">
            </div>
            <div class="form-group col-md-4">
                <label for="">Largura(cm)</label>
                <input type="text" class="form-control" name="width" id="width" data-mask="999" maxlength="3" value="{{ old('width') }}">
            </div>
            <div class="form-group col-md-4">
                <label for="">Comprimento(cm)</label>
                <input type="text" class="form-control" name="length" id="length" data-mask="999" maxlength="3" value="{{ old('length') }}">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-3 offset-3">
                <label for="weight">Peso(kg)</label>
                <input type="text" id="weight" name="weight" class="form-control" value="{{ old('weight') }}">
            </div>

            <div class="form-group col-md-3">
                <label for="value">Valor Segurado</label>
                <input type="text" id="value" name="value" class="form-control" data-mask="000.000.000.000.000,00" data-mask-reverse="true" value="{{ old('value') }}">
            </div>
        </div>
        <div class="row">
            <div class="custom-control custom-checkbox col-md-3 offset-3 pl-5">
                <input type="checkbox" class="custom-control-input" id="ar" name="ar" value="1">
                <label class="custom-control-label" for="ar">Aviso de recebimento</label>
            </div>

            <div class="custom-control custom-checkbox col-md-3 pl-5">
                <input type="checkbox" class="custom-control-input" id="mp" name="mp" value="1">
                <label class="custom-control-label" for="mp">Mão própria</label>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 offset-5 mt-5">
                <input class="btn btn-primary" type="submit" value="Calcular">
            </div>
        </div>

    </form>

@endsection
