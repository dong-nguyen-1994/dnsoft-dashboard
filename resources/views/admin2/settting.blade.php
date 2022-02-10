@extends('core::admin2.master2')

@section('content')

<h1>Nestable2</h1>

<p>Drag &amp; drop hierarchical list with mouse and touch compatibility (jQuery plugin)</p>

<p><strong><a href="https://github.com/RamonSmit/Nestable2">Code on GitHub</a></strong></p>

<menu id="nestable-menu">
    <button type="button" data-action="expand-all">Expand All</button>
    <button type="button" data-action="collapse-all">Collapse All</button>
    <button type="button" data-action="add-item">Add new item</button>
    <button type="button" data-action="replace-item">Replace item 10</button>
</menu>

<div class="cf nestable-lists">

    <div class="dd" id="nestable"></div>

    <div class="dd" id="nestable2">
        <ol class="dd-list">
            <li class="dd-item" data-id="13">
                <div class="dd-handle">Item 13</div>
            </li>
            <li class="dd-item" data-id="14">
                <div class="dd-handle">Item 14</div>
            </li>
            <li class="dd-item" data-id="15"><button class="dd-collapse" data-action="collapse" type="button">Collapse</button><button class="dd-expand" data-action="expand" type="button">Expand</button>
                <div class="dd-handle">Item 15</div>
                <ol class="dd-list">
                    <li class="dd-item" data-id="16">
                        <div class="dd-handle">Item 16</div>
                    </li>
                    <li class="dd-item" data-id="17">
                        <div class="dd-handle">Item 17</div>
                    </li>
                    <li class="dd-item" data-id="18">
                        <div class="dd-handle">Item 18</div>
                    </li>
                </ol>
            </li>
        </ol>
    </div>

</div>

<p><strong>Serialised Output (per list)</strong></p>

<textarea id="nestable-output"></textarea>
<textarea id="nestable2-output"></textarea>

<p>&nbsp;</p>

<div class="cf nestable-lists">

    <p><strong>Draggable Handles</strong></p>

    <p>If you're clever with your CSS and markup this can be achieved without any JavaScript changes.</p>

    <div class="dd" id="nestable3">
        <ol class="dd-list">
            <li class="dd-item dd3-item" data-id="13">
                <div class="dd-handle dd3-handle">Drag</div>
                <div class="dd3-content">Item 13</div>
            </li>
            <li class="dd-item dd3-item" data-id="14">
                <div class="dd-handle dd3-handle">Drag</div>
                <div class="dd3-content">Item 14</div>
            </li>
            <li class="dd-item dd3-item" data-id="15"><button class="dd-collapse" data-action="collapse" type="button">Collapse</button><button class="dd-expand" data-action="expand" type="button">Expand</button>
                <div class="dd-handle dd3-handle">Drag</div>
                <div class="dd3-content">Item 15</div>
                <ol class="dd-list">
                    <li class="dd-item dd3-item" data-id="16">
                        <div class="dd-handle dd3-handle">Drag</div>
                        <div class="dd3-content">Item 16</div>
                    </li>
                    <li class="dd-item dd3-item" data-id="17">
                        <div class="dd-handle dd3-handle">Drag</div>
                        <div class="dd3-content">Item 17</div>
                    </li>
                    <li class="dd-item dd3-item" data-id="18">
                        <div class="dd-handle dd3-handle">Drag</div>
                        <div class="dd3-content">Item 18</div>
                    </li>
                </ol>
            </li>
        </ol>
    </div>

</div>

<p class="small">Copyright В© <a href="http://dbushell.com/">David Bushell</a> | Made for <a href="http://www.browserlondon.com/">Browser</a></p>

@stop

@push('scripts')
    <script src="{{ asset('vendor/dnsoft/dashboard/admin/js/jquery.nestable.min.js') }}"></script>
    <script src="{{ asset('vendor/dnsoft/dashboard/admin/js/setting-dashboard.js') }}"></script>
@endpush

@push('styles')
    <link href="{{ asset('vendor/dnsoft/dashboard/admin/css/jquery.nestable.min.css') }}">
    <link href="{{ asset('vendor/dnsoft/dashboard/admin/css/dashboard-setting.css') }}">
@endpush
