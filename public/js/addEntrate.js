let titolo = document.forms.addAccredito.titolo;
let tipo = document.forms.addAccredito.tipo;
let importo = document.forms.addAccredito.importo;
let dataAccredito = document.forms.addAccredito.dataAccredito;
let descrizioneAccredito = document.forms.addAccredito.descrizioneAccredito;


function checkFormAccredito() {
    let importNumber = importo.value.replace(",", ".");
    if(titolo.value == ""){
        titolo.style.borderColor = "red";
        return
    }
    else
    {
        titolo.style.borderColor = "black";
    } 
    if(tipo.value == "Scegli il tipo di entrata"){
        tipo.style.borderColor = "red";
        return
    }
    else
    {
        tipo.style.borderColor = "black";
    } 
    if(importNumber == "" || isNaN(importNumber)){
        importo.style.borderColor = "red";
        importo.title = "Deve essere un numero";
        return
    }
    else
    {
        importo.style.borderColor = "black";
    } 
    if(dataAccredito.value == ""){
        dataAccredito.style.borderColor = "red";
        return
    }
    else
    {
        dataAccredito.style.borderColor = "black";
    } 
    if(descrizioneAccredito.value == ""){
        descrizioneAccredito.style.borderColor = "red";
        return
    }
    else
    {
        descrizioneAccredito.style.borderColor = "black";
    } 

    document.forms.addAccredito.submit();
}