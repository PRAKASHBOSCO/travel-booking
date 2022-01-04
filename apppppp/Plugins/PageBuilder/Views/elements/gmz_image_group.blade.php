@php
    $image = isset($params['image']) ? $params['image'] : '';
    $gallery = isset($params['gallery']) ? $params['gallery'] : '';
@endphp
<div class="gmz-list-of-destination gmz-image-group" @if(isset($data_settings)) data-settings="{{json_encode($params)}}" @endif>
    <div class="title" data-fields="image">
        @if(!empty($image))
            <img src="{{get_attachment_url($image, [100, 100])}}" />
        @endif
    </div>
    <div class="sub-title" data-fields="gallery">
        @if(!empty($gallery))
            @php
                $arr = explode(',', $gallery);
            @endphp
            @foreach($arr as $item)
                <img src="{{get_attachment_url($item, [100, 100])}}" />
            @endforeach
        @endif
    </div>
</div>
