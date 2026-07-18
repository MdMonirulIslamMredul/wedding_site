<form action="{{ route('admin.messaging.contact.updateStatus', $contact->id) }}" method="POST" style="display:inline-block;" class="mr-1">
    @csrf
    <button type="submit" class="btn btn-sm btn-{{ $contact->is_connected ? 'warning' : 'success' }}" title="{{ $contact->is_connected ? 'Mark as Not Connected' : 'Mark as Connected' }}">
        <i class="fas fa-{{ $contact->is_connected ? 'times' : 'check' }}"></i> {{ $contact->is_connected ? 'Not Connected' : 'Connected' }}
    </button>
</form>
<x-utils.delete-button :href="route('admin.messaging.contact.destroy', $contact)" />