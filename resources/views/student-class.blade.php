<x-layout title="BEF.ID | Class">
    <div id="calendar" class="p-5" style="color: black"></div>


    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js'></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/js/bootstrap.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                dayMaxEvents: true,
                events: [
                    @foreach($events as $event)
                    {
                        title: '{{ $event->scheduleName }}',
                        start: '{{ $event->scheduleDeadline }}',
                        url: '{{ route('submit', $event->id) }}',
                        backgroundColor: function() {
                            // Color logic based on schedule type
                            switch ('{{ $event->scheduleType }}') {
                                case 'Assignment':
                                    return '#38b6ff'; // Example color for assignment
                                case 'Exam':
                                    return '#ff0000'; // Example color for exam
                                case 'Zoom Meeting':
                                    return '#9933ff'; // Example color for Zoom meeting
                                default:
                                    return '#38b6ff'; // Default color
                            }
                        }(),
                        borderColor: function() {
                            // Color logic based on schedule type
                            switch ('{{ $event->scheduleType }}') {
                                case 'Assignment':
                                    return '#38b6ff'; // default
                                case 'Exam':
                                    return '#ff0000'; // merah
                                case 'Zoom Meeting':
                                    return '#9933ff'; // ungu
                                default:
                                    return '#38b6ff'; // Default color
                            }
                        }(),
                        display: 'block',
                        textColor: 'white'   
                    },
                    @endforeach
                ]
            });

            calendar.render();
        });
    </script>
</x-layout>
