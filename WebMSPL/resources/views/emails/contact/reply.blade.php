@extends('emails.layouts.master')

@section('subject', 'Re: ' . $subjectLine)

@php
use App\Models\PageContent;
$ec = PageContent::where('page', 'emails')->get()->keyBy('key');
$v = fn(string $key, string $default) => optional($ec->get($key))->value ?: $default;
@endphp

@section('content')

<tr><td class="hero">
    <div class="eyebrow">{{ $v('reply_eyebrow', 'Balasan dari Kami') }}</div>
    <h1>{{ $v('reply_hero_title', 'Halo, terima kasih sudah menghubungi kami.') }}</h1>
    <p class="hero-sub">{{ $v('reply_hero_subtitle', 'Kami sudah membaca pesan Anda dan siap membantu. Berikut balasan dari tim') }} <strong style="color:#F2A71B;font-weight:700;">PT Mentari Satya Perkasa</strong>.</p>
</td></tr>

<tr><td class="gold-line"></td></tr>

<tr><td class="body">

    <p class="greeting">{{ $v('reply_greeting', 'Yth.') }} {{ $name }},</p>
    <p>{{ $v('reply_intro', 'Kami sudah membaca pesan Anda dan berikut balasan resmi dari tim kami.') }}</p>

    <hr class="rule">

    <p class="label">Pesan dari Tim Kami</p>
    <div class="msg-block">
        <p style="color:#0B2145;font-size:14px;line-height:1.8;margin:0;white-space:pre-line;">{{ $replyBody }}</p>
    </div>

    <div class="quote-block">
        <p style="color:#75777F;font-size:10px;font-weight:700;letter-spacing:.12em;text-transform:uppercase;margin:0 0 10px;">Pesan Anda Sebelumnya</p>
        <p style="color:#44474E;font-size:13px;line-height:1.72;margin:0 0 8px;white-space:pre-line;">{{ $originalMessage }}</p>
        <p style="color:#BBBFC8;font-size:11px;margin:0;">Dikirim pada {{ $sentAt }}</p>
    </div>

    <hr class="rule">

    <table role="presentation" cellpadding="0" cellspacing="0" border="0" style="margin:8px auto 32px">
      <tr><td align="center" style="border-radius:4px;background:#F2A71B">
        <a href="mailto:{{ config('mail.from.address', 'info@ptmsp.co.id') }}" style="display:inline-block;background:#F2A71B;color:#0B1428;font-size:14px;font-weight:800;text-decoration:none;padding:15px 44px;border-radius:4px;letter-spacing:.02em;white-space:nowrap">Balas Email Ini</a>
      </td></tr>
    </table>

    <p style="color:#75777F;font-size:12px;font-weight:600;margin:0 0 14px;">Atau hubungi kami langsung:</p>
    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0"><tr>
        <td width="48%" class="contact-card">
            <p style="color:#75777F;font-size:10px;font-weight:700;letter-spacing:.1em;text-transform:uppercase;margin:0 0 6px;">Telepon / WhatsApp</p>
            <a href="tel:+622112345678" style="color:#0B2145;font-size:13px;font-weight:700;text-decoration:none;">+62 21 1234 5678</a>
        </td>
        <td width="4%"></td>
        <td width="48%" class="contact-card">
            <p style="color:#75777F;font-size:10px;font-weight:700;letter-spacing:.1em;text-transform:uppercase;margin:0 0 6px;">Email Resmi</p>
            <a href="mailto:{{ config('mail.from.address', 'info@ptmsp.co.id') }}" style="color:#0B2145;font-size:13px;font-weight:700;text-decoration:none;">{{ config('mail.from.address', 'info@ptmsp.co.id') }}</a>
        </td>
    </tr></table>

    <div class="notice-block">
        <p><strong>Catatan:</strong> PT Mentari Satya Perkasa tidak pernah meminta data sensitif melalui email. Abaikan jika ada pihak yang mengatasnamakan kami.</p>
    </div>

</td></tr>

@endsection

@section('footer-extra')
<p>Email ini merupakan balasan resmi untuk: <strong style="color:rgba(255,255,255,.45);">{{ $email }}</strong></p>
@endsection
