<x-layout title="BEF.ID | Edit Event">
    <form action="{{ route('class.update', $event->id) }}" method="POST" class="p-3">
        @csrf

        <div class="form-group">
            <label for="student" class="fw-semibold">Student Name</label>
            <input type="text" class="form-control" name="student" id="student" value="{{ $studentName }}" disabled>
        </div>

        <div class="form-group">
            <label for="title">Schedule Name</label>
            <input type="text" class="form-control" name="title" id="title" value="{{ $event->scheduleName }}" required>
        </div>
        <div class="form-group">
            <label for="start">Deadline</label>
            <input type="datetime-local" class="form-control" name="deadline" id="deadline" value="{{ $event->scheduleDeadline }}" required>
        </div>
        <label for="title">Schedule Type</label>
        <select class="form-control mb-3" id="type" name="type" value="{{ $event->scheduleType }}">
            <option value="none">Schedule Type</option>
            <option value="assignment">Assignment</option>
            <option value="exam">Exam</option>
            <option value="zoomMeeting">Zoom Meeting</option>
        </select>
        <div class="form-group">
            <label for="zoomlink">Zoom Meeting Link (if this is a meet schedule)</label>
            <input type="text" class="form-control" name="zoomlink" id="zoomlink" value="{{ $event->zoomLink }}">
        </div>

        <button type="submit" id="scheduleUpdateButton">Update Schedule</button>
    </form>
    
    <form action="{{ route('class.destroy', $event->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" id="scheduleDeleteButton">Delete Schedule</button>
    </form>

    
</x-layout>