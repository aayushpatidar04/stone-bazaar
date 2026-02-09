"use strict";

document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
        },
        initialDate: new Date(),
        navLinks: true,
        businessHours: true,
        editable: true,
        droppable: true,
        drop: function(info) {
            var checkbox = document.getElementById('checkbox2');
            if (checkbox && checkbox.checked) {
                info.draggedEl.parentNode.removeChild(info.draggedEl);
            }
        },
        events: [
            {
                title: 'Business Lunch',
                start: new Date().toISOString().split('T')[0] + 'T13:00:00',
                constraint: 'businessHours',
                borderColor: '#FC6180',
                backgroundColor: '#FC6180',
                textColor: '#fff'
            },
            {
                title: 'Meeting',
                start: new Date(Date.now() + 86400000 * 3).toISOString().split('T')[0] + 'T11:00:00',
                constraint: 'availableForMeeting',
                editable: true,
                borderColor: '#4680ff',
                backgroundColor: '#4680ff',
                textColor: '#fff'
            },
            {
                title: 'Conference',
                start: new Date(Date.now() + 86400000 * 7).toISOString().split('T')[0],
                end: new Date(Date.now() + 86400000 * 9).toISOString().split('T')[0],
                borderColor: '#93BE52',
                backgroundColor: '#93BE52',
                textColor: '#fff'
            },
            {
                title: 'Party',
                start: new Date(Date.now() + 86400000 * 14).toISOString().split('T')[0] + 'T20:00:00',
                borderColor: '#FFB64D',
                backgroundColor: '#FFB64D',
                textColor: '#fff'
            },
            {
                groupId: 'availableForMeeting',
                start: new Date(Date.now() + 86400000 * 2).toISOString().split('T')[0] + 'T10:00:00',
                end: new Date(Date.now() + 86400000 * 2).toISOString().split('T')[0] + 'T16:00:00',
                display: 'background',
                backgroundColor: '#ab7967'
            },
            {
                groupId: 'availableForMeeting',
                start: new Date(Date.now() + 86400000 * 3).toISOString().split('T')[0] + 'T10:00:00',
                end: new Date(Date.now() + 86400000 * 3).toISOString().split('T')[0] + 'T16:00:00',
                display: 'background',
                backgroundColor: '#39ADB5'
            },
            {
                start: new Date(Date.now() + 86400000 * 10).toISOString().split('T')[0],
                end: new Date(Date.now() + 86400000 * 13).toISOString().split('T')[0],
                overlap: false,
                display: 'background',
                backgroundColor: '#FFB64D'
            },
            {
                start: new Date(Date.now() + 86400000 * 5).toISOString().split('T')[0],
                end: new Date(Date.now() + 86400000 * 7).toISOString().split('T')[0],
                overlap: false,
                display: 'background',
                backgroundColor: '#ab7967'
            }
        ]
    });

    calendar.render();

    // Make external events draggable if Draggable is available
    var containerEl = document.getElementById('external-events');
    if (containerEl && typeof FullCalendar.Draggable !== 'undefined') {
        new FullCalendar.Draggable(containerEl, {
            itemSelector: '.fc-event',
            eventData: function(eventEl) {
                return {
                    title: eventEl.innerText.trim()
                };
            }
        });
    }
});
