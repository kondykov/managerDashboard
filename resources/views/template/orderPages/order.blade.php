@extends('template.main')


@section('mainContainer')
  <div class="card">
    <div class="card-body table-responsive">
      <table class="table align-items-center mb-0">
        <thead>
          <tr>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Номер заказа</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Заказ</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Статус</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Дата создания</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Дата изменения</th>
            <th></th>
          </tr>
        </thead>
        @if ($orders instanceof Illuminate\Database\Eloquent\Collection)
          @foreach ($orders as $order)
            <tbody>
              <tr>
                <td>
                  <p class="text-xs font-weight-bold mb-0">{{ $order->id }}</p>
                </td>
                <td>
                  <div class="d-flex px-2 py-1">
                    <div class="d-flex flex-column justify-content-center">
                      <h6 class="mb-0 text-xs">{{ $order->name }}</h6>
                    </div>
                  </div>
                </td>
                <td>
                  <p class="text-xs font-weight-bold mb-0"></p>
                  @if ($order->status == 'success')
                    <span class="badge bg-gradient-success align-middle text-center">{{ $order->status }}</span>
                  @elseif($order->status == 'canceled')
                    <span class="badge bg-gradient-danger align-middle text-center">{{ $order->status }}</span>
                  @elseif($order->status == 'completed')
                    <span class="badge bg-gradient-primary align-middle text-center">{{ $order->status }}</span>
                  @elseif($order->status == 'waiting')
                    <span class="badge bg-gradient-warning align-middle text-center">{{ $order->status }}</span>
                  @else
                  <span class="badge bg-gradient-secondary align-middle text-center">{{ $order->status }}</span>
                  @endif
                </td>
                <td class="align-middle text-center text-sm">
                  <span class="text-secondary text-xs font-weight-normals">{{ $order->created_at->format('d.m.Y') }}</span>
                </td>
                <td class="align-middle text-center">
                  <span class="text-secondary text-xs font-weight-normal">{{ $order->updated_at->format('d.m.Y') }}</span>
                </td>
                <td class="align-middle text-center align-items-center">
                  <a href="{{ route('order.edit', $order->id) }}" class="btn btn-info btn-sm">Edit order</a>
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
