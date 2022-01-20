<html>
    <head>
        <title>Ingreso</title>
        <style type="text/css">

            input, select, textarea {
                font-size: 150%;
            }
        </style>
    </head>
    <body>
        <form action="guardar.php" name="formulario" method="post">
            <table>
                <tr>
                    <td colspan="2">Ingreso</td>
                    <td></td>
                </tr>
                
                <tr>
                    <td>Canton:</td>
                    <td><input type="text" name="canton"></td>
                </tr>

                <tr>
                    <td>Nombres:</td>
                    <td><input type="text" name="nombres"></td>
                </tr>
                <tr>
                    <td>Apellidos:</td>
                    <td><input type="text" name="apellidos"></td>
                </tr>
                <tr>
                    <td>Sexo:</td>
                    <td><select name="sexo">
                        <option value="HOMBRE">HOMBRE</option>
                        <option value="MUJER">MUJER</option>
                    </select>
                    </td>
                </tr>
                <tr>
                    <td>Dignidad:</td>
                    <td><select name="dignidad">
                        <option value="ALCALDE">ALCALDE</option>
                        <option value="VICEALCALDE">VICEALCALDE</option>
                        <option value="CONCEJAL">CONCEJAL</option>
                    </select>
                    </td>
                </tr>
                <tr>
                <td colspan="2"><input type="submit" value="Guardar"></td></tr>
            </table>
        </form>
    </body>
</html>                
