<x-layout title="BEF.ID | Submit">
    <form action="{{ route('class.update', $schedule->id) }}" method="POST" enctype="multipart/form-data" class="p-3">
        @csrf
            <label for="title">Student Name</label>
            <input type="text" class="form-control" name="studentName" id="studentName" value="{{ $studentName }}" readonly>
            <div class="form-group">
                <label for="title">Schedule Name</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ $schedule->scheduleName }}" readonly>
            </div>
            <div class="form-group">
                <label for="start">Deadline</label>
                <input type="datetime-local" class="form-control" name="deadline" id="deadline" value="{{ $schedule->scheduleDeadline }}" readonly>
            </div>
            <label for="type">Schedule Type</label>
            <input type="text" class="form-control" name="type" id="type" value="{{ $schedule->scheduleType }}" readonly>
            <div class="form-group">
                <label for="zoomlink">Zoom Meeting Link (if this is a meet schedule)</label>
                <input type="text" class="form-control" name="zoomlink" id="zoomlink" value="{{ $schedule->zoomLink }}" readonly>
            </div>
            <div class="form-group">
                <label for="submissionFile">Submission File</label>
                <input type="file" class="form-control" name="submissionFile" id="submissionFile">
            </div>
        
            <button type="submit" class="btn text-light fw-semibold" style="background-color: #38b6ff;">Submit</button>
        
    </form>
</x-layout>