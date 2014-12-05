<?php
class Grupo {
    private $id;
    private $Nombre;
    private $Avatar;
    private $Orden;
    private $Estatus;

    public function InsertVal($idalu,$idgrup){
        $insert01 = "INSERT INTO alumno_grupo(id,id_grup) VALUES ($idalu,$idgrup)";
        $execute = mysql_query($insert01) or die ("Error al insertar $idalu,$idgrup");

        $update01 = "UPDATE usuario SET Estatus='$idgrup' where id=$idalu";
        $execute01 = mysql_query($update01) or die ("Error update $update01");
    }

    public function Eliminagrup($idagp,$alumno){
        $delete = "DELETE FROM alumno_grupo WHERE idag= $idagp";
        $delete1 = mysql_query($delete) or die ("Error al borrar $delete");

        $update01 = "UPDATE usuario SET Estatus=1 where id=$alumno";
        $execute01 = mysql_query($update01) or die ("Error update $update01");

    }

    public function AsignarAlumnoaGrupo(){
        $sql01="SELECT * FROM encuesta ";
        $consulta = mysql_query($sql01) or die ("error 1 ");
        $cuantos3=mysql_num_rows($consulta);
        echo"<div class=table-responsive> ";
        echo"<table class=\"table table-striped\"> ";
        echo"<tr><td colspan=5 align=center><stromp><b>preguntas</stromp></td></tr>";
        echo"<tr><td align=center><b>Clv.</td><td align=center><b>Encuesta</td>
            <td align=center><b>respuesta</td></tr>";

        echo "<form name=materias action=testPreguntas.php method=Post>";
        for ($y=0; $y<$cuantos3; $y++)
        {
            $id=mysql_result($consulta, $y, 'idencuesta');
            $nom=mysql_result($consulta, $y, 'encuesta');
            $apat =mysql_result($consulta, $y, 'si');
            $amat=mysql_result($consulta,$y,'no');
            echo"<tr>
          <td align=center>$id</td><td align=center>$nom</td><td align=center><input type=radio name=user1[] value=$apat> Si
          <input type=radio name=user1[] value=$amat> No</tr>";
        }
     
        echo "</select></td></tr>";
        echo "<tr><td align=center colspan=4><input type=submit name=submit value=Agregar /></td></tr>";
        echo "</form>";
        echo "</table>";
    }
} 