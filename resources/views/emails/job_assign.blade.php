<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0;">
    <meta name="format-detection" content="telephone=no" />
    <style>
        body {
            margin: 0;
            padding: 0;
            min-width: 100%;
            width: 100% !important;
            height: 100% !important;
        }

        body,
        table,
        td,
        div,
        p,
        a {
            -webkit-font-smoothing: antialiased;
            text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
            line-height: 100%;
        }

        table,
        td {
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
            border-collapse: collapse !important;
            border-spacing: 0;
        }

        img {
            border: 0;
            line-height: 100%;
            outline: none;
            text-decoration: none;
            -ms-interpolation-mode: bicubic;
        }

        #outlook a {
            padding: 0;
        }

        .ReadMsgBody {
            width: 100%;
        }

        .ExternalClass {
            width: 100%;
        }

        .ExternalClass,
        .ExternalClass p,
        .ExternalClass span,
        .ExternalClass font,
        .ExternalClass td,
        .ExternalClass div {
            line-height: 100%;
        }

        @media all and (min-width: 560px) {
            .container {
                border-radius: 8px;
                -webkit-border-radius: 8px;
                -moz-border-radius: 8px;
                -khtml-border-radius: 8px;
            }
        }

        a,
        a:hover {
            color: #FFFFFF;
        }

        .footer a,
        .footer a:hover {
            color: #828999;
        }
    </style>
    <title>Bergerie Maintenance</title>
</head>

<body topmargin="0" rightmargin="0" bottommargin="0" leftmargin="0" marginwidth="0" marginheight="0" width="100%" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%; height: 100%; -webkit-font-smoothing: antialiased; text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; line-height: 100%;
background-color: #2D3445;
color: #FFFFFF;" bgcolor="#2D3445" text="#FFFFFF">
    <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%;" class="background">
        <tr>
            <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;" bgcolor="#2D3445">
                <table border="0" cellpadding="0" cellspacing="0" align="center" width="500" style="border-collapse: collapse; border-spacing: 0; padding: 0; width: inherit;
                max-width: 500px;" class="wrapper">
                    <tr>
                        <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
                            padding-top: 20px;
                            padding-bottom: 20px;">
                        </td>
                    </tr>
                    <tr>
                        <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;  padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 24px; font-weight: bold; line-height: 130%;
                            padding-top: 5px;
                            color: #FFFFFF;
                            font-family: sans-serif;" class="header">
                            FAO <u>{{ $data['external']->name }}</u>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
                        padding-top: 24px;" class="line">
                            <hr color="#565F73" align="center" width="100%" size="1" noshade style="margin: 0; padding: 0;" />
                        </td>
                    </tr>
                    <tr>
                        <td align="left" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 17px; font-weight: 400; line-height: 160%;
                        padding-top: 10px;
                        color: #FFFFFF;
                        font-family: sans-serif; justify-content: center;" class="paragraph">
                            <div style="color: #bbb;font-size: 18px;">
                                Please find below details of a job assigned to you, please note all job details including special instructions.
                           </div>
                            <br>
                            <div style="padding-bottom: 5px; margin-top: 2px">Assigned To: <strong style="color: #bbb;font-size: 18px;">{{$data['external']->name ?? 'N/A'}}</strong></div>
                            <div style="padding-bottom: 5px; margin-top: 2px">Job ID: <strong style="color: #bbb;font-size: 18px;">{{$data['job']->id ?? 'N/A'}}</strong></div>
                            <div style="padding-bottom: 5px; margin-top: 2px">Date (Job created) : <strong style="color: #bbb;font-size: 18px;">{{ date('d-m-Y', strtotime($data['job']->date)) ?? "N/A"}}</strong></div>
                            <div style="padding-bottom: 5px; margin-top: 2px">Logged By: <strong style="color: #bbb;font-size: 18px;">{{$data['job']->loggedby->name ?? 'N/A'}}</strong></div>
                            <div style="padding-bottom: 5px; margin-top: 2px">Unit No: <strong style="color: #bbb;font-size: 18px;">{{$data['job']->unit->name ?? 'N/A'}} - {{$data['job']->unit->unit_no ?? 'N/A'}}</strong></div>
                            <div style="padding-bottom: 5px; margin-top: 2px">Urgency Level: <strong style="color: #bbb;font-size: 18px;">{{$data['job']->urgency ?? 'N/A'}}</strong></div>
                            <div style="padding-bottom: 5px; margin-top: 2px">Category Issue: <strong style="color: #bbb;font-size: 18px;">{{$data['job']->issue->name ?? 'N/A'}}</strong></div>
                            <div style="padding-bottom: 5px; margin-top: 2px">Issue Description: <strong style="color: #bbb;font-size: 18px;"> {{$data['job']->description ?? 'N/A'}} </strong></div>
                            <div style="padding-bottom: 5px; margin-top: 2px">Comment for Person fixing: <strong style="color: #bbb;font-size: 18px;">{{$data['job']->jobAssign->comment ?? 'N/A'}}</strong></div>
                            <div style="padding-bottom: 5px; margin-top: 2px">Target Closure Date: <strong style="color: #bbb;font-size: 18px;">{{ date('d-m-Y', strtotime($data['job']->jobAssign->closure_date)) ?? 'N/A'}}</strong></div>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" valign="top" style="margin-top: 2px; border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 17px; font-weight: 400; line-height: 160%;
                        padding-top: 10px;
                        color: #FFFFFF;
                        font-family: sans-serif; justify-content: center;" class="paragraph">
                            {{--<div><p>To {{ $data['external']->name }}</p></div>--}}
                            {{--<div>
                                <p>Please find below details of job assigned to you, please note all job details including special instructions, please confirm receipt of job details to email  {{ $data['external']->name }}</p>
                            </div>--}}
                            <div>
                                <p>Please notify the office by return email if there will be any delay in completing the work as per the requested schedule or if an issue arises on site.</p>
                            </div>
                            <div><p>Please email queries to info@bergerietrust.ie noting the reference number below.</p></div>
                            <div><p>Again, please quote the job number on any future correspondence including billing</p></div>
                            <div><p>Note: Where major parts are required for a job, please contact the office directly on (061) 446608 for authorisation.</p></div>
                            <div><p>Again, please note requested schedule completion date.</p></div>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" valign="top" style="margin-top: 2px ;border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 15px; font-weight: 400; line-height: 160%;
                        padding-top: 15px;
                        color: #FFFFFF;
                        font-family: sans-serif;" class="paragraph">
                            Kind Regards,<br />
                            Bergerie Trust Management Team
                        </td>
                    </tr>
                    <tr>
                        <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
                        padding-top: 30px;" class="line">
                            <hr color="#565F73" align="center" width="100%" size="1" noshade style="margin: 0; padding: 0;" />
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
