<table width="100%" cellpadding="0" cellspacing="0" role="presentation" style="background:#f4f4f4;padding:20px 0;">
    <tr>
        <td align="center">
            <table width="600" cellpadding="0" cellspacing="0" role="presentation" style="background:#ffffff;border-radius:8px;overflow:hidden;">
                <tr>
                    <td style="background:#2c3e50;color:#fff;padding:20px;text-align:center;">
                        <img src="{{ asset('assets/images/logo.png') }}" alt="Stone Bazaar" width="120" style="display:block;margin:0 auto;">
                        <h2 style="margin:10px 0 0; text-align:center;">@yield('header', 'Stone Bazaar')</h2>
                    </td>
                </tr>
                <tr>
                    <td style="padding:30px;">
                        @yield('content')
                    </td>
                </tr>
                <tr>
                    <td style="background:#ecf0f1;padding:15px;text-align:center;font-size:12px;color:#7f8c8d;">
                        &copy; {{ date('Y') }} Stone Bazaar. All rights reserved.
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
