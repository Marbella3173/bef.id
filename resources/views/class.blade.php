<x-layout title="BEF.ID | Class">
    <div id="calendar" class="p-3" style="color: black"></div>

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
                <form action="{{ route('class.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <label for="title">Student Name</label>
                        <select class="form-control mb-3" id="userid" name="userid">
                            <option value="none">Student Name</option>
                            @if ($students->count() > 0)
                                @foreach($students as $student)
                                    <option value="{{ $student->id }}">{{ $student->studentName }}</option>
                                @endforeach
                            @else
                                <p>No students yet!</p>
                            @endif
                        </select>
                        <div class="form-group">
                            <label for="title">Schedule Name</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="e.g. Math Assignment Deadline" required>
                        </div>
                        <div class="form-group">
                            <label for="start">Deadline</label>
                            <input type="datetime-local" class="form-control" name="deadline" id="deadline" required>
                        </div>
                        <label for="title">Schedule Type</label>
                        <select class="form-control mb-3" id="type" name="type">
                            <option value="none">Schedule Type</option>
                            <option value="assignment">Assignment</option>
                            <option value="exam">Exam</option>
                            <option value="zoomMeeting">Zoom Meeting</option>
                        </select>
                        <div class="form-group">
                            <label for="zoomlink">Zoom Meeting Link (if this is a meet schedule)</label>
                            <input type="text" class="form-control" name="zoomlink" id="zoomlink">
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
                textColor: 'black',
                dateClick: function(info) {
                    $('#start').val(info.dateStr + 'T00:00');
                    $('#end').val(info.dateStr + 'T00:00');
                    $('#addEventModal').modal('show');
                },
                events: [
                    @foreach($events as $event)
                    {
                        title: '{{ $event->scheduleName }}',
                        start: '{{ $event->scheduleDeadline }}',
                        url: '{{ route('class.edit', $event->id) }}',
                        backgroundColor: '#3788d8',
                        borderColor: '#3788d8',
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
