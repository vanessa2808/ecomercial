@component('mail::message')
    @lang('messages.mail.header_accept')
    @lang('messages.mail.body_accept')
    @lang('messages.mail.footer_accept')
    @component('mail::button', ['url' => route('home')])
        {{ trans('messages.home') }}
    @endcomponent
@endcomponent
