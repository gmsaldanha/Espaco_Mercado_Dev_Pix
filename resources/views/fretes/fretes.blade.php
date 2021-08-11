
@extends('template.template')

@section('content')


    <h3>Envios disponíveis</h3>
    

    <table class="table table-striped">

        <tbody>

            @foreach($data as $item)


       

                @if( !isset($item->error))
                    <tr>
                    <th scope="row"><img src="{{ $item->company->picture }}" alt="{{ $item->company->name }}" style="width: 100px;"></th>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->delivery_range->min or '' }} - {{ $item->delivery_range->max or '' }} dias úteis</td>
                        <td>{{ $item->currency }}{{ number_format($item->price, 2, ',', '.') }}</td>
                    </tr>
 @endif
            
             @break
            @endforeach
        </tbody>
    </table>


