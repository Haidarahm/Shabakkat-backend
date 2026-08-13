<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>New contact inquiry</title>
</head>
<body style="margin:0;padding:0;background:#f4f6f8;font-family:Arial,Helvetica,sans-serif;color:#081e2f;">
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background:#f4f6f8;padding:32px 16px;">
        <tr>
            <td align="center">
                <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="max-width:560px;background:#ffffff;border:1px solid #e2e8f0;">
                    <tr>
                        <td style="padding:24px 28px;background:#081e2f;color:#ffffff;">
                            <div style="font-size:12px;letter-spacing:0.08em;text-transform:uppercase;opacity:0.75;">Shabakkat</div>
                            <div style="margin-top:6px;font-size:20px;font-weight:bold;">New contact inquiry</div>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:28px;">
                            <p style="margin:0 0 16px;font-size:15px;line-height:1.5;">
                                A new message was submitted through the website contact form.
                            </p>

                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="font-size:14px;line-height:1.5;">
                                <tr>
                                    <td style="padding:8px 0;border-bottom:1px solid #eef2f6;width:120px;color:#64748b;vertical-align:top;">Name</td>
                                    <td style="padding:8px 0;border-bottom:1px solid #eef2f6;vertical-align:top;">{{ $submission->name }}</td>
                                </tr>
                                <tr>
                                    <td style="padding:8px 0;border-bottom:1px solid #eef2f6;color:#64748b;vertical-align:top;">Email</td>
                                    <td style="padding:8px 0;border-bottom:1px solid #eef2f6;vertical-align:top;">
                                        <a href="mailto:{{ $submission->email }}" style="color:#0ea5e9;">{{ $submission->email }}</a>
                                    </td>
                                </tr>
                                @if ($submission->company)
                                <tr>
                                    <td style="padding:8px 0;border-bottom:1px solid #eef2f6;color:#64748b;vertical-align:top;">Company</td>
                                    <td style="padding:8px 0;border-bottom:1px solid #eef2f6;vertical-align:top;">{{ $submission->company }}</td>
                                </tr>
                                @endif
                                @if ($submission->phone)
                                <tr>
                                    <td style="padding:8px 0;border-bottom:1px solid #eef2f6;color:#64748b;vertical-align:top;">Phone</td>
                                    <td style="padding:8px 0;border-bottom:1px solid #eef2f6;vertical-align:top;">{{ $submission->phone }}</td>
                                </tr>
                                @endif
                                @if ($submission->service)
                                <tr>
                                    <td style="padding:8px 0;border-bottom:1px solid #eef2f6;color:#64748b;vertical-align:top;">Service</td>
                                    <td style="padding:8px 0;border-bottom:1px solid #eef2f6;vertical-align:top;">{{ $submission->service }}</td>
                                </tr>
                                @endif
                                <tr>
                                    <td style="padding:8px 0;color:#64748b;vertical-align:top;">Message</td>
                                    <td style="padding:8px 0;vertical-align:top;white-space:pre-wrap;">{{ $submission->message }}</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
