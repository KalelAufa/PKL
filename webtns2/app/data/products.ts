import { type CategoryType } from "@/app/data/category";

export type ProductSpecification = {
  label: string;
  value: string;
};

export type CategoryProduct = {
  id: number;
  name: string;
  description: string;
  category: CategoryType;
  subcategory: string;
  image?: string;
  images?: string[];
  specifications?: ProductSpecification[];
};

const makeProduct = (
  id: number,
  name: string,
  description: string,
  category: CategoryType,
  subcategory: string,
  imagePath: string,
  images?: string[],
  specifications?: ProductSpecification[],
): CategoryProduct => ({
  id,
  name,
  description,
  category,
  subcategory,
  image: imagePath,
  images: images && images.length > 0 ? images : [imagePath],
  specifications,
});

export const categoryProducts: CategoryProduct[] = [
  makeProduct(
    13,
    "Lakban Heavy Duty",
    "Lakban industri dengan daya rekat tinggi untuk kebutuhan gudang dan logistik.",
    "Packaging",
    "Lakban",
    "/images/product-packaging.jpg",
    [
      "/images/product-packaging.jpg",
      "/images/portfolio-3.jpg",
      "/images/portfolio-4.jpg",
      "/images/portfolio-5.jpg",
      "/images/portfolio-6.jpg",
    ],
    [
      { label: "Adhesive Type", value: "Pressure sensitive grade industri" },
      { label: "Thickness", value: "48 micron" },
      { label: "Roll Width", value: "48 mm" },
      { label: "Core Size", value: "3 inch" },
    ],
  ),
  makeProduct(
    14,
    "Stretch Wrapping Film",
    "Film wrapping elastis untuk proteksi palet selama distribusi dan penyimpanan.",
    "Packaging",
    "Wrapping Film",
    "/images/product-packaging.jpg",
    [
      "/images/product-packaging.jpg",
      "/images/portfolio-4.jpg",
      "/images/portfolio-3.jpg",
      "/images/portfolio-5.jpg",
      "/images/portfolio-6.jpg",
    ],
  ),
  makeProduct(
    15,
    "Bubble Wrap",
    "Bubble wrap berkualitas untuk perlindungan kemasan produk sensitif dan rapuh.",
    "Packaging",
    "Bubble Wrap",
    "/images/product-packaging.jpg",
    [
      "/images/product-packaging.jpg",
      "/images/portfolio-5.jpg",
      "/images/portfolio-6.jpg",
      "/images/portfolio-4.jpg",
      "/images/portfolio-3.jpg",
    ],
  ),
  makeProduct(
    16,
    "tes produk",
    "Bubble wrap berkualitas untuk perlindungan kemasan produk sensitif dan rapuh.",
    "Packaging",
    "Bubble Wrap",
    "/images/product-packaging.jpg",
    [
      "/images/product-packaging.jpg",
      "/images/contact-office.jpg",
      "/images/portfolio-3.jpg",
      "/images/portfolio-4.jpg",
      "/images/portfolio-5.jpg",
    ],
  ),
  makeProduct(
    18,
    "TNS 18 Grey",
    "Digital perfume dispenser with timer and refill flexibility.",
    "Triscent",
    "Perfume Dispenser",
    "/images/tns-18-grey.png",
    ["/images/tns-18-grey.png"],
    [
      { label: "Display", value: "LCD Display & Digital Timer" },
      { label: "Refill", value: "All Size Refill Spray" },
      { label: "Power", value: "2 pcs D Size Battery" },
      { label: "Timer Options", value: "5, 10, 15, 20 minutes" },
    ],
  ),
  makeProduct(
    19,
    "TNS 18 Blue",
    "Digital perfume dispenser with timer and refill flexibility.",
    "Triscent",
    "Perfume Dispenser",
    "/images/tns-18-blue.png",
    ["/images/tns-18-blue.png"],
    [
      { label: "Display", value: "LCD Display & Digital Timer" },
      { label: "Refill", value: "All Size Refill Spray" },
      { label: "Power", value: "2 pcs D Size Battery" },
      { label: "Timer Options", value: "5, 10, 15, 20 minutes" },
    ],
  ),
  makeProduct(
    20,
    "TNS Digital Perfume",
    "Digital perfume dispenser with timer and refill flexibility.",
    "Triscent",
    "Perfume Dispenser",
    "/images/tns-digital-perfume.png",
    ["/images/tns-digital-perfume.png"],
    [
      { label: "Display", value: "LCD Display & Digital Timer" },
      { label: "Refill", value: "All Size Refill Spray" },
      { label: "Power", value: "2 pcs D Size Battery" },
      { label: "Timer Options", value: "5, 10, 15, 20 minutes" },
    ],
  ),
  makeProduct(
    21,
    "TNS Manual Freshener",
    "Manual freshener unit for quick and controlled spray operation.",
    "Triscent",
    "Perfume Dispenser",
    "/images/tns-manual-freshener.png",
    ["/images/tns-manual-freshener.png"],
    [
      { label: "Refill", value: "250 & 320 ml spray" },
      { label: "Power", value: "2 pcs AA battery" },
      {
        label: "Operation",
        value: "Manual button to spray",
      },
    ],
  ),
  makeProduct(
    22,
    "TNS Digital Sanitizer",
    "Toilet sanitizer system designed to work with flush water pressure.",
    "Triscent",
    "Toilet Sanitary",
    "/images/tns-digital-sanitizer.png",
    ["/images/tns-digital-sanitizer.png"],
    [
      {
        label: "Design",
        value: "Mechanical, operated by water pressure",
      },
      {
        label: "Operation",
        value: "Sanitizer liquid releases with flush water",
      },
    ],
  ),
  makeProduct(
    23,
    "TNS Hand Dryer",
    "Automatic hand dryer for public and commercial washroom areas.",
    "Triscent",
    "Toilet Sanitary",
    "/images/tns-digital-hand-dryer.png",
    ["/images/tns-digital-hand-dryer.png"],
    [
      { label: "Activation", value: "Automatic sensor activation" },
      { label: "Power", value: "600 watt, 220 volt" },
      { label: "Heat", value: "warm" },
    ],
  ),
  makeProduct(
    24,
    "TNS Seat Cleaner",
    "Seat cleaner dispenser to support hygienic restroom usage.",
    "Triscent",
    "Toilet Sanitary",
    "/images/tns-seat-cleaner.png",
    ["/images/tns-seat-cleaner.png"],
    [
      { label: "Display", value: "LCD Display & Digital Timer" },
      { label: "Refill", value: "All Size Refill Spray" },
      {
        label: "Operation",
        value: "Push button spray on tissue to kill bacteria",
      },
    ],
  ),
  makeProduct(
    25,
    "TNS Sanitary Bin",
    "Sanitary bin with practical pedal operation for hygiene support.",
    "Triscent",
    "Toilet Sanitary",
    "/images/tns-sanitary-bin.png",
    ["/images/tns-sanitary-bin.png"],
    [
      { label: "Washability", value: "Easy washable" },
      { label: "Design", value: "double cap" },
      { label: "Operation", value: "pedal to open" },
    ],
  ),
  makeProduct(
    26,
    "Hand Soap Dispenser Single",
    "Single soap dispenser unit for standard handwashing stations.",
    "Triscent",
    "Hygiene Sanitary",
    "/images/tns-hand-soap-dispenser-single.png",
    [
      "/images/tns-hand-soap-dispenser-single.png",
      "/images/tns-hand-soap-dispenser-double.png",
    ],
    [
      { label: "Unit", value: "Single" },
      { label: "Capacity", value: "400 ml, 1 ml per drop" },
      { label: "Colour", value: "White" },
    ],
  ),
  makeProduct(
    27,
    "Hand Soap Dispenser Double",
    "Double soap dispenser unit for dual soap or sanitizer options.",
    "Triscent",
    "Hygiene Sanitary",
    "/images/tns-hand-soap-dispenser-double.png",
    [
      "/images/tns-hand-soap-dispenser-double.png",
      "/images/tns-hand-soap-dispenser-single.png",
    ],
    [
      { label: "Unit", value: "Double" },
      { label: "Capacity", value: "400 ml, 1 ml per drop" },
      { label: "Colour", value: "White" },
    ],
  ),
  makeProduct(
    28,
    "TNS Handroll Tissue",
    "Handroll tissue dispenser for hygienic and durable daily use.",
    "Triscent",
    "Hygiene Sanitary",
    "/images/tns-handroll-tissue.png",
    ["/images/tns-handroll-tissue.png"],
    [
      { label: "Colour", value: "White" },
      { label: "Material", value: "Thick plastic" },
      { label: "Dimension", value: "27 x 9 x 20 cm" },
    ],
  ),
  makeProduct(
    29,
    "TNS Soap Dispenser 1000ml",
    "Large-capacity soap dispenser for high-traffic hygiene points.",
    "Triscent",
    "Hygiene Sanitary",
    "/images/tns-soap-dispenser.png",
    ["/images/tns-soap-dispenser.png"],
    [
      { label: "Colour", value: "White" },
      { label: "Capacity", value: "1000 ml, 1 ml per drop" },
      { label: "Operation", value: "Push button" },
    ],
  ),
];

export const productDetailPageContent = {
  grade: "Industrial Grade A+",
  specificationTitle: "Technical Specifications",
  relatedTitle: "Related Products",
  allCategoryLabel: "View All Category",
  cta: "Chat Now",
} as const;

export const productDetailFallbackSpecs: ProductSpecification[] = [
  { label: "Material", value: "Komposit standar industri" },
  { label: "Durability", value: "Dirancang untuk siklus kerja tinggi" },
  { label: "Maintenance", value: "Komponen modular dengan perawatan rendah" },
  { label: "Application", value: "Operasional komersial dan fasilitas" },
];

export type FeaturedProduct = {
  id: number;
  name: string;
  image: string;
  category: CategoryType;
};

const featuredProductIds = [18, 19, 20, 21, 22, 23, 24, 25, 13, 14] as const;

export const featuredProductsCarousel: FeaturedProduct[] = featuredProductIds
  .map((id) => categoryProducts.find((product) => product.id === id))
  .filter((product): product is CategoryProduct & { image: string } =>
    Boolean(product?.image),
  )
  .map(({ id, name, image, category }) => ({ id, name, image, category }));
