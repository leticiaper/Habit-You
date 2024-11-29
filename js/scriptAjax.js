function formulario(values){
    let form = `
        <form id="form${values}" class="form_metas">
            <div class="input-container">
                <input type="text" id="nome" name="nome" placeholder=" " required>
                <label for="nome">Nome da meta:</label>
            </div>
            <div class="input-container">
                <input type="text" id="descricao" name="descricao" placeholder=" " required>
                <label for="descricao">Descrição da meta:</label>
            </div>
            <div>
                <button type="submit">Salvar meta</button>
            </div>
        </form>

    `;

    let div = document.getElementById('div_form');

    div.innerHTML = form;
}

$(document).on('submit', '#form2', function(e){
    e.preventDefault();

    let div = document.getElementById('div_form');
    let lista = document.getElementById('lista_metas');

    let descri = $('#descricao').val();
    let nome = $('#nome').val();
    let id = $('#id').val();

    $.ajax({
        url:"php/funcoes.php", 
        method:"POST",
        data: {
                "form":"form2",
                "id": id,
                "nome": nome, 
                "descricao":descri
            },
        dataType:"json", 
        success: function(result){

            console.log(result);

            let metas = '';
            
            if ('error' in result){
                alert(result.error)
            }else{
                result.forEach(meta => {
                    metas += `<li>Meta: ${meta.titulo}<br>Descrição: ${meta.descricao}</li><br><hr>`;
                });

                lista.innerHTML = metas;
            }

            div.innerHTML = "";
        },
        error: function(xhr, status, error){
            console.log(xhr.responseText)
            console.log(status)
            console.log(error)
        }
    });

});

$(document).on('submit', '#form4', function(e){
    e.preventDefault();

    let div = document.getElementById('div_form');
    let lista = document.getElementById('lista_metas');

    let descri = $('#descricao').val();
    let nome = $('#nome').val();
    let id = $('#id').val();

    $.ajax({
        url:"php/funcoes.php", 
        method:"POST",
        data: {
                "form":"form4",
                "id": id,
                "nome": nome, 
                "descricao":descri
            },
        dataType:"json", 
        success: function(result){

            console.log(result);

            let metas = '';
            
            if ('error' in result){
                alert(result.error)
            }else{
                result.forEach(meta => {
                    metas += `<li>Meta: ${meta.titulo}<br>Descrição: ${meta.descricao}</li><br><hr>`;
                });

                lista.innerHTML = metas;
            }

            div.innerHTML = "";
        },
        error: function(xhr, status, error){
            console.log(xhr.responseText)
            console.log(status)
            console.log(error)
        }
    });
});


$(document).on('submit', '#form5', function(e){
    e.preventDefault();

    let div = document.getElementById('div_form');
    let lista = document.getElementById('lista_metas');

    let descri = $('#descricao').val();
    let nome = $('#nome').val();
    let id = $('#id').val();

    $.ajax({
        url:"php/funcoes.php", 
        method:"POST",
        data: {
                "form":"form5",
                "id": id,
                "nome": nome, 
                "descricao":descri
            },
        dataType:"json", 
        success: function(result){

            console.log(result);

            let metas = '';
            
            if ('error' in result){
                alert(result.error)
            }else{
                result.forEach(meta => {
                    metas += `<li>Meta: ${meta.titulo}<br>Descrição: ${meta.descricao}</li><br><hr>`;
                });

                lista.innerHTML = metas;
            }

            div.innerHTML = "";
        },
        error: function(xhr, status, error){
            console.log(xhr.responseText)
            console.log(status)
            console.log(error)
        }
    });
});

function buscar_metas(id){
    let semanais = document.getElementById("metas_semanais")
    let mensais = document.getElementById("metas_mensais")
    let anuais = document.getElementById("metas_anuais")
    $.ajax({
        url:"php/funcoes.php",
        method:"POST",
        data: {
                "form": "form3",
                "id":  id
        },
        dataType: "json",
        success: function(result){

            if('error' in result){
                alert(result.error)
            }else{

                let count = 0;

                result.forEach(function(meta){

                    count += 1

                    let check = "";

                    if(meta.status_meta == "progresso"){
                        check= `
                            <label>Progresso:</label>
                            <input type = "radio" id="status_meta" name = "status_meta${count}" value = "progresso" checked onclick="atuaizar_meta( ${meta.id_meta},'progresso')">
                            <label>Concluída:</label>
                            <input type = "radio" id="status_meta" name = "status_meta${count}" value= "concluida" onclick="atualizar_meta( ${meta.id_meta},'concluida')">
                        `;
                    }else{
                        check= `
                            <label>Progresso:</label>
                            <input type = "radio" id="status_meta" name = "status_meta${count}" value = "progresso" onclick="atualizar_meta( ${meta.id_meta},'progresso')">
                            <label>Concluída:</label>
                            <input type = "radio" id="status_meta" name = "status_meta${count}" value= "concluida" checked onclick="atualizar_meta( ${meta.id_meta},'concluida')">
                        `;
                    }

                    let card = `
                        <div class="card" style="width: 18rem;">
                            <div class="card-body" id="card_meta_${count}">
                                <h5 class="card-title" id="title_card_${count}">${meta.titulo}</h5>
                                <p class="card-text" id="subtitle_card_${count}">${meta.descricao}</p>
                                <div>
                                    ${check}
                                </div>
                                <div class="container_buttons">
                                    <button class="buttons_card_meta edite" onclick="gerar_form_card(${count}, '${meta.titulo}', '${meta.descricao}', ${meta.id_meta})"><img src="imgs/lapis.png" width="16px"></button>
                                    <button class="buttons_card_meta delete" onclick="excluir_meta(${meta.id_meta})"><img src="imgs/excluir.png" width="16px"></button>
                                </div>
                            </div>
                        </div>
                    `;

                    switch(meta.categoria){
                        case "semanal": 
                            semanais.innerHTML += card
                            break;
                        case "mensal":
                            mensais.innerHTML += card
                            break;
                        case "anual":
                            anuais.innerHTML += card
                            break;
                        default:
                            break;
                    }

                });

            }

        },
        error: function(xhr, status, error){
            console.log(xhr.responseText)
            console.log(status)
            console.log(error)
        }
    });

};
function atualizar_meta(id, status){
    $.ajax({
        url:"php/funcoes.php",
        method: 'POST',
        data: {
            "form": "form6",
            "id":  id,
            "status": status
        },
        dataType: "json",
        success: function(result){
            if("error" in result){
                alert(result.error)  
            }
        },
        error: function(xhr, status, error){
            console.log(xhr.responseText)
            console.log(status)
            console.log(error)
        }
    });
}

function gerar_form_card(count, titulo, descricao, id_meta){
    let card = document.getElementById(`card_meta_${count}`);

    let form = `
        <form id='form7'>
            <input type="hidden" id="meta" value="${id_meta}">
            <input type="text" id="name_card" value="${titulo}" required>
            <input type="text" id="descricao" value="${descricao}" required>
            <input type="submit" value="Salvar">
        </form>
    `;

    card.innerHTML = form; 
}

$(document).on('submit', '#form7', function(e){
    e.preventDefault()

    let id_meta = $('#meta').val();
    let titulo = $('#name_card').val();
    let descricao = $('#descricao').val();

    $.ajax({
        url:"php/funcoes.php",
        method: 'POST',
        data:{
            "form": "form7",
            "id": id_meta,
            "titulo": titulo,
            "descricao": descricao
        },
        dataType: "json",
        success: function(result){
            if("error" in result){
                alert(result.error)  
            }else{
                window.location.reload()
            } 
        },
        error: function(xhr, status, error){
            console.log(xhr.responseText)
            console.log(status)
            console.log(error)
        }
    });

});

function excluir_meta(id){

    $.ajax({
        url:"php/funcoes.php",
        method: 'POST',
        data:{
            "form": "form8",
            "id": id,
        },
        dataType: "json",
        success: function(result){
            if("error" in result){
                alert(result.error)  
            }else{
                window.location.reload()
            } 
        },
        error: function(xhr, status, error){
            console.log(xhr.responseText)
            console.log(error)
        }
    });

}

