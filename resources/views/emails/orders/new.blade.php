@component('mail::message')

# Hello

<br/><br/>
You have new Order from {{$order->first_name}} {{$order->last_name}}.

@component('mail::button', ['url' => url('/merchant/order')])
View Orders
@endcomponent

@endcomponent
