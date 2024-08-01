@extends('layouts.app')

@section('content')

@if($errors->any())
@foreach ($errors-all() as $error)
    {{$error}}
@endforeach
@endif
<h1>Task</h1>
    
<div class="row">
    <div class="card text-center">
        <div class="card-header">
          <ul class="nav nav-pills card-header-pills">
            <li class="nav-item">
              <a class="nav-link active" href="#">Active</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled">Disabled</a>
            </li>
          </ul>
        </div>
        <div class="card-body">
          <h5 class="card-title">Task Form</h5>
          <form action="{{route('tasks.store')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Task</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" aria-describedby="nameInputFeedback">
                @error('name')
                <div id="nameInputFeedback" class="form-text  invalid-feedback">
                {{$message}}
                </div>
                @enderror
              </div>
              <div class="d-grip gap-2">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
          </form>
          
        </div>
      </div>
</div>


  <div class="row mt-5">
    <x-tasks.index :tasks="$tasks"></x-tasks.index>
  </div>
 
  
@endsection