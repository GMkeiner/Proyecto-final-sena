const ficha = document.getElementById('id_ficha');

ficha.addEventListener('change', async (Event) => {
    let container = document.getElementById('container');
    let clases_group = [];
    console.log(Event.target.value, document.baseURI.replace('asistencias/create', 'ficha/'.concat(Event.target.value)));
    try {
        const response = await fetch(document.baseURI.replace('asistencias/create', 'fichas/'.concat(Event.target.value)),
            { method: "GET", headers: { "Content-Type": "application/json" } });
        if (!response.ok) {
            throw new Error(`Response status: ${response.status}`);
        }
        const json = await response.json();
        console.log(json);
        function eventos(eventos){
            // let eventos = json['eventos'];
            // console.log(eventos);
            eventos.forEach(element => {
                let select = document.createElement("select");
                select.name = "mes";
                select.id = "mes";
                select.required = true;
                // console.log(Object.keys(element["mes1"]),Object.keys(element["mes2"]),Object.keys(element["mes3"]));
                let meses = [].concat(Object.keys(element["mes1"]), Object.keys(element["mes2"]), Object.keys(element["mes3"]));
                let mesesUnicos = [... new Set(meses)];
                let mesesOrdenados = mesesUnicos.sort((a, b) => { return a - b })
                // console.log(mesesOrdenados);
                for (let mes of mesesOrdenados) {
                    let option = document.createElement("option");
                    option.innerHTML = mes;
                    option.value = mes;
                    select.add(option);
                }
                select.addEventListener('change', (Event) => {
                    let value = Event.target.value;
                    let mesesOriginal = [].concat(element["mes1"], element["mes2"], element["mes3"])
                    console.log(value, mesesOriginal);
                    let clasesOriginal;
                    for (let mes of mesesOriginal) {
                        let month = Object.keys(mes);
                        if (month.includes(value)) {
                            // console.log(mes[value]);
                            clasesOriginal = mes[value];
                        }
                    }
                    // console.log(Object.keys(clasesOriginal));
                    let select2 = document.createElement('select');
                    select2.name = "nombre";
                    select2.id = "nombre";
                    select2.required = true;
                    select2.className = "form-select";
                    select2.classList.add("w-50");
                    let select3 = document.createElement('select');
                    select3.name = "dia";
                    select3.id = "dia";
                    select3.required = true;
                    select3.className = "form-select";
                    select3.classList.add("w-50");
                    if (!document.getElementById('evento')) {
                        let label_evento = document.createElement('label');
                        label_evento.htmlFor = "nombre";
                        label_evento.innerHTML = "Evento: ";
                        label_evento.className = "col-form-label";
                        label_evento.id = 'evento';
                        container.append(label_evento);
                    }
                    if (Object.keys(clasesOriginal).length === 1) {
                        let remove1 = document.getElementById("nombre");
                        let remove2 = document.getElementById("dia");
                        let remove3 = document.getElementById('dia_label');
                        if (remove1) {
                            container.removeChild(remove1);
                        }
                        if (remove2) {
                            container.removeChild(remove2);
                        }
                        if (remove3) {
                            container.removeChild(remove3);
                        }
                        let option_unic = document.createElement('option');
                        option_unic.value = Object.keys(clasesOriginal)[0];
                        option_unic.innerHTML = Object.keys(clasesOriginal)[0];
                        select2.append(option_unic);
                        container.append(select2);
                        for (let dia of clasesOriginal[Object.keys(clasesOriginal)[0]]) {
                            let option_dia = document.createElement('option');
                            option_dia.value = dia;
                            option_dia.innerHTML = dia;
                            select3.append(option_dia);
                        }
                        if (!document.getElementById('dia_label')) {
                            let label_dia = document.createElement('label');
                            label_dia.htmlFor = "dia";
                            label_dia.innerHTML = "Dia: ";
                            label_dia.className = "col-form-label";
                            label_dia.id = 'dia_label';
                            container.append(label_dia);
                        }
                        container.append(select3);
                    } else {
                        let remove1 = document.getElementById("nombre");
                        let remove2 = document.getElementById("dia");
                        let remove3 = document.getElementById('dia_label');
                        if (remove1) {
                            container.removeChild(remove1);
                        }
                        if (remove2) {
                            container.removeChild(remove2);
                            remove2 = '';
                        }
                        if (remove3) {
                            container.removeChild(remove3);
                        }
                        for (let clases of Object.keys(clasesOriginal)) {
                            let option_clases = document.createElement('option');
                            option_clases.value = clases;
                            option_clases.innerHTML = clases;
                            select2.append(option_clases);
                            container.append(select2);
                        }
                        select2.addEventListener('change', (Event) => {
                            let clase_actual = Event.target.value;
                            remove2 = document.getElementById("dia");
                            if (remove2) {
                                let hola = container.removeChild(remove2);
                                // console.log(hola);
                            }
                            // console.log(clasesOriginal[clase_actual]);
                            select3.innerHTML = '';
                            for (let dia of clasesOriginal[clase_actual]) {
                                let option_dia = document.createElement('option');
                                option_dia.value = dia;
                                option_dia.innerHTML = dia;
                                select3.append(option_dia);
                            }
                            if (!document.getElementById('dia_label')) {
                                let label_dia = document.createElement('label');
                                label_dia.htmlFor = "dia";
                                label_dia.innerHTML = "Dia: ";
                                label_dia.className = "col-form-label";
                                label_dia.id = 'dia_label';
                                container.append(label_dia);
                            }
                            container.append(select3);
                        })
                    }
                });
                select.className = "form-select";
                select.classList.add("w-50");
                let label_mes = document.createElement('label');
                label_mes.htmlFor = "mes";
                label_mes.innerHTML = "Mes: ";
                label_mes.className = "col-form-label";
                container.append(label_mes);
                container.append(select);
            });
        }
        function aprendices(aprendices){

        }
        eventos(json["eventos"]);
        aprendices(json["aprendices"]);
    } catch (error) {
        console.error(error);
    }

});
