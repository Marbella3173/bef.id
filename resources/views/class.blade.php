<x-layout title="BEF.ID | Class">
    <div id="calendar" class="p-3" style="text-decoration: none"></div>

    <!-- Modal -->
    <div id="addEventModal" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Event</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('calendar.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="title">Event Title</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Event Title" required>
                        </div>
                        <div class="form-group">
                            <label for="start">Start Date</label>
                            <input type="datetime-local" class="form-control" name="start" id="start" required>
                        </div>
                        <div class="form-group">
                            <label for="end">End Date</label>
                            <input type="datetime-local" class="form-control" name="end" id="end" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save Event</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js'></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/js/bootstrap.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                eventColor: 'red',
                dateClick: function(info) {
                    $('#start').val(info.dateStr + 'T00:00');
                    $('#end').val(info.dateStr + 'T00:00');
                    $('#addEventModal').modal('show');
                },
                events: [
                    @foreach($events as $event)
                    {
                        title: '{{ $event->title }}',
                        start: '{{ $event->start }}',
                        end: '{{ $event->end }}',
                        url: '{{ route('calendar.edit', $event->id) }}',
                        backgroundColor: '#3788d8',  // Blue background color
                        borderColor: '#3788d8',      // Matching border color
                        display: 'block'   
                    },
                    @endforeach
                ]
            });

            calendar.render();
        });
    </script>
</x-layout>
