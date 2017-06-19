<?php 
use yii\helpers\Html; 
use yii\helpers\Url;
$this->title = Yii::t('app', 'appboard Modules');
$this->params['breadcrumbs'][] = $this->title;
$this->registerCss(".popover{max-width:500px}");
?>

<div class="box box-default">
	<div class="box-header with-border">
		<h3 class="box-title"><i class="glyphicon glyphicon-appboard"></i> <?php echo Yii::t('app', 'Manage Users appboard') ?></h3>
	</div>
	<div class="box-body">

	<div class="row">
		<div class="col-md-6 col-sm-6 col-xs-12">
		      <div class="edusec-link-box">
		        <span class="edusec-link-box-icon bg-yellow"><i class="fa fa-envelope"></i></span>
		        <div class="edusec-link-box-content">
		          <span class="edusec-link-box-text">sdfsdf</span>

			 <span class="edusec-link-box-desc"></span>
			  <span class="edusec-link-box-bottom"><?= Html::a('<i class="fa fa-plus-square"></i> '.Yii::t('app', 'Create New'), ['/appboard/msg-of-day/create']); ?></span>
		        </div><!-- /.info-box-content -->
		      </div><!-- /.info-box -->
		</div>

		<div class="col-md-6 col-sm-6 col-xs-12">
		      <div class="edusec-link-box">
		        <span class="edusec-link-box-icon bg-teal"><i class="fa fa-clipboard"></i></span>
		        <div class="edusec-link-box-content">
		          <span class="edusec-link-box-text"><?= Html::a(Yii::t('app', 'Notice'), ['/appboard/notice']);?></span>
		         
			 <span class="edusec-link-box-desc"><?php echo Yii::t('app', 'Manage Student/Employee appboard Notice'); ?></span>
			  <span class="edusec-link-box-bottom"><?= Html::a('<i class="fa fa-plus-square"></i> '.Yii::t('app', 'Create New'), ['/appboard/notice/create']); ?></span>
		        </div><!-- /.info-box-content -->
		      </div><!-- /.info-box -->
		</div>

	</div> <!-- /. End Row-->	

</div><!-- /.box-body -->
</div>


<!---Start event management block--->
<div class="box box-info box-solid">
	<div class="box-header with-border">
		<h3 class="box-title"><i class="ion ion-calendar"></i> <?php echo Yii::t('app', 'Manage Event Schedule') ?></h3>
	</div>
	<div class="box-body">
<?php 
$AEurl = Url::to(["events/add-event"]);
$UEurl = Url::to(["events/update-event"]);
$AddEvent = Yii::t('app', 'Add Event');
		$JSEvent = <<<EOF
	function(start, end, allDay) {
		var start = moment(start).unix();
	   	var end = moment(end).unix();
		$.ajax({
		   url: "{$AEurl}",
		   data: { start_date : start, end_date : end, return_appboard : 1 },
		   type: "GET",
		   success: function(data) {
			   $(".modal-body").addClass("row");
			   $(".modal-header").html('<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button><h3>{$AddEvent}</h3>');
			   $('.modal-body').html(data);
			   $('#eventModal').modal();
		   }
	   	});
			}
EOF;
$updateEvent = Yii::t('app', 'Update Event');
$JSEventClick = <<<EOF
	function(calEvent, jsEvent, view) {
	    var eventId = calEvent.id;
		$.ajax({
		   url: "{$UEurl}",
		   data: { event_id : eventId, return_appboard : 1 },
		   type: "GET",
		   success: function(data) {
			   $(".modal-body").addClass("row");
			   $(".modal-header").html('<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button><h3> {$updateEvent} </h3>');
			   $('.modal-body').html(data);
			   $('#eventModal').modal();
		   }
	   	});
		$(this).css('border-color', 'red');
	}
EOF;
$eDetail = Yii::t('app', 'Event Detail');
$eType = Yii::t('app', 'Event Type');
$eStart = Yii::t('app', 'Start Time');
$eEnd = Yii::t('app', 'End Time');
$JsF = <<<EOF
		function (event, element) {
			var start_time = moment(event.start).format("DD-MM-YYYY, h:mm:ss a");
		    	var end_time = moment(event.end).format("DD-MM-YYYY, h:mm:ss a");

			element.popover({
		            title: event.title,
		            placement: 'top',
		            html: true,
			    global_close: true,
			    container: 'body',
			    trigger: 'hover',
			    delay: {"show": 500},
		            content: "<table class='table'><tr><th> {$eDetail} : </th><td>" + event.description + " </td></tr><tr><th> {$eType} : </th><td>" + event.event_type + "</td></tr><tr><th> {$eStart} : </t><td>" + start_time + "</td></tr><tr><th> {$eEnd} : </th><td>" + end_time + "</td></tr></table>"
        		});
               }
EOF;

?>

  <div class="row">
     <div class="col-sm-12 col-xs-12">
    	   <?= \yii2fullcalendar\yii2fullcalendar::widget([
			'options' => ['language' => 'en'],
			'clientOptions' => [
				'fixedWeekCount' => false,
				'weekNumbers'=>true,
				'editable' => true,
				'selectable' => true,
				'eventLimit' => true,
				'eventLimitText' => 'more Events',
				'selectHelper' => true,
				'header' => [
					'left' => 'today prev,next',
					'center' => 'title',
					'right' => 'month,agendaWeek,agendaDay'
				],
				'select' =>  new \yii\web\JsExpression($JSEvent),
				'eventClick' => new \yii\web\JsExpression($JSEventClick),
				'eventRender' => new \yii\web\JsExpression($JsF),
				'aspectRatio' => 2,
				'timeFormat' => 'hh(:mm) A'
			],
			'ajaxEvents' => Url::toRoute(['/appboard/events/view-events'])
	]); ?>
     </div>
   </div> <!-- /.End ROW -->
   <div class="row">
      <div class="col-sm-12 col-xs-12">
	<ul class="legend">
	    <li><span class="holiday"></span> <?php echo Yii::t('app', 'Holiday') ?></li>
	    <li><span class="importantnotice"></span> <?php echo Yii::t('app', 'Important Notice') ?></li>
	    <li><span class="meeting"></span> <?php echo Yii::t('app', 'Meeting') ?></li>
	    <li><span class="messages"></span> <?php echo Yii::t('app', 'Messages') ?></li>
	</ul>
     </div>
   </div>
 
</div><!-- /.box-body -->
</div>
<!---End Event manager block--->

<?php
	yii\bootstrap\Modal::begin([
		'id' => 'eventModal',
		'header' => "<h3>".Yii::t('app', 'Add Event')."</h3>",
	]);

	yii\bootstrap\Modal::end(); 
?>
