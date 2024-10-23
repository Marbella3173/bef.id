<x-layout title="BEF.ID | Edit Event">
    <form action="{{ route('class.update', $event->id) }}" method="POST" class="p-3">
        @csrf

        <label for="title">Student Name</label>
            <select class="form-select mb-3" id="userid" name="userid">
                <option value="{{ $currentStudent->userID }}"> {{ $currentStudent->studentName }}<i class="bi bi-caret-down-fill"></i> </option>
                    @if ($students->count() > 0)
                        @foreach($students as $student)
                            <option value="{{ $student->id }}">{{ $student->studentName }}</option>
                        @endforeach
                    @endif
            </select>

        <div class="form-group">
            <label for="title">Schedule Name</label>
            <input type="text" class="form-control" name="title" id="title" value="{{ $event->scheduleName }}" required>
        </div>
        <div class="form-group">
            <label for="start">Deadline</label>
            <input type="datetime-local" class="form-control" name="deadline" id="deadline" value="{{ $event->scheduleDeadline }}" required>
        </div>
        <label for="title">Schedule Type</label>
        <select class="form-select mb-3" id="type" name="type">
            <option value="{{ ($event->scheduleType) }}">{{ ($event->scheduleType) }}</option>
            <option value="Assignment">Assignment</option>
            <option value="Exam">Exam</option>
            <option value="Zoom Meeting">Zoom Meeting</option>
        </select>
        <div class="form-group">
            <label for="zoomlink">Zoom Meeting Link (if this is a meet schedule)</label>
            <input type="text" class="form-control" name="zoomlink" id="zoomlink" value="{{ $event->zoomLink }}">
        </div>

        <button type="submit" id="scheduleUpdateButton">Update Schedule</button>
        <button id="downloadFileButton">
            <a href="{{ asset('storage/submissions/' . $event->scheduleSubmissionName) }}" download="{{ $event->scheduleSubmissionName }}" style="text-decoration: none; color: white">
                Download submission file
            </a>
        </button>
    </form>
    
    <form action="{{ route('class.destroy', $event->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" id="scheduleDeleteButton">Delete Schedule</button>
    </form>
</x-layout>