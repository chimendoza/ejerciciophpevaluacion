<?php

//archivo librería llamado baseController.php

class baseController{



    //función show 

    function show($view,$data=[]){


        //generar la ruta de la vista correspondiente al nombre de la acción del controlador
        //en base al nombre del controlador sin el sufijo Controller y el parámetro vista de la función
        $className=get_called_class();
        $controller=str_replace('Controller','',$className);
        $view=dirname(__FILE__).'/../views/'.$controller.'/'.$view.'.php';

        //almacenar en un buffer del contenido de la vista en la variable content antes de pasarlo al archivo del tema
        ob_start();
        if(!empty($data)){
            //extraer las variables pasadas en el parámetro $data
            extract($data);
        }
        include $view;
        $content = ob_get_contents();
        ob_end_clean();


        //cargar el archivo index del tema
        require_once(dirname(__FILE__).'/../views/themes/default/index.php');

    }


}

?>