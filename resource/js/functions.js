export function fecha(){
    let date = new Date()
    let ano = date.getFullYear()
    let mes = date.getMonth()+1
    let dia = date.getDate()
    let result = `${ano}-${mes}-${dia}`
    return result
}

export function advertencia(formularioId,title,text,confirmation,canceled, title_ok, text_ok){
    Swal.fire({
        title: title, 
        text: text, 
        icon: 'warning', 
        showCancelButton: true, 
        confirmButtonColor: '#3085d6', 
        cancelButtonColor: '#d33', 
        confirmButtonText: confirmation,
        cancelButtonText:canceled,
      }).then((result) => {
        if (result.isConfirmed) { 
            Swal.fire({
                title: title_ok,
                text: text_ok,
                icon: "success"
              });
        document.getElementById(formularioId).submit(); 
    }
      });
}

export function success(tipo,title, text){
  Swal.fire({
    icon: tipo,
    title: title,
    text: text
});
}
