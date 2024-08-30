const evento = document.getElementById("evento");
//const url= "http://127.0.0.1:8000/eventos";

document.addEventListener("DOMContentLoaded", function () {
    var calendarEl = document.getElementById("agenda");
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: "dayGridMonth",

        locale: "es",
        displayEventTime: false,
        headerToolbar: false,

        height: "600px",
        events: renders,
        eventDidMount: function (info) {
            //console.log(info.el);
            var tooltip = new Tooltip(info.el, {
                title: info.event.extendedProps.description,
                placement: "top",
                trigger: "hover",
                container: "body",
            });
        },
    });
    calendar.render();
});
