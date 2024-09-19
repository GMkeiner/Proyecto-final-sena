const ficha = document.getElementById('id_ficha');

ficha.addEventListener('change',async (Event)=>{
    let container = document.getElementById('container');
    let clases_group = [];
    console.log(Event.target.value,document.baseURI.replace('asistencias/create','ficha/'.concat(Event.target.value)));
    try{
        const response = await fetch(document.baseURI.replace('asistencias/create','fichas/'.concat(Event.target.value)),
        {method:"GET",headers:{"Content-Type": "application/json"}});
        if(!response.ok){
            throw new Error(`Response status: ${response.status}`);
        }
        const json = await response.json();
        console.log(json);
        json.forEach(element => {
            let select = document.createElement("select");
            select.name = "mes";
            select.id = "mes";
            // console.log(Object.keys(element["mes1"]),Object.keys(element["mes2"]),Object.keys(element["mes3"]));
            let meses = [].concat(Object.keys(element["mes1"]),Object.keys(element["mes2"]),Object.keys(element["mes3"]));
            let mesesUnicos = [... new Set(meses)];
            let mesesOrdenados = mesesUnicos.sort( (a,b) => {return a-b} )
            console.log(mesesOrdenados);
            for(let mes of mesesOrdenados){
                let option = document.createElement("option"); 
                option.innerHTML = mes;
                option.value = mes;
                select.add(option);
            }
            select.addEventListener('change',(Event)=> {
                let value = Event.target.value;
                let mesesOriginal = [].concat(element["mes1"],element["mes2"],element["mes3"])
                console.log(value,mesesOriginal);
                for(let mes of mesesOriginal){
                    console.log(Object.keys(mes));

                }
            });
            
            container.append(select);
        });
    }catch (error){
        console.error(error);
    }
    
});
