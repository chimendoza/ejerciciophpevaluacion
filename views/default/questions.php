
<form action="<?php echo BASE?>/index.php?a=evaluar" method="post">
    <h3>Responde las siguientes preguntas para <?php echo $_GET['type']=='pm'?'líder técnico':'colaborador';?>
    <br><small>Marca la casilla que corresponda a tu postura sobre el enunciado</small>
</h3>



            <?php 
            
            
                //recorrer el arreglo de preguntas para generar los valores del .bs-stepper
                for($i=0;$i<count($questions);$i++):
                    

                    $steps_header[]='<div class="step" data-target="#q'.$i.'"><button type="button" class="btn step-trigger">'.($i+1).'</button></div>';
                    $steps_content.='<div id="q'.$i.'" class="content slide">
                            
                                <p>'.$questions[$i].'</p>

                                <label><input type="radio" name="Preguntas['.$i.']" value="5"/> Totalmente de acuerdo</label>
                                <label><input type="radio" name="Preguntas['.$i.']" value="4"/> Algo de acuerdo</label>
                                <label><input type="radio" name="Preguntas['.$i.']" value="3"/> Ni en acuerdo ni en desacuerdo</label>
                                <label><input type="radio" name="Preguntas['.$i.']" value="2"/> Algo en desacuerdo</label>
                                <label><input type="radio" name="Preguntas['.$i.']" value="1"/> Totalmente en desacuerdo</label>                    
                    </div>';
                endfor;?>



    

        <div id="stepper" class="bs-stepper">
            <div class="bs-stepper-header">


                <?php echo implode('<div class="line"></div>',$steps_header);?>
                
            
            
            </div>
            <div class="bs-stepper-content">


                <?php echo $steps_content?>


            </div>
        </div>



        <div class="pagination">
        <a class="btn btn-primary" id="prevBtn">Anterior</a>&nbsp;
        <a class="btn btn-primary" id="nextBtn">Siguiente</a>
        </div>


</form>