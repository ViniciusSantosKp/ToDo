@if (count($tasks)>0)
<table border="1" width=50%>
    <tr>
        <th>Tarefa</th>
        <th>Realizada</th>
        <th>Ações</th>
    </tr>
    @foreach ($tasks as $task)
        <tr>
            <td>{{$task->description}}</td>
            <td>@if($task->done===0) PENDENTE @else CONCLUÍDA @endif </td>
            <td><a href="{{route('tasks.edit', ['id'=>$task->id] )}}">[Editar]</a>
                <a href="{{route('tasks.done', ['id'=>$task->id] )}}">
                    @if($task->done===0)[Marcar como Concluído]@else [Marcar como Pendente]@endif</a>
                <a href="{{route('tasks.delete', ['id'=>$task->id])}}" onclick="return confirm('Tem certeza que deseja excluir?')">[EXCLUIR]</a>
            </td>
        </tr>
    @endforeach
</table>
@else Não há tarefas cadastradas!
@endif
<br><br>
<a href="{{url('tasks/add')}}">Adicionar Tarefa</a>