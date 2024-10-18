<x-layout title="Edit Event">
    <form action="{{ route('calendar.update', $event->id) }}" method="POST">
        @csrf
        <input type="text" name="title" value="{{ $event->title }}" required>
        <input type="datetime-local" name="start" value="{{ $event->start }}" required>
        <input type="datetime-local" name="end" value="{{ $event->end }}" required>
        <button type="submit">Update Event</button>
    </form>
    
    <form action="{{ route('calendar.destroy', $event->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete Event</button>
    </form>
</x-layout>