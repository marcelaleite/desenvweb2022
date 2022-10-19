window.onload = (function (){
    document.getElementById('pesquisa').addEventListener('submit',function(ev){
        ev.preventDefault(); // não envia o formulário
        carregaDados(document.getElementById('busca').value);
    })

});

function carregaDados(busca){
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        dados = JSON.parse(this.responseText);
        montaTabela(dados);
    }
    xhttp.open("POST", "pesquisa.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("busca=" + busca);
}

function excluir(url,nome){
    msg = 'Confirma a exclusão do contato ' + nome + '?';
    if (confirm(msg)){        
        window.location.href = url;
    }
}

function montaTabela(dados){
    el = document.getElementById("lista");
    el.remove();
    
    let tabela = "<table class='table lista-contatos' id='lista'><thead><tr><th>Id</th><th>Nome</th><th>Sobrenome</th><th>Telefone</th><th>Alterar</th><th>Excluir</th></tr></thead>";
    for (let it in dados) {
        tabela += "<tr><td>" + dados[it].id + "</td>";
        tabela += "<td>" + dados[it].nome + "</td>";
        tabela += "<td>" + dados[it].sobrenome + "</td>";
        tabela += "<td>" + dados[it].telefone + "</td>";
        tabela += "<td><a href='novo/index.php?acao=editar&id="+dados[it].id+"'>Alt</a></td>";
        tabela += "<td><a href='#' onclick=excluir('index.php?acao=excluir&id="+dados[it].id+"','"+dados[it].nome+"')>Exc</a></td></tr>";
    }
    tabela += "</table>";
    document.getElementById('listagem').innerHTML = tabela;
}


