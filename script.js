const contenedor = document.getElementById("contenedor");
const buscador = document.getElementById("buscador");

let personajes = [];

fetch("personajes.json")
.then(response => response.json())
.then(data => {
    personajes = data;
})
.catch(error => {
    console.error("Error al cargar JSON:", error);
});

buscador.addEventListener("input", () => {

    const texto = buscador.value.toLowerCase();

    if(texto === ""){
        contenedor.innerHTML = "";
        return;
    }

    const resultado = personajes.filter(personaje =>
        personaje.nombre.toLowerCase().includes(texto)
    );

    mostrarPersonajes(resultado);

});

function mostrarPersonajes(lista){

    contenedor.innerHTML = "";

    lista.forEach(personaje => {

        contenedor.innerHTML += `
        <div class="tarjeta">

            <img src="${personaje.imagen}" alt="${personaje.nombre}">

            <div class="info">

                <h2>${personaje.nombre}</h2>

                <p><strong>Edad:</strong> ${personaje.edad}</p>

                <p><strong>Ocupación:</strong> ${personaje.ocupacion}</p>

                <p><strong>Descripción:</strong> ${personaje.descripcion}</p>

            </div>

        </div>
        `;
    });
}

function mostrarInfo(){

    document.getElementById("infoSerie").innerHTML = `
    Gravity Falls es una serie animada que sigue las aventuras de los gemelos Dipper Pines y Mabel Pines durante sus vacaciones de verano en el misterioso pueblo de Gravity Falls. Mientras ayudan a su tío Stan Pines en la Cabaña del Misterio, descubren un diario lleno de secretos sobre criaturas extrañas, fenómenos sobrenaturales y enigmas ocultos. Juntos vivirán aventuras emocionantes mientras intentan descubrir los misterios que rodean al pueblo.
    `;
}