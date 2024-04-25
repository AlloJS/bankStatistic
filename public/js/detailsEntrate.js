var btnFiltroImporto = document.getElementById('btnFiltroImporto');
var btnFiltroPeriodo = document.getElementById('btnFiltroPeriodo');
var btnFiltroTipo = document.getElementById('btnFiltroTipo');
var btnDeleteRow = document.getElementById('btnDeleteRow');

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


    if(periodo.value == "Scegli mese:"){
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


btnFiltroTipo.addEventListener('click',(e)=>{
    var periodo = document.getElementById('periodoTipo');
    var anno = document.getElementById('annoTipo');

    e.preventDefault();


    if(tipo.value == "Scegli il tipo di entrata"){
        tipo.style.borderColor = "red";
        return
    }
    else
    {
        tipo.style.borderColor = "black";
    } 

    if(periodo.value == "Scegli mese:"){
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
    
    document.forms.tipoFiltroForm.submit();
})


function assegnaId(id){
    ConfirmDialog(id,'Sei sicuro di voler cancellare?');
}

function ConfirmDialog(id,message) {
    $('<div class="bg-light"></div>').appendTo('body')
      .html('<div><h4 class="text-danger">' + message + '</h4></div>')
      .dialog({
        modal: true,
        title: 'Cancella movimento',
        zIndex: 10000,
        autoOpen: true,
        width: 'auto',
        resizable: false,
        buttons: {
          Yes: function() {
              
              $(this).dialog("close");
              
              $("#" +id).click();
          },
          No: function() {
              $(this).dialog("close");
          }
        },
        close: function(event, ui) {
          $(this).remove();
        }
      });
  };