<!-- Componente de modal de eliminación reutilizable -->
<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{ $modalId }}">
    {{ $buttonText ?? 'Eliminar' }}
</button>

<div class="modal fade" id="deleteModal{{ $modalId }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $modalId }}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel{{ $modalId }}">{{ $modalTitle ?? 'Confirmar eliminación' }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{ $modalBody ?? '¿Estás seguro de que deseas eliminar este registro?' }}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <form action="{{ $action }}" method="POST" style="display:inline-block">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Eliminar</button>
        </form>
      </div>
    </div>
  </div>
</div>
