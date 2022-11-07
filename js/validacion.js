const validCorreo=()=>{
    //Miramos si la longitud del correo es difrente a 0
    if (correo.lenght !== 0){
        //Comprueba mediante una regex si el correo es valido
        if(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(correo)){
            //Correo válido
        }else{
            //correo no válido
        }
    }else{
        //correo no valido
    }
}

const validPass=()=>{
    //comprobamos que la contraseña es válida según nuestros requisitos
    if( (/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])([a-zA-Z0-9]{8,20})$/.test(passw))){
        //pass válida
    }else{
       //pass no válida
    }
}