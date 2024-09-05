<div class="modal fade" id="instructor{{$fichas->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo instructor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('ficha.instructores.new',$fichas->id)}}" id="newInstructor" method="POST">
                    {{method_field('patch')}}
                    @csrf
                    <label for="instructor_id">Instructor:</label>
                    <select name="instructor_id" class="form-select" required>
                        <option selected value="">Seleccione una opción ...</option>
                            @foreach ($instructores as $instructor)
                                @if(!in_array($instructor->id,$fichas->instructor->pluck('id')->toArray()))
                                    <option value="{{$instructor->id}}">{{$instructor->nombre}} {{$instructor->apellido}}</option>
                                @endif
                            @endforeach
                    </select>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" form="newInstructor" class="btn btn-primary">Registrar</button>
            </div>
        </div>
    </div>
</div>
