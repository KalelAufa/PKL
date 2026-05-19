"use client";

import type { FormEvent } from "react";
import { useState } from "react";
import {
  companyProfile,
  contactFormCopy,
  contactNeedOptions,
} from "@/app/data/site-content";

/**
 * Form kontak tanpa backend.
 * Data yang diisi pengguna diarahkan ke WhatsApp sebagai draft pesan.
 */
export function ContactForm() {
  const [fullName, setFullName] = useState("");
  const [email, setEmail] = useState("");
  const [needCategory, setNeedCategory] = useState<
    (typeof contactNeedOptions)[number]
  >(contactNeedOptions[0]);
  const [message, setMessage] = useState("");

  const handleSubmit = (event: FormEvent<HTMLFormElement>) => {
    event.preventDefault();
    const waMessage = `Halo Tim PT Tricipta Niaga Sukses,\nNama: ${fullName}\nEmail: ${email}\nKategori Kebutuhan: ${needCategory}\n\nDetail Pesan:\n${message}\n\nMohon dibantu penjelasan dan penawaran terbaiknya.\n\nTerima kasih.`;

    const link = `${companyProfile.whatsappLink}?text=${encodeURIComponent(
      waMessage,
    )}`;
    window.open(link, "_blank", "noopener,noreferrer");
  };

  return (
    <form
      className="rounded-lg bg-(--color-surface-soft) p-6 shadow-[0_2px_10px_rgba(0,0,0,0.04)] md:p-10"
      onSubmit={handleSubmit}>
      <div className="grid gap-6 md:grid-cols-2">
        <label className="space-y-2">
          <span className="field-label">{contactFormCopy.fullNameLabel}</span>
          <input
            className="field-input"
            type="text"
            placeholder={contactFormCopy.fullNamePlaceholder}
            value={fullName}
            onChange={(event) => setFullName(event.target.value)}
            required
          />
        </label>

        <label className="space-y-2">
          <span className="field-label">{contactFormCopy.emailLabel}</span>
          <input
            className="field-input"
            type="email"
            placeholder={contactFormCopy.emailPlaceholder}
            value={email}
            onChange={(event) => setEmail(event.target.value)}
            required
          />
        </label>
      </div>

      <label className="mt-6 block space-y-2">
        <span className="field-label">{contactFormCopy.needLabel}</span>
        <select
          className="field-input appearance-none"
          value={needCategory}
          onChange={(event) =>
            setNeedCategory(
              event.target.value as (typeof contactNeedOptions)[number],
            )
          }>
          {contactNeedOptions.map((item) => (
            <option key={item} value={item}>
              {item}
            </option>
          ))}
        </select>
      </label>

      <label className="mt-6 block space-y-2">
        <span className="field-label">{contactFormCopy.messageLabel}</span>
        <textarea
          className="field-input min-h-32 resize-y"
          placeholder={contactFormCopy.messagePlaceholder}
          value={message}
          onChange={(event) => setMessage(event.target.value)}
          required
        />
      </label>

      <button type="submit" className="primary-btn mt-8 w-full py-4 text-base">
        {contactFormCopy.submitLabel}
      </button>
    </form>
  );
}
