novaLinha(4);
            
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