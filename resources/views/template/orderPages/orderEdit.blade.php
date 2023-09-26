@extends('template.main')


@section('mainContainer')
  @if (count($errors)>0)
    <div class="alert alert-warning text-white" role="alert">
      <strong>Warning!</strong> @foreach ($errors->all() as $error)
        {{ $error }}
      @endforeach
    </div>
  @endif
  <div class="card">
    <div class="card-body">
      <form action="{{ route('order.put', $order) }}">
        <div class="input-group input-group-outline my-3">
          <input type="text" name="name" class="form-control" value="{{ $order->name }}">
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
          @if ($order->status === 'unconfirmed')
            <a href="{{ route('order.commit', $order) }}" class="btn btn-primary">Confirm order</a>
          @endif
          <button type="submit" class="btn btn-primary">Save order</button>
          <a href="{{ route('order.complete', $order) }}" class="btn btn-primary">Close order</a>
          <a href="{{ route('order.index') }}" class="btn btn-primary">Back to orders</a>
        </div>
      </form>
    </div>
  </div>
@endsection
