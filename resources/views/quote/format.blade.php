<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style type="text/css">
        @font-face {
            src: url('/fonts/GrandHotel-Regular.otf');
            font-family: "GrandHotel";
        } 

        @font-face {
            src: url('/fonts/CariocaScriptPro.otf');
            font-family: "Carioca";
        }
        
        @font-face {
            src: url('/fonts/EuropaGroteskSH.otf');
            font-family: "Grotesk";
        }
        
        @font-face {
            src: url('/fonts/Unger-Chancery.ttf');
            font-family: "Unger";
        } 
        
        
        body {
            width: 230mm;
            height: 100%;
            margin:  0 auto;
            padding: 0;
            font-size: 12pt;
            background: rgb(204, 204, 204);
            
        }

        * {
            box-sizing: border-box;
            -moz-box-sizing: border-box;
        }

        .main-page {
            width: 210mm;
            min-height: 297mm;
            margin: 10mm auto;
            background: #fff;
            box-shadow: 0 0 0.5cm rgba(0, 0, 0, 0.5);
        }

        .sub-page {
            padding: 1cm;
            height: 297mm;
            background: #fff;
        }

        @page {
            size: A4;
            margin: 0;
        }

        @media print {
            html, body {
                width: 210mm;
                height: 297mm;
            }

            .main-page {
                margin: 0;
                border: initial;
                border-radius: initial;
                width: initial;
                min-height: initial;
                box-shadow: initial;
                background: initial;
                page-break-after: always;
            }
        }

        /* Formato */
        .container {
            color: #63bac2;
        }

        .header {
            display: grid;
            grid-template-columns: 35% 50% 15%;
        }

        .address {
            font-family: "Grotesk";
            font-size: 18px;
            letter-spacing: 1px;
            text-align: center;
            font-weight: 100;
        }

        .address p {
            padding: 2px;
            margin: 0;
        }

        /* Social */
        .social {
            margin-top: 18px;
            float: right;
        }
        .slogan h2 {
            font-family: "GrandHotel";
            font-size: 24px;
            letter-spacing: normal;
            text-align: center;
            margin: 1px auto;
            padding: 0;
            font-weight: lighter;
        }
        .slogan h3 {
            text-align: center;
            font-size: 12px;
            font-weight: lighter;
            margin: 2px auto;
        }
        
        .title {
            display: grid;
            grid-template-columns: 90% 10%;
            
        }

        .title h1 {
            font-family: "GrandHotel";
            margin: 0;
            margin-left: 72px;
            text-align: center;
            letter-spacing: 2px;
            font-size: 68px;
            font-weight: 100;
        }

        .title img {
            width: 80px;
        }

        /* Header */
        .brand .logo img {
            width: 100%;
        }

        .customer p {
            font-family: "Grotesk";
            font-size: 20px;
            margin-top: 0;
            margin-bottom: 0;
        }

        .customer span {
            color: #000;
            padding-left: 32px;
            font-family: "Unger";
            font-size: 28px;
        }

        .customer hr {
            background: #63bac2;
            height: 2px;
            border: none;
        }
        
        .details {
            height: 538px;
        }

        table {
            font-family: "GrandHotel";
        }

        thead tr th {
            letter-spacing: 2px;
            font-family: "Grotesk";
        }
        
        tbody tr td {
            color: #000;
            margin-left: 5px;
            font-size: 18px;
            font-weight: 100;
            font-family: "Unger";

        }   
        
        .footer {
            display: grid;
            grid-template-columns: 70% 30%;
            font-family: "Grotesk";
            letter-spacing: 1px;
        }

        .total p {
            text-transform: uppercase;
            font-size: 20px;
        }

        .total span {
            font-family: "Unger";
            font-size: 20px;
            color: #000;
            letter-spacing: normal;
        }

        .total small {
            font-family: "Unger";
            font-size: 12px;
            color: #000;
        }

        .webpage p {
            text-align: center;
        }

        .fa {
            margin: 5px;
            padding: 3px;
            font-size: 20px;
            width: 26px;
            height: 26px;
            text-align: center;
            text-decoration: none;
            border-radius: 50%;
        }

        .fa:hover {
            opacity: 0.7;
        }

        .fa-facebook {
            background: #3B5998;
            color: white;
        }

        .fa-pinterest {
            background: #cb2027;
            color: white;
        }

        .fa-instagram {
            background: #125688;
            color: white;
        }

    </style>
</head>
<body>
    <div class="main-page">
        <div class="sub-page">
            <div class="container">
                <div class="header">
                    <div class="brand">
                        <div class="logo"><img src="{{asset('img/defaults/reports/logo.png')}}" alt="logo-pequenosdormilones"></div>
                        <div class="slogan">
                            <h2>@if(empty($document_data->slogan)) {{'Para un coraz??n de ni??o'}} @else {{$document_data->slogan}} @endif</h2>
                            <h3>- RIE, JUEGA, SUE??A, IMAGINA -</h3>
                        </div>
                    </div>
                    
                    <div class="address">
                            <p>{{$branch->address}}</p>
                            <p>{{$branch->phone}}</p>
                            <p>{{$branch->email_s}}</p>
                            <p>{{$branch->email_cs}}</p>
                            <div class="social">
                                <a href="#" class="fa fa-facebook"></a>
                                <a href="#" class="fa fa-pinterest"></a>
                                <a href="#" class="fa fa-instagram"></a>
                                <p>Peque??os Dormilones</p>
                            </div>
                    </div>
                </div>
                <div class="title">
                    <h1>Cotizaci??n</h1>
                    <img src="@if(empty($document_data->image)) {{asset('img/defaults/reports/stamp-pd-blue.png')}} @else {{asset($document_data->image)}} @endif" alt="stamp-pequenosdormilones">
                </div>
                <div class="customer">
                    <p>Estimado: <span>{{ $customer_name }}</span></p>
                    <hr>
                    
                </div>
                <div class="details">
                    <table width="100%">
                        <thead style="color: #62b9c2;">
                        <tr class="font">
                            <th>CANT.</th>
                            <th align="left">ARTICULO</th>
                            <th align="right">C/U</th>
                            <th align="right">SUBTOTAL</th>
                        </tr>
                        </thead>
                        <tbody class="special-font">
                            @foreach ($items as $item)
                            <tr class="font">
                                <td align="right">{{$item->qty}}</td>
                                <td>{{$item->product->name}}</td>
                                <td align="right" class="price">$ {{ number_format($item->product->sale_price, 2)}}</td>
                                <td align="right" class="price">$ {{ number_format($item->qty * $item->product->sale_price, 2)}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="footer">
                    <div class="data">
                        <p>ESTA COTIZACI??N NO INCLUYE IVA</p>
                        <p>TODOS LOS PRECIOS ESTAN EN MONEDA NACIONAL</p>
                    </div>
                    <div class="total">
                        <p>Total: <span>${{ $quote->amount }} </span><small>MXN</small></p>
                    </div>
                </div>
                <div class="webpage">
                    <p>www.pequenosdormilones.com</p>
                </div>
        </div>    
    </div>
</body>
</html>