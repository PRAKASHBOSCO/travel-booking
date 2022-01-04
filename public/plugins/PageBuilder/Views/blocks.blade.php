@if(!empty($blocks))
    <div class="block-wrapper" data-action="{{url('builder-select-block')}}" data-action-edit="{{url('builder-edit-block')}}">
        @foreach($blocks as $key => $block)
            @php
                $class_name = $block['class_name'];
                $classObject = $class_name::inst();
                $field = $block;
                unset($field['field_id']);
                unset($field['class_name']);
                $params = [
                    'id' => $key,
                    'class' => $class_name,
                    'field' => $field
                ];
            @endphp
            <div class="__block" data-params="{{base64_encode(json_encode($params))}}">
                <div class="__block__inner">
                    {!! $block['icon'] !!}
                    <p>{{$block['name']}}</p>
                </div>
            </div>
        @endforeach
    </div>
@else
    <small><i>{{__('No data')}}</i></small>
@endif