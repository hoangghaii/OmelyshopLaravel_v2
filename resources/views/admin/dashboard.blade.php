@extends('admin_Layout')
@section('admin_content')

<div class="calendar-widget">
    <div class="panel-heading ui-sortable-handle">
        <span class="panel-icon">
          <i class="fa fa-calendar-o"></i>
        </span>
        <span class="panel-title">Calendar</span>
    </div>
    <!-- grids -->
    <div class="agile-calendar-grid">
        <div class="page">
            <div class="w3l-calendar-left">
                <div class="calendar-heading"></div>
                <div class="monthly" id="mycalendar"></div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>

@endsection
