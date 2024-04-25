let titolo = document.forms.addAddebito.titolo;
let tipo = document.forms.addAddebito.tipo;
let importo = document.forms.addAddebito.importo;
let dataAddebito = document.forms.addAddebito.dataAddebito;
let descrizioneAddebito = document.forms.addAddebito.descrizioneAddebito;


function checkFormAddebito() {
    let importNumber = importo.value.replace(",", ".");
    if(titolo.value == ""){
        titolo.style.borderColor = "red";
        return
    }
    else
    {
        titolo.style.borderColor = "black";
    } 
    if(tipo.value == "Scegli il tipo di uscita"){
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
    if(dataAddebito.value == ""){
        dataAddebito.style.borderColor = "red";
        return
    }
    else
    {
        dataAddebito.style.borderColor = "black";
    } 
    if(descrizioneAddebito.value == ""){
        descrizioneAddebito.style.borderColor = "red";
        return
    }
    else
    {
        descrizioneAddebito.style.borderColor = "black";
    } 

    document.forms.addAddebito.submit();
}