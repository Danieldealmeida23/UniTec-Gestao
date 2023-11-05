{{-- Definição da aplicação que gera imagens qr code, parâmetros passados por array--}}
{{-- Variáveis: idUsuario, aula, curso, sessao --}}
<div id="qrcode">
    @php
        use App\Models\Pessoa;


    $qrcode_dados = "www.google.com.br";    
    $qrcode= (new \chillerlan\QRCode\QRCode())->render($qrcode_dados);

    echo "<img src='$qrcode'>";
    @endphp


</div>

