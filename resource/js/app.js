import {fecha,advertencia} from './functions.js'

const fventa = document.getElementById("fecha")
fventa.value = fecha()
const tipo = document.getElementById("tipo")
const nombreCredi = document.getElementById("nombreCredi")
const cierre_caja = document.getElementById("cierre_caja")
const formLogin = document.getElementById("formLogin")
const pago_credito= document.getElementById("pago_credito")

tipo.addEventListener("change", () =>{
    if(tipo.value === "credito"){
        nombreCredi.classList.remove("hidden")
        nombreCredi.classList.add("grid")
    }else{
        nombreCredi.classList.add("hidden")
    }
})

cierre_caja.addEventListener("submit",e =>{
    e.preventDefault()
    advertencia("cierre_caja",
        '¿Estás seguro de cerrar caja?',
        "¡No podrás revertir esto!",
        'Sí, confirmar', "No, cancelar!",
        "Cierre con éxito",
        "Se ha finalizado tu jornada!!"
    )
})

formLogin.addEventListener("submit",e =>{
    e.preventDefault()
    alert("click")
})

pago_credito.addEventListener("submit", e =>{
    e.preventDefault()
    alert("click")
})