@extends('template.main')


@section('mainContainer')
  <div class="card">
    <div class="card-body table-responsive">
      <table class="table align-items-center mb-0">
        <thead>
          <tr>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">№</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Order</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created at</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Last update</th>
            <th class="text-center text-uppercase text-xxs font-weight-bolder"> <a href="{{ route('order.create') }}"
                class="btn btn-primary btn-sm">Create order</a> </th>
          </tr>
        </thead>
        @if (count($orders))
          @foreach ($orders as $order)
            <tbody>
              <tr>
                <td>
                  <p class="text-xs font-weight-bold mb-0">{{ $order->id }}</p>
                </td>
                <td>
                  <div class="d-flex px-2 py-1">
                    <div class="d-flex flex-column justify-content-center">
                      <a href="{{ route('order.show', $order->id) }}">
                        <h6 class="mb-0 text-xs">{{ $order->name }}</h6>
                      </a>
                    </div>
                  </div>
                </td>
                <td>
                  <p class="text-xs font-weight-bold mb-0"></p>
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
                </td>
                <td class="align-middle text-center text-sm">
                  <span
                    class="text-secondary text-xs font-weight-normals">{{ $order->created_at->format('d.m.Y') }}</span>
                </td>
                <td class="align-middle text-center">
                  <span class="text-secondary text-xs font-weight-normal">{{ $order->updated_at->format('d.m.Y') }}</span>
                </td>
                <td class="align-middle text-center align-items-center">
                  @if ($order->status !== 'completed')
                    <a href="{{ route('order.edit', $order->id) }}" class="btn btn-info btn-sm">Edit order</a>
                  @endif
                  @if ($order->status == 'completed')
                    <span class="badge bg-gradient-danger align-middle text-center"> Order closed </span>
                  @endif
                </td>
              </tr>


            </tbody>
            {{-- {!! $orders->links() !!} --}}
          @endforeach
        @else
          <tbody>
            <tr>

              <td>
                <p class="text-xs font-weight-bold mb-0"> Заказы не найдены!
                </p>
              </td>

            </tr>
          </tbody>
        @endif

      </table>
      {{-- <div class="container">

        <button class="btn btn-primary" type="button">Создать заказ</button>
      </div> --}}

    </div>
  </div>

@endsection
