@extends('template.main')


@section('mainContainer')
  <div class="card">
    <div class="card-body">
      <form action="{{ route('order.put', $order) }}">
        <div class="input-group input-group-outline my-3">
          <input type="text" name="name" class="form-control" value="{{ $order->name }}">
        </div>
        <div class="input-group input-group-outline my-3">
          <input type="text" name="status" class="form-control" value="{{ $order->status }}">
        </div>
        <div class="btn-group" role="group" aria-label="Простой пример">
          <button type="button" class="btn btn-primary">Commit order</button>
          <button type="submit" class="btn btn-primary">Save order</button>
          <a href="{{ url()->previous() }}" class="btn btn-primary">Back to orders</a>
        </div>
      </form>
    </div>
  </div>
@endsection
