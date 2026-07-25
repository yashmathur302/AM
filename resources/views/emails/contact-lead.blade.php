<x-mail::message>
# New contact enquiry

**Name:** {{ $lead->name }}
**Email:** {{ $lead->email }}
@if ($lead->phone)
**Phone:** {{ $lead->phone }}
@endif
@if ($lead->company)
**Company:** {{ $lead->company }}
@endif
@if ($lead->service_interest)
**Service of interest:** {{ $lead->service_interest }}
@endif

**Message:**

{{ $lead->message }}

<x-mail::button :url="route('admin.leads.show', $lead)">
View in admin panel
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
