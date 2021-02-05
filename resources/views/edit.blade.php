@if(session('warning'))
    {{ session('warning')}}
@endif

<form method="POST">
    @csrf
    <label>
        Nome da tarefa
    </label>
    <input type="text" name="description" value="{{$data->description}}">
    <input type="submit" value="Salvar">
</form>