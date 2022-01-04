@php
    $field_select = isset($params['select']) ? $params['select'] : '';
    $field_switcher = isset($params['tax_included']) ? $params['tax_included'] : '';
@endphp
<div class="gmz-list-of-destination gmz-text-group" @if(isset($data_settings)) data-settings="{{json_encode($params)}}" @endif>
    <p class="title" data-fields="text">{{get_translate($params['text'])}}</p>
    <p class="sub-title" data-fields="textarea">{{get_translate($params['textarea'])}}</p>
    <p class="sub-title" data-fields="number">{{get_translate($params['number'])}}</p>
    <p class="sub-title" data-fields="select">{{$field_select}}</p>
    <p class="sub-title" data-fields="tax_included">{{$field_switcher}}</p>
</div>
