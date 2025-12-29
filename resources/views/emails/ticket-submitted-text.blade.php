NEW SUPPORT TICKET: {{ $ticket->ticket_number }}

Priority: {{ strtoupper($ticket->severity) }}
From: {{ $ticket->requester_name }}
Email: {{ $ticket->requester_email }}
@if($ticket->environment)
Organization: {{ ucfirst($ticket->environment) }}
@endif
Submitted: {{ $ticket->created_at->format('M d, Y \a\t h:i A') }}

---

MESSAGE:
{{ $ticket->description }}

---

@if($ticket->isCritical())
⚠️ CRITICAL PRIORITY - Requires immediate attention!
@endif

Quick Reply: mailto:{{ $ticket->requester_email }}?subject=Re: {{ $ticket->ticket_number }}

Ticket ID: {{ $ticket->ticket_number }}
IP Address: {{ $ticket->ip_address }}
