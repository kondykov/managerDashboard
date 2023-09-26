@extends('template.main')

@if ($devmode)
  @section('alert') 
    @include('components.alerts.dev')
  @endsection
@endif
@section('mainContainer')

@endsection
