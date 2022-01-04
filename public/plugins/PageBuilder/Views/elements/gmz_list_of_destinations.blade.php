<div class="gmz-list-of-destination" @if(isset($data_settings)) data-settings="{{json_encode($params)}}" @endif>
    <p class="title" data-fields="title">{{get_translate($params['title'])}}</p>
    <p class="sub-title" data-fields="description">{{get_translate($params['description'])}}</p>
</div>
