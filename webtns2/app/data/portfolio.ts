export const portfolioPageContent = {
  title: "PORTOFOLIO PROYEK.",
  subtitle:
    "Implementasi material dan solusi industri berkualitas tinggi pada sektor komersial dan publik di seluruh Indonesia.",
} as const;

export type PortfolioProject = {
  id: number;
  sector: string;
  title: string;
  image: string;
};

const portfolioImageCatalog = {
  sudirmanOfficeTower: "/images/portfolio-1.jpg",
  mallKelapaGading: "/images/portfolio-2.jpg",
  cikarangIndustrialPark: "/images/portfolio-3.jpg",
  karawangEastPlant: "/images/portfolio-4.jpg",
  terminal3Soetta: "/images/portfolio-5.jpg",
  universitasIndonesia: "/images/portfolio-6.jpg",
} as const;

type PortfolioImageKey = keyof typeof portfolioImageCatalog;

const makePortfolioProject = (
  id: number,
  sector: string,
  title: string,
  imageKey: PortfolioImageKey,
): PortfolioProject => ({
  id,
  sector,
  title,
  image: portfolioImageCatalog[imageKey],
});

export const portfolioProjects: PortfolioProject[] = [
  makePortfolioProject(
    1,
    "Corporate Sector",
    "Sudirman Office Tower",
    "sudirmanOfficeTower",
  ),
  makePortfolioProject(
    2,
    "Public Infrastructure",
    "Mall Kelapa Gading",
    "mallKelapaGading",
  ),
  makePortfolioProject(
    3,
    "Logistik",
    "Cikarang Industrial Park",
    "cikarangIndustrialPark",
  ),
  makePortfolioProject(
    4,
    "Manufaktur",
    "Karawang East Plant",
    "karawangEastPlant",
  ),
  makePortfolioProject(
    5,
    "Aviation",
    "Terminal 3 Soekarno-Hatta",
    "terminal3Soetta",
  ),
  makePortfolioProject(
    6,
    "Education",
    "Universitas Indonesia",
    "universitasIndonesia",
  ),
];
