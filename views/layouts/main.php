<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
if (Yii::$app->controller->action->id === 'login') {
    echo $this->render(
        'login-layout',
        ['content' => $content]
    );
} else {
    \app\assets_b\AppAsset::register($this);
    $directoryAsset = Yii::$app->assetManager->getPublishedUrl('@bower') . '/moltran';
    ?>
    <?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
       <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

       <link href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.9.0/fullcalendar.min.css" rel="stylesheet">
<style>
            #full-calendar .popover {
                max-width:400px;
                width:400px;
            }
            #full-calendar .popover-content {
                padding: 0px;
            }
        </style>
<style>
    #bd-list .product-img img {
        height: 44px;
        width: 45px;
    }
</style> 
        <!-- Render this(ar-layout-css) file for supporting Arabic Language -->
       
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    
       <body class="layout-top-nav skin-blue-light">
    <div class="wrapper">
    <?php $this->beginBody() ?>

    <?= $this->render(
        'header.php',
        ['directoryAsset' => $directoryAsset]
    ) ?>

 
              <?= $this->render(
                    'content.php',
                    ['content' => $content, 'directoryAsset' => $directoryAsset]
                ) ?>
        
         </div>



      
    <?php $this->endBody() ?>

    <!-- Start of oct8ne code --> 
  <script type="text/javascript"> 
  
/*$(function(){
    $('#modelButton').click(function(){
        $('.modal').modal('show')
            .find('#modelContent')
            .load($(this).attr('value'));
    });
        
}); */
  </script> 
<!--End of oct8ne code -->

    </body>
      <script type="text/javascript">
            jQuery(document).ready(function($) {
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });
            });


            function itemDown(id){
                quantity = parseInt($("#quantity_"+id).val())-1;
                $("#quantity_"+id).val(quantity);
                updateCart(id,quantity);
                swal("Producto!", "Producto Eliminado del carrito!", "error");
            }

             function itemUp(id){
                 quantity = parseInt($("#quantity_"+id).val())+1;
                $("#quantity_"+id).val(quantity);
                updateCart(id,quantity);
                swal("Producto!", "Producto Agregado al carrito!", "success");
            }

             function descuento(tipo){
                
                updateDescuento(tipo);
                if(tipo==1){
                    des = "Pubico en General";
                }
                 if(tipo==2){
                    des = "Comunidad UNAM 50%";
                }
                  if(tipo==3){
                    des = "Proveedorees 70%";
                }
                  if(tipo==4){
                    des = "Donativo  100%";
                }
                  if(tipo==5){
                    des = "Producto Dañado 100%";
                }

                

                swal("Producto!", "Descuento Aplicado "+des , "success");
            }

            function deleteItem(id){


                updateCart(id,0);
                swal("Producto!", "Producto Eliminado del carrito!", "error");
            }

             function updateDescuento(tipo){

                 $.get('<?= Yii::$app->homeUrl ?>/consumibles/shopping-cart/descuento', {'tipo': tipo}, function(data){

                    $("#content").html(data);

          
          });

            }

            function updateCart(id,quantity){

                 $.get('<?= Yii::$app->homeUrl ?>/consumibles/shopping-cart/add2', {'id': id, 'quantity': quantity}, function(data){

                    $("#content").html(data);

          
          });

            }

             function delItem(id,id_salida,cantidad){

            if(confirm('Estas seguro de eliminar?')){

            $.get('<?= Yii::$app->homeUrl ?>/consumibles/cons-detalle/borrar', {'id': id, 'id_salida': id_salida, 'cantidad': cantidad}, function(data){
            swal("Consumible!", "Consumible Eliminado!", "success");

          });

             }else{
                return false;
             }

          
      

            }



            function addCart(id, existencia, cantidad){

             // alert('#cantidad_'+id);
          if(($('#cantidad_'+id).text() == "" || cantidad == 0)){
             swal("Consumible!", "La cantidad no puede estar vacia!", "error");
             
           }
            if(cantidad > existencia)
                {
                     swal("Consumible!", "La cantidad no puede ser mayor a las existencias!", "error");

                }
                else{

               
  
           $.get('<?= Yii::$app->homeUrl ?>/consumibles/shopping-cart/add', {'id': id, 'cantidad': cantidad}, function(data){
            swal("Consumible!", "Consumible Agregado al carrito!", "success");
          });
       }

    
            }


$(function(){
 $('#modalButton').click(function(){
  $('#modal').modal('show')
   .find('#modalContent')
   .load($(this).attr('value'));
 });
});


  $(document).ready(function () {
    $.fn.modal.Constructor.prototype.enforceFocus = function () {
    if (console && console.log) {
        console.log("patched");
    }
};
});


        </script>
     
    </html>
    <?php $this->endPage() ?>
<?php } ?>
