<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evaluación de clima laboral</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>
  
    <link rel="stylesheet" href="<?php echo BASE?>/views/themes/default/style.css?<?php echo date('Ymdhisms')?>"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bs-stepper/dist/css/bs-stepper.min.css">
    


</head>
<body>

<div class="container">
    <?php echo $content;?>
</div>

<script src="<?php echo BASE?>/views/themes/default/app.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bs-stepper/dist/js/bs-stepper.min.js"></script>
<script>


(function(){
var end=false;

//seleccionar botones para posterior escucha de eventos
var prevBtn=document.getElementById('prevBtn');
var nextBtn=document.getElementById('nextBtn');


//seleccionador de div con id stepper del dom
var stepperEl = document.getElementById('stepper')
//instanciar el stepper con opciones predefinidas
var stepper = new Stepper(stepperEl,{
  linear: true,
  animation: true,
  selectors: {
    steps: '.step',
    trigger: '.step-trigger',
    stepper: '.bs-stepper'
  }
})


stepperEl.addEventListener('show.bs-stepper', function (event) {
  
    //agregar escuchador de evento show del stepper para
    //validar su está en el penúltimo paso y cambiar el texto del botón al siguiente
  if(event.detail.indexStep+1==stepper._steps.length){
    nextBtn.textContent='Evaluar';
    end=true;
    }else{
      nextBtn.textContent='Siguiente';
  }
})

/*Habilitar cuando se necesite escuchar el evento posterior al cambio de paso
stepperEl.addEventListener('shown.bs-stepper', function (event) {


})*/

prevBtn.addEventListener('click', function() {
  stepper.previous();
});

nextBtn.addEventListener('click', function() {



        //validar si no se ha llegado al final de la encuesta
        if(!end){

            //validar que haya respuesta seleccionada con hasActive
            if(hasActive()){   
                stepper.next();
            }else{
                alert('Marque una opción');
            }
        }else{

            if(hasActive()){   
            //enviar el formulario
            document.forms[0].submit();
            }else{
                alert("Marque una opción");
            }
        }
        



});





function hasActive(){


        //función que busca si existe algún radio seleccionado dentro del paso(.bs-stepper-content) correspondiente    
        var activeContent = document.querySelector('.bs-stepper-content .content.active');
        if (activeContent) {
                var radioButtons = activeContent.querySelectorAll('input[type="radio"]');
                for (var i = 0; i < radioButtons.length; i++) {
                    if (radioButtons[i].checked) {
                        return true;
                    break;
                    }
                }
        } 
        
        
        return false;

}



})();






</script>


</body>
</html>