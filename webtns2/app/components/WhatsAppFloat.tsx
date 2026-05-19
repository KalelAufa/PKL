import { companyProfile } from "@/app/data/site-content";

/**
 * Persistent floating WhatsApp CTA shown across all pages.
 */
export function WhatsAppFloat() {
  const waMessage = `Halo Tim,\nSaya tertarik dengan produk/solusi PT Tricipta Niaga Sukses.\nBisa dibantu untuk konsultasi?\n\nTerima kasih.`;
  const waLink = `${companyProfile.whatsappLink}?text=${encodeURIComponent(waMessage)}`;

  return (
    <a
      href={waLink}
      target="_blank"
      rel="noreferrer"
      className="fixed bottom-6 right-6 z-40 inline-flex h-14 w-14 items-center justify-center rounded-full bg-[#25D366] text-white shadow-[0_10px_28px_rgba(37,211,102,0.45)] transition-transform hover:-translate-y-0.5"
      aria-label="Chat via WhatsApp">
      <svg
        viewBox="0 0 24 24"
        className="h-7 w-7"
        fill="currentColor"
        aria-hidden="true">
        <path d="M19.11 4.89A9.77 9.77 0 0 0 12.03 2C6.56 2 2.11 6.45 2.11 11.92c0 1.75.46 3.47 1.33 4.99L2 22l5.25-1.38a9.88 9.88 0 0 0 4.77 1.22h.01c5.47 0 9.92-4.45 9.92-9.92a9.8 9.8 0 0 0-2.84-7.03ZM12.03 20.2h-.01a8.3 8.3 0 0 1-4.22-1.15l-.3-.18-3.12.82.83-3.05-.2-.32a8.24 8.24 0 0 1-1.28-4.4c0-4.57 3.72-8.29 8.3-8.29 2.22 0 4.31.86 5.87 2.43a8.25 8.25 0 0 1 2.43 5.87c0 4.57-3.72 8.29-8.3 8.29Zm4.55-6.22c-.25-.13-1.5-.74-1.73-.82-.23-.09-.4-.13-.57.12-.17.26-.66.82-.81.99-.15.18-.3.2-.56.07-.25-.13-1.06-.39-2.03-1.24-.75-.67-1.26-1.49-1.41-1.74-.15-.26-.02-.39.11-.52.11-.11.25-.29.38-.43.12-.15.17-.25.25-.43.09-.18.04-.33-.02-.46-.07-.13-.57-1.37-.78-1.87-.21-.5-.43-.43-.57-.43h-.49c-.17 0-.46.06-.7.32-.24.25-.92.9-.92 2.2 0 1.29.94 2.54 1.07 2.71.13.18 1.84 2.82 4.46 3.95.62.27 1.1.43 1.48.55.62.2 1.18.17 1.63.1.5-.07 1.5-.61 1.71-1.2.21-.59.21-1.1.15-1.2-.06-.11-.23-.17-.48-.3Z" />
      </svg>
    </a>
  );
}
