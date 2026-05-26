import airbnbLogo from '/images/logos/airbnb.svg'
import amazonLogo from '/images/logos/amazon.svg'
import appleLogo from '/images/logos/apple.svg'
import googleLogo from '/images/logos/google.svg'
import metaLogo from '/images/logos/meta.svg'
import shellLogo from '/images/logos/shell.svg'
import spotifyLogo from '/images/logos/spotify.svg'
import starbucksLogo from '/images/logos/starbucks.svg'
import walmartLogo from '/images/logos/walmart.svg'

export type CompanyProfileType = {
  name: string
  logo: string
  website: string
  location: string
  category: {
    label: string
    icon: string
  }
  description: string
  employees: {
    count: number
    prefix?: string
    suffix?: string
  }
  revenue: {
    count: number
    prefix?: string
    suffix?: string
  }
  rating: number
}

export const companyData: CompanyProfileType[] = [
  {
    name: 'Amazon Inc.',
    logo: amazonLogo,
    website: 'https://www.amazon.com',
    location: 'Seattle, WA',
    category: { label: 'eCommerce', icon: 'tabler:shopping-cart' },
    description: 'Amazon.com, Inc. is an American multinational technology company focusing on e-commerce, cloud computing...',
    employees: { count: 1.5, suffix: 'M+' },
    revenue: { prefix: '$', count: 514, suffix: 'B' },
    rating: 4,
  },
  {
    name: 'Apple Inc.',
    logo: appleLogo,
    website: 'https://www.apple.com',
    location: 'Cupertino, CA',
    category: { label: 'Tech', icon: 'tabler:device-mobile' },
    description: 'Apple Inc. designs, manufactures, and markets smartphones, personal computers, tablets, and accessories.',
    employees: { count: 160, suffix: 'K+' },
    revenue: { prefix: '$', count: 383, suffix: 'B' },
    rating: 4,
  },
  {
    name: 'Walmart Inc.',
    logo: walmartLogo,
    website: 'https://www.walmart.com',
    location: 'Bentonville, AR',
    category: { label: 'Retail', icon: 'tabler:building-store' },
    description: 'Walmart operates a chain of hypermarkets, discount department stores, and grocery stores worldwide.',
    employees: { count: 2.1, suffix: 'M+' },
    revenue: { prefix: '$', count: 611, suffix: 'B' },
    rating: 3,
  },
  {
    name: 'Starbucks',
    logo: starbucksLogo,
    website: 'https://www.starbucks.com',
    location: 'Seattle, WA',
    category: { label: 'Food & Beverage', icon: 'tabler:coffee' },
    description: 'Starbucks is a multinational chain of coffeehouses and roastery reserves headquartered in Seattle, Washington.',
    employees: { count: 400, suffix: 'K+' },
    revenue: { prefix: '$', count: 36, suffix: 'B' },
    rating: 3,
  },
  {
    name: 'Meta Platforms',
    logo: metaLogo,
    website: 'https://about.meta.com',
    location: 'Menlo Park, CA',
    category: { label: 'Tech', icon: 'tabler:network' },
    description: 'Meta develops social media platforms and technologies including Facebook, Instagram, and the Metaverse.',
    employees: { count: 86, suffix: 'K+' },
    revenue: { prefix: '$', count: 117, suffix: 'B' },
    rating: 4,
  },
  {
    name: 'Spotify',
    logo: spotifyLogo,
    website: 'https://www.spotify.com',
    location: 'Stockholm, Sweden',
    category: { label: 'Entertainment', icon: 'tabler:music' },
    description: 'Spotify is a digital music, podcast, and video streaming service with millions of active users worldwide.',
    employees: { count: 8, suffix: 'K+' },
    revenue: { prefix: '$', count: 13, suffix: 'B' },
    rating: 3,
  },
  {
    name: 'Google LLC',
    logo: googleLogo,
    website: 'https://www.google.com',
    location: 'Mountain View, CA',
    category: { label: 'Tech', icon: 'tabler:world' },
    description: 'Google specializes in internet-related services and products, including search, ads, cloud, and more.',
    employees: { count: 180, suffix: 'K+' },
    revenue: { prefix: '$', count: 324, suffix: 'B' },
    rating: 4,
  },
  {
    name: 'Airbnb',
    logo: airbnbLogo,
    website: 'https://www.airbnb.com',
    location: 'San Francisco, CA',
    category: { label: 'Hospitality', icon: 'tabler:home' },
    description: 'Airbnb is a global platform for lodging, primarily homestays for vacation rentals and tourism activities.',
    employees: { count: 6, suffix: 'K+' },
    revenue: { prefix: '$', count: 9.9, suffix: 'B' },
    rating: 3,
  },
  {
    name: 'Shell plc',
    logo: shellLogo,
    website: 'https://www.shell.com',
    location: 'London, UK',
    category: { label: 'Energy', icon: 'tabler:gas-station' },
    description: 'Shell is a global energy and petrochemical company focused on oil, gas, and renewable energy solutions.',
    employees: { count: 90, suffix: 'K+' },
    revenue: { prefix: '$', count: 381, suffix: 'B' },
    rating: 3,
  },
]
