@extends('template.main')


@section('mainContainer')
  <div class="card">
    <div class="card-body">
      <form action="{{ route('order.store') }}" method="post">
          @method('post')
          @csrf
       <div class="input-group input-group-outline my-3">
         <label class="form-label">Name</label>
         <input type="text" name="name" class="form-control">
       </div>

       <button type="submit" class="btn btn-primary">Create order</button>
      </form>
    </div>
  </div>

@endsection
