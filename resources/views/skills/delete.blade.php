<form class="hidden" action="skills/{{ $skill->id }}" method="POST">
    @csrf
    @method('DELETE')
    <p>Cette action est radicale et irréversible, êtes-vous sûr de vouloir supprimer cette compétence?</p>
    <button type="submit">Confirmer la suppression</button>
</form>