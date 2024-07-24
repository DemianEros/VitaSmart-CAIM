@extends('layouts.layoutdash')

<meta name="csrf-token" content="{{ csrf_token() }}">

@section('content')
<div class="card">
    <h2 class="pt-4 px-4">Cargos</h2>
    <div class="card-datatable text-nowrap mx-2 table-responsive">
        <table id="table-positions" class="table table-striped table-hover">
            <thead>
                <tr></tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>
@endsection

{{-- javascript custom add directory per module --}}
@push('scripts')
    <script src="{{ asset('EstilosAdmin/js/scripts.js') }}"></script>
@endpush

