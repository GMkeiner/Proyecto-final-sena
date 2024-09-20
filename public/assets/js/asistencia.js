const ficha = document.getElementById('id_ficha');

ficha.addEventListener('change', async (Event) => {
    let container = document.getElementById('container');
    try {
        const response = await fetch(document.baseURI.replace('asistencias/create', 'fichas/'.concat(Event.target.value)),
            { method: "GET", headers: { "Content-Type": "application/json" } });
        if (!response.ok) {
            throw new Error(`Response status: ${response.status}`);
        }
        const json = await response.json();
        function eventos(eventos){
            if(container.querySelector('select#mes')){
                container.removeChild(container.querySelector('select#mes'));
                container.removeChild(container.querySelector('label[for="mes"]'));
            }
            if(container.querySelector('select#nombre')){
                container.removeChild(container.querySelector('select#nombre'));
                container.removeChild(container.querySelector('label[for="nombre"]'));
            }
            if(container.querySelector('select#dia')){
                container.removeChild(container.querySelector('select#dia'));
                container.removeChild(container.querySelector('label[for="dia"]'));
            }
            eventos.forEach(element => {
                let select = document.createElement("select");
                select.name = "mes";
                select.id = "mes";
                select.required = true;
                let input_hora_inicial = document.createElement("input");
                let input_hora_final = document.createElement("input");
                input_hora_inicial.name = "hora_inicial";
                input_hora_final.name = "hora_final";
                input_hora_inicial.type = "hidden";
                input_hora_final.type = "hidden";
                let meses = [].concat(Object.keys(element["mes1"]), Object.keys(element["mes2"]), Object.keys(element["mes3"]));
                let mesesUnicos = [... new Set(meses)];
                let mesesOrdenados = mesesUnicos.sort((a, b) => { return a - b })
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
                            clasesOriginal = mes[value];
                        }
                    }
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
                        input_hora_inicial.value = element["hora"][Object.keys(clasesOriginal)[0]][0];
                        input_hora_final.value = element["hora"][Object.keys(clasesOriginal)[0]][1];
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
                        input_hora_inicial.value = '';
                        input_hora_final.value = '';
                        select2.addEventListener('change', (Event) => {
                            const clase_actual = Event.target.value;
                            remove2 = document.getElementById("dia");
                            if (remove2) {
                                let hola = container.removeChild(remove2);
                                // console.log(hola);
                            }
                            input_hora_inicial.value = element["hora"][clase_actual][0];
                            input_hora_final.value = element["hora"][clase_actual][1];
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
                container.append(input_hora_inicial);
                container.append(input_hora_final);
                container.append(label_mes);
                container.append(select);
            });
        }
        function aprendices(aprendices){
            let tabla = document.getElementById("tabla");
            tabla.innerHTML = '';
            for (let aprendice of aprendices) {
                let fila = document.createElement("tr");
                let celda1 = document.createElement("td");
                let celda2 = document.createElement("td");
                let celda3 = document.createElement("td");
                let celda4 = document.createElement("td");
                let celda5 = document.createElement("td");
                let input0 = document.createElement("input");
                let input1 = document.createElement("input");
                let input2 = document.createElement("input");
                let input3 = document.createElement("input");
                input0.type = "hidden";
                input0.value = `${aprendice["id"]}`;
                input0.name = `asistencias[${aprendice["id"]}][id_aprendiz]`;
                input1.type = "checkbox";
                input2.type = "checkbox";
                input1.value = 1;
                input2.value = 1;
                input3.type = "text";
                input3.placeholder = "Ingresar excusa";
                input3.className = "form-control";
                input1.name = `asistencias[${aprendice["id"]}][datos_asistencia][asistio]`;
                input2.name = `asistencias[${aprendice["id"]}][datos_asistencia][no_asistio]`;
                input3.name = `asistencias[${aprendice["id"]}][datos_asistencia][excusa]`;
                celda1.innerHTML = aprendice["id"];
                celda2.innerHTML = aprendice["nombre"] +' '+ aprendice["apellido"];
                celda3.className = "text-center";
                celda4.className = "text-center";
                celda3.append(input1);
                celda4.append(input2);
                celda5.append(input3);
                fila.append(input0);
                fila.append(celda1);
                fila.append(celda2);
                fila.append(celda3);
                fila.append(celda4);
                fila.append(celda5);
                fila.className = "text-center";
                tabla.append(fila);
            }
        }
        eventos(json["eventos"]);
        aprendices(json["aprendices"]);
    } catch (error) {
        console.error(error);
    }

});
