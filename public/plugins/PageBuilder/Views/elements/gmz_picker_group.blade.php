@php
    $field_color = isset($params['main_color']) ? $params['main_color'] : '';
@endphp
<div class="gmz-list-of-destination gmz-text-group" @if(isset($data_settings)) data-settings="{{json_encode($params)}}" @endif>
    <p class="title" data-fields="main_color">{{$field_color}}</p>
</div>
