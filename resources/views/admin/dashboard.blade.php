@extends('layouts.admin')
@section('content')
<div class="right_col" role="main">
<br/>
<!-- Modulo de reporte -->
@include('componentes.dashboard_admin')
<!-- Fin modulo reporte -->
<!-- footer content -->
@include('layouts.footer')
<!-- /footer content -->
</div>
@endsection
