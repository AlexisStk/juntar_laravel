window.onload=function(){

// validaciones para registro de usuario

var register = document.getElementById('register')
console.log(register.elements.password_confirm)

register.onsubmit = function(evento){
    if(!validateRegister()){
        evento.preventDefault()
    }else   {
        register.submit()
    }
}

 function validateRegister(){
    //  var { name,email,password,password_confirm } = register.elements
    var name = register.elements.name
    if(!validateUserName(name.value)) return false

    var email = register.elements.email
    if(!validatEmail(email.value)) return false

    var password = register.elements.password
    if(!validatepassword(password.value)) return false

    var password_confirm = register.elements.password_confirm
    if(!validatepasswordRepeat(password.value, password_confirm.value)) return false
    

    var termsConditions = register.elements.termsConditions
    if(!validateTerms(termsConditions.value)) return false
        return true
}


function validateUserName(name){
    var re = /^[a-zA-Z\-]+$/
        if(re.test(name)) return true

        swal('Error','El Nombre de Usuario es invalido','error')
        return false
    //metodo de hacerlo sin usar swal alert **

    // var error = document.getElementById("errorUserName")
    // if (name == "") {
    //     error.innerHTML="Ingrese Su Nombre"
    //     error.setAttribute('class','alert-danger')
    //     return false
    // }else{
    //     error.innerHTML = ""
    //     error.removeAttribute('class','alert-danger')
    //     return true
    // }
}

function validatEmail(email){
    var re = /^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/
      if (re.test(email)) return true
  
      swal('Error', 'Ingrese un email válido', 'error')
      return false
    }

    function validatepassword(password) {
        const re = /^(?=.*[a-z])(?=.*\d)[a-zA-Z\d]{6,}$/
        
        
        if (re.test(password))
            return true

        swal('Error', 'Ingrese una contraseña válida', 'error')
            return false

        // var errorPassword = document.getElementById("errorPassword")
        //   errorPassword.innerHTML = ""
        //   errorPassword.removeAttribute("class","alert-danger")
          
        // }else{
        //   errorPassword.innerHTML = "Ingrese una contraseña válida"
        //   errorPassword.setAttribute("class","alert-danger")
        //   return false
        //   } 
          
          
    }

    function validatepasswordRepeat(password,password_confirm){
        if (password === password_confirm) return true
    
        swal('error', 'Las contraseñas no son iguales', 'warning')
        return false
      }

    //NO PUDE HACER QUE ESTO FUNCIONE..
    // function validateTerms(termsConditions) {
    //     if (termsConditions) return true
    
    //     swal('Error', 'Debe aceptar los términos y condiciones', 'error')
    //     return false
    //   } 


// Validaciones para los campos de creacion de grupos

    // var formulario = document.getElementById("formulario")
    // // console.log(formulario.elements.title)
    // formulario.elements.title.focus()
    // formulario.onsubmit = function(evento){
    //     if(!validaciones()){
    //         evento.preventDefault()
    //     }else{
    //         formulario.submit()
    //     }
    // }

    // function validaciones(){
    //     var title = formulario.elements.title
    //     if(!validateTitle(title.value)) return false
        

    //     var description = formulario.elements.description
    //     if(!validateDescrip(description.value)) return false
        

    //     var date = formulario.elements.date
    //     if(!validateDate(date.value)) return false
        

    //     var place = formulario.elements.place
    //     if(!validatePlace(place.value)) return false
        

    //     var limit = formulario.elements.limit
    //     if(!validateLimit(limit.value)) return false
    //         return true


    // }
    
    // function validateTitle(title){
    //     var error = document.getElementById("errorTitle")
    //     // console.log(error)
    //     if(title == "" ){
    //         error.innerHTML = "Debe colocar el nombre del grupo"
    //         error.setAttribute("class","alert-danger")
    //         return false
    //     }else{
    //         error.innerHTML = ""
    //         error.removeAttribute("class","alert-danger")
    //         return true
    //     }
        
    // }

    // function validateDescrip(description){
    //     var error = document.getElementById("errorDescrip")
    //     if (description == "") {
    //         error.innerHTML = "Coloque una descripcion de Grupo"
    //         error.setAttribute("class","alert-danger")
    //         return false
    //     }else{
    //         error.innerHTML = ""
    //         error.removeAttribute("class","alert-danger")
    //         return true
    //     }
    // }

    // function validateDate(date){
    //     var error = document.getElementById("errorDate")
    //     // console.log(error)
    //     if(date == "" ){
    //         error.innerHTML = "Por Favor coloque fecha de inicio"
    //         error.setAttribute("class","alert-danger")
    //         return false
    //     }else{
    //         error.innerHTML = ""
    //         error.removeAttribute("class","alert-danger")
    //         return true
    //     }
        
    // }

    // function validatePlace(place){
    //     var error = document.getElementById("errorPlace")
    //     // console.log(error)
    //     if(place == "" ){
    //         error.innerHTML = "Este Campo es obligatorio "
    //         error.setAttribute("class","alert-danger")
    //         return false
    //     }else{
    //         error.innerHTML = ""
    //         error.removeAttribute("class","alert-danger")
    //         return true
    //     }
        
    // }

    


    
}
