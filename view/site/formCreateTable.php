<?php include __DIR__.'/../startHtml.php'; ?>

<nav class="nav mt-2">
  <a class="nav-link disabled" href="#"> Criar Tabela </a>
  <a class="nav-link" href="/home">Voltar </a>
  
  
</nav>
<div class="form-group mt-2">
  
  <button id="addCampo" class="btn btn-info mb-2" >adicionar campo</button>
  <form id="form" action="/createTable" method="post">
    
    <label style="text-transform:capitalize" class="" for="Nome da Tabela">Nome da Tabela</label>
    <input type="text" id="nameTable" name="nameTable"  class="form-control">
    
    <input type="submit" id="enviar"  class="btn btn-info mt-2" value="enviar"/>
  </form>

  </div>

  <script>
    
    

    addCampo.addEventListener('click',(e)=>{
        let exit = true;
        let cont = 0;
        while(exit){
         let confirmar = confirm(`${cont} Campos adicionados `);
        
          if(confirmar){
            
            cont +=1
            add(cont);

          }else{
            exit = false;
          }
        }
        
    });
    
    function tipos(){
      const arrTipos = [
        'Selecione um Tipo',
        'primary_key',
        'int',
        'varchar',
        'float'
      ];

      return arrTipos;
    }

    function option(){
      const option = document.createElement('option');
      return option;
    }

    function add(cont){
      
      const form = document.getElementById('form');
      const input = document.createElement('input');
      const label = document.createElement('label');
      const select = document.createElement('select');
      
      label.setAttribute('for',`campo${cont}`);
      label.append(`campo ${cont}`);
      
      input.setAttribute('type','text');
      input.setAttribute('id',`campo${cont}`);
      input.setAttribute('name',`campo${cont}`);
      input.setAttribute('class','form-control');
      
      select.setAttribute('name',`tipo${cont}`);
      select.setAttribute('class','form-control mt-2');
      
      const tipo = tipos();
      
      for(let i=0;i < tipo.length;i++){
        const option = document.createElement('option');

        option.setAttribute('value',tipo[i]);
        option.setAttribute('required','required');
     
        option.append(tipo[i]);
        select.append(option);
        
      }
      

      form.appendChild(label);
      form.appendChild(input);
      form.appendChild(select);
      
  
    }

  </script>

<?php include __DIR__.'/../endHtml.php'; ?>