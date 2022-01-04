@php
    $link = get_the_permalink($post['post_slug'], $order['post_type']);
    $title = get_translate($post['post_title']);
    $address = get_translate($post['location_address']);
    $cartData = $checkoutData['cart_data'];
@endphp
<tr>
    <td class="label">{{__('Service Name')}}</td>
    <td class="val">
        <p><a href="{{$link}}">{{$title}}</a></p>
        <span>{{$address}}</span>
    </td>
</tr>
<tr>
    <td class="label">{{__('Date')}}</td>
    <td class="val">{{date(get_date_format(), $cartData['check_in'])}}</td>
</tr>
<tr>
    <td class="label">{{__('Time Slot')}}</td>
    <td class="val">{{date(get_time_format(), $cartData['check_in'])}}</td>
</tr>
<tr>
    <td class="label">{{__('Agent')}}</td>
    <td class="val">{{get_translate($cartData['agent_data']['post_title'])}}</td>
</tr>