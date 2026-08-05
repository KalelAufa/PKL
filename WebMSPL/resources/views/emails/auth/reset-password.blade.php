@extends('emails.layouts.master')

@section('subject', 'Reset Password — PT Mentari Satya Perkasa')

@php
use App\Models\PageContent;
$ec = PageContent::where('page', 'emails')->get()->keyBy('key');
$v = fn(string $key, string $default) => optional($ec->get($key))->value ?: $default;
@endphp

@section('content')

<tr><td class="hero">
    <div class="eyebrow">{{ $v('reset_eyebrow', 'Reset Password') }}</div>
    <h1>{{ $v('reset_hero_title', 'Mau ganti password? Kami bantu.') }}</h1>
    <p class="hero-sub">{{ $v('reset_hero_subtitle', 'Klik tombol di bawah untuk membuat password baru. Kalau bukan Anda yang minta, abaikan saja email ini.') }}</p>
</td></tr>

<tr><td class="gold-line"></td></tr>

<tr><td class="body">

    <p class="greeting">Halo, {{ $name }},</p>
    <p>Kami menerima permintaan untuk mereset password akun admin Anda. Klik tombol di bawah untuk melanjutkan.</p>

    <div class="expiry-block">
        <p>⏱ {{ $v('reset_expiry', 'Tautan ini kedaluwarsa dalam 60 menit sejak email ini dikirim.') }}</p>
    </div>

    <table role="presentation" cellpadding="0" cellspacing="0" border="0" style="margin:8px auto 32px">
      <tr><td align="center" style="border-radius:4px;background:#F2A71B">
        <a href="{{ $url }}" style="display:inline-block;background:#F2A71B;color:#0B1428;font-size:14px;font-weight:800;text-decoration:none;padding:15px 44px;border-radius:4px;letter-spacing:.02em;white-space:nowrap">{{ $v('reset_button', 'Reset Password Sekarang') }}</a>
      </td></tr>
    </table>

    <hr class="rule">

    <p class="label">Atau salin tautan ini ke browser</p>
    <div class="url-block">
        <a href="{{ $url }}">{{ $url }}</a>
    </div>

    <div class="notice-block">
        <p><strong>Keamanan:</strong> {{ $v('reset_security', 'Jika Anda tidak meminta reset password, segera hubungi administrator sistem. Jangan bagikan tautan ini kepada siapapun.') }}</p>
    </div>

</td></tr>

@endsection

@section('footer-extra')
<p>Email ini dikirim ke: <strong style="color:rgba(255,255,255,.45);">{{ $email }}</strong></p>
@endsection
