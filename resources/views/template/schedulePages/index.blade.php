@extends('template.main')


@section('mainContainer')
<fluent-button>Hello world</fluent-button>
<div id="myCardContainer">
  <fluent-card>
    <fluent-button>Hello</fluent-button>
  </fluent-card>
  ...
</div>

<script type="module" src="https://unpkg.com/@fluentui/web-components"></script>
@endsection
