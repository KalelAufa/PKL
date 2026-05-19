import Image from "next/image";

type PortfolioCardProps = {
  sector: string;
  title: string;
  image: string;
};

/**
 * Portfolio card with bottom gradient overlay to match design direction.
 */
export function PortfolioCard({ sector, title, image }: PortfolioCardProps) {
  return (
    <article className="group relative overflow-hidden rounded-[14px]">
      <Image
        src={image}
        alt={title}
        width={1200}
        height={800}
        className="h-60 w-full object-cover saturate-0 transition-transform duration-500 group-hover:scale-105 md:h-72.5"
      />
      <div className="absolute inset-0 bg-linear-to-t from-[rgba(15,63,20,0.8)] via-[rgba(15,63,20,0.16)] to-transparent" />
      <div className="absolute inset-x-0 bottom-0 p-5">
        <p className="text-[11px] font-semibold uppercase tracking-[0.14em] text-(--color-accent-bright)">
          {sector}
        </p>
        <h3 className="mt-1 text-[33px] leading-none font-medium tracking-tight text-white">
          {title}
        </h3>
      </div>
    </article>
  );
}
