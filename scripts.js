document.addEventListener("DOMContentLoaded",function(){

    let totalNotas = document.getElementById("totalNotas");
    let catPopular = document.getElementById("catPopular");
    let ultimaNota = document.getElementById("ultimaNota");

    totalNotas.innerText = "";
    catPopular.innerText = "";
    ultimaNota.innerHTML = "";
    extraerInfo(totalNotas,catPopular,ultimaNota);

});

function extraerInfo(totalNotas, catPopular,ultimaNota){

    fetch("api.php")
    .then(
        res => res.json()
    )
    .then(
        datos =>{
            totalNotas.innerText = datos.totalNotas;
            catPopular.innerText = datos.catPopular;
            ultimaNota.innerHTML = datos.ultimaNota.titulo;
        }
    )
    .catch(
        error =>{
            console.log(error);
        }
    )
}

document.getElementById("toggleCreateNote").addEventListener("click",()=>{
    let form = document.getElementById("crear");
    form.style.display = "block";
})

document.getElementById("toggleCerrarNota").addEventListener("click", () => { 
    let form = document.getElementById("crear");
    form.style.display = "none";
})