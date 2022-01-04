@php
    $field_space = isset($params['space']) ? $params['space'] : '';
@endphp
<div data-attr="space" style="height: {{$field_space}}px" data-fields="space" class="gmz-element-space"  @if(isset($data_settings)) data-settings="{{json_encode($params)}}" @endif>
</div>
