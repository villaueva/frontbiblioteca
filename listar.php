<script>
   $(document).ready( function () {
        $('#usuarios').DataTable();
    } );
</script>  
<?php
$curl = curl_init();
curl_setopt_array($curl, array(
	CURLOPT_URL => "https://ximartcloud.alwaysdata.net/Apibiblioteca/getusuarios.php",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
));

$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);
if ($err) {
	echo "cURL Error #:" . $err;
    exit(1);
} 
$objeto = json_decode($response);
?>
<table class="table table-striped table-hover" id="usuarios">
    <thead>
        <tr>
            <th>ID</th>
            <th>DOCUMENTO</th>
            <th>NOMBRES</th>
            <th>DIRECCION</th>
            <th>CORREO</th>
            <th>TELEFONO</th>
        </tr>
    </thead>
    <tbody>
            <?php
               foreach($objeto as $reg)
               {
             ?>
                <tr>
                  <td><?= $reg->id ?>  </td>
                  <td><?= $reg->documento ?>  </td>
                  <td><?= $reg->apellidos.' '.$reg->nombres ?>  </td>
                  <td><?= $reg->direccion ?>  </td>
                  <td><?= $reg->correo ?>  </td>
                  <td><?= $reg->telefono ?>  </td>
                </tr>
            <?php   
            }
            ?>
    </tbody>
    <tfoot>
    <tr>
            <th>ID</th>
            <th>DOCUMENTO</th>
            <th>NOMBRES</th>
            <th>DIRECCION</th>
            <th>CORREO</th>
            <th>TELEFONO</th>
        </tr>
    </tfoot>
</table>
	
