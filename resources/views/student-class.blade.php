<x-layout title="BEF.ID | Class">
    <div id="calendar" class="p-5" style="color: black"></div>

    <!-- Modal HTML -->
    {{-- <div class="modal fade" id="eventModal" tabindex="-1" aria-labelledby="eventModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="eventModalLabel">Schedule Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('class.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <label for="title">Student Name</label>
                            <input type="text" class="form-control" name="studentName" id="studentName" value="{{ $studentName }}" disabled>
                            <div class="form-group">
                                <label for="title">Schedule Name</label>
                                <input type="text" class="form-control" name="title" id="title" value="{{ $schedule->scheduleName }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="start">Deadline</label>
                                <input type="datetime-local" class="form-control" name="deadline" id="deadline" value="{{ $schedule->scheduleDeadline }}" disabled>
                            </div>
                            <label for="title">Schedule Type</label>
                            <input type="text" class="form-control" name="deadline" id="deadline" value="{{ $schedule->scheduleType }}" disabled>
                            <div class="form-group">
                                <label for="zoomlink">Zoom Meeting Link (if this is a meet schedule)</label>
                                <input type="text" class="form-control" name="zoomlink" id="zoomlink" value="{{ $schedule->zoomLink }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="submissionFile">Submission File</label>
                                <input type="file" class="form-control" name="submissionFile" id="submissionFile">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save Event</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div> --}}


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
