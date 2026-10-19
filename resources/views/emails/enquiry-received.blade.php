<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Enquiry</title>
</head>
<body style="margin:0;padding:0;background-color:#f3f6f5;font-family:'Segoe UI',Arial,Helvetica,sans-serif;">
<table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:#f3f6f5;padding:24px 12px;">
    <tr>
        <td align="center">
            <table role="presentation" width="600" cellpadding="0" cellspacing="0" border="0" style="width:100%;max-width:600px;background-color:#ffffff;border-radius:16px;overflow:hidden;box-shadow:0 6px 24px rgba(10,77,58,0.12);">

                {{-- Header --}}
                <tr>
                    <td bgcolor="#0a4d3a" style="background-color:#0a4d3a;background-image:linear-gradient(135deg,#0a4d3a 0%,#1e6a58 100%);padding:28px 32px;">
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
                            <tr>
                                <td width="64" valign="middle">
                                    <img src="{{ $message->embed(public_path('images/logo.svg')) }}" alt="Zahrat Al Madina" width="56" height="56" style="display:block;border-radius:50%;border:2px solid #ffffff;">
                                </td>
                                <td valign="middle" style="padding-left:14px;">
                                    <div style="font-family:Georgia,'Times New Roman',serif;font-size:22px;font-weight:bold;color:#ffffff;line-height:1.2;">Zahrat Al Madina</div>
                                    <div style="font-size:11px;letter-spacing:2px;color:#cfe8df;margin-top:4px;">FRUITS &amp; VEGETABLES</div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                {{-- Gold accent line --}}
                <tr>
                    <td height="4" style="height:4px;line-height:4px;font-size:0;background-color:#e0a526;">&nbsp;</td>
                </tr>

                {{-- Title --}}
                <tr>
                    <td style="padding:32px 32px 8px 32px;">
                        <h1 style="margin:0;font-size:26px;color:#0a4d3a;font-weight:700;">New Enquiry Received</h1>
                        <p style="margin:10px 0 0 0;font-size:15px;line-height:1.6;color:#5b6b73;">
                            A new message was submitted through the contact form on your website.
                        </p>
                    </td>
                </tr>

                {{-- Details --}}
                <tr>
                    <td style="padding:20px 32px 8px 32px;">
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="border:1px solid #e3ece8;border-radius:12px;">
                            <tr>
                                <td style="padding:14px 18px;border-bottom:1px solid #e3ece8;">
                                    <div style="font-size:11px;letter-spacing:1px;text-transform:uppercase;color:#7a8a92;">Name</div>
                                    <div style="font-size:16px;color:#0a4d3a;font-weight:600;margin-top:3px;">{{ $enquiry->name }}</div>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding:14px 18px;border-bottom:1px solid #e3ece8;">
                                    <div style="font-size:11px;letter-spacing:1px;text-transform:uppercase;color:#7a8a92;">Email</div>
                                    <div style="font-size:16px;margin-top:3px;">
                                        <a href="mailto:{{ $enquiry->email }}" style="color:#0b8f68;text-decoration:none;font-weight:600;">{{ $enquiry->email }}</a>
                                    </div>
                                </td>
                            </tr>
                            @if(!empty($enquiry->phone))
                                <tr>
                                    <td style="padding:14px 18px;border-bottom:1px solid #e3ece8;">
                                        <div style="font-size:11px;letter-spacing:1px;text-transform:uppercase;color:#7a8a92;">Phone</div>
                                        <div style="font-size:16px;margin-top:3px;">
                                            <a href="tel:{{ $enquiry->phone }}" style="color:#0a4d3a;text-decoration:none;font-weight:600;">{{ $enquiry->phone }}</a>
                                        </div>
                                    </td>
                                </tr>
                            @endif
                            <tr>
                                <td style="padding:14px 18px;">
                                    <div style="font-size:11px;letter-spacing:1px;text-transform:uppercase;color:#7a8a92;">Message</div>
                                    <div style="font-size:15px;line-height:1.7;color:#33444c;margin-top:6px;">{!! nl2br(e($enquiry->message)) !!}</div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                {{-- Reply button --}}
                <tr>
                    <td align="center" style="padding:24px 32px 32px 32px;">
                        <a href="mailto:{{ $enquiry->email }}?subject=Re: Your enquiry at Zahrat Al Madina"
                           style="display:inline-block;background-color:#0b8f68;color:#ffffff;font-size:13px;font-weight:700;letter-spacing:1.5px;text-transform:uppercase;text-decoration:none;padding:15px 34px;border-radius:8px;">
                            Reply to {{ $enquiry->name }}
                        </a>
                    </td>
                </tr>

                {{-- Footer --}}
                <tr>
                    <td bgcolor="#0a4d3a" style="background-color:#0a4d3a;padding:20px 32px;text-align:center;">
                        <div style="font-size:13px;color:#cfe8df;line-height:1.6;">
                            Zahrat Al Madina Fruits & Vegetables, Dubai<br>
                            <span style="color:#9fc7b9;">Received on {{ $enquiry->created_at?->format('d M Y, h:i A') }}</span>
                        </div>
                    </td>
                </tr>

            </table>
        </td>
    </tr>
</table>
</body>
</html>
