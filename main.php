<?php
	$servidor = "localhost";
	$usuario = "root";
	$clave = "";
	$baseDeDatos = "basededatos1";
	$enlace = mysqli_connect ($servidor, $usuario, $clave, $baseDeDatos);
?>

<!DOCTYPE html>
<html>
<head><meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
	<title>Formulario a CV</title>
</head>
<body>
	<h1 id="title">Formulario a CV</h1>
    <p id="description">Responde la encuesta:</p>
    <form action="#" name="basededatos1 " method="post">
        <fieldset>
            <label for="nombre">Nombre y Apellidos:</label>
            <input type="text" id="nombre" name="nombre" required>
            <hr>
            
            <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
            <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required>
            <hr>
    
            <label for="ocupacion">Ocupación:</label>
            <input type="text" id="ocupacion" name="ocupacion" required>
            <hr>
            
            <label for="contacto">Contacto (teléfono, email):</label><br>
            <div id="campos_contacto">
                <input type="text" id="telefono" name="contacto[]" placeholder="Teléfono o email" required>
                <button type="button" onclick="agregarCampoContacto()">Agregar Contacto</button>
            </div>
            <hr>


            <label for="nacionalidad">Nacionalidad:</label>
            <select id="nacionalidad" name="nacionalidad" required>
                <option value="peru">Perú</option>
                <option value="argentina">Argentina</option>
                <option value="brasil">Brasil</option>
                <option value="chile">Chile</option>
                <option value="colombia">Colombia</option>
                <option value="mexico">México</option>
            </select><br><br>
            <hr>

            <label for="ingles">Nivel de inglés:</label><br>
            <label for="basico"><input type="radio" id="basico" name="ingles" value="basico" class="inline">Básico</label><br>
            <label for="intermedio"><input type="radio" id="intermedio" name="ingles" value="intermedio" class="inline">Intermedio</label><br>
            <label for="avanzado"><input type="radio" id="avanzado" name="ingles" value="avanzado" class="inline">Avanzado</label><br>
            <label for="fluido"><input type="radio" id="fluido" name="ingles" value="fluido" class="inline">Fluido</label><br><br>
            <hr>

            <label for="lenguajes">Lenguajes de programación:</label><br>
            <select id="lenguajes" name="lenguajes" multiple required>
                <option value="java">Java</option>
                <option value="python">Python</option>
                <option value="javascript">JavaScript</option>
                <option value="c++">C++</option>
                <option value="php">PHP</option>
            </select>
            <hr>

            <label for="aptitudes">Aptitudes:</label>

            <div id="campos_aptitudes">
                <input list="aptitudes" name="aptitudes[]" required>
                <datalist id="aptitudes">
                    <option value="Resolución de problemas">
                    <option value="Comunicación">
                    <option value="Liderazgo">
                    <option value="Trabajo en equipo">
                    <option value="Organización">
                 </datalist>
                <button type="button" onclick="agregarCampoaptitudes()">Agregar Contacto</button>
            </div>
            <hr>

          

            <label for="habilidades">Habilidades:</label><br>
            <label for="creatividad"><input type="checkbox" id="creatividad" name="habilidades" value="creatividad" class="inline">Creatividad</label>
            <label for="adaptabilidad"><input type="checkbox" id="adaptabilidad" name="habilidades" value="adaptabilidad" class="inline">Adaptabilidad</label>
            <label for="comunicacion"><input type="checkbox" id="comunicacion" name="habilidades" value="comunicacion" class="inline">Comunicación</label>
            <label for="rapidez"><input type="checkbox" id="Rapidez" name="habilidades" value="rapidez" class="inline">Rapidez</label>
            <hr>

            <label for="perfil">Perfil:</label><br>
            <textarea id="perfil" name="perfil" rows="4" cols="50" required></textarea>
            <hr>

            <input type="submit" value="Enviar" class="submit" name="registro">
        </fieldset>
        
    </form>

<script>
function agregarCampoContacto() {
    var divCamposContacto = document.getElementById("campos_contacto");
    var nuevoCampoContacto = document.createElement("div");
    nuevoCampoContacto.innerHTML = '<input type="text" name="contacto[]" placeholder="Teléfono o email      ">';
    divCamposContacto.appendChild(nuevoCampoContacto);

}

function agregarCampoaptitudes() {
    var divCamposAptitudes = document.getElementById("campos_aptitudes");
    var nuevoCampoAptitudes = document.createElement("div");
    nuevoCampoAptitudes.innerHTML = '<input type="text" name="aptitudes[]" placeholder="escriba otra aptitud      ">';
    divCamposAptitudes.appendChild(nuevoCampoAptitudes);


}

</script>

</body>
</html>

<?php
    if(isset($_POST['registro'])){
        $nombre = $_POST['nombre'];
        $fechanacimiento = $_POST['fecha_nacimiento'];
        $ocupacion = $_POST['ocupacion'];
        $contacto = implode(", ", $_POST['contacto']);
        $nacionalidad = $_POST['nacionalidad'];
        $ingles = $_POST['ingles'];
        $lenguajes = $_POST['lenguajes'];
        $aptitudes = implode(", ", $_POST['aptitudes']);
        $habilidades = $_POST['habilidades'];
        $perfil = $_POST['perfil'];
        
        $insertarDatos = "INSERT INTO datos1 VALUES('$nombre','$fechanacimiento','$ocupacion','$contacto','$nacionalidad','$ingles','$lenguajes',' $aptitudes',' $habilidades','$perfil')";
    }

    $ejecutarInsertar = mysqli_query ($enlace, $insertarDatos);

?>