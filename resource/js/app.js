import {fecha} from './functions.js'

const fventa = document.getElementById("fecha").value = fecha()
const tipo = document.getElementById("tipo")
const nombreCredi = document.getElementById("nombreCredi")

tipo.addEventListener("change", e =>{
    if(tipo.value === "credito"){
        nombreCredi.classList.remove("hidden")
        nombreCredi.classList.add("grid")
    }else{
        nombreCredi.classList.add("hidden")
    }
})

