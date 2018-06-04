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
    \app\assets_b\AppAssetC::register($this);
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
        'header2.php',
        ['directoryAsset' => $directoryAsset]
    ) ?>

 
              <?= $this->render(
                    'content.php',
                    ['content' => $content, 'directoryAsset' => $directoryAsset]
                ) ?>
        
         </div>



      
    <?php $this->endBody() ?>


    </body>
      <script type="text/javascript">
            $(document).ready(function($) {
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });

               
            });

            $(function () {

    // animate on scroll


$.datepicker.regional['es'] = 
 {
 changeMonth: true,
 changeYear: true,
    //  yearRange: '1960:2016',
 closeText: 'Cerrar', 
 prevText: 'Previo', 
 nextText: 'Próximo',
 
 monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
 'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
 monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
 'Jul','Ago','Sep','Oct','Nov','Dic'],
 monthStatus: 'Ver otro mes', yearStatus: 'Ver otro año',
 dayNames: ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
 dayNamesShort: ['Dom','Lun','Mar','Mie','Jue','Vie','Sáb'],
 dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
 dateFormat: 'yy-mm-dd', firstDay: 0, 
 initStatus: 'Selecciona la fecha', isRTL: false};
$.datepicker.setDefaults($.datepicker.regional['es']);

//miDate: fecha de comienzo D=días | M=mes | Y=año
//maxDate: fecha tope D=días | M=mes | Y=año
   $( "#invalterno-fecha" ).datepicker({miDate: new Date(1960, 1 -1, 1),maxDate: new Date(2002, 12 -1, 31), yearRange: '1960:2003' });

   $( "#registros-fecha1k" ).datepicker({ miDate: new Date(2003, 1 -1, 1),maxDate: new Date(2009, 12 -1, 31), yearRange: '2003:2009' });
   $( "#registros-fechainf" ).datepicker({ miDate: new Date(2010, 1 -1, 1),maxDate: new Date(2014, 12 -1, 31), yearRange: '2010:2015' });
  // $( "#registros-fecha" ).datepicker({ minDate: new Date(2003, 1 -1, 1), yearRange: '2003:2009' });
   $( "#agenin" ).datepicker({ minDate: new Date(2012, 1 -1, 1), yearRange: '2012:2015' });
});

        </script>
    </html>
    <?php $this->endPage() ?>
<?php } ?>
