<link rel="stylesheet" href="{{asset('css/admin/admin-events.css')}}">
<link rel="stylesheet" href="{{asset('css/admin/admin-eventsEdit.css')}}">
@extends("../layouts/admin-layout")

@section('bread')
    <div><a href="{{route('admin')}}">Администрирование</a>&nbsp;&nbsp;&nbsp;>>>&nbsp;&nbsp;&nbsp;<a href="{{route('adminEvents')}}"> Мероприятия</a>&nbsp;&nbsp;&nbsp;>>>&nbsp;&nbsp;&nbsp;<a href="{{route('adminEventsEdit', [$year, $name])}}"> Редактирование мероприятия</a></div>
@stop

@section('content')

<section class="block">


    <form action="" enctype="multipart/form-data" id="form" method="post">
    {{ csrf_field() }}
            <ul>
            <li>
                <label for="datepicker">Дата мероприятия</label>
                <input type="text" id="datepicker" name="datepicker" required>
            </li>

             <li>
                <label for="eventName">Название</label>
                <input type="text" id="eventName" name="eventName" required>
            </li>

            <li>
                <label for="imgs">Изображения</label>
                <input type="file" multiple id="imgs" name="imgs[]" required accept="image/*">
            </li>

            <li>
                <span id="outputMulti"></span>
            </li>

            <button type="submit" class="button">Создать мероприятие</button>
        </ul>

    </form>
        
       
        

        
</div>

   
@stop





<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>

    
   








    
window.onload = function(){
    ( function( factory ) {
	if ( typeof define === "function" && define.amd ) {

		// AMD. Register as an anonymous module.
		define( [ "../widgets/datepicker" ], factory );
	} else {

		// Browser globals
		factory( jQuery.datepicker );
	}
}( function( datepicker ) {

datepicker.regional.ru = {
	closeText: "Закрыть",
	prevText: "&#x3C;Пред",
	nextText: "След&#x3E;",
	currentText: "Сегодня",
	monthNames: [ "Январь","Февраль","Март","Апрель","Май","Июнь",
	"Июль","Август","Сентябрь","Октябрь","Ноябрь","Декабрь" ],
	monthNamesShort: [ "Янв","Фев","Мар","Апр","Май","Июн",
	"Июл","Авг","Сен","Окт","Ноя","Дек" ],
	dayNames: [ "воскресенье","понедельник","вторник","среда","четверг","пятница","суббота" ],
	dayNamesShort: [ "вск","пнд","втр","срд","чтв","птн","сбт" ],
	dayNamesMin: [ "Вс","Пн","Вт","Ср","Чт","Пт","Сб" ],
	weekHeader: "Нед",
	dateFormat: "dd.mm.yy",
	firstDay: 1,
	isRTL: false,
	showMonthAfterYear: false,
	yearSuffix: "" };
datepicker.setDefaults( datepicker.regional.ru );

return datepicker.regional.ru;

} ) );


    $("#datepicker").datepicker({
        // showButtonPanel: true,
        changeMonth: true,
        changeYear: true,
        dateFormat: 'yy-mm-dd',
        showAnim: 'blind'
        
        } );

        1
    $.datepicker.setDefaults( $.datepicker.regional[ "ru" ] );  
    

    document.getElementById('imgs').addEventListener('change', handleFileSelect, false);

   
}





function handleFileSelect(evt) {
    document.getElementById('outputMulti').innerHTML = "";
    var files = evt.target.files; // FileList object
    
    // Loop through the FileList and render image files as thumbnails.
    for (var i = 0, f; f = files[i]; i++) {
        // Only process image files.
        if (!f.type.match('image.*')) {
            alert("Неверный формат файлов! Повторите попытку");
        }
        var reader = new FileReader();
        
        // Closure to capture the file information.
        reader.onload = (function (theFile) {
            return function (e) {
                // Render thumbnail.
                var span = document.createElement('span');
                span.innerHTML = ['<img class="thumb" title="', escape(theFile.name), '" src="', e.target.result, '" />'].join('');
                document.getElementById('outputMulti').insertBefore(span, null);
            };
        })(f);
        // Read in the image file as a data URL.
        reader.readAsDataURL(f);
    }
}







</script>