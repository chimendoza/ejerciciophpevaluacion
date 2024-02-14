<?php

//archivo de controlador defaultcontroller.php
//archivo cargado por defecto



//extiende a baseController para usar sus funciones como show
class defaultController extends baseController{


        function index(){

                $this->show('index');

            
        }


        function questions(){

                $questions=['Mi equipo de trabajo es colaborativo y se apoya mutuamente.',
                'La comunicación entre los miembros del equipo es efectiva.',
                'Siento que mi opinión es valorada y tomada en cuenta.',
                'Existe un ambiente de respeto y tolerancia en el lugar de trabajo'];

 
                if($_GET['type']=='pm'){
 
         
                $questions=['Recibo el apoyo necesario para realizar mi trabajo de manera eficiente.',
                                'Las oportunidades de crecimiento y desarrollo profesional son claras y accesibles.',
                                'La dirección y liderazgo de la empresa son efectivos.',
                                'Existe un equilibrio adecuado entre la vida laboral y personal.'];


                }
    
    
    
    
                $this->show('questions',compact('questions'));
    

        }


        function evaluar(){



                $values=array_values($_POST);


                $sum = array_sum($values[0]);

                
                

                $total = count($values[0]);

                $avg = ceil($sum / $total);

                


                if($avg>=3){
                        $positive=true;
                }

                $this->show('result',compact('avg','positive'));

                


        }



}









?>