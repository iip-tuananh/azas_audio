<table style="width:100%!important;border-spacing:0;border-collapse:collapse">
    <tbody>
    <tr>
        <td style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI','Roboto','Oxygen','Ubuntu','Cantarell','Fira Sans','Droid Sans','Helvetica Neue',sans-serif;padding:40px 0">
            <center>
                <table style="width:560px;text-align:left;border-spacing:0;border-collapse:collapse;margin:0 auto">
                    <tbody>
                    <tr>
                        <td>
                            <h2 style="font-weight:normal;font-size:24px;margin:0 0 10px;color:#333">Liên hệ mới từ website</h2>
                            <p style="color:#777;line-height:150%;font-size:16px;margin:0">
                                Bạn vừa nhận được một liên hệ mới từ khách hàng. Dưới đây là thông tin chi tiết:
                            </p>

                            <table style="width:100%;border-spacing:0;border-collapse:collapse;margin-top:20px">
                                <tbody>
                                <tr>
                                    <td style="padding-bottom:20px">
                                        <strong>Họ tên người gửi:</strong><br>
                                        <span style="font-size:16px;color:#555">{{ $data['user_name'] }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding-bottom:20px">
                                        <strong>Số điện thoại:</strong><br>
                                        <span style="font-size:16px;color:#555">{{ $data['phone_number'] }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding-bottom:20px">
                                        <strong>Tin nhắn:</strong><br>
                                        <span style="font-size:16px;color:#555">{{ $data['content'] }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding-bottom:20px">
                                        <strong>Ngày gửi:</strong><br>
                                        <span style="font-size:16px;color:#555">{{ \Illuminate\Support\Carbon::parse($data['created_at'])->format('d/m/Y H:i') }}</span>
                                    </td>
                                </tr>
                                </tbody>
                            </table>

                            <p style="color:#777;font-size:14px;margin-top:30px">Vui lòng liên hệ lại với khách hàng trong thời gian sớm nhất.</p>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </center>
        </td>
    </tr>
    </tbody>
</table>
