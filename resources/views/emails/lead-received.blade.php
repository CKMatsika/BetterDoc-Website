New demo request received.

Name: {{ $lead->name }}
Organisation: {{ $lead->organisation }}
Email: {{ $lead->email }}
Phone: {{ $lead->phone }}
Industry: {{ $lead->industry }}
Size: {{ $lead->size }}

Message:
{{ $lead->message }}

Received: {{ $lead->created_at }}
IP: {{ $lead->ip_address }}
