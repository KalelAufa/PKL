import type { Metadata } from "next";
import { PortfolioCard } from "@/app/components/PortfolioCard";
import { Reveal } from "@/app/components/Reveal";
import {
  portfolioPageContent,
  portfolioProjects,
} from "@/app/data/site-content";

export const metadata: Metadata = {
  title: "Portofolio",
  description:
    "Dokumentasi implementasi proyek PT Tricipta Niaga Sukses di berbagai sektor.",
};

export default function PortfolioPage() {
  return (
    <>
      <Reveal>
        <section className="site-container py-14 md:py-20">
          <p className="section-line" />
          <div className="mt-5 grid gap-10 md:grid-cols-[1fr_0.9fr] md:items-end">
            <h1 className="text-5xl font-medium uppercase leading-[0.95] tracking-[-0.04em] text-(--color-primary) md:text-8xl">
              {portfolioPageContent.title}
            </h1>
            <p className="max-w-lg text-base leading-8 text-(--color-muted)">
              {portfolioPageContent.subtitle}
            </p>
          </div>
        </section>
      </Reveal>

      <Reveal delay={80}>
        <section className="bg-(--color-surface-soft) py-8 md:py-12">
          <div className="site-container grid gap-1.5 md:grid-cols-3">
            {portfolioProjects.map((project, index) => (
              <Reveal key={project.id} delay={index * 70}>
                <PortfolioCard
                  sector={project.sector}
                  title={project.title}
                  image={project.image}
                />
              </Reveal>
            ))}
          </div>
        </section>
      </Reveal>
    </>
  );
}
