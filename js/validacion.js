const validCorreo=()=>{
    user = document.getElementById('correo');
    //Miramos si la longitud del correo es difrente a 0
    if (user.value !== ''){
        //Comprueba mediante una regex si el correo es valido
        if(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(user.value)){
            //Correo válido
            user.style.borderColor = '';
            document.getElementById("mensaje1").innerHTML = '';
            return true;
        }else{
            //correo no válido
            user.style.borderColor = 'red';
            document.getElementById("mensaje1").innerHTML = '<p style="color: #ff1e00;"> Campo email incorrecto! </p>';
            return false;
        }
    }else{
        //correo no valido
        user.style.borderColor = 'red';
        document.getElementById("mensaje1").innerHTML = '<p style="color: #ff1e00;"> Campo email incorrecto! </p>';
        return false;
    }
}

const validPass=()=>{
    pass = document.getElementById('pass');
    //comprobamos que la contraseña es válida según nuestros requisitos
    if( pass.value !== ''){
        //pass válida
        pass.style.borderColor = '';
        document.getElementById("mensaje2").innerHTML = '';
        return true;
    }else{
       //pass no válida
        pass.style.borderColor = 'red';
        document.getElementById("mensaje2").innerHTML = '<p style="color: #ff1e00;"> Campo password obligatorio! </p>';
        return false;
    }
}

const valid=()=>{
    if(validPass() && validCorreo()){
        return true;
    }else{
        return false;
    }
}