
        // floreio -- para o usuário confirmar a exclusão
        function excluir(url){
            if (confirm("Confirma a exclusão?"))
                window.location.href = url; //redireciona para o arquivo que irá efetuar a exclusão
        }

        window.onload = (function (){
            carregaDados();
            document.getElementById('fpesquisa').addEventListener('submit',function(ev){
                ev.preventDefault();
                carregaDados();
            });
            document.getElementById('busca').addEventListener('keyup',carregaDados);
        });

        function carregaDados(){
            busca = document.getElementById('busca').value;
            const xhttp = new XMLHttpRequest();  // cria o objeto que fará a conexão assíncrona
            xhttp.onload = function() {  // executa essa função quando receber resposta do servidor
                dados = JSON.parse(this.responseText); // os dados são convertidos para objeto javascript
                montaTabela(dados);
            }
            // configuração dos parâmetros da conexão assíncrona
            xhttp.open("GET", "pesquisa.php?busca=" + busca, true);  // arquivo que será acessado no servidor remoto  
            xhttp.send(); // parâmetros para a requisição

        }
        function montaTabela(dados){
            str = "";
            for(usuario of dados){
                editar = '<a href=cadUsuario.php?acao=editar&id='+usuario.id+'>Alt</a>';
                excluir = "<a href='#' onclick=excluir('acao.php?acao=excluir&id="+usuario.id+"}')>Excluir</a>";
                str += "<tr><td>"+usuario.id+"</td><td>"+usuario.nome+'</td><td>'+usuario.email+'</td><td>'+usuario.senha+'</td><td>'+editar+'</td><td>'+excluir+'</td></tr>';
            }
            document.getElementById('corpo').innerHTML = str;
        }

