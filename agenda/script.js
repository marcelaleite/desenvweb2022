window.onload = (function (){
    document.getElementById('btn').addEventListener('click',function(){
         document.getElementById('texto').innerHTML = document.getElementById('nome').value +
         ' ' 
         + document.getElementById('sobrenome').value;
    });
    
    document.getElementById('texto').addEventListener('mouseover',function(ev){
        this.style.backgroundColor = 'pink';

        this.style.left = ev.clientX+'px';
        this.style.top = ev.clientY+'px';
        console.log(ev);
    });
    document.getElementById('nome').addEventListener('keydown', function(ev){
        if (ev.key == 'm' || ev.key == 'M'){
            this.value = '';
            document.getElementById('nomecorreto').style.display = 'block';
            // x = prompt('Valor inválido. Informe novo valor: ');
            this.value = document.getElementById('novo').className = 'novaclassCSS';
        }
    });

});

let x = 10,y = 0;

for(let i = 0;i<=x;i++){
    console.log(i);
}

function verifica(){
    alert(1);
}