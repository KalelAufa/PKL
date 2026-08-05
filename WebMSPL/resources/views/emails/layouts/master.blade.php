<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>@yield('subject', 'PT Mentari Satya Perkasa')</title>
<style>
*{box-sizing:border-box;margin:0;padding:0}
body{background:#E8ECF4;font-family:'Helvetica Neue',Helvetica,Arial,sans-serif;-webkit-font-smoothing:antialiased;color:#1A1D23}
table{border-collapse:collapse}
a{color:#2A3F9E;text-decoration:none}
img{border:0;display:block}
.wrapper{width:100%;background:#E8ECF4;padding:44px 16px}
.shell{max-width:600px;margin:0 auto}

/* ── Header ── */
.hdr{background:#071535;padding:22px 40px}
.hdr-logo{width:36px;height:36px;border-radius:8px;display:block}
.hdr-name{color:#fff;font-size:15px;font-weight:700;letter-spacing:-.2px;line-height:1.1}
.hdr-sub{color:rgba(255,255,255,.28);font-size:10px;letter-spacing:.14em;text-transform:uppercase;margin-top:3px}
.gold-line{height:2px;background:linear-gradient(90deg,#F2A71B 0%,#FBC34C 35%,rgba(242,167,27,.05) 100%);font-size:0;line-height:0}

/* ── Hero ── */
.hero{padding:52px 48px 48px;background:#0C2349;position:relative}
.eyebrow{display:inline-block;color:#F2A71B;font-size:10px;font-weight:700;letter-spacing:.2em;text-transform:uppercase;margin-bottom:16px}
.hero h1{color:#fff;font-size:28px;font-weight:800;line-height:1.25;margin:0 0 14px;letter-spacing:-.5px}
.hero-sub{color:rgba(195,208,230,.65);font-size:13px;line-height:1.75;margin:0;max-width:400px}

/* ── Body ── */
.body{padding:44px 48px 40px;background:#fff}
.greeting{color:#0B2145;font-size:16px;font-weight:700;margin:0 0 10px;line-height:1.3}
.body p{color:#44474E;font-size:14px;line-height:1.78;margin:0 0 16px}
.rule{border:none;border-top:1px solid #ECF0F8;margin:28px 0}
.label{color:#8C92A4;font-size:10px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;margin:0 0 12px}

/* ── CTA ── */
.cta{text-align:center;padding:8px 0 32px}
.btn{display:inline-block;background:#F2A71B;color:#0B1428;font-size:14px;font-weight:800;text-decoration:none;padding:15px 44px;border-radius:4px;letter-spacing:.02em}

/* ── Content blocks ── */
.msg-block{border-left:3px solid #0B2145;background:#F5F8FD;padding:20px 24px;border-radius:0 8px 8px 0;margin:0 0 24px}
.quote-block{background:#F9FAFB;border:1px solid #E8EDF5;border-radius:8px;padding:18px 22px;margin:0 0 24px}
.url-block{background:#F4F7FC;border:1px solid #DDE4F0;border-radius:6px;padding:12px 16px;word-break:break-all;margin:0 0 20px}
.url-block a{color:#2A3F9E;font-size:12px;line-height:1.6}
.expiry-block{background:#FFF8ED;border:1px solid #F9D98A;border-radius:6px;padding:13px 18px;margin:0 0 24px}
.expiry-block p{color:#7A5200;font-size:13px;line-height:1.6;margin:0}
.notice-block{background:#F0F4FF;border:1px solid #C8D6F5;border-radius:6px;padding:13px 18px;margin-top:20px}
.notice-block p{color:#2A3F9E;font-size:12px;line-height:1.65;margin:0}
.contact-card{background:#F5F8FD;border:1px solid #E4EAF5;border-radius:8px;padding:14px 16px;vertical-align:top}

/* ── Footer ── */
.ftr{background:#071535;padding:26px 48px;text-align:center}
.ftr p{font-size:11px;color:rgba(255,255,255,.25);margin:0 0 4px;line-height:1.7}
.ftr p:last-child{margin:0}

@media(max-width:600px){
  .hdr,.hero,.body,.ftr{padding-left:24px !important;padding-right:24px !important}
}
</style>
</head>
<body>
<div class="wrapper">
<table width="100%" cellpadding="0" cellspacing="0" role="presentation"><tr><td align="center">
<table class="shell" width="600" cellpadding="0" cellspacing="0" role="presentation">

  {{-- Header --}}
  <tr><td class="hdr">
    <table width="100%" cellpadding="0" cellspacing="0" role="presentation"><tr>
      <td width="44" style="vertical-align:middle;padding-right:12px">
        <img src="{{ asset('images/logo.png') }}" width="36" height="36" alt="PT MSP" class="hdr-logo" style="width:36px;height:36px;border-radius:8px;display:block">
      </td>
      <td style="vertical-align:middle">
        <div class="hdr-name">PT Mentari Satya Perkasa</div>
      </td>
    </tr></table>
  </td></tr>
  <tr><td class="gold-line"></td></tr>

  @yield('content')

  {{-- Footer --}}
  <tr><td class="ftr">
    <p>© {{ date('Y') }} PT Mentari Satya Perkasa &nbsp;·&nbsp; Hak cipta dilindungi.</p>
    <p>Jl. Raya Kebayoran Lama No. 12, Jakarta Selatan 12210</p>
    @yield('footer-extra')
  </td></tr>

</table>
</td></tr></table>
</div>
</body>
</html>
