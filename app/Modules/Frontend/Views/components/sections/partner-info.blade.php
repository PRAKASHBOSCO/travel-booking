@php
    $enable = get_option($post['post_type'] . '_show_partner_info', 'on');
@endphp

@if($enable == 'on')
    @php
    $author = $post['author'];
    $avatar = get_user_avatar($author, [100, 100]);
    $userName = get_user_name($author);
    $userData = get_user_data($author);
    @endphp
    <div class="partner-info">
        <div class="info-head">
            <img src="{{url($avatar)}}" alt="avatar" />
            <div>
                <span class="username">{{sprintf(__('Posted by %s'), $userName)}}</span>
                <span class="address">{{$userData['address']}}</span>
            </div>
        </div>
        <div class="info-body">
            {{nl2br($userData['description'])}}
        </div>
    </div>
@endif