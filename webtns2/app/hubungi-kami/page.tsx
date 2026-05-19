import type { Metadata } from "next";
import { ContactForm } from "@/app/components/ContactForm";
import { Reveal } from "@/app/components/Reveal";
import { contactCards, contactPageContent } from "@/app/data/site-content";

export const metadata: Metadata = {
  title: "Hubungi Kami",
  description:
    "Hubungi tim PT Tricipta Niaga Sukses untuk konsultasi solusi industri.",
};

export default function ContactPage() {
  return (
    <section className="site-container py-14 md:py-20">
      <Reveal>
        <div className="max-w-4xl">
          <p className="section-line" />
          <h1 className="section-title-xl mt-4 max-w-2xl font-medium text-(--color-primary)">
            {contactPageContent.title}
          </h1>
          <p className="mt-6 max-w-2xl text-lg leading-8 text-(--color-muted)">
            {contactPageContent.subtitle}
          </p>
        </div>
      </Reveal>

      <Reveal delay={80}>
        <div className="mt-12 grid overflow-hidden rounded-[18px] border border-(--color-border-soft) bg-white md:grid-cols-3">
          {contactCards.map(
            (
              card: { title: string; value: string | string[] },
              index: number,
            ) => (
              <Reveal key={card.title} delay={index * 70}>
                <article
                  className={`border-b border-(--color-border-soft) p-8 md:border-b-0 ${
                    index < contactCards.length - 1 ? "md:border-r" : ""
                  }`}>
                  <div className="mb-5 flex h-10 w-10 items-center justify-center rounded-md bg-(--color-surface-soft) text-(--color-primary)">
                    {index === 0 ? "@" : index === 1 ? "W" : "#"}
                  </div>
                  <p className="text-lg font-semibold uppercase tracking-[-0.01em] text-(--color-primary)">
                    {card.title}
                  </p>
                  <p className="mt-3 text-sm leading-7 text-(--color-muted)">
                    {Array.isArray(card.value)
                      ? card.value.map((line, i) => (
                          <span key={i}>
                            {line}
                            {i < card.value.length - 1 && <br />}
                          </span>
                        ))
                      : typeof card.value === "string"
                        ? String(card.value)
                            .split("\n")
                            .map((line, i, arr) => (
                              <span key={i}>
                                {line}
                                {i < arr.length - 1 && <br />}
                              </span>
                            ))
                        : card.value}
                  </p>
                </article>
              </Reveal>
            ),
          )}
        </div>
      </Reveal>

      <Reveal delay={120}>
        <div className="mt-14 grid gap-10 lg:grid-cols-[1fr_1.3fr]">
          <div className="overflow-hidden rounded-lg border border-(--color-border-soft) bg-white shadow-[0_2px_10px_rgba(0,0,0,0.04)]">
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d263.5735095434417!2d112.68255274014892!3d-7.450984816964875!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7e1cdf7d4e83f%3A0xf726c87aebe7a8fc!2sJasa%20Konsultan%20Lingkungan%20(AMDAL%2C%20UKL-UPL%2C%20IPAL%2C%20SIPA)%2C%20PT%20MSP!5e1!3m2!1sen!2sid!4v1775998773561!5m2!1sen!2sid"
              title="Lokasi PT Tricipta Niaga Sukses"
              className="h-105 w-full md:h-130"
              style={{ border: 0 }}
              allowFullScreen
              loading="lazy"
              referrerPolicy="no-referrer-when-downgrade"
            />
          </div>
          <ContactForm />
        </div>
      </Reveal>
    </section>
  );
}
