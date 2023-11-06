<!DOCTYPE html>
<html lang="br">
<head>
    <title>@yield('title')</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    
    
    {{-- Uso do Vite para uso dos recursos css e js (comando run build) --}}
    
    @vite(['resources/css/app.css', 'resources/css/estilo.css'])
  <!--===================================================================================================-->
  <base href="https://mozilla.github.io">
  <script src="https://code.jquery.com/jquery-3.1.1.min.js">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    @vite(['resources/js/app.js', 'resources/js/script.js'])
    <script src="//mozilla.github.io/pdf.js/build/pdf.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.5.207/pdf.min.js"></script>
    <script>
        function realizarPedido(id_item){
            $quantidade = document.getElementById('qtd_item'+id_item).value
            window.location.replace('{{route('app.pedirpracaalimentacao')}}/'+id_item+'/'+$quantidade);

        }




        function consultaCardapio (loja) {
            $.ajax({
                url:"{{ route('app.consultacardapio') }}/"+loja,
                complete: function (response) {
                        const resposta = JSON.parse(response.responseText)
                        var tabelaDados = "<tr>"
                        for(var r in resposta){
                            tabelaDados += "<td></td><td>"+resposta[r].item+"</td><td>R$ "+parseFloat(resposta[r].item_preco).toFixed(2)+"</td><td><input type='number' id='qtd_item"+resposta[r].id_item+"'></td><td><button class='btn btn-info' onclick='realizarPedido("+resposta[r].id_item+")'>Pedir</button></td></tr>";
                        }
                        tabelaDados += "</tr>";
                        document.getElementById('tabelaCardapio').innerHTML = tabelaDados;

                },
                error: function () {
                    alert('Erro');
                }
            });
        }  

            function consultaLink(prova) {
                $.ajax({
                    url:"{{ route('app.consultaprova') }}/"+prova,
                    complete: function (response) {
                            const resposta = response.responseText;
                            document.getElementById('qrCode').innerHTML = "<img src="+resposta+">";

                    },
                    error: function () {
                        alert('Erro');
                    }
                });  
  
            return false;
            }

  </script>
</head>
<body>
@include('base._partials.menu')
@yield('bemvindo')
@yield('content')
@yield('footer')
</body>
@yield('script')
</html>
