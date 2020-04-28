@component('mail::message')
# @lang('global.mailtitle')

## @lang('global.mailname'):

{{$name}}

## @lang('global.mailemail'):

<{{$email}}>

## @lang('global.mailsubject'):

{{$subject}}

## @lang('global.mailmessage'):

{{$message}}

@endcomponent
