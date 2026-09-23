<!DOCTYPE html>
<html lang="uz">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yangi xabar</title>
</head>

<body
    style="margin: 0; padding: 0; background-color: #f4f7f6; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;">

    <!-- Outer Wrapper Table -->
    <table border="0" cellpadding="0" cellspacing="0" width="100%"
        style="background-color: #f4f7f6; table-layout: fixed; padding: 40px 0;">
        <tr>
            <td align="center">

                <!-- Main Container -->
                <table border="0" cellpadding="0" cellspacing="0" width="600"
                    style="background-color: #ffffff; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06); border: 1px solid #e2e8f0;">

                    <!-- Header qismi -->
                    <tr>
                        <td align="left"
                            style="background: linear-gradient(135deg, #0ea5e9 0%, #2563eb 100%); padding: 35px 40px;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td>
                                        <span
                                            style="background-color: rgba(255, 255, 255, 0.2); color: #ffffff; font-size: 12px; font-weight: 600; text-transform: uppercase; padding: 6px 12px; border-radius: 20px; letter-spacing: 1px;">
                                            Yangi Ariza / Xabar
                                        </span>
                                        <h2
                                            style="color: #ffffff; font-size: 22px; margin: 15px 0 0 0; font-weight: 600; letter-spacing: 0.3px;">
                                            Saytdan xabar keldi! 📬
                                        </h2>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- Asosiy kontent qismi -->
                    <tr>
                        <td style="padding: 40px;">

                            <p style="margin: 0 0 20px 0; color: #64748b; font-size: 15px; line-height: 1.5;">
                                Quyida saytingizdagi bog'lanish formasi orqali foydalanuvchi tomonidan yuborilgan
                                ma'lumotlar keltirilgan:
                            </p>

                            <!-- Ma'lumotlar Jadvali -->
                            <table border="0" cellpadding="0" cellspacing="0" width="100%"
                                style="background-color: #f8fafc; border-radius: 10px; border: 1px solid #e2e8f0; margin-bottom: 25px;">
                                <tr>
                                    <td
                                        style="padding: 14px 20px; border-bottom: 1px solid #e2e8f0; width: 110px; color: #64748b; font-size: 14px; font-weight: 600;">
                                        Ismi:
                                    </td>
                                    <td
                                        style="padding: 14px 20px; border-bottom: 1px solid #e2e8f0; color: #0f172a; font-size: 15px; font-weight: 600;">
                                        {{ $mailData['name'] }}
                                    </td>
                                </tr>
                                <tr>
                                    <td
                                        style="padding: 14px 20px; border-bottom: 1px solid #e2e8f0; color: #64748b; font-size: 14px; font-weight: 600;">
                                        Email:
                                    </td>
                                    <td
                                        style="padding: 14px 20px; border-bottom: 1px solid #e2e8f0; color: #2563eb; font-size: 15px; font-weight: 600;">
                                        <a href="mailto:{{ $mailData['email'] }}"
                                            style="color: #2563eb; text-decoration: none;">{{ $mailData['email'] }}</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 14px 20px; color: #64748b; font-size: 14px; font-weight: 600;">
                                        Mavzusi:
                                    </td>
                                    <td style="padding: 14px 20px; color: #0f172a; font-size: 15px; font-weight: 500;">
                                        {{ $mailData['subject'] }}
                                    </td>
                                </tr>
                            </table>

                            <!-- Xabar matni sarlavhasi -->
                            <p style="margin: 0 0 10px 0; color: #0f172a; font-size: 15px; font-weight: 600;">
                                Xabar Matni:
                            </p>

                            <!-- Xabar matni bloki -->
                            <table border="0" cellpadding="0" cellspacing="0" width="100%"
                                style="background-color: #f1f5f9; border-left: 4px solid #2563eb; border-radius: 0 8px 8px 0;">
                                <tr>
                                    <td style="padding: 20px; color: #334155; font-size: 15px; line-height: 1.6;">
                                        {!! nl2br(e($mailData['message'])) ?? 'Xabar mavjud emas' !!}
                                    </td>
                                </tr>
                            </table>

                        </td>
                    </tr>

                    <!-- Footer qismi -->
                    <tr>
                        <td align="center"
                            style="background-color: #f8fafc; padding: 20px 40px; border-top: 1px solid #e2e8f0; color: #94a3b8; font-size: 13px;">
                            <p style="margin: 0;">
                                &copy; {{ date('Y') }} Sayt avtomatik xabarnomasi. Barcha huquqlar himoyalangan.
                            </p>
                        </td>
                    </tr>

                </table>
                <!-- End Main Container -->

            </td>
        </tr>
    </table>

</body>

</html>