<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            color: white;
            padding: 30px;
            border-radius: 10px 10px 0 0;
        }
        .severity-badge {
            display: inline-block;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .critical { background: #ef4444; color: white; }
        .high { background: #f97316; color: white; }
        .medium { background: #eab308; color: white; }
        .low { background: #22c55e; color: white; }
        .content {
            background: #f9fafb;
            padding: 30px;
            border-radius: 0 0 10px 10px;
        }
        .info-row {
            padding: 10px 0;
            border-bottom: 1px solid #e5e7eb;
        }
        .label {
            font-weight: 600;
            color: #6b7280;
        }
        .value {
            color: #111827;
        }
        .description-box {
            background: white;
            padding: 20px;
            border-radius: 8px;
            margin-top: 20px;
            border-left: 4px solid #3b82f6;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            color: #6b7280;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1 style="margin: 0; font-size: 24px;">🎫 New Support Ticket</h1>
            <p style="margin: 10px 0 0 0; opacity: 0.9;">{{ $ticket->ticket_number }}</p>
        </div>

        <div class="content">
            <span class="severity-badge {{ $ticket->severity }}">
                {{ strtoupper($ticket->severity) }} PRIORITY
            </span>

            <div class="info-row">
                <span class="label">From:</span>
                <span class="value">{{ $ticket->requester_name }}</span>
            </div>

            <div class="info-row">
                <span class="label">Email:</span>
                <span class="value">
                    <a href="mailto:{{ $ticket->requester_email }}">{{ $ticket->requester_email }}</a>
                </span>
            </div>

            @if($ticket->environment)
                <div class="info-row">
                    <span class="label">Organization:</span>
                    <span class="value">{{ ucfirst($ticket->environment) }}</span>
                </div>
            @endif

            <div class="info-row">
                <span class="label">Submitted:</span>
                <span class="value">{{ $ticket->created_at->format('M d, Y \a\t h:i A') }}</span>
            </div>

            <div class="description-box">
                <h3 style="margin-top: 0;">Message:</h3>
                <p style="white-space: pre-wrap;">{{ $ticket->description }}</p>
            </div>

            @if($ticket->isCritical())
                <div style="background: #fee2e2; border: 2px solid #ef4444; padding: 15px; border-radius: 8px; margin-top: 20px;">
                    <strong style="color: #991b1b;">⚠️ CRITICAL PRIORITY</strong>
                    <p style="margin: 5px 0 0 0; color: #7f1d1d;">This ticket requires immediate attention!</p>
                </div>
            @endif

            <div style="margin-top: 30px; padding: 15px; background: white; border-radius: 8px;">
                <h4 style="margin: 0 0 10px 0;">Quick Actions:</h4>
                <a href="mailto:{{ $ticket->requester_email }}?subject=Re: {{ $ticket->ticket_number }}" 
                   style="display: inline-block; padding: 10px 20px; background: #3b82f6; color: white; text-decoration: none; border-radius: 6px; margin-right: 10px;">
                    Reply via Email
                </a>
            </div>
        </div>

        <div class="footer">
            <p>Ticket ID: {{ $ticket->ticket_number }}</p>
            <p>IP Address: {{ $ticket->ip_address }}</p>
            <p style="margin-top: 15px; font-size: 11px;">
                This is an automated notification from your portfolio website.
            </p>
        </div>
    </div>
</body>
</html>
