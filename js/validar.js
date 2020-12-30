function validar(){
    var nombre, email, passw, passw2, expresion;
    nombre = document.getElementById("c_nombre").value;
    email = document.getElementById("c_email").value;
    passw = document.getElementById("c_password").value;
    passw2 = document.getElementById("c_password2").value;

    if(nombre==="" || email==="" || passw==="" || passw2===""){
        alert("Todos los campos son obligatorios.");
        return false;
    }

}
