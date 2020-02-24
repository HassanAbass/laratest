@component('mail::message')
# Introduction

Hi there, this is a test message

@component('mail::button', ['url' => 'http://hassanabas.herokuapp.com'])
 Contact me
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
