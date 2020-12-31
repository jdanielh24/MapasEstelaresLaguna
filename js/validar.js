function validar(){
    var nombre, email, passw, passw2, expresion;
    nombre = document.getElementById("c_nombre").value;
    email = document.getElementById("c_email").value;
    passw = document.getElementById("c_password").value;
    passw2 = document.getElementById("c_password2").value;

    expresion = /\w+@\w+\.+[a-z]/;

    if(nombre==null || nombre.length==0 || email==null || email.length==0 || passw==null || passw.length==0 
        || passw2==null || passw2.length==0){
        alert("Todos los campos son obligatorios.");
        return false;
    }else if(nombre.length > 2){
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
