@component('mail::message')
    @lang('messages.mail.header_user')
    @lang('messages.mail.tittle_user')
    <br/>
    @lang('messages.mail.body_user')
    <br/>
    @lang('messages.mail.footer_user')

    @component('mail::button', ['url' => route('home')])
        {{ trans('messages.home') }}
    @endcomponent
@endcomponent
