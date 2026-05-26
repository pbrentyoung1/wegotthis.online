import type { ApexOptions } from 'apexcharts'
import { getColor } from '~/utils/helpers'

const inFlag = '/images/flags/in.svg'
const deFlag = '/images/flags/de.svg'
const frFlag = '/images/flags/fr.svg'
const usFlag = '/images/flags/us.svg'
const gbFlag = '/images/flags/gb.svg'
const caFlag = '/images/flags/ca.svg'
const jpFlag = '/images/flags/jp.svg'
const auFlag = '/images/flags/au.svg'
const brFlag = '/images/flags/br.svg'
const itFlag = '/images/flags/it.svg'

export type OverviewType = {
  value: number
  suffix: string
  change: number
  changeIcon: string
  title: string
  icon: string
  isPositive: boolean
}

export const overviewData: OverviewType[] = [
  {
    value: 14.59,
    suffix: 'M',
    change: 5.2,
    changeIcon: 'tabler:trending-up',
    title: 'Total Views',
    icon: 'tabler:eye',
    isPositive: true,
  },
  {
    value: 815.58,
    suffix: 'K',
    change: 3.9,
    changeIcon: 'tabler:activity',
    title: 'Sessions',
    icon: 'tabler:clock',
    isPositive: true,
  },
  {
    value: 41.3,
    suffix: '%',
    change: -1.1,
    changeIcon: 'tabler:arrow-down-left',
    title: 'Bounce Rate',
    icon: 'tabler:repeat-once',
    isPositive: false,
  },
  {
    value: 56.39,
    suffix: 'K',
    change: 2.3,
    changeIcon: 'tabler:users',
    title: 'Active Users',
    icon: 'tabler:user',
    isPositive: true,
  },
]

function generateRandomData(count: number, min: number, max: number) {
  return Array.from({ length: count }, () => Math.floor(Math.random() * (max - min + 1)) + min)
}

function generateSessionAndPageViewData(count: number) {
  const sessions = generateRandomData(count, 250, 450)
  const pageViews = sessions.map(
    (session) => Math.floor(session * (2 + Math.random() * 0.1)) // Page Views are 2x to 2.5x of Sessions
  )
  return { sessions, pageViews }
}

const { sessions, pageViews } = generateSessionAndPageViewData(19)

export const analyticChartOptions: () => ApexOptions = () => ({
  chart: {
    height: 326,
    type: 'area',
    toolbar: { show: false },
  },
  dataLabels: {
    enabled: false,
  },
  stroke: {
    width: 2,
    curve: 'smooth',
  },
  colors: [getColor('chart-primary'), getColor('chart-secondary')],
  series: [
    {
      name: 'Sessions',
      data: sessions,
    },
    {
      name: 'Page Views',
      data: pageViews,
    },
  ],
  legend: {
    offsetY: 5,
  },
  xaxis: {
    categories: ['', '8 AM', '9 AM', '10 AM', '11 AM', '12 PM', '1 PM', '2 PM', '3 PM', '4 PM', '5 PM', '6 PM', '7 PM', '8 PM', '9 PM', '10 PM', '11 PM', '12 AM', ''],
    axisBorder: { show: false },
    axisTicks: { show: false },
    tickAmount: 6,
    labels: {
      style: {
        fontSize: '12px',
      },
    },
  },
  tooltip: {
    shared: true,
    y: {
      formatter: (val: number, opts?: any): string => {
        if (opts?.seriesIndex === 0) {
          return `${val} Sessions`
        } else if (opts?.seriesIndex === 1) {
          return `${val} Page Views`
        }

        return `${val}`
      },
    },
  },
  fill: {
    type: 'gradient',
    gradient: {
      shadeIntensity: 1,
      opacityFrom: 0.4,
      opacityTo: 0.2,
      stops: [15, 120, 100],
    },
  },
  grid: {
    borderColor: getColor('border-color'),
    padding: {
      bottom: 5,
    },
  },
})

function generateRandomDeviceData(name: string, minY: number, maxY: number, count: number = 10) {
  const data = []
  for (let i = 1; i <= count; i++) {
    const y = Math.floor(Math.random() * (maxY - minY + 1)) + minY
    const z = Math.floor(Math.random() * (35 - 15 + 1)) + 15
    data.push({ x: i, y: y, z: z })
  }
  return { name, data }
}

export const deviceSessionsChartOptions: () => ApexOptions = () => ({
  chart: {
    height: 223, // Increased height for spacing
    type: 'bubble',
    toolbar: {
      show: false,
    },
  },
  dataLabels: {
    enabled: false,
  },
  series: [generateRandomDeviceData('Desktop', 20, 150), generateRandomDeviceData('Mobile', 20, 120), generateRandomDeviceData('Tablet', 20, 60)],
  fill: {
    opacity: 0.8,
  },
  colors: [getColor('chart-primary'), getColor('chart-secondary'), getColor('chart-beta')],
  xaxis: {
    min: 0,
    max: 11,
    show: false,
    labels: { show: false },
    axisBorder: { show: false },
    axisTicks: { show: false },
  },
  yaxis: {
    min: 0,
    max: 170,
    show: false,
    labels: { show: false },
    axisBorder: { show: false },
    axisTicks: { show: false },
  },

  grid: {
    padding: {
      top: -20,
      right: 20,
      bottom: 0,
      left: 20,
    },
    borderColor: getColor('border-color'),
  },

  legend: {
    show: true,
    position: 'top',
    horizontalAlign: 'center',
  },
})

export type DeviceSessionType = {
  name: string
  platforms: string
  users: number
  change: number
  percentage: number
  isPositive: boolean
}

export const deviceSessionData: DeviceSessionType[] = [
  {
    name: 'Mobile',
    platforms: 'Android / iOS',
    users: 4620,
    change: 3.4,
    percentage: 58,
    isPositive: true,
  },
  {
    name: 'Desktop',
    platforms: 'Windows / Mac',
    users: 2510,
    change: 1.9,
    percentage: 32,
    isPositive: true,
  },
  {
    name: 'Tablet',
    platforms: 'iPad / Android Tabs',
    users: 820,
    change: 0.8,
    percentage: 10,
    isPositive: false,
  },
]

export type TrafficType = {
  pageLink: string
  views: number
  unique: number
}

export const trafficData: TrafficType[] = [
  { pageLink: '/dashboard', views: 9.8, unique: 8.5 },
  { pageLink: '/ecommerce-index', views: 8.2, unique: 7.1 },
  { pageLink: '/apps/projects-overview', views: 7.6, unique: 6.2 },
  { pageLink: '/pages/contact', views: 5.9, unique: 4.8 },
  { pageLink: '/support/faq', views: 5.2, unique: 4.3 },
  { pageLink: '/login', views: 4.7, unique: 3.9 },
]

export type TopCountryType = {
  name: string
  image: string
  value: string
  change: number
}

export const topCountryData: TopCountryType[] = [
  { name: 'Germany', image: deFlag, value: '10,412', change: 1.5 },
  { name: 'France', image: frFlag, value: '8,934', change: -0.8 },
  { name: 'India', image: inFlag, value: '14,217', change: 3.2 },
  { name: 'United States', image: usFlag, value: '18,522', change: 2.1 },
  { name: 'United Kingdom', image: gbFlag, value: '7,614', change: -1.2 },
  { name: 'Canada', image: caFlag, value: '6,221', change: 0.9 },
  { name: 'Japan', image: jpFlag, value: '5,785', change: 0.0 },
  { name: 'Australia', image: auFlag, value: '4,918', change: 1.1 },
  { name: 'Brazil', image: brFlag, value: '3,874', change: -0.5 },
  { name: 'Italy', image: itFlag, value: '4,105', change: 0.7 },
]

export type CampaignType = {
  name: string
  icon: string
  className: string
  visitors: number
  newUsers: number
  sessions: number
  bounceRate: number
  pageVisits: number
  avgDuration: string
  leads: number
  revenue: number
  conversion: number
  isPositive: boolean
}

export const campaignData: CampaignType[] = [
  {
    name: 'Spring Launch',
    icon: 'tabler:rocket',
    className: 'text-primary',
    visitors: 502,
    newUsers: 260,
    sessions: 6845,
    bounceRate: 18.22,
    pageVisits: 3.15,
    avgDuration: '01:40',
    leads: 432,
    revenue: 3.64,
    conversion: 6.15,
    isPositive: true,
  },
  {
    name: 'Facebook Push',
    icon: 'tabler:brand-facebook',
    className: 'text-info',
    visitors: 478,
    newUsers: 245,
    sessions: 6120,
    bounceRate: 21.03,
    pageVisits: 2.87,
    avgDuration: '01:28',
    leads: 398,
    revenue: 3.1,
    conversion: 5.65,
    isPositive: false,
  },
  {
    name: 'Holiday Buzz',
    icon: 'tabler:speakerphone',
    className: 'text-success',
    visitors: 445,
    newUsers: 230,
    sessions: 5710,
    bounceRate: 23.12,
    pageVisits: 2.45,
    avgDuration: '01:22',
    leads: 372,
    revenue: 2.86,
    conversion: 5.12,
    isPositive: false,
  },
  {
    name: 'Email Reconnect',
    icon: 'tabler:mail-fast',
    className: 'text-warning',
    visitors: 392,
    newUsers: 190,
    sessions: 5210,
    bounceRate: 25.74,
    pageVisits: 2.18,
    avgDuration: '01:50',
    leads: 340,
    revenue: 2.45,
    conversion: 4.88,
    isPositive: false,
  },
  {
    name: 'Display Retarget',
    icon: 'tabler:broadcast',
    className: 'text-muted',
    visitors: 338,
    newUsers: 160,
    sessions: 4670,
    bounceRate: 19.88,
    pageVisits: 1.92,
    avgDuration: '02:05',
    leads: 298,
    revenue: 1.95,
    conversion: 4.62,
    isPositive: false,
  },
]
