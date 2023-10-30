@extends('template.main')


@section('mainContainer')
  <div class="card">
    <div class="card-body">
      <div class="input-group input-group-outline my-3">
        <span type="text" name="name" class="form-control" value=""> Name: {{ $order->name }} </span>
      </div>
      <div class="my-3">
        <span>Status: </span>
        @if ($order->status == 'confirmed')
          <span class="badge bg-gradient-success align-middle text-center">{{ $order->status }}</span>
        @elseif($order->status == 'canceled')
          <span class="badge bg-gradient-danger align-middle text-center">{{ $order->status }}</span>
        @elseif($order->status == 'completed')
          <span class="badge bg-gradient-primary align-middle text-center">{{ $order->status }}</span>
        @elseif($order->status == 'unconfirmed')
          <span class="badge bg-gradient-warning align-middle text-center">{{ $order->status }}</span>
        @else
          <span class="badge bg-gradient-secondary align-middle text-center">{{ $order->status }}</span>
        @endif
      </div>
      <div class="my-3">
        <p> {{ $error }}</p>
      </div>
      <div class="btn-group" role="group" aria-label="Простой пример">
        @if ($order->status !== 'completed')
        <form action="{{ route('order.edit', $order) }}">
            <a href="{{ route('order.edit', $order) }}" class="btn btn-info" method="post">Edit order</a>
            @method('PUT')
        </form>
        @endif
        <a href="{{ route('order.index') }}" class="btn btn-primary">Back to orders</a>
      </div>
    </div>
  </div>
@endsection
