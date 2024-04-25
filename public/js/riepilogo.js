var btnFiltroImporto = document.getElementById('btnFiltroImporto');
var btnFiltroPeriodo = document.getElementById('btnFiltroPeriodo');
var btnFiltroTipo = document.getElementById('btnFiltroTipo');

btnFiltroImporto.addEventListener('click',(e)=>{
    var startImporto = document.getElementById('startImporto');
    var andImporto = document.getElementById('andImporto');
    e.preventDefault();
    let startImportNumber = startImporto.value.replace(",", ".");
    let andImportNumber = andImporto.value.replace(",", ".");

    if(startImportNumber == "" || isNaN(startImportNumber)){
        startImporto.style.borderColor = "red";
        return
    }
    else
    {
        startImporto.style.borderColor = "black";
    } 

    if(andImportNumber == "" || isNaN(andImportNumber)){
        andImporto.style.borderColor = "red";
        return
    }
    else
    {
        andImporto.style.borderColor = "black";
    } 

    document.forms.filtroImportoForm.submit();
})


btnFiltroPeriodo.addEventListener('click',(e)=>{
    var periodo = document.getElementById('periodo');
    var anno = document.getElementById('anno');
    
    e.preventDefault();


    if(periodo.value == ""){
        periodo.style.borderColor = "red";
        return
    }
    else
    {
        periodo.style.borderColor = "black";
    } 

    if(anno.value == "" || isNaN(anno.value)){
        anno.style.borderColor = "red";
        return
    }
    else
    {
        anno.style.borderColor = "black";
    } 

    document.forms.periodoFiltroForm.submit();
})

