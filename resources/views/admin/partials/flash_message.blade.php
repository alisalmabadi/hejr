@if(session()->has('flash_message'))

<div class="alert alert-{{session()->get('flash_message_level')}} alertflash alert-dismissable" role="alert" style="opacity: .5;">
    <span  class="close" data-dismiss="alert">
        &times;
    </span>
   {{session()->get('flash_message')}}
</div>

@endif

@if(session()->has('flash_sms'))

    <div class="alert alert-info alert-dismissable" role="alert" style="opacity: .5;">
        <button type="button" class="close" data-dismiss="alert">
            <span aria-hidden="true" ></span><span class="sr-only">close</span>
        </button>
        اس ام اس ارسال شد ==>>
        {{session()->get('flash_sms')}}
    </div>

@endif