<form class="hidden" action="notes/{{ $note->id }}" method="POST">
    @csrf
    @method('DELETE')
    <p>Cette action est radicale et irréversible, êtes-vous sûr de vouloir supprimer cette note?</p>
    <button type="submit">Confirmer la suppression</button>
</form>