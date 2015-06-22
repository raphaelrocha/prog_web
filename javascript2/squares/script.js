            var vez=0;
            var continua=0;
            var jogador1="";
            var jogador2="";
            var placarJ1=0;
            var placarJ2=0;

            function inicia(){
                jogador1 = document.getElementById("jogador1").value;
                jogador2 = document.getElementById("jogador2").value;

                if((jogador1==="") || (jogador2==="")){
                    alert('ALERTA!\nInforme os nomes dos jogadores.');
                }else{
                    vez=1;
                    document.getElementById("jogador1").disabled=true;
                    document.getElementById("jogador2").disabled=true;
                    document.getElementById('vez').className = "pegou1";
                    document.getElementById("mostra-nome").innerHTML = jogador1;
                    document.getElementById("mostra-nome-J1").innerHTML = jogador1;
                    document.getElementById("mostra-nome-J2").innerHTML = jogador2;
                    document.getElementById("bt-ini").style.display = 'none';
                    document.getElementById("bt-reini").style.display = 'block';
                    document.getElementById("placarJ1").style.display = 'block';
                    document.getElementById("placarJ2").style.display = 'block';
                    document.getElementById("hr-placar").style.display = 'block';
                    document.getElementById("div-jogo").style.display = 'block';
                    //document.getElementById("mostra-placar-j1").style.display = 'block';
                    //document.getElementById("mostra-placar-j2").style.display = 'block';
                    
                    
                    //document.getElementById("jogador1").style.display = 'none';
                    //document.getElementById("jogador2").style.display = 'none';
                }
            }

            function reinicia(){
                location.reload();
            }

            function tableText(tableCell) {
                    //alert(tableCell.id);
                    var urlString = 'url(p1.gif)';
                    tableCell.style.backgroundImage = urlString;
                    //alert(tableCell.id);
                }

            function verifica(table){
                for (var i = 0; i < table.rows.length; i++) {
                    for (var j = 0; j < table.rows[i].cells.length; j++){
                        var id = table.rows[i].cells[j].id.substring(0, 3);
                        if(table.rows[i].cells[j].className == "quadrado"){
                            //tableText(table.rows[i].cells[j]);
                            //table.rows[i].cells[j].className = "pegou";

                            var valida=0;
                            var elemento;

                            var result = table.rows[i].cells[j].id.split(";");

                            var linha = result[0];
                            var id = result[1];
                            console.log("linha: "+linha+" curId: "+id);

                            linha--;
                            console.log("checa: "+linha+";"+id);

                            elemento = document.getElementById(linha+";"+id);
                            if(elemento.className == "fixa"){
                                valida++;
                            }

                            
                            linha = result[0];
                            id = result[1];
                            id--;
                            console.log("checa: "+linha+";"+id);
                            elemento = document.getElementById(linha+";"+id);
                            if(elemento.className == "fixa"){
                                valida++;
                            }

                            linha = result[0];
                            id = result[1];
                            id++;
                            console.log("checa: "+linha+";"+id);
                            elemento = document.getElementById(linha+";"+id);
                            if(elemento.className == "fixa"){
                                valida++;
                            }

                            linha = result[0];
                            id = result[1];
                            linha++;
                            console.log("checa: "+linha+";"+id);
                            elemento = document.getElementById(linha+";"+id);
                            if(elemento.className == "fixa"){
                                valida++;
                            }

                            console.log("valida: "+valida);
                            
                            if(valida==4){
                                if(vez==1){
                                    table.rows[i].cells[j].className = "pegou1";
                                    continua=1;
                                    placarJ1++;
                                    document.getElementById("mostra-placar-j1").innerHTML = placarJ1;
                                    //vez=2;
                                }else if(vez==2){
                                    table.rows[i].cells[j].className = "pegou2";
                                    continua=1;
                                    placarJ2++;
                                    document.getElementById("mostra-placar-j2").innerHTML = placarJ2;
                                    //vez=1;
                                }
                            }
                        }
                    }
                }
                if(vez==1){
                    if(continua==0){
                        vez=2;
                        document.getElementById('vez').className = "pegou2";
                        document.getElementById("mostra-nome").innerHTML = jogador2;
                    }else{
                        continua=0;
                    }
                    
                }else if (vez==2){
                    if(continua==0){
                        vez=1;
                        document.getElementById('vez').className = "pegou1";
                        document.getElementById("mostra-nome").innerHTML = jogador1;
                    }else{
                        continua=0;
                    }
                }
            }


            function novaLinha(){
                document.getElementById("jogador1").value="";
                document.getElementById("jogador2").value="";
                document.getElementById("bt-reini").style.display = 'none';
                document.getElementById("placarJ1").style.display = 'none';
                document.getElementById("placarJ2").style.display = 'none';
                document.getElementById("hr-placar").style.display = 'none';
                document.getElementById("div-jogo").style.display = 'none';
                //document.getElementById("mostra-placar-j1").style.display = 'none';
                //document.getElementById("mostra-placar-j2").style.display = 'none';
                
                document.getElementById("jogador1").disabled=false;
                document.getElementById("jogador2").disabled=false;

                //document.getElementById("jogador1").style.display = 'block';
                //document.getElementById("jogador2").style.display = 'block';

                //document.getElementById('vez').className = "pegou1";
                var linhaImpar=[];
                var linhaPar=[];
                var x;
                var i;

                var linha=0;
                var id=0;
                
                //dificuldade
                var limite = 16;
                

                if(limite%2==0){
                    limite++;
                }
                var fim = limite;
                var linhas = limite;

                for (i=0;i<linhas;i++){
                    if(i%2==0){
                        linhaImpar[0] = "<tr>";
                        for(x = 1; x <= fim; x++){
                            if(x % 2 !=0){
                                linhaImpar[x] = "<td id='"+linha+";"+id+"' class='no'></td>";
                            }else{
                                linhaImpar[x] = "<td id='"+linha+";"+id+"' class='fora'></td>";
                            }
                            id++;                 
                        }
                        id=0;
                        linha++;

                        linhaImpar[fim+1] = "</tr>";
                        var ultimo = linhaImpar.length;
                        x=0;
                        var estrutura="";
                        for (x=0;x<ultimo;x++){
                            estrutura = estrutura + linhaImpar[x];
                        }

                        document.getElementById("tabela").innerHTML += estrutura;

                        x=0;
                        ultimo=0;

                    }else{
                        linhaPar[0] = "<tr>";
                        for(x = 1; x <= fim; x++){
                            if(x % 2 !=0){
                                linhaPar[x] = "<td id='"+linha+";"+id+"'class='fora'></td>";
                            }else{
                                linhaPar[x] = "<td id='"+linha+";"+id+"'class='quadrado'></td>";
                            }
                            id++;               
                        }
                        id=0;
                        linha++;

                        linhaPar[fim+1] = "</tr>";
                        var ultimo = linhaPar.length;
                        x=0;
                        var estrutura="";
                        for (x=0;x<ultimo;x++){
                            estrutura = estrutura + linhaPar[x];
                        }

                        document.getElementById("tabela").innerHTML += estrutura;

                        x=0;
                        ultimo=0;
                    }
                }
            }      



            ////
            novaLinha();
            
            var table = document.getElementById("tabela");
                if (table != null) {
                    for (var i = 0; i < table.rows.length; i++) {
                        for (var j = 0; j < table.rows[i].cells.length; j++){
                            table.rows[i].cells[j].onmouseover = function() 
                            { 
                                if((this.className!="quadrado")&&(this.className!="pegou1")&&(this.className!="pegou2"))
                                {
                                    if((this.className!="fixa")&&(this.className!="no"))
                                    {
                                        this.className = "emcima";
                                    }
                                }
                            }
                        }
                    }
                    for (var i = 0; i < table.rows.length; i++) {
                        for (var j = 0; j < table.rows[i].cells.length; j++){
                            table.rows[i].cells[j].onmouseout = function() 
                            { 
                                if((this.className!="quadrado")&&(this.className!="pegou1")&&(this.className!="pegou2"))
                                {
                                    if((this.className!="fixa")&&(this.className!="no"))
                                    {
                                        this.className = "fora";
                                    }     
                                }

                            }
                        } 
                    }
                    for (var i = 0; i < table.rows.length; i++) {
                        for (var j = 0; j < table.rows[i].cells.length; j++)
                            table.rows[i].cells[j].onclick = function() {
                            { 
                                if((this.className!="quadrado")&&(this.className!="pegou1")&&(this.className!="pegou2"))
                                {
                                    if((this.className!="fixa")&&(this.className!="no"))
                                    {
                                        this.className = "fixa";
                                        verifica(table);

                                    }    
                                }
                            }
                        }
                    }
                    
                }