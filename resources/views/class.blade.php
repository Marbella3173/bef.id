<x-layout title="BEF.ID | Class">
    <div id="calendar" class="p-5" style="color: black"></div>

    <!-- Modal -->
    <div id="addEventModal" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="padding: 10px;">
                <div class="modal-header">
                    <h5 class="modal-title">Add Event</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('class.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <label for="title">Student Name</label>
                        <select class="form-select mb-3" id="userid" name="userid">
                            <option value="none">Student Name</option>
                            @if ($students->count() > 0)
                                @foreach($students as $student)
                                    <option value="{{ $student->id }}">{{ $student->studentName }}</option>
                                @endforeach
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
                        <select class="form-select mb-3" id="type" name="type">
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
                        <button type="submit" class="btn text-light" style="background-color: #38b6ff;">Save Event</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                dayMaxEvents: true,
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
                        backgroundColor: function() {
                            // Color logic based on schedule type
                            switch ('{{ $event->scheduleType }}') {
                                case 'assignment':
                                    return '#38b6ff'; // Example color for assignment
                                case 'exam':
                                    return '#ff0000'; // Example color for exam
                                case 'zoomMeeting':
                                    return '#9933ff'; // Example color for Zoom meeting
                                default:
                                    return '#38b6ff'; // Default color
                            }
                        }(),
                        borderColor: function() {
                            // Color logic based on schedule type
                            switch ('{{ $event->scheduleType }}') {
                                case 'assignment':
                                    return '#38b6ff'; // default
                                case 'exam':
                                    return '#ff0000'; // merah
                                case 'zoomMeeting':
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
