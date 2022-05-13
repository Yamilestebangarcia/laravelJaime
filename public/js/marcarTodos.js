const d = document,
    $autorizar = d.getElementById("btn-autorizar"),
    $correo = d.getElementById("btn-correo");

const marcarTodo = (condicion) => {
    const marcado = d.querySelectorAll(".marcado");
    marcado.forEach((el) => {
        el.checked = condicion;
    });
};

d.addEventListener("click", (e) => {
    if (e.target.id === "todos") {
        if (e.target.checked) {
            marcarTodo(true);
        } else {
            marcarTodo(false);
        }
    }

    // if (e.target.matches(".marcado")) {

    //     // comprobamos que está marcado
    //     if (e.target.checked) {
    //         // vemos si la url se corresponde a una consulta
    //         //console.log($autorizar.href.indexOf("?"));
    //         if ($autorizar.href.indexOf("?") !== -1) {
    //             const posicion = $autorizar.href.indexOf("]");
    //             const arrayHref = $autorizar.href.slice(0, posicion);
    //             const url = arrayHref + "," + e.target.value + "]";
    //             //console.log(arrayHref);
    //             $autorizar.href = url;
    //             console.log($autorizar.href);

    //             //console.log(url);
    //         } else {
    //             // si no se la pasamos nosotros
    //             $autorizar.href =
    //                 $autorizar.href + "?auth=[," + e.target.value + "]";
    //             console.log($autorizar.href);
    //         }
    //         //console.log($autorizar.href);
    //     } else {
    //         $autorizar.href.replace("," + e.target.value, "");
    //         const url = $autorizar.href.replace("," + e.target.value, "");
    //         $autorizar.href = url;
    //         console.log($autorizar.href);
    //     }
    // }
    //console.log("funciona", e.target.class);

    if (e.target.id === "btn-autorizar") {
        e.preventDefault();
        const arrayChecked = d.querySelectorAll(".marcado");

        const arrayId = [];

        arrayChecked.forEach((el) => {
            if (el.checked) {
                arrayId.push(el.value);
            }
        });
        //console.log($autorizar.className.length);
        const sin = $autorizar.className.substring(
            0,
            $autorizar.className.length - 2
        );
        console.log(sin);
        let url = sin + "/" + arrayId;
        //console.log(url);
        location = url;
        //console.log(arrayId);
    }
    if (e.target.id === "btn-correo") {
        const arrayChecked = d.querySelectorAll(".marcado");

        const arrayId = [];

        arrayChecked.forEach((el) => {
            if (el.checked) {
                arrayId.push(el.value);
            }
        });
        console.log($correo.className.length);
        const sin = $correo.className.substring(
            0,
            $autorizar.className.length - 5
        );
        console.log(sin);
        let url = sin + "/" + arrayId;
        //console.log(url);

        location = url;
    }
});
