function validar(){
    var nombre, email, passw, passw2, expresion;
    nombre = document.getElementById("c_nombre").value;
    email = document.getElementById("c_email").value;
    passw = document.getElementById("c_password").value;
    passw2 = document.getElementById("c_password2").value;

    expresion = /\w+@\.+[a-z]/;

    if(nombre==="" || email==="" || passw==="" || passw2===""){
        alert("Todos los campos son obligatorios.");
        return false;
    }else if(nombre.length > 200){
        alert("El nombre es muy largo");
        return false;
    }else if(email.length > 200){
        alert("El correo es muy largo");
        return false;
    }else if(!expresion.test(email)){
        alert("El email no es valido");
        return false;
    }

}
