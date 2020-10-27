@component('mail::message')
    @lang('messages.mail.header_admin')
    @lang('messages.mail.body_admin')
    <br/>
    @lang('messages.mail.footer_admin')
    <br/>
    Link http://localhost:8080/admin/login
    @component('mail::button', ['url' => 'http://localhost:8080/admin/orders'])
        {{ trans('messages.home') }}
    @endcomponent
@endcomponent
