export function fecha(){
    let date = new Date()
    let ano = date.getFullYear()
    let mes = date.getMonth()+1
    let dia = date.getDate()
    let result = `${ano}-${mes}-${dia}`
    return result
}


