var counter = false;

function secondsToHms(d) {
    d = Number(d);

    var h = Math.floor(d / 3600);
    var m = Math.floor(d % 3600 / 60);
    var s = Math.floor(d % 3600 % 60);

    return ('0' + h).slice(-2) + ":" + ('0' + m).slice(-2) + ":" + ('0' + s).slice(-2);
}

function setCounter(){
    counter = !counter;
    document.getElementById("play").classList.toggle("hidden");
    document.getElementById("stop").classList.toggle("hidden");
}

if (typeof time !== 'undefined') {
    var seconds = Number(time.value);
    time.value = secondsToHms(seconds);
    
    function incrementSeconds() {
        if (counter){
            seconds += 1;
            time.value = secondsToHms(seconds);
        }
    }
    
    var cancel = setInterval(incrementSeconds, 1000);
}

$('option').mousedown(function(e) {
    e.preventDefault();
    var originalScrollTop = $(this).parent().scrollTop();
    console.log(originalScrollTop);
    $(this).prop('selected', $(this).prop('selected') ? false : true);
    var self = this;
    $(this).parent().focus();
    setTimeout(function() {
        $(self).parent().scrollTop(originalScrollTop);
    }, 0);
    
    return false;
});

//bootstrap WYSIHTML5 - text editor
$('.textarea').wysihtml5();

//Data-table
$('.data-table').DataTable({
    "order": [[ 0, "desc" ]],
    "columnDefs": [
        {
            "targets": [ 0 ],
            "visible": false,
            "searchable": false
    },]
});

//Date picker
$('.datepicker').datepicker({
    format: 'yyyy-mm-dd 00:00:00',
    autoclose: true
});

// jQuery UI sortable for the todo list
$('.todo-list').sortable({
    placeholder         : 'sort-highlight',
    handle              : '.handle',
    forcePlaceholderSize: true,
    zIndex              : 999999
});

$(window).on('load', function () {
     $('.loader').fadeOut();
     var objDiv = document.getElementById("direct-chat-messages");
     if (objDiv != null){
        objDiv.scrollTop = objDiv.scrollHeight;
     }
});

// Autosubmit timesheet form
submitTime = function(){
    $.ajax({
        type: 'post',
        url: window.location.href,
        data: $("#timesheet-form").serialize(),
    });
}