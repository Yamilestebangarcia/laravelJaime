const asunto = ["asunto 1", "asunto 2", "asunto 3"];
const mensaje = ["mensaje 1", "mensaje 2", "mensaje 3"];

document.getElementById("platilla").addEventListener("click", (e) => {
    if (e.target.value == "1") {
        document.getElementById("asunto").value = asunto[0];
        document.getElementById("cuerpo").value = mensaje[0];
    }
    if (e.target.value == "2") {
        document.getElementById("asunto").value = asunto[1];
        document.getElementById("cuerpo").value = mensaje[1];
    }
    if (e.target.value == "3") {
        document.getElementById("asunto").value = asunto[2];
        document.getElementById("cuerpo").value = mensaje[2];
    }
});
