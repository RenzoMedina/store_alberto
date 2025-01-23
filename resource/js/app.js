
import {fecha,advertencia} from './functions.js'

const fventa = document.getElementById("fecha").value = fecha()
const tipo = document.getElementById("tipo")
const nombreCredi = document.getElementById("nombreCredi")
const cierre_caja = document.getElementById("cierre_caja")
const deleteSale = document.getElementById("formDelete")

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
deleteSale.addEventListener("submit", e =>{
    e.preventDefault()
    advertencia("formDelete",
        '¿Estás seguro de eliminar la venta?',
        "¡No podrás revertir esto!",
        'Sí, confirmar', "No, cancelar!",
        "Eliminado con éxito",
        "Se ha eliminado la venta seleccionada!!"
    )
})

