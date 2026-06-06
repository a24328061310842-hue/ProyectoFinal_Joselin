const fetchPokemon = async () => {

    const pokeNameInput = document.getElementById("pokeName");
    let pokeName = pokeNameInput.value.toLowerCase().trim();

    const url = `https://pokeapi.co/api/v2/pokemon/${pokeName}`;

    try {

        const res = await fetch(url);

        if (res.status !== 200) {

            pokeImage("./pokemon-sad.gif");

            document.getElementById("pokename").innerHTML =
                "Pokémon no encontrado";

            return;
        }

        const data = await res.json();

        // IMAGEN
        pokeImage(data.sprites.front_default);

        // NOMBRE
        document.getElementById("pokename").innerHTML =
            `Nombre: ${data.forms[0].name}`;

        // ID
        document.getElementById("pokeid").innerHTML =
            `#${data.id}`;

        // ORDEN
        document.getElementById("pokeorder").innerHTML =
            `Orden: #${data.order}`;

        // HABILIDAD
        document.getElementById("pokeitem").innerHTML =
            `Habilidad: ${data.abilities[0].ability.name}`;

        // TIPO(S)
        const tipos = data.types
            .map(tipo => tipo.type.name)
            .join(", ");

        document.getElementById("pokeType").innerHTML =
            `Tipo: ${tipos}`;

        // MOVIMIENTOS
        for (let i = 0; i < 4; i++) {

            let movimiento = data.moves[i]
                ? data.moves[i].move.name
                : "No disponible";

            document.getElementById(`pokemove${i + 1}`).innerHTML =
                `Movimiento ${i + 1}: ${movimiento}`;
        }

        // ===== GRÁFICA =====

        const ctx = document.getElementById("miCanvas");

        if (window.graficaPokemon) {
            window.graficaPokemon.destroy();
        }

        window.graficaPokemon = new Chart(ctx, {

            type: "bar",

            data: {
                labels: [
                    "HP",
                    "Ataque",
                    "Defensa",
                    "Ataque Esp.",
                    "Defensa Esp.",
                    "Velocidad"
                ],

                datasets: [{
                    label: data.forms[0].name,

                    data: [
                        data.stats[0].base_stat,
                        data.stats[1].base_stat,
                        data.stats[2].base_stat,
                        data.stats[3].base_stat,
                        data.stats[4].base_stat,
                        data.stats[5].base_stat
                    ],

                    backgroundColor: [
                        "rgba(56,189,248,0.8)",
                        "rgba(96,165,250,0.8)",
                        "rgba(59,130,246,0.8)",
                        "rgba(37,99,235,0.8)",
                        "rgba(29,78,216,0.8)",
                        "rgba(30,64,175,0.8)"
                    ],

                    borderRadius: 10,

                    hoverBackgroundColor: [
                        "#7dd3fc",
                        "#93c5fd",
                        "#60a5fa",
                        "#3b82f6",
                        "#2563eb",
                        "#1d4ed8"
                    ],

                    hoverBorderColor: [
                        "#ffffff",
                        "#ffffff",
                        "#ffffff",
                        "#ffffff",
                        "#ffffff",
                        "#ffffff"
                    ],

                    hoverBorderWidth: 4
                }]
            },

            options: {

                responsive: true,
                maintainAspectRatio: false,

                plugins: {

                    legend: {
                        labels: {
                            color: "white",
                            font: {
                                size: 16,
                                weight: "bold"
                            }
                        }
                    },

                    tooltip: {

                        backgroundColor: "#111827",
                        titleColor: "#fff",
                        bodyColor: "#fff",

                        titleFont: {
                            size: 16
                        },

                        bodyFont: {
                            size: 14
                        },

                        callbacks: {

                            title: function(context) {
                                return context[0].label;
                            },

                            label: function(context) {
                                return "Valor: " + context.raw;
                            }
                        }
                    }
                },

                scales: {

                    x: {

                        ticks: {
                            color: "white",
                            font: {
                                size: 14,
                                weight: "bold"
                            }
                        },

                        grid: {
                            color: "rgba(255,255,255,0.05)"
                        }
                    },

                    y: {

                        beginAtZero: true,

                        ticks: {
                            color: "white",
                            font: {
                                size: 14,
                                weight: "bold"
                            }
                        },

                        grid: {
                            color: "rgba(255,255,255,0.1)"
                        }
                    }
                }
            }
        });

    } catch (error) {

        console.error(error);

    }
};

const pokeImage = (url) => {

    document.getElementById("pokeImg").src = url;

};