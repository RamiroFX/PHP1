<html>
    <head>
        <title> Publicaciones</title>
    </head>
    <body>
        <div>
            <?php
              require '../../Conexion.php';
              $sql = "SELECT * FROM publicaciones "; //WHERE upper(titulo) like upper('%".$_POST['btitulo']."%')
               $result = pg_query($conn, $sql);
              
                
                while($row = pg_fetch_row($result)) {
                ?>
                    <div>
                        <article>
                            <h2><?php echo $row[1];?></h2>
                            <div>
                                <div>
                                    <?php
                                        $cadena='<img src="mostrarimagen.php?id='.$row[0].'"
                                                alt="Img" with="200" height="200"/>';
                                        echo $cadena;
                                    ?>
                                </div>
                                <p><?php  echo $row[2];?>...<a href='solo_post.php?id=
                                    <?php echo $row[0];?>.'>Leer Mas</a></p>
                            </div>
                            
                        </article> 
                    </div>
                 <?php }?>
            
            
        </div>     
    </body>
 </html>