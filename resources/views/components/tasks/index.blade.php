<div class="card">
    @if($tasks->count())
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Task</th>
            <th scope="col">Date</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
          <tr>
            <th scope="row">{{$task->id}}</th>
            <td>{{$task->name}}</td>
            <td>{{$task->created_at}}</td>
            <td>
                <form action="{{route('tasks.destroy', $task->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
          </tr>
          @endforeach
          {{-- @endif --}}
        </tbody>
      </table>
      @else
      <h1 class="text-center"> No tasks</h1>
      @endif
</div>